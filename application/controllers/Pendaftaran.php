<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pendaftaran = $this->Pendaftaran_model->get_all();

        $data = array(
            'pendaftaran_data' => $pendaftaran,
            'isi' => 'pendaftaran/pendaftaran_list',
            'title' => 'Pendaftaran'
        );

        $this->load->view('user/layout/wrapper', $data);
    }

      public function semua_komunitas()
    {
        $pendaftaran = $this->Pendaftaran_model->get_komunitas();

        $data = array(
            'pendaftaran_data' => $pendaftaran,
            'isi' => 'pendaftaran/pendaftaran_home',
            'title' => 'Pendaftaran'
        );

        $this->load->view('layout/wrapper', $data);
    }

    public function read($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pendaftaran' => $row->id_pendaftaran,
		'nama' => $row->nama,
		'nama_komunitas' => $row->nama_komunitas,
		'tanggal' => $row->tanggal,
		'gambaran_komunitas' => $row->gambaran_komunitas,
		'no_telp' => $row->no_telp,
		'email' => $row->email,
		'alamat' => $row->alamat,
        'website' => $row->website,
        'title' => 'Profil Komunitas',
        'isi' => 'pendaftaran/pendaftaran_read'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }



   public function ajax_add()
    {
        $data = array(
                'nama' => $this->input->post('nama'),
                'nama_komunitas' => $this->input->post('nama_komunitas'),
                'tanggal' => Date('Y-m-d'),
                'gambaran_komunitas' => $this->input->post('gambaran_komunitas'),  
                'no_telp' => $this->input->post('no_telp'),
                'website' => $this->input->post('website'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
            );
        $insert = $this->Pendaftaran_model->insert($data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_pendaftaran()
    {
         $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->ajax_pendaftaran();
        } else {
            $data = array(
                'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                'nama' => $this->input->post('nama'),
                'nama_komunitas' => $this->input->post('nama_komunitas'),
                'tanggal' => $this->input->post('tanggal'),
                'gambaran_komunitas' => $this->input->post('gambaran_komunitas'),  
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                );
        $this->Pendaftaran_model->insert($data);
        echo json_encode($data);
        }

        
    }

    public function create() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('pendaftaran/create_action'),
	    'id_pendaftaran' => set_value('id_pendaftaran'),
	    'nama' => set_value('nama'),
	    'nama_komunitas' => set_value('nama_komunitas'),
	    'tanggal' => set_value('tanggal'),
	    'gambaran_komunitas' => set_value('gambaran_komunitas'),
	    'no_telp' => set_value('no_telp'),
	    'email' => set_value('email'),
	    'alamat' => set_value('alamat'),
        'website' => set_value('website'),
        'title' => 'Form Pendaftaran',
        'isi' => 'pendaftaran/pendaftaran_form'
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
		'nama' => $this->input->post('nama',TRUE),
		'nama_komunitas' => $this->input->post('nama_komunitas',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'gambaran_komunitas' => $this->input->post('gambaran_komunitas',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
        'website' => $this->input->post('website',TRUE),
	    );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', 'Penambahan Komunitas Berhasil');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftaran/update_action'),
		'id_pendaftaran' => set_value('id_pendaftaran', $row->id_pendaftaran),
		'nama' => set_value('nama', $row->nama),
		'nama_komunitas' => set_value('nama_komunitas', $row->nama_komunitas),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'gambaran_komunitas' => set_value('gambaran_komunitas', $row->gambaran_komunitas),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'email' => set_value('email', $row->email),
		'alamat' => set_value('alamat', $row->alamat),
        'website' => set_value('website', $row->website),
        'title' => 'Update Pendaftaran',
        'isi' => 'pendaftaran/pendaftaran_form'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pendaftaran', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nama_komunitas' => $this->input->post('nama_komunitas',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'gambaran_komunitas' => $this->input->post('gambaran_komunitas',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
        'website' => $this->input->post('website',TRUE),
	    );

            $this->Pendaftaran_model->update($this->input->post('id_pendaftaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Berhasil');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nama_komunitas', 'nama komunitas', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('gambaran_komunitas', 'gambaran komunitas', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_pendaftaran', 'id_pendaftaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pendaftaran.doc");

        $data = array(
            'pendaftaran_data' => $this->Pendaftaran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pendaftaran/pendaftaran_doc',$data);
    }

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-24 19:12:53 */
/* http://harviacode.com */