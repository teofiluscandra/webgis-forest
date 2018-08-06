<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pohon_model extends CI_Model
{

    public $table = 'pohon';
    public $id = 'id_pohon';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

     function isPohonExist($nama_pohon) {
    $this->db->select($this->id);
    $this->db->where('nama_pohon', $nama_pohon);
    $query = $this->db->get($this->table);

    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
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

    public function jumlahkayu(){
        $data = array();
        $this->db->select('*');
        $this->db->from('detail_penanaman');
        $this->db->join('penanaman', 'penanaman.id_penanaman = detail_penanaman.id_penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->where('jenis_pohon',"Kayu-kayuan");
        $this->db->where('status_pohon',1);
        $this->db->where('status',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function jumlahbambu(){
        $data = array();
         $this->db->select('*');
        $this->db->from('detail_penanaman');
        $this->db->join('penanaman', 'penanaman.id_penanaman = detail_penanaman.id_penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->where('jenis_pohon',"Bambu");
        $this->db->where('status_pohon',1);
        $this->db->where('status',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    public function jumlahbuah(){
        $data = array();
         $this->db->select('*');
        $this->db->from('detail_penanaman');
        $this->db->join('penanaman', 'penanaman.id_penanaman = detail_penanaman.id_penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->where('jenis_pohon',"Buah-buahan");
        $this->db->where('status_pohon',1);
        $this->db->where('status',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }
    
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
        $this->db->like('id_pohon', $keyword);
	$this->db->or_like('nama_pohon', $keyword);
	$this->db->or_like('jenis_pohon', $keyword);
	$this->db->or_like('nama_gambar', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pohon', $keyword);
	$this->db->or_like('nama_pohon', $keyword);
	$this->db->or_like('jenis_pohon', $keyword);
	$this->db->or_like('nama_gambar', $keyword);
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
        if ($this->db->query('SELECT id_pohon from penanaman where id_pohon = '.$id)->result_array()) {
            $this->session->set_flashdata('message', 'Tidak bisa dihapus');
        } else{
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);    
            $this->session->set_flashdata('message', 'Hapus Sukses');
        }
        }
    

    public function find($id)
    {
        $row = $this->db->where($this->id,$id)->limit(1)->get($this->table);
        return $row;
    }


}

/* End of file Pohon_model.php */
/* Location: ./application/models/Pohon_model.php */