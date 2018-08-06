<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relawan_komunitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Relawan_komunitas_model');
        $this->load->model('Relawan_model');
        $this->load->model('Penanaman_model_baru');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $relawan_komunitas = $this->Relawan_komunitas_model->get_all();
        $penanaman = $this->Penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));

        $data = array(
            'relawan_komunitas_data' => $relawan_komunitas,
            'penanaman' => $penanaman,
            'user' => $this->session->userdata('id'),
            'isi' => 'user/relawan_komunitas/relawan_list',
            'title' => 'Relawan'
        );

        $this->load->view('user/layout_relawan/wrapper', $data);
    }

     public function konfirmasi()
    {
        
        $penanaman = $this->Penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));
        $relawan_komunitas = $this->Relawan_komunitas_model->get_all_penanaman($penanaman->id_penanaman);
        $data = array(
            'relawan_komunitas_data' => $relawan_komunitas,
            'penanaman' => $penanaman,
            'user' => $this->session->userdata('id'),
            'isi' => 'konfirmasi_penanaman/relawan_list',
            'title' => 'Relawan'
        );

        $this->load->view('user/layout_relawan/wrapper', $data);
    }

      public function bantuan()
    {
        
        $penanaman = $this->Penanaman_model_baru->get_id_penanaman($this->session->userdata('id_koordinator'));
        $data = array(
            'penanaman' => $penanaman,
            'user' => $this->session->userdata('id'),
            'isi' => 'user/dasbor/bantuan_relawan',
            'title' => 'Bantuan'
        );

        $this->load->view('user/layout_relawan_komunitas/wrapper', $data);
    }


    public function confirm($id){
        $row = $this->Penanaman_model_baru->get_by_id($id);

        if ($row) {
            $data = array(
            'status' => 1
        );
            $this->Penanaman_model_baru->update($id, $data);
            $this->session->set_flashdata('message', 'Data Penanaman Berhasil Dikonfirmasi');
            redirect(site_url('relawan_komunitas/konfirmasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('relawan_komunitas/konfirmasi'));
        }
    }


    public function ajax_add()
    {
        $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'id_koordinator' => $this->session->userdata('id'),
                'level' => 3
            );
        $insert = $this->Relawan_komunitas_model->insert($data);
        echo json_encode(array("status" => TRUE));
    }

    public function UbahPassword($id) 
    {
        $row = $this->Relawan_komunitas_model->get_by_id($id);
        $penanaman = $this->Penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));


        if ($row) {
            $data = array(
            'button' => 'Update',
            'penanaman' => $penanaman,
            'user' => $this->session->userdata('id'),
        'action' => site_url('relawan_komunitas/ubah_action'),
        'id_user' => set_value('id_user', $row->id_user),
        'username' => set_value('username', $row->username),
        'level' => set_value('level', $row->level),
        'password' => set_value('password', $row->password),
        'title' => 'Update '.$row->nama_lengkap,
        'isi' => 'user/relawan_komunitas/relawan_password'
        );
            $this->load->view('user/layout_relawan/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Tidak ada user tersebut');
            redirect(site_url('relawan_komunitas'));
        }
    }

     public function buat($id) 
    {
        $row = $this->Penanaman_model_baru->get_by_id($id);
        $penanaman = $this->Penanaman_model_baru->get_id_penanaman($this->session->userdata('id_koordinator'));
        if ($row) {
            $data = array(
                'button' => 'Create',
            'action' => site_url('relawan_komunitas/create_action'),
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
        'cancel' => site_url('user/dasbor_relawan_komunitas'),
            'title' => 'Penanaman'
        );
            
            $this->load->view('user/layout_relawan_komunitas/wrapper', $data);
           
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user/dasbor_relawan_komunitas'));
        }
    }

    public function create_action(){
       $id = $this->input->post('id_penanaman');
        $jumlahinput = $this->input->post('jumlahinput');
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

        $this->Penanaman_model_baru->update($id,$data);
        $this->Penanaman_model_baru->save_relawan();
        redirect('user/dasbor_relawan_komunitas');
        
    }
    


     public function ubah_action() 
    {
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->ubahPassword($this->input->post('id_user', TRUE));
        } else {
            $data = array(
        'password' => md5($this->input->post('password',TRUE)),
        );

            $this->Relawan_komunitas_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Password Sukses');
            redirect(site_url('relawan_komunitas'));
        }
    } 

    public function read($id) 
    {
        $row = $this->Relawan_komunitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_relawan' => $row->id_relawan,
		'id_koordinator' => $row->id_koordinator,
		'username' => $row->username,
		'password' => $row->password,
	    );
            $this->load->view('relawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('relawan_komunitas'));
        }
    }

    
    public function update($id) 
    {
        $row = $this->Relawan_komunitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('relawan_komunitas/update_action'),
		'id_relawan' => set_value('id_relawan', $row->id_relawan),
		'id_koordinator' => set_value('id_koordinator', $row->id_koordinator),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('relawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('relawan_komunitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_relawan', TRUE));
        } else {
            $data = array(
		'id_koordinator' => $this->input->post('id_koordinator',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Relawan_komunitas_model->update($this->input->post('id_relawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('relawan_komunitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Relawan_komunitas_model->get_by_id($id);

        if ($row) {
            $this->Relawan_komunitas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('relawan_komunitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('relawan_komunitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_koordinator', 'id koordinator', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('id_relawan', 'id_relawan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Relawan_komunitas.php */
/* Location: ./application/controllers/Relawan_komunitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-04 18:57:57 */
/* http://harviacode.com */