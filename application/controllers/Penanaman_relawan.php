<?php  
  if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penanaman_relawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penanaman_model_baru');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $penanaman = $this->penanaman_model_baru->get_all();

        $data = array(
            'penanaman_data' => $penanaman,
            'title' => 'Managemen Penanaman',
            'isi' => 'penanaman/penanaman_list'
        );

        $this->load->view('user/layout_relawan/wrapper', $data);
    }

   public function buat($id) 
    {
        $row = $this->penanaman_model_baru->get_by_id($id);
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));
        if ($row) {
            $data = array(
                'button' => 'Create',
            'action' => site_url('penanaman_relawan/create_action'),
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
        'isi' => 'penanaman/penanaman_form_relawan',
        'cancel' => site_url('user/dasbor_relawan'),
            'title' => 'Penanaman'
        );
            
            $this->load->view('user/layout_relawan/wrapper', $data);
           
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dasbor_relawan'));
        }
    }

    public function create_action(){
       $id = $this->input->post('id_penanaman');
        $row = $this->penanaman_model_baru->get_by_id($id);

        $jumlahinput = $row->jumlahinput + $this->input->post('i');
        if ($jumlahinput <= 0) {
            $jumlahinput == 0;
        }
        $jumlah = $this->input->post('jumlah');

        $status = 0;
        /*if ($jumlahinput == $jumlah) {
            $status = 1;
        } else {
            $status = 0;
        }*/
        
        $tgl_tanam = date("Y-m-d");
        $data = array('status' => $status ,
                    'jumlahinput' => $jumlahinput,
                    'tgl_tanam' => $tgl_tanam );

        $this->penanaman_model_baru->update($id,$data);
        $this->penanaman_model_baru->save_relawan();
        redirect('user/dasbor_relawan');
        
    }
    }
    

?>