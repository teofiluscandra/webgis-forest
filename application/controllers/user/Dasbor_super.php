<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dasbor_super extends CI_Controller {
	public function index() {
		$data=array('title'=>'Halaman Super Administrator',
					'isi'  =>'user/dasbor/dasbor_view'
						);
		$this->load->view('user/layout_superadmin/wrapper',$data);	
	}
}