<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_penanaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('detail_penanaman_model');
        $this->load->model('penanaman_model_baru');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $detail_penanaman = $this->detail_penanaman_model->get_all();

        $data = array(
            'detail_penanaman_data' => $detail_penanaman
        );

        $this->load->view('detail_penanaman_list', $data);
    }

    public function read($id) 
    {
        $row = $this->detail_penanaman_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detail' => $row->id_detail,
		'id_penanaman' => $row->id_penanaman,
		'lat' => $row->lat,
		'lon' => $row->lon,
	    );
            $this->load->view('detail_penanaman_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_penanaman'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_penanaman/create_action'),
	    'id_detail' => set_value('id_detail'),
	    'id_penanaman' => set_value('id_penanaman'),
	    'lat' => set_value('lat'),
	    'lon' => set_value('lon'),
	);
        $this->load->view('detail_penanaman_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_penanaman' => $this->input->post('id_penanaman',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'lon' => $this->input->post('lon',TRUE),
	    );

            $this->detail_penanaman_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_penanaman'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->detail_penanaman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_penanaman/update_action'),
		'id_detail' => set_value('id_detail', $row->id_detail),
		'id_penanaman' => set_value('id_penanaman', $row->id_penanaman),
		'lat' => set_value('lat', $row->lat),
		'lon' => set_value('lon', $row->lon),
	    );
            $this->load->view('detail_penanaman_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_penanaman'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail', TRUE));
        } else {
            $data = array(
		'id_penanaman' => $this->input->post('id_penanaman',TRUE),
		'lat' => $this->input->post('lat',TRUE),
		'lon' => $this->input->post('lon',TRUE),
	    );

            $this->detail_penanaman_model->update($this->input->post('id_detail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_penanaman'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->detail_penanaman_model->get_by_id($id);
        $penanaman = $this->penanaman_model_baru->get_id_penanaman($this->session->userdata('id'));

        if ($row) {
            $this->detail_penanaman_model->delete($id);
            if ($penanaman->jumlahinput > 0) {
                $saatini = $penanaman->jumlahinput;
                $data = array('jumlahinput' => $saatini - 1);
                $this->penanaman_model_baru->update($penanaman->id_penanaman,$data);
            }
            
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('relawan_komunitas/konfirmasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('relawan_komunitas/konfirmasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_penanaman', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('lat', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('lon', ' ', 'trim|required|numeric');

	$this->form_validation->set_rules('id_detail', 'id_detail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_penanaman.xls";
        $judul = "detail_penanaman";
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
	xlsWriteLabel($tablehead, $kolomhead++, "id_penanaman");
	xlsWriteLabel($tablehead, $kolomhead++, "lat");
	xlsWriteLabel($tablehead, $kolomhead++, "lon");

	foreach ($this->detail_penanaman_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_penanaman);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detail_penanaman.doc");

        $data = array(
            'detail_penanaman_data' => $this->detail_penanaman_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('detail_penanaman_html',$data);
    }

};

/* End of file Detail_penanaman.php */
/* Location: ./application/controllers/Detail_penanaman.php */