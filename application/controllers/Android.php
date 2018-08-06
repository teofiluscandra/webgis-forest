<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Android extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('penanaman_model_baru');
        $this->load->library('form_validation');
    }

   public function index() {
    $valid = $this->form_validation;
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $valid->set_rules('username','Username','required');
    $valid->set_rules('password','Password','required');
    
    if($valid->run()) {
        $this->session->set_flashdata('message', 'Berhasil Login');
            $this->login_android->login($username,$password);
          
    } else{
        $this->session->set_flashdata('message', 'Username / Password salah');
    }
    
    $this->load->view('android/login');
    }

    public function home(){

    if ($this->session->userdata('level')==2) {
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));
    } else{
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id_koordinator'));
    }

    $data=array('title'=>'Halaman Relawan',
            'penanaman' => $penanaman,
            'user' => $this->session->userdata('id')
            );
    $this->load->view('android/home',$data);
    }

    public function bantuan(){
    if ($this->session->userdata('level')==2) {
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));
    } else{
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id_koordinator'));
    }

    $data=array('title'=>'Halaman Relawan',
            'penanaman' => $penanaman,
            'user' => $this->session->userdata('id')
            );
    $this->load->view('android/bantuan',$data);
    }

    public function buat($id) 
    {
        $row = $this->penanaman_model_baru->get_by_id($id);
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));
        if ($row) {
            $data = array(
                'button' => 'Create',
            'action' => site_url('android/create_action'),
            'jumlah' => set_value('jumlah'),
            'penanaman' => $penanaman,
        'id_penanaman' => $row->id_penanaman,
        'nama_penanam' => $row->nama_komunitas,
        'tgl_tanam' => $row->tgl_tanam,
        'nama_lengkap' => $row->nama_lengkap,
        'nama_pohon' => $row->nama_pohon,
        'nama_petak' => $row->nama_petak,
        'status' => $row->status,
        'jumlah' => $row->jumlah,
        'jumlahinput' => $row->jumlahinput,
        'title' => 'Penanaman'
        );
            
            $this->load->view('android/pemetaan', $data);
           
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('android/home'));
        }
    }

    public function create_action(){

        $this->_rules();
         if ($this->form_validation->run() == FALSE) {
            $this->buat($this->input->post('id_penanaman'));
        } else {
         if ($this->session->userdata('level')==2) {
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));
            } else{
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id_koordinator'));
            }


        $id = $this->input->post('id_penanaman');
        $row = $this->penanaman_model_baru->get_by_id($id);
        $jumlahinput = $this->input->post('i') + $row->jumlahinput;
        $status = $this->input->post('status');
        $tgl_tanam = date("Y-m-d");
        $data1 = array('status' => $status ,
                    'jumlahinput' => $jumlahinput,
                    'tgl_tanam' => $tgl_tanam );

        $id_penanaman = array('penanaman' => $penanaman );

        $i=0;
        $lat = $this->input->post('latitude');
        $loop = $this->input->post('i');
        $long = $this->input->post('longitude');
        $status_pohon = $this->input->post('status_pohon');
        for($i;$i<$loop;$i++){
            $latitude = $lat[$i];
            $longitude = $long[$i];
    
            $data=array(
             'id_penanaman'=>$id,
             'lat'=>$latitude,
             'lon'=>$longitude,
             'status_pohon' => $status_pohon
            );
            $this->penanaman_model_baru->save_relawan($data);
        }

        $this->penanaman_model_baru->update($id,$data1);
       
        $this->load->view('android/terimakasih',$id_penanaman);
        }
        
        
    }

     public function _rules() 
    {
    $this->form_validation->set_rules('latitude[]', ' ', 'trim|required');
    $this->form_validation->set_rules('longitude[]', ' ', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function logout() {
    $this->login_android->logout();
    }
}