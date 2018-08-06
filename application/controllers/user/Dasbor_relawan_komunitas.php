<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dasbor_relawan_komunitas extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('relawan_model');
         $this->load->model('penanaman_model_baru');
        $this->load->library('form_validation');
    }

	public function index() {
		$penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id_koordinator'));
		$user = $this->penanaman_model_baru->get_by_id($penanaman->id_penanaman);
	

		$data=array('title'=>'Halaman Relawan',
			'penanaman' => $penanaman,
			'tanam' => $user,
			'user' => $this->session->userdata('id_koordinator'),
					'isi'  =>'user/dasbor/dasbor_relawan',
					'title' => 'Penanaman Relawan'
						);

  		$this->load->view('user/layout_relawan_komunitas/wrapper',$data);	
	}

	public function download_apk(){
		$name = 'laskarhijau.apk';
		$data = file_get_contents(base_url()."assets/apk/laskarhijau.apk");
		force_download($name,$data);
	}


}