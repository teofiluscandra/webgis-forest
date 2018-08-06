    <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penanaman_baru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penanaman_model_baru');
        $this->load->model('relawan_model');
        $this->load->model('detail_penanaman_model');
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $penanaman_baru = $this->penanaman_model_baru->get_all();

        $data = array(
            'penanaman_baru_data' => $penanaman_baru,
            'isi' => 'penanaman/penanaman_list',
            'title' => 'Penanaman'
        );

        $this->load->view('user/layout/wrapper', $data);
    }

     public function konfirmasi(){
        $penanaman = $this->penanaman_model_baru->get_confirm();

        $data = array(
            'penanaman_data' => $penanaman,
            'title' => 'Konfirmasi Penanaman',
            'isi' => 'konfirmasi/index'
        );

        $this->load->view('user/layout/wrapper', $data);   
    }

    public function read($id) 
    {
        $row = $this->penanaman_model_baru->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penanaman' => $row->id_penanaman,
		'nama_komunitas' => $row->nama_komunitas,
		'tgl_tanam' => $row->tgl_tanam,
		'nama_lengkap' => $row->nama_lengkap,
		'nama_pohon' => $row->nama_pohon,
        'jenis_pohon' => $row->jenis_pohon,
		'nama_petak' => $row->nama_petak,
		'status' => $row->status,
		'jumlah' => $row->jumlah,
        'isi' => 'penanaman/penanaman_read',
            'title' => 'Penanaman'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman_baru'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penanaman_baru/create_action'),
	    'id_penanaman' => set_value('id_penanaman'),
	    'nama_penanam' => $this->Pendaftaran_model->getkomunitas(),
	    'tgl_tanam' => set_value('tgl_tanam'),
	    'id_user' => set_value('id_user'),
	    'id_pohon' => set_value('id_pohon'),
	    'id_petak' => set_value('id_petak'),
	    'status' => set_value('status'),
	    'jumlah' => set_value('jumlah'),
         'pohon' => $this->penanaman_model_baru->getpohon(),
        'petak' => $this->penanaman_model_baru->getpetak(),
        'users' => $this->penanaman_model_baru->getuser(),
         'isi' => 'penanaman/penanaman_form',
        'title' => 'Penanaman'
	);
        $this->load->view('user/layout/wrapper', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_penanam' => $this->input->post('nama_penanam',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'id_pohon' => $this->input->post('id_pohon',TRUE),
		'id_petak' => $this->input->post('id_petak',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
        'jumlahinput' => $this->input->post('jumlahinput',TRUE),
	    );
            $datarelawan = array('isAlready' => 1);
            $tanggal_expired = array('tanggal_expired' => Date('y:m:d', strtotime("+3 days")));

            $this->penanaman_model_baru->insert($data);
            $this->relawan_model->update($data['id_user'],$datarelawan);
            $this->relawan_model->update($data['id_user'],$tanggal_expired);
            $this->session->set_flashdata('message', 'Tambah Data Penanaman Berhasil');
            
            redirect(site_url('penanaman_baru'));
        }
    }

    public function confirm($id){
        $row = $this->penanaman_model_baru->get_by_id($id);

        if ($row) {
            $data = array(
            'status' => 2
        );
            $this->penanaman_model_baru->update($id, $data);
            $this->session->set_flashdata('message', 'Data Penanaman Berhasil Dikonfirmasi');
            redirect(site_url('penanaman_baru/konfirmasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman_baru'));
        }
    }

    public function tolak($id){
        $row = $this->penanaman_model_baru->get_by_id($id);

        if ($row) {
            $data = array(
            'status' => 3
        );
            $this->penanaman_model_baru->update($id, $data);
            $this->session->set_flashdata('message', 'Data Penanaman Berhasil Ditolak');
            redirect(site_url('penanaman_baru/konfirmasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman_baru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->penanaman_model_baru->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penanaman_baru/update_action'),
		'id_penanaman' => set_value('id_penanaman', $row->id_penanaman),
        'id_pendaftaran' => set_value('id_pendaftaran', $row->id_pendaftaran),
        'nama_komunitas' => set_value('nama_komunitas', $row->nama_komunitas),
		'nama_penanam' => set_value('nama_penanam', $row->nama_penanam),
		'id_user' => set_value('id_user', $row->id_user),
        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'id_pohon' => set_value('id_pohon', $row->id_pohon),
        'nama_pohon' => set_value('nama_pohon', $row->nama_pohon),
		'id_petak' => set_value('id_petak', $row->id_petak),
        'nama_petak' => set_value('nama_petak', $row->nama_petak),
		'status' => set_value('status', $row->status),
		'jumlah' => set_value('jumlah', $row->jumlah),
        'jumlah_input' => set_value('jumlah_input', $row->jumlahinput),
        'nama_penanam' => $this->Pendaftaran_model->getkomunitas(),
        'pohon' => $this->penanaman_model_baru->getpohon(),
        'petak' => $this->penanaman_model_baru->getpetak(),
        'users' => $this->penanaman_model_baru->getuser(),
         'isi' => 'penanaman/penanaman_update',
            'title' => 'Update Penanaman'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Tidak bisa diupdate kembali');
            redirect(site_url('penanaman_baru'));
        }
    }
    
    public function update_action() 
    {
        
        $this->form_validation->set_rules('jumlah', ' ', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penanaman', TRUE));
        } else {
            $data = array(
		'nama_penanam' => $this->input->post('nama_penanam',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'id_pohon' => $this->input->post('id_pohon',TRUE),
		'id_petak' => $this->input->post('id_petak',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->penanaman_model_baru->update($this->input->post('id_penanaman', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Berhasil');
            redirect(site_url('penanaman_baru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->penanaman_model_baru->get_by_id($id);

        if ($row) {
            $this->detail_penanaman_model->deleteAll($id);
            $this->penanaman_model_baru->delete($id);
            redirect(site_url('penanaman_baru'));
        } else {
            $this->session->set_flashdata('message', '');
            redirect(site_url('penanaman_baru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_penanam', ' ', 'trim|required');
	$this->form_validation->set_rules('id_user', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('id_pohon', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('id_petak', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('status', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('jumlah', ' ', 'trim|required|numeric');

	$this->form_validation->set_rules('id_penanaman', 'id_penanaman', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penanaman.xls";
        $judul = "penanaman";
        $tablehead = 2;
        $tablebody = 3;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        xlsWriteLabel(0, 0, $judul);

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "no");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_penanam");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_tanam");
	xlsWriteLabel($tablehead, $kolomhead++, "id_user");
	xlsWriteLabel($tablehead, $kolomhead++, "id_pohon");
	xlsWriteLabel($tablehead, $kolomhead++, "id_petak");
	xlsWriteLabel($tablehead, $kolomhead++, "status");
	xlsWriteLabel($tablehead, $kolomhead++, "jumlah");

	foreach ($this->penanaman_model_baru->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_penanam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_tanam);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pohon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_petak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=DataPenanaman.doc");

        $data = array(
            'penanaman_data' => $this->penanaman_model_baru->get_all(),
            'start' => 0
        );
        
        $this->load->view('penanaman/penanaman_html',$data);
    }

};

/* End of file Penanaman_baru.php */
/* Location: ./application/controllers/Penanaman_baru.php */