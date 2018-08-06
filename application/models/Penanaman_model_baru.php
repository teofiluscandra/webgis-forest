<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penanaman_model_baru extends CI_Model
{

    public $table = 'penanaman';
    public $id = 'id_penanaman';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    function getpohon() {
        $data = array();
        $query = $this->db->get('pohon');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    function getpetak() {
        $data = array();
        $query = $this->db->get('petak');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                    }
        }
        $query->free_result();
        return $data;
    }

    public function jumlahkomunitas(){
        $data = array();
        $query = $this->db->get('penanaman');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    function getuser() {
        $data = array();

        $query = $this->db->get_where('users',array('level'=>2,'isAlready'=>0));

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    function statusInput(){
        $data = array('status' => 1);
        $this->db->insert($this->table, $data); 
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->join('users', 'users.id_user = penanaman.id_user');
        $this->db->join('petak', 'petak.id_petak = penanaman.id_petak');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = penanaman.nama_penanam');
         $this->db->order_by($this->id, $this->order);
        $query = $this->db->get();
        return $query->result();
    }

    function get_confirm()
    {
        $this->db->select('*');
        $this->db->from('penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->join('users', 'users.id_user = penanaman.id_user');
        $this->db->join('petak', 'petak.id_petak = penanaman.id_petak');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = penanaman.nama_penanam');
        $this->db->where('penanaman.status','1');
        $query = $this->db->get();
        return $query->result();
    }    

      function get_update()
    {
        $this->db->select('*');
        $this->db->from('penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->join('users', 'users.id_user = penanaman.id_user');
        $this->db->join('petak', 'petak.id_petak = penanaman.id_petak');
        $this->db->where('penanaman.status','2');
        $query = $this->db->get();
        return $query->result();
    }   

    function get_id_penanaman($id){
        $this->db->where('id_user', $id);
        return $this->db->get($this->table)->row();
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->join('users', 'users.id_user = penanaman.id_user');
        $this->db->join('petak', 'petak.id_petak = penanaman.id_petak');
        $this->db->join('pendaftaran', 'pendaftaran.id_pendaftaran = penanaman.nama_penanam');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function save_relawan($data){
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

            $this->db->trans_start();
            $this->db->insert('detail_penanaman',$data);
            $this->db->trans_complete();
       }
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_penanaman', $keyword);
	$this->db->or_like('nama_penanam', $keyword);
	$this->db->or_like('tgl_tanam', $keyword);
	$this->db->or_like('id_user', $keyword);
	$this->db->or_like('id_pohon', $keyword);
	$this->db->or_like('id_petak', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('jumlah', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_penanaman', $keyword);
	$this->db->or_like('nama_penanam', $keyword);
	$this->db->or_like('tgl_tanam', $keyword);
	$this->db->or_like('id_user', $keyword);
	$this->db->or_like('id_pohon', $keyword);
	$this->db->or_like('id_petak', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('jumlah', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
       if ($this->db->simple_query('SELECT id_penanaman from detail_penanaman where id_penanaman = '.$id)) {
            $this->session->set_flashdata('message', 'Tidak bisa dihapus');
        } else{
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);    
            $this->session->set_flashdata('message', 'Hapus Sukses');
        }
        }
    

}

/* End of file Penanaman_model_baru.php */
/* Location: ./application/models/Penanaman_model_baru.php */