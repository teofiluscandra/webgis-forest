<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('petak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $petak = $this->petak_model->get_all();

        $data = array(
            'petak_data' => $petak,
            'title' => 'Managemen Petak',
            'isi' => 'petak/petak_list'
        );

        $this->load->view('user/layout/wrapper', $data);
    }

    public function read($id) 
    {
        $row = $this->petak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_petak' => $row->id_petak,
		'nama_petak' => $row->nama_petak,
		'luas_petak' => $row->luas_petak,
		'lokasi_petak' => $row->lokasi_petak,
		'deskripsi' => $row->deskripsi,
        'title' => 'Managemen Petak',
        'isi' => 'petak/petak_read'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petak'));
        }
    }
    
    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('petak/create_action'),
	    'id_petak' => set_value('id_petak'),
	    'nama_petak' => set_value('nama_petak'),
	    'luas_petak' => set_value('luas_petak'),
	    'lokasi_petak' => set_value('lokasi_petak'),
	    'deskripsi' => set_value('deskripsi'),
        'title' => 'Managemen Petak',
        'isi' => 'petak/petak_form'
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
		'nama_petak' => $this->input->post('nama_petak',TRUE),
		'luas_petak' => $this->input->post('luas_petak',TRUE),
		'lokasi_petak' => $this->input->post('lokasi_petak',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->petak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('petak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->petak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('petak/update_action'),
		'id_petak' => set_value('id_petak', $row->id_petak),
		'nama_petak' => set_value('nama_petak', $row->nama_petak),
		'luas_petak' => set_value('luas_petak', $row->luas_petak),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
        'isi' => 'petak/petak_form',
        'title' => 'Update Petak'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_petak', TRUE));
        } else {
            $data = array(
		'nama_petak' => $this->input->post('nama_petak',TRUE),
		'luas_petak' => $this->input->post('luas_petak',TRUE),
		'lokasi_petak' => $this->input->post('lokasi_petak',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->petak_model->update($this->input->post('id_petak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Sukses');
            redirect(site_url('petak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->petak_model->get_by_id($id);

        if ($row) {
            $this->petak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('petak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_petak', ' ', 'trim|required');
	$this->form_validation->set_rules('luas_petak', ' ', 'trim|required|numeric');
	
	$this->form_validation->set_rules('deskripsi', ' ', 'trim|required');

	$this->form_validation->set_rules('id_petak', 'id_petak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "petak.xls";
        $judul = "petak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "nama_petak");
	xlsWriteLabel($tablehead, $kolomhead++, "luas_petak");
	xlsWriteLabel($tablehead, $kolomhead++, "lokasi_petak");
	xlsWriteLabel($tablehead, $kolomhead++, "deskripsi");

	foreach ($this->petak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_petak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->luas_petak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi_petak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=petak.doc");

        $data = array(
            'petak_data' => $this->petak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('petak/petak_html',$data);
    }

};

/* End of file Petak.php */
/* Location: ./application/controllers/Petak.php */