<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_android extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Android_model');
    }

    public function index()
    {
        echo 'success';
    }

    public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $result = $this->Android_model->LoginApi($username, $password);
        echo json_encode($result);
    }

    public function LocationApi()
    {
         $id_penanaman=$this->input->post('id_penanaman');
        $i=0;
        $lat = $this->input->post('latitude');
        $loop = $this->input->post('i');
        $long = $this->input->post('longitude');
        $status_pohon = $this->input->post('status_pohon');
        $id_user = $this->session->userdata('id');
        for($i;$i<$loop;$i++){
            $latitude = $lat[$i];
            $longitude = $long[$i];
    
            $data=array(
             'id_penanaman'=>$id_penanaman,
             'lat'=>$latitude,
             'lon'=>$longitude,
             'status_pohon' => $status_pohon,
             'id_user'=>$id_user
            );
        $result = $this->Android_model->save_relawan($id_penanaman,$id, $status_pohon, $latitude[], $longitude[]);
        echo json_encode($result);
    }    

}