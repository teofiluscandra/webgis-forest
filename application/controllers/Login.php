<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Copyright Teofilus Candra

For Laskar Hijau Website */
class Login extends CI_Controller{


public function index() {
    $valid = $this->form_validation;
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $valid->set_rules('username','Username','required');
    $valid->set_rules('password','Password','required');
    
    if($valid->run()) {
        $this->session->set_flashdata('message', 'Berhasil Login');
            $this->simple_login->login($username,$password);
          
    } else{
        $this->session->set_flashdata('message', 'Username / Password salah');
    }
    
    $data = array('title'=>'Login Administrator','isi'=>'login_view');
    $this->load->view('login_view',$data);
    }
    
    public function logout() {
    $this->simple_login->logout();
    }
    
    }