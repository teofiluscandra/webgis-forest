<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penanaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penanaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $penanaman = $this->penanaman_model->get_all();

        $data = array(
            'penanaman_data' => $penanaman,
            'title' => 'Managemen Penanaman',
            'isi' => 'penanaman/penanaman_list'
        );

        $this->load->view('user/layout/wrapper', $data);
    }


    public function read($id) 
    {
        $row = $this->penanaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penanaman' => $row->id_penanaman,
		'nama_penanam' => $row->nama_penanam,
		'tgl_tanam' => $row->tgl_tanam,
		'id_pohon' => $row->id_pohon,
		'id_user' => $row->id_user,
		'id_petak' => $row->id_petak,
		'status' => $row->status,
		'lokasi_penanaman' => $row->lokasi_penanaman,
	    );
            $this->load->view('penanaman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman'));
        }
    }
    
    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('penanaman/create_action'),
	    'id_penanaman' => set_value('id_penanaman'),
	    'nama_penanam' => set_value('nama_penanam'),
	    'tgl_tanam' => set_value('tgl_tanam'),
	    'id_pohon' => set_value('id_pohon'),
	    'id_user' => set_value('id_user'),
	    'id_petak' => set_value('id_petak'),
	    'status' => set_value('status'),
        'title' => 'Tambah Penanaman',
        'isi' => 'penanaman/penanaman_form',
        'pohon' => $this->penanaman_model->getpohon(),
        'petak' => $this->penanaman_model->getpetak(),
        'users' => $this->penanaman_model->getuser(),
	);
        $this->load->view('user/layout/wrapper', $data);
    }



    public function create_relawan(){
        $data = array(
        'button' => 'Create',
        'action' => site_url('penanaman/create_action'),
        'title' => 'Tambah Penanaman',
        'id_penanaman' => set_value('id_penanaman'),
        'jumlah' => set_value('jumlah'),
        'nama_penanam' => set_value('nama_penanam'),
        'tgl_tanam' => set_value('tgl_tanam'),
        'id_pohon' => set_value('id_pohon'),
        'id_user' => set_value('id_user'),
        'id_petak' => set_value('id_petak'),
        'status' => set_value('status'),
        'lokasi_penanaman' => set_value('lokasi_penanaman'),
        'username' => set_value('username'),
        'nama_lengkap' => set_value('nama_lengkap'),
        'password' => set_value('password'),
        'pohon' => $this->penanaman_model->getpohon(),
        'petak' => $this->penanaman_model->getpetak(),
            'isi' => 'penanaman/penanaman_form_relawan' 
            );

        $this->load->view('user/layout_relawan/wrapper', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_penanam' => $this->input->post('nama_penanam',TRUE),
		'tgl_tanam' => $this->input->post('tgl_tanam',TRUE),
		'status' => $this->input->post('status',TRUE),
        'jumlah' => $this->input->post('jumlah',TRUE),
        'id_pohon' => $this->input->post('id_pohon',TRUE),
        'id_petak' => $this->input->post('id_petak',TRUE),
        'id_user' => $this->input->post('id_user',TRUE),
        'id_penanaman' => $this->input->post('id_penanaman',TRUE),
	    );
            $this->penanaman_model->insert($data);  
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penanaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->penanaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penanaman/update_action'),
		'id_penanaman' => set_value('id_penanaman', $row->id_penanaman),
		'nama_penanam' => set_value('nama_penanam', $row->nama_penanam),
		'tgl_tanam' => set_value('tgl_tanam', $row->tgl_tanam),
		'id_pohon' => set_value('id_pohon', $row->id_pohon),
		'id_user' => set_value('id_user', $row->id_user),
		'id_petak' => set_value('id_petak', $row->id_petak),
		'status' => set_value('status', $row->status),
		'lokasi_penanaman' => set_value('lokasi_penanaman', $row->lokasi_penanaman),
	    );
            $this->load->view('penanaman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman'));
        }
    }

    public function buat($id) 
    {
        $row = $this->penanaman_model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('penanaman/update_action'),
        'id_penanaman' => set_value('id_penanaman', $row->id_penanaman),
        'nama_penanam' => set_value('nama_penanam', $row->nama_penanam),
        'tgl_tanam' => set_value('tgl_tanam', $row->tgl_tanam),
        'id_pohon' => set_value('id_pohon', $row->id_pohon),
        'id_user' => set_value('id_user', $row->id_user),
        'id_petak' => set_value('id_petak', $row->id_petak),
        'status' => set_value('status', $row->status),
        );
            $this->load->view('penanaman_form_relawan', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penanaman', TRUE));
        } else {
            $data = array(
		'nama_penanam' => $this->input->post('nama_penanam',TRUE),
		'tgl_tanam' => $this->input->post('tgl_tanam',TRUE),
		'id_pohon' => $this->input->post('id_pohon',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'id_petak' => $this->input->post('id_petak',TRUE),
		'status' => $this->input->post('status',TRUE),
		'lokasi_penanaman' => $this->input->post('lokasi_penanaman',TRUE),
	    );

            $this->penanaman_model->update($this->input->post('id_penanaman', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penanaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->penanaman_model->get_by_id($id);

        if ($row) {
            $this->penanaman_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penanaman'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_penanam', ' ', 'trim|required');
	$this->form_validation->set_rules('tgl_tanam', ' ', 'trim|required');
	$this->form_validation->set_rules('id_pohon', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('id_user', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('id_petak', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('status', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('lokasi_penanaman', ' ', 'trim|required');

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
	xlsWriteLabel($tablehead, $kolomhead++, "id_pohon");
	xlsWriteLabel($tablehead, $kolomhead++, "id_user");
	xlsWriteLabel($tablehead, $kolomhead++, "id_petak");
	xlsWriteLabel($tablehead, $kolomhead++, "status");
	xlsWriteLabel($tablehead, $kolomhead++, "lokasi_penanaman");

	foreach ($this->penanaman_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_penanam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_tanam);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pohon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_petak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi_penanaman);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penanaman.doc");

        $data = array(
            'penanaman_data' => $this->penanaman_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penanaman_html',$data);
    }

};

/* End of file Penanaman.php */
/* Location: ./application/controllers/Penanaman.php */