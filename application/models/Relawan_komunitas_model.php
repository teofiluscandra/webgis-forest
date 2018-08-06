<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relawan_komunitas_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('level',3);    
        $this->db->where('id_koordinator',$this->session->userdata('id'));    
        return $this->db->get($this->table)->result();
    }

     function get_all_penanaman($id)
    {
        $this->db->select('*');
        $this->db->from('detail_penanaman');
        $this->db->join('users', 'users.id_user = detail_penanaman.id_user');
        $this->db->where('id_penanaman',$id);
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
    function total_rows($q = NULL) {
        $this->db->like('id_user', $q);
	$this->db->or_like('id_koordinator', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
	$this->db->or_like('id_koordinator', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
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
    
            if ($this->db->query('SELECT id_user from detail_penanaman where id_user = '.$id)->result_array()) {
            $this->session->set_flashdata('message', 'Masih Ada Data Yang Terkait');
        } else{
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);    
            $this->session->set_flashdata('message', 'Hapus Sukses');
        }
        
    }

    function cek($id)
    {
    
        if ($this->db->query('SELECT username from users where username = '.$id)->result_array()) {
            return true;
        } else{
            return false;
        }
        
    }


}