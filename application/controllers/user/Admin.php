<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
      
    }

    public function index()
    {
        $admin = $this->admin_model->get_all();


        $data = array(
            'title' => 'Manajemen Admin - Laskar Hijau',
            'admin_data' => $admin,
            'isi' => 'user/admin/users_list'
        );

        $this->load->view('user/layout_superadmin/wrapper', $data);
    }

    public function read($id) 
    {
        $row = $this->admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'username' => $row->username,
		'password' => $row->password,
		'nama_lengkap' => $row->nama_lengkap,
		'level' => $row->level,
		'tanggal_expired' => $row->tanggal_expired,
	    );
            $this->load->view('user/admin/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }
    
    public function create() 
    {
        $data = array(
        'button' => 'Tambah Admin',
        'action' => site_url('user/admin/create_action'),
	    'id_user' => set_value('id_user'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'level' => set_value('level'),
	    'tanggal_expired' => set_value('tanggal_expired'),
        'title' => 'Manajemen Admin - Laskar Hijau',
        'isi' => 'user/admin/users_form'
	);
        $this->load->view('user/layout_superadmin/wrapper', $data);
    }
    
    public function isUsernameExist($username) {
    $is_exist = $this->admin_model->isUsernameExist($username);
    if ($is_exist) {
        $this->form_validation->set_message(
            'isUsernameExist', 'Username is already exist.'
        );    
        return false;
    } else {
        return true;
    }
}

    public function create_action() 
    {
        $this->_rules();
        $this->form_validation->set_rules(
    'username', 'text', 'trim|required|callback_isUsernameExist'
);

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'level' => $this->input->post('level',TRUE),
		'tanggal_expired' => $this->input->post('tanggal_expired',TRUE),
	    );

            $this->admin_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Admin Berhasil');
            redirect(site_url('user/admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/admin/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'level' => set_value('level', $row->level),
		'tanggal_expired' => set_value('tanggal_expired', $row->tanggal_expired),
        'isi' => 'user/admin/users_update',
        'title' => 'Update Admin'
	    );
             $this->load->view('user/layout_superadmin/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Tidak ada user yang dimaksud');
            redirect(site_url('user/admin'));
        }
    }
    
    public function update_action() 
    {
       $this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', ' ', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'level' => $this->input->post('level',TRUE),
		'tanggal_expired' => $this->input->post('tanggal_expired',TRUE),
	    );

            $this->admin_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Sukses');
            redirect(site_url('user/admin'));
        }
    }

     public function UbahPassword($id) 
    {
        $row = $this->admin_model->get_by_id($id);

        if ($row) {
            $data = array(
            'button' => 'Change Password',
        'action' => site_url('user/admin/ubah_action'),
        'id_user' => set_value('id_user', $row->id_user),
        'username' => set_value('username', $row->username),
        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
        'level' => set_value('level', $row->level),
        'password' => set_value('password', $row->password),
        'title' => 'Update '.$row->nama_lengkap,
        'isi' => 'user/admin/users_password'
        );
            $this->load->view('user/layout_superadmin/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Tidak ada user tersebut');
            redirect(site_url('user/admin'));
        }
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

            $this->admin_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Password Sukses');
            redirect(site_url('user/admin'));
        }
    }

    public function Password($id) 
    {
        $row = $this->admin_model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Ubah Password',
        'action' => site_url('user/admin/password_action'),
        'password' => set_value('password', $row->password),
        'title' => 'Password '.$row->nama_lengkap,
        'isi' => 'user/admin/ubah_password'
        );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Tidak ada user tersebut');
            redirect(site_url('user/dasbor'));
        }
    }
    
     public function password_action() 
    {
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->Password($this->session->userdata('id'));
        } else {
            $data = array(
        'password' => md5($this->input->post('password',TRUE)),
        );
            $pass = array('password_lama' => md5($this->input->post('password',TRUE)));


            $row = $this->admin_model->get_by_id($this->session->userdata('id'));
            $passwordlama = $row->password;

            if ($pass['password_lama'] == $passwordlama) {
                $this->admin_model->update($this->session->userdata('id'), $data);
            $this->session->set_flashdata('message', 'Ubah Password Sukses');
            redirect(site_url('user/dasbor'));
            } else{
                $this->session->set_flashdata('message', 'Password Lama Salah');
                $this->Password($this->session->userdata('id'));
            }
            
        }
    }

    public function delete($id) 
    {
        $row = $this->admin_model->get_by_id($id);
        $current_user = $this->session->userdata('id');
         
         if($current_user == $id){
            $this->session->set_flashdata('message','Failed, you could not delete yourself');
            redirect('user/admin');
        } else{
             if ($row) {
            $this->admin_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus User Sukses');
            redirect(site_url('user/admin'));
        } else {
            $this->session->set_flashdata('message', 'Tidak ada user yang dimaksud');
            redirect(site_url('user/admin'));
        }

        }
        
      
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', ' ', 'trim|required');
	$this->form_validation->set_rules('password', ' ', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', ' ', 'trim|required');
	$this->form_validation->set_rules('level', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal_expired', ' ', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "username");
	xlsWriteLabel($tablehead, $kolomhead++, "password");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "level");
	xlsWriteLabel($tablehead, $kolomhead++, "tanggal_expired");

	foreach ($this->admin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteNumber($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_expired);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->admin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('users_html',$data);
    }

};

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */