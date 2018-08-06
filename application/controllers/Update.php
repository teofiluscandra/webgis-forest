<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Update extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penanaman_model_baru');
        $this->load->model('relawan_model');
        $this->load->model('detail_penanaman_model');
        $this->load->library('form_validation');
    }

     public function index(){
        $penanaman = $this->detail_penanaman_model->get_all();

        $data = array(
            'detail_penanaman_data' => $penanaman,
            'title' => 'Update Data Pohon',
            'isi' => 'update/detail_penanaman_list'
        );

        $this->load->view('user/layout/wrapper', $data);   
    }

    public function read($id) 
    {
        $row = $this->penanaman_model_baru->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penanaman' => $row->id_penanaman,
		'nama_penanam' => $row->nama_penanam,
		'tgl_tanam' => $row->tgl_tanam,
		'nama_lengkap' => $row->nama_lengkap,
		'nama_pohon' => $row->nama_pohon,
        'jenis_pohon' => $row->jenis_pohon,
		'nama_petak' => $row->nama_petak,
		'status' => $row->status,
		'jumlah' => $row->jumlah,
        'isi' => 'penanaman/penanaman_read',
            'title' => 'Penanaman'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penanaman_baru'));
        }
    }

    public function tambah_keterangan($id)
    {
        $data = $this->detail_penanaman_model->get_by_id($id);
        echo json_encode($data);
    }



    public function ajax_keterangan()
    {
        $data = array(
                'id_detail' => $this->input->post('id_detail'),
                'keterangan' => $this->input->post('keterangan')  
                );
        $this->detail_penanaman_model->update($data['id_detail'], $data);
        echo json_encode($data);

    }

    public function ajax_nonaktif($id)
    {
        $this->detail_penanaman_model->nonaktif($id);
        echo json_encode(array("status" => TRUE));
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penanaman.xls";
        $judul = "penanaman";
        $tablehead = 2;
        $tablebody = 3;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        xlsWriteLabel(0, 0, $judul);

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "no");
	xlsWriteLabel($tablehead, $kolomhead++, "nama_penanam");
	xlsWriteLabel($tablehead, $kolomhead++, "tgl_tanam");
	xlsWriteLabel($tablehead, $kolomhead++, "id_user");
	xlsWriteLabel($tablehead, $kolomhead++, "id_pohon");
	xlsWriteLabel($tablehead, $kolomhead++, "id_petak");
	xlsWriteLabel($tablehead, $kolomhead++, "status");
	xlsWriteLabel($tablehead, $kolomhead++, "jumlah");

	foreach ($this->penanaman_model_baru->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_penanam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_tanam);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pohon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_petak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Data_Semua_Pohon.doc");

        $data = array(
            'detail_penanaman_data' => $this->detail_penanaman_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('update/detail_penanaman_html',$data);
    }

};

/* End of file Penanaman_baru.php */
/* Location: ./application/controllers/Penanaman_baru.php */