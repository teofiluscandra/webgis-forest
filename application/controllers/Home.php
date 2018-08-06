<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('petak_model');
        $this->load->model('pohon_model');
        $this->load->model('detail_penanaman_model');
        $this->load->model('penanaman_model_baru');
    }
    public function index()
	{
        $base = base_url();
        $data = array(
            'koordinat'=>$this->detail_penanaman_model->get_koordinat(),
            'buah' => $this->pohon_model->jumlahbuah(),
            'kayu' => $this->pohon_model->jumlahkayu(),
            'bambu' => $this->pohon_model->jumlahbambu(),
            'komunitas' => $this->penanaman_model_baru->jumlahkomunitas(),
            'isi' => 'home/home', 
            'pohon' => $this->pohon_model->getPohon(),
            'base' => $base,
            'legend' => $this->pohon_model->get_all(),
            'petaka' => $this->petak_model->get_id(1),
            'petakaa' => $this->petak_model->get_by_id(1),
            'petakb' => $this->petak_model->get_id(2),
            'petakbb' => $this->petak_model->get_by_id(2),
            'petakc' => $this->petak_model->get_id(3),
            'petakcc' => $this->petak_model->get_by_id(3),
            'petakd' => $this->petak_model->get_id(4),
            'petakdd' => $this->petak_model->get_by_id(5),
            'petake' => $this->petak_model->get_id(5),
            'petakee' => $this->petak_model->get_by_id(5),
            'petakf' => $this->petak_model->get_id(6),
            'petakff' => $this->petak_model->get_by_id(6),
            );

        $this->load->view('layout/wrapper', $data);   
            }
        }
