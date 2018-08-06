<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relawan_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

      function isUsernameExist($username) {
    $this->db->select($this->id);
    $this->db->where('username', $username);
    $this->db->where('level', 2);
    $query = $this->db->get($this->table);

    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
}

function isKtpExist($nomor_ktp) {
    $this->db->select($this->id);
    $this->db->where('nomor_ktp', $nomor_ktp);
    $this->db->where('level', 2);
    $query = $this->db->get($this->table);

    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
}

    // get all
    function get_all()
    {
        $this->db->where('level', '2');
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
        $this->db->like('id_user', $keyword);
    $this->db->or_like('username', $keyword);
    $this->db->or_like('password', $keyword);
    $this->db->or_like('nama_lengkap', $keyword);
    $this->db->or_like('level', $keyword);
    $this->db->or_like('tanggal_expired', $keyword);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $keyword);
    $this->db->or_like('username', $keyword);
    $this->db->or_like('password', $keyword);
    $this->db->or_like('nama_lengkap', $keyword);
    $this->db->or_like('level', $keyword);
    $this->db->or_like('tanggal_expired', $keyword);
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

    function updateAlready($id){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, "isAlready = 1");
    }

     public function jumlahrelawan($id){
        $data = array();
         $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_koordinator',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }

    // delete data
    function delete($id)
    {
        if ($this->db->query('SELECT id_user from penanaman where id_user = '.$id)->result_array()) {
            $this->session->set_flashdata('message', 'Tidak Bisa Dihapus');
        } else{
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);    
            $this->session->set_flashdata('message', 'Hapus Koordinator Berhasil');
        }
    }

}

/* End of file relawan_model.php */
/* Location: ./application/models/relawan_model.php */