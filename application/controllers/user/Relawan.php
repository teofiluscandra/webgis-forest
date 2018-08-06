<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Relawan extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->model('relawan_model');

        $this->load->model('penanaman_model_baru');

        $this->load->library('form_validation');

    }



    public function index()

    {

        $relawan = $this->relawan_model->get_all();



        $data = array(

            'title' => 'Manajemen Relawan - Laskar Hijau',

            'relawan_data' => $relawan,

            'isi' => 'user/relawan/users_list'

        );



        $this->load->view('user/layout/wrapper', $data);

    }



    public function isUsernameExist($username) {

    $is_exist = $this->relawan_model->isUsernameExist($username);

    if ($is_exist) {

        $this->form_validation->set_message(

            'isUsernameExist', 'Username is already exist.'

        );    

        return false;

    } else {

        return true;

    }

}



public function isKtpExist($nomor_ktp) {

    $is_exist = $this->relawan_model->isKtpExist($nomor_ktp);

    if ($is_exist) {

        $this->form_validation->set_message(

            'isKtpExist', 'Nomor KTP is already exist.'

        );    

        return false;

    } else {

        return true;

    }

}

    public function read($id) 

    {

        $row = $this->relawan_model->get_by_id($id);

        if ($row) {

            $data = array(

        'id_user' => $row->id_user,

        'username' => $row->username,

        'password' => $row->password,

        'nama_lengkap' => $row->nama_lengkap,

        'level' => $row->level,

        'tanggal_expired' => $row->tanggal_expired,

         'nomor_ktp' => $row->nomor_ktp,

        'nomor_telp' => $row->nomor_telp,

        'email' => $row->email,

        'isAlready' => $row->isAlready,

         'title' => 'Profil relawan - Laskar Hijau',

        'isi' => 'user/relawan/users_read'

        );

            $this->load->view('user/layout/wrapper', $data);

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('relawan'));

        }

    }



    public function profil($id) 

    {

        $row = $this->relawan_model->get_by_id($id);

        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));

        if ($row) {

            $data = array(

        'penanaman' => $penanaman,

        'id_user' => $row->id_user,

        'username' => $row->username,

        'password' => $row->password,

        'nama_lengkap' => $row->nama_lengkap,

        'level' => $row->level,

        'tanggal_expired' => $row->tanggal_expired,

         'nomor_ktp' => $row->nomor_ktp,

        'nomor_telp' => $row->nomor_telp,

        'email' => $row->email,

        'isAlready' => $row->isAlready,

         'title' => 'Profil Relawan - Laskar Hijau',

        'isi' => 'user/dasbor/profil'

        );

            $this->load->view('user/layout_relawan/wrapper', $data);

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('relawan'));

        }

    }    

    

    public function create() 

    {

        $data = array(

        'button' => 'Tambah relawan',

        'action' => site_url('user/relawan/create_action'),

        'id_user' => set_value('id_user'),

        'username' => set_value('username'),

        'password' => set_value('password'),

        'nama_lengkap' => set_value('nama_lengkap'),

        'level' => set_value('level'),

        'tanggal_expired' => set_value('tanggal_expired'),

        'nomor_ktp' => set_value('nomor_ktp'),

        'nomor_telp' => set_value('nomor_telp'),

        'email' => set_value('email'),

        'title' => 'Manajemen relawan - Laskar Hijau',

        'isi' => 'user/relawan/users_form'

    );

        $this->load->view('user/layout/wrapper', $data);

    }

    

    public function create_action() 

    {

        $this->_rules();



        $this->form_validation->set_rules(

    'nomor_ktp', 'text', 'trim|callback_isKtpExist'

        );

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

        'nomor_ktp' => $this->input->post('nomor_ktp',TRUE),

        'nomor_telp' => $this->input->post('nomor_telp',TRUE),

        'email' => $this->input->post('email',TRUE),

        );



            $this->relawan_model->insert($data);

            $this->session->set_flashdata('message', 'Tambah Relawan Berhasil');

            redirect(site_url('user/relawan'));

        }

    }



    public function bantuan()

    {

        

        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));

        $data = array(

            'penanaman' => $penanaman,

            'user' => $this->session->userdata('id'),

            'isi' => 'user/dasbor/bantuan_koor',

            'title' => 'Bantuan'

        );



        $this->load->view('user/layout_relawan/wrapper', $data);

    }



     public function Password($id) 

    {

        $row = $this->relawan_model->get_by_id($id);

        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));

        if ($this->session->userdata('id') != $row->id_user) {

            redirect(site_url('user/dasbor_relawan'));

        }



        if ($row) {

            $data = array(

        'button' => 'Ubah Password',

        'penanaman' => $penanaman,

        'action' => site_url('user/relawan/password_action'),

        'password' => set_value('password', $row->password),

        'title' => 'Password '.$row->nama_lengkap,

        'isi' => 'user/relawan/ubah_password'

        );

            $this->load->view('user/layout_relawan/wrapper', $data);

        } else {

            $this->session->set_flashdata('message', 'Tidak ada user tersebut');

            redirect(site_url('user/dasbor_relawan'));

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





            $row = $this->relawan_model->get_by_id($this->session->userdata('id'));

            $passwordlama = $row->password;



            if ($pass['password_lama'] == $passwordlama) {

                $this->relawan_model->update($this->session->userdata('id'), $data);

            $this->session->set_flashdata('message', 'Ubah Password Sukses');

            redirect(site_url('user/dasbor_relawan'));

            } else{

                $this->session->set_flashdata('message', 'Password Lama Salah');

                $this->Password($this->session->userdata('id'));

            }

            

        }

    }

    

    public function update($id) 

    {

        $row = $this->relawan_model->get_by_id($id);



        if ($row) {

            $data = array(

        'button' => 'Update',

        'action' => site_url('user/relawan/update_action'),

        'id_user' => set_value('id_user', $row->id_user),

        'username' => set_value('username', $row->username),

        'password' => set_value('password', $row->password),

        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),

        'level' => set_value('level', $row->level),

        'tanggal_expired' => set_value('tanggal_expired', $row->tanggal_expired),

        'nomor_ktp' => set_value('nomor_ktp', $row->nomor_ktp),

        'nomor_telp' => set_value('nomor_telp', $row->nomor_telp),

        'email' => set_value('email', $row->email),

        'isi' => 'user/relawan/users_update',

        'title' => 'Update Relawan'

        );

            $this->load->view('user/layout/wrapper', $data);

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('user/relawan'));

        }

    }

    

    public function update_action() 

    {

        $this->form_validation->set_rules('username', ' ', 'trim|required');

    $this->form_validation->set_rules('nama_lengkap', ' ', 'trim|required');

    $this->form_validation->set_rules('level', ' ', 'trim|required|numeric');

    $this->form_validation->set_rules('tanggal_expired', ' ', 'trim|required');



    $this->form_validation->set_rules('id_user', 'id_user', 'trim');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');



        if ($this->form_validation->run() == FALSE) {

            $this->update($this->input->post('id_user', TRUE));

        } else {

            $data = array(

        'username' => $this->input->post('username',TRUE),

        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),

        'level' => $this->input->post('level',TRUE),

        'tanggal_expired' => $this->input->post('tanggal_expired',TRUE),

        'nomor_ktp' => $this->input->post('nomor_ktp',TRUE),

        'nomor_telp' => $this->input->post('nomor_telp',TRUE),

        'email' => $this->input->post('email',TRUE),

        );



            $this->relawan_model->update($this->input->post('id_user', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Berhasil');

            redirect(site_url('user/relawan'));

        }

    }



     public function update_relawan($id) 

    {

        $row = $this->relawan_model->get_by_id($id);

         $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));

 

        if ($this->session->userdata('id') != $row->id_user) {

            redirect(site_url('user/dasbor_relawan'));

        }

        if ($row) {

            $data = array(

        'button' => 'Update',

        'action' => site_url('user/relawan/update_action_relawan'),

        'id_user' => set_value('id_user', $row->id_user),

        'penanaman' => $penanaman,

        'username' => set_value('username', $row->username),

        'password' => set_value('password', $row->password),

        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),

        'level' => set_value('level', $row->level),

        'tanggal_expired' => set_value('tanggal_expired', $row->tanggal_expired),

        'nomor_ktp' => set_value('nomor_ktp', $row->nomor_ktp),

        'nomor_telp' => set_value('nomor_telp', $row->nomor_telp),

        'email' => set_value('email', $row->email),

        'isi' => 'user/relawan/users_update',

        'title' => 'Update Relawan'

        );

            $this->load->view('user/layout_relawan/wrapper', $data);

        } else {

            $this->session->set_flashdata('message', 'Record Not Found');

            redirect(site_url('user/dasbor_relawan'));

        }

    }

    

    public function update_action_relawan() 

    {

        $this->form_validation->set_rules('username', ' ', 'trim|required');

    $this->form_validation->set_rules('nama_lengkap', ' ', 'trim|required');

    $this->form_validation->set_rules('level', ' ', 'trim|required|numeric');

    $this->form_validation->set_rules('tanggal_expired', ' ', 'trim|required');

    $this->form_validation->set_rules('nomor_ktp', ' ', 'trim|required');

    $this->form_validation->set_rules('nomor_telp', ' ', 'trim|required');



    $this->form_validation->set_rules('id_user', 'id_user', 'trim');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');



        if ($this->form_validation->run() == FALSE) {

            $this->update($this->input->post('id_user', TRUE));

        } else {

            $data = array(

        'username' => $this->input->post('username',TRUE),

        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),

        'level' => $this->input->post('level',TRUE),

        'tanggal_expired' => $this->input->post('tanggal_expired',TRUE),

        'nomor_ktp' => $this->input->post('nomor_ktp',TRUE),

        'nomor_telp' => $this->input->post('nomor_telp',TRUE),

        'email' => $this->input->post('email',TRUE),

        );



            $this->relawan_model->update($this->input->post('id_user', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Berhasil');

            redirect(site_url('user/dasbor_relawan'));

        }

    }



     public function UbahPassword($id) 

    {

        $row = $this->relawan_model->get_by_id($id);



        if ($row) {

            $data = array(

            'button' => 'Change Password',

        'action' => site_url('user/relawan/ubah_action'),

        'id_user' => set_value('id_user', $row->id_user),

        'username' => set_value('username', $row->username),

        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),

        'level' => set_value('level', $row->level),

        'password' => set_value('password', $row->password),

        'title' => 'Update '.$row->nama_lengkap,

        'isi' => 'user/relawan/users_password'

        );

            $this->load->view('user/layout/wrapper', $data);

        } else {

            $this->session->set_flashdata('message', 'Tidak ada user tersebut');

            redirect(site_url('user/relawan'));

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



            $this->relawan_model->update($this->input->post('id_user', TRUE), $data);

            $this->session->set_flashdata('message', 'Ubah Password Sukses');

            redirect(site_url('user/relawan'));

        }

    } 

    

    public function delete($id) 

    {

        $row = $this->relawan_model->get_by_id($id);



        if ($row) {

            $this->relawan_model->delete($id);

            redirect(site_url('user/relawan'));

        } else {

            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');

            redirect(site_url('user/relawan'));

        }

    }



    public function _rules() 

    {

    $this->form_validation->set_rules('username', ' ', 'trim|required');

    $this->form_validation->set_rules('password', ' ', 'trim|required|min_length[5]|max_length[12]');

    $this->form_validation->set_rules('nama_lengkap', ' ', 'trim|required');

    $this->form_validation->set_rules('level', ' ', 'trim|required|numeric');

    $this->form_validation->set_rules('tanggal_expired', ' ', 'trim|required');



    $this->form_validation->set_rules('id_user', 'id_user', 'trim');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }



    public function excel()

    {

        $this->load->helper('exportexcel');

        $namaFile = "Daftar_Koordinator.xls";

        $judul = "Daftar Koordinator";

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

    xlsWriteLabel($tablehead, $kolomhead++, "Username");

    xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");

    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Expired");

    xlsWriteLabel($tablehead, $kolomhead++, "Nomor KTP");

    xlsWriteLabel($tablehead, $kolomhead++, "Nomor Telp");

    xlsWriteLabel($tablehead, $kolomhead++, "Email");



    foreach ($this->relawan_model->get_all() as $data) {

            $kolombody = 0;



            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric

            xlsWriteNumber($tablebody, $kolombody++, $nourut);

        xlsWriteLabel($tablebody, $kolombody++, $data->username);

        xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);

        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_expired);

        xlsWriteLabel($tablebody, $kolombody++, $data->nomor_ktp);

        xlsWriteLabel($tablebody, $kolombody++, $data->nomor_telp);

        xlsWriteLabel($tablebody, $kolombody++, $data->email);



        $tablebody++;

            $nourut++;

        }



        xlsEOF();

        exit();

    }



    public function word()

    {

        header("Content-type: application/vnd.ms-word");

        header("Content-Disposition: attachment;Filename=DaftarKoordinator.doc");



        $data = array(

            'relawan_data' => $this->relawan_model->get_all(),

            'start' => 0

        );

        

        $this->load->view('user/relawan/users_html',$data);

    }



};



/* End of file relawan.php */

/* Location: ./application/controllers/relawan.php */