<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function index() {
		$data=array(
					'title'=>'Halaman Administrator',
					'isi'  =>'user/dasbor/dasbor_view'
						);
		$this->load->view('user/layout/wrapper',$data);	
	}
}