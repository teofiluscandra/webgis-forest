<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

/* Copyright Teofilus Candra

For Laskar Hijau Website */
class Login_android {
 // SET SUPER GLOBAL
 var $CI = NULL;
 public function __construct() {
 $this->CI =& get_instance();
 }
 // Fungsi login
 public function login($username, $password) {
 $query = $this->CI->db->get_where('users',array('username'=>$username,'password' => $password));
 if($query->num_rows() == 1) {
 $row = $this->CI->db->query('SELECT id_user,nama_lengkap,level,id_koordinator,tanggal_expired,isAlready FROM users where username = "'.$username.'"');
 $admin = $row->row();
 $id = $admin->id_user;
 $nama = $admin->nama_lengkap;
 $level = $admin->level;
 $id_koordinator = $admin->id_koordinator;
 $tanggal_expired = $admin->tanggal_expired;
 $isAlready = $admin->isAlready;
 $this->CI->session->set_userdata('username', $username);
 $this->CI->session->set_userdata('id_login', uniqid(rand()));
 $this->CI->session->set_userdata('id', $id);
 $this->CI->session->set_userdata('nama', $nama);
 $this->CI->session->set_userdata('level', $level);
 $this->CI->session->set_userdata('id_koordinator', $id_koordinator);
 $this->CI->session->set_userdata('tanggal_expired', $tanggal_expired);
 $this->CI->session->set_userdata('isAlready', $isAlready);


 if ($this->CI->session->userdata('level') == 1) {
 	$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
 	redirect(base_url('android'));
 } elseif ($this->CI->session->userdata('level') == 0) {
 	$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
 	redirect(base_url('android'));
 } elseif ($this->CI->session->userdata('level') == 3) {
 	redirect(base_url('android/home'));	
 }
 elseif($this->CI->session->userdata('level') == 2){
 	if ($this->CI->session->userdata('isAlready') == 0) {
 		$this->CI->session->set_flashdata('sukses','Belum didaftarkan sebagai koordinator');
 		redirect(base_url('android'));
 	} elseif ($this->CI->session->userdata('tanggal_expired') < date("Y-m-d")) {
 		$this->CI->session->set_flashdata('sukses','User sudah expired');
 		redirect(base_url('android'));
 	} else{
 		redirect(base_url('android/home'));	
 	}
 	
 }
 
 }else{
 $this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
 redirect(base_url('android'));
 }
 return false;
 }

 public function cek_login_relawan() {
 if($this->CI->session->userdata('username') == '') {
 $this->CI->session->set_flashdata('sukses','Anda belum login');
 redirect(base_url('android'));
 } 

 if ($this->CI->session->userdata('level') == 0 || $this->CI->session->userdata('level') == 1) {
 	$this->CI->session->set_flashdata('sukses','Anda bukan relawan');
 	redirect(base_url('android'));
 }
 }

 public function cek_login_relawan_komunitas() {
 if($this->CI->session->userdata('username') == '') {
 $this->CI->session->set_flashdata('sukses','Anda belum login');
 redirect(base_url('login'));
 } 

 if ($this->CI->session->userdata('level') != 3) {
 	$this->CI->session->set_flashdata('sukses','Anda bukan relawan');
 	redirect(base_url('login'));
 }
}


 // Fungsi logout
 public function logout() {
 $this->CI->session->unset_userdata('username');
 $this->CI->session->unset_userdata('id_login');
 $this->CI->session->unset_userdata('id');
 $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
 redirect(base_url('android'));
 }
}