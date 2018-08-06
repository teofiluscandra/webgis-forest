<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petak_model extends CI_Model
{

    public $table = 'petak';
    public $id = 'id_petak';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_petak(){
        $this->db->select('lokasi_petak');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_id($id){
        $this->db->select('*');
        $this->db->from('petak');
        $this->db->join('penanaman', 'penanaman.id_petak = petak.id_petak');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->where('petak.id_petak',$id);
        $this->db->where('penanaman.status',2);
        $query = $this->db->get();
        return $query->result();
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
        $this->db->like('id_petak', $keyword);
	$this->db->or_like('nama_petak', $keyword);
	$this->db->or_like('luas_petak', $keyword);
	$this->db->or_like('lokasi_petak', $keyword);
	$this->db->or_like('deskripsi', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_petak', $keyword);
	$this->db->or_like('nama_petak', $keyword);
	$this->db->or_like('luas_petak', $keyword);
	$this->db->or_like('lokasi_petak', $keyword);
	$this->db->or_like('deskripsi', $keyword);
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
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Petak_model.php */
/* Location: ./application/models/Petak_model.php */