<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_penanaman_model extends CI_Model
{

    public $table = 'detail_penanaman';
    public $id = 'id_detail';
    public $id_penanaman = 'id_penanaman';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('detail_penanaman');
        $this->db->join('penanaman', 'penanaman.id_penanaman = detail_penanaman.id_penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->join('petak', 'petak.id_petak = penanaman.id_petak');
        $this->db->where('status',2);
        $query = $this->db->get();
        return $query->result();
    }

   public function get_koordinat(){
        $this->db->select('id_detail,lat,lon,nama_gambar,nama_penanam,tgl_tanam,status,nama_pohon,jenis_pohon,status_pohon');
        $this->db->from('penanaman');
        $this->db->join('detail_penanaman', 'penanaman.id_penanaman = detail_penanaman.id_penanaman');
        $this->db->join('pohon', 'pohon.id_pohon = penanaman.id_pohon');
        $this->db->where('status_pohon',1);
        $this->db->where('status',2);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }



    // get data by id
    function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_detail',$id);
        $query = $this->db->get();
        return $query->row();
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
        $this->db->like('id_detail', $keyword);
	$this->db->or_like('id_penanaman', $keyword);
	$this->db->or_like('lat', $keyword);
	$this->db->or_like('lon', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_detail', $keyword);
	$this->db->or_like('id_penanaman', $keyword);
	$this->db->or_like('lat', $keyword);
	$this->db->or_like('lon', $keyword);
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

    function deleteAll($id)
    {
        $this->db->where($this->id_penanaman, $id);
        $this->db->delete($this->table);
    }

 function nonaktif($id)
    {
        $this->db->where($this->id, $id);
        $data = array('status_pohon' => 0);
        $this->db->update($this->table, $data);
    }    

}

/* End of file Detail_penanaman_model.php */
/* Location: ./application/models/Detail_penanaman_model.php */