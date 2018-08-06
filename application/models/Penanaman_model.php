<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penanaman_model extends CI_Model
{

    public $table = 'penanaman';
    public $detail = 'detail_penanaman';
    public $users = 'users';
    public $id = 'id_penanaman';
    public $idp = 'id_pohon';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->join('users', 'users.id_user = penanaman.id_user');
        $this->db->join('petak', 'petak.id_petak = penanaman.id_petak');
        $query = $this->db->get();
        return $query->result();
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
    $this->db->like('id_penanaman', $keyword);
	$this->db->or_like('nama_penanam', $keyword);
	$this->db->or_like('tgl_tanam', $keyword);
	$this->db->or_like('id_pohon', $keyword);
	$this->db->or_like('id_user', $keyword);
	$this->db->or_like('id_petak', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('lokasi_penanaman', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id_penanaman', $keyword);
	$this->db->or_like('nama_penanam', $keyword);
	$this->db->or_like('tgl_tanam', $keyword);
	$this->db->or_like('id_pohon', $keyword);
	$this->db->or_like('id_user', $keyword);
	$this->db->or_like('id_petak', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('lokasi_penanaman', $keyword);
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
}

/* End of file Penanaman_model.php */
/* Location: ./application/models/Penanaman_model.php */