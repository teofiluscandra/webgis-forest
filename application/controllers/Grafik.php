<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grafik_model');
    }

    function buah_2016(){
    if ($this->Grafik_model->get_buah_2016()->result_array()) {
      foreach($this->Grafik_model->get_buah_2016()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Buah';
   $data['isi'] = 'grafik/buah_2016';
    } 
  $this->load->view('user/layout/wrapper',$data);    
    } else {
      $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Buah'
        );

      $this->load->view('user/layout/wrapper',$data);    
    } 
 }

 function buah_2017(){
    if ($this->Grafik_model->get_buah_2017()->result_array()) {
      foreach($this->Grafik_model->get_buah_2017()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Buah';
   $data['isi'] = 'grafik/buah_2017';
    } 
  $this->load->view('user/layout/wrapper',$data);    
    } else {
      $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Buah'
        );

      $this->load->view('user/layout/wrapper',$data);    
    } 
 }

 function buah_2018(){
    if ($this->Grafik_model->get_buah_2018()->result_array()) {
      foreach($this->Grafik_model->get_buah_2018()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Buah';
   $data['isi'] = 'grafik/buah_2018';
    } 
  $this->load->view('user/layout/wrapper',$data);    
    } else {
      $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Buah'
        );

      $this->load->view('user/layout/wrapper',$data);    
    } 
 }

 function mati_2016(){

    if ($this->Grafik_model->get_mati_2016()->result_array()) {
        
        foreach($this->Grafik_model->get_mati_2016()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Kematian Pohon';
   $data['isi'] = 'grafik/mati_2016';
    }
    $this->load->view('user/layout/wrapper',$data);
  	} else {
      $data = array('isi' => 'grafik/null',
        'title' => 'Data Kematian Pohon'
        );

      $this->load->view('user/layout/wrapper',$data);    
    }
 }

 function mati_2017(){

    if ($this->Grafik_model->get_mati_2017()->result_array()) {
        
        foreach($this->Grafik_model->get_mati_2017()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Kematian Pohon';
   $data['isi'] = 'grafik/mati_2017';
    }
    $this->load->view('user/layout/wrapper',$data);
    } else {
      $data = array('isi' => 'grafik/null',
        'title' => 'Data Kematian Pohon'
        );

      $this->load->view('user/layout/wrapper',$data);    
    }
 }

 function mati_2018(){

    if ($this->Grafik_model->get_mati_2018()->result_array()) {
        
        foreach($this->Grafik_model->get_mati_2018()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Kematian Pohon';
   $data['isi'] = 'grafik/mati_2018';
    }
    $this->load->view('user/layout/wrapper',$data);
    } else {
      $data = array('isi' => 'grafik/null',
        'title' => 'Data Kematian Pohon'
        );

      $this->load->view('user/layout/wrapper',$data);    
    }
 }

  function bambu_2016(){
    if ($this->Grafik_model->get_bambu_2016()->result_array()) {
    foreach($this->Grafik_model->get_bambu_2016()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Bambu';
   $data['isi'] = 'grafik/bambu_2016';
    }
    
  $this->load->view('user/layout/wrapper',$data);  
    } else{
     $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Bambu'
        );

      $this->load->view('user/layout/wrapper',$data);     
    }
    
 }

function bambu_2017(){
    if ($this->Grafik_model->get_bambu_2017()->result_array()) {
    foreach($this->Grafik_model->get_bambu_2017()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Bambu';
   $data['isi'] = 'grafik/bambu_2017';
    }
    
  $this->load->view('user/layout/wrapper',$data);  
    } else{
     $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Bambu'
        );

      $this->load->view('user/layout/wrapper',$data);     
    }
    
 }

function bambu_2018(){
    if ($this->Grafik_model->get_bambu_2018()->result_array()) {
    foreach($this->Grafik_model->get_bambu_2018()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Bambu';
   $data['isi'] = 'grafik/bambu_2018';
    }
    
  $this->load->view('user/layout/wrapper',$data);  
    } else{
     $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Bambu'
        );

      $this->load->view('user/layout/wrapper',$data);     
    }
    
 }



function kayu_2016(){
    if ($this->Grafik_model->get_kayu_2016()->result_array()) {
    foreach($this->Grafik_model->get_kayu_2016()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Kayu';
   $data['isi'] = 'grafik/kayu_2016';
    }
    
  $this->load->view('user/layout/wrapper',$data);  
    } else{
     $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Kayu'
        );

      $this->load->view('user/layout/wrapper',$data);     
    }
    
 }

 function kayu_2017(){
    if ($this->Grafik_model->get_kayu_2017()->result_array()) {
    foreach($this->Grafik_model->get_kayu_2017()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Kayu';
   $data['isi'] = 'grafik/kayu_2017';
    }
    
  $this->load->view('user/layout/wrapper',$data);  
    } else{
     $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Kayu'
        );

      $this->load->view('user/layout/wrapper',$data);     
    }
    
 }

 function kayu_2018(){
    if ($this->Grafik_model->get_kayu_2018()->result_array()) {
    foreach($this->Grafik_model->get_kayu_2018()->result_array() as $row)
    {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
   $data['title'] = 'Grafik Pohon Kayu';
   $data['isi'] = 'grafik/kayu_2018';
    }
    
  $this->load->view('user/layout/wrapper',$data);  
    } else{
     $data = array('isi' => 'grafik/null',
        'title' => 'Data Pohon Kayu'
        );

      $this->load->view('user/layout/wrapper',$data);     
    }
    
 }

    }
