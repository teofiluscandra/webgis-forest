<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pohon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pohon_model');
        $this->load->library('form_validation');
        $this->load->library(array('upload','image_lib'));
    }

    public function index()
    {
        $pohon = $this->pohon_model->get_all();

        $data = array(
            'pohon_data' => $pohon,
            'title' => 'Managemen Pohon',
            'isi' => 'pohon/pohon_list'
        );

        $this->load->view('user/layout/wrapper', $data);
    }

    public function read($id) 
    {
        $row = $this->pohon_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pohon' => $row->id_pohon,
		'nama_pohon' => $row->nama_pohon,
		'jenis_pohon' => $row->jenis_pohon,
		'nama_gambar' => $row->nama_gambar,
        'isi' => 'pohon/pohon_read',
        'title' => 'Profil Pohon'
	    );
            $this->load->view('user/layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pohon'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pohon/create_action'),
	    'id_pohon' => set_value('id_pohon'),
	    'nama_pohon' => set_value('nama_pohon'),
	    'jenis_pohon' => set_value('jenis_pohon'),
	    'nama_gambar' => set_value('nama_gambar'),
	);
        $this->load->view('pohon_form', $data);
    }
    
    public function add(){
        $rules =    [
                        [
                                'field' => 'nama_pohon',
                                'label' => 'nama_pohon',
                                'rules' => 'required'
                        ],
                        [
                                'field' => 'jenis_pohon',
                                'label' => 'jenis_pohon',
                                'rules' => 'required'
                        ]
                    ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_rules(
    'nama_pohon', 'text', 'trim|required|callback_isPohonExist'
);

        if ($this->form_validation->run() == FALSE)
        {
            $data = array('isi' => 'pohon/tambah_pohon','title'=> 'Tambah Pohon');
            $this->load->view('user/layout/wrapper',$data);
        }
        else
        {
            /* Start Uploading File */
            $config =   [
                            'upload_path'   => './assets/marker/',
                            'allowed_types' => 'gif|jpg|png|ico|svg',
                            'max_size'      => 1000,
                            'max_width'     => 1024,
                            'max_height'    => 768
                        ];

           $this->upload->initialize($config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors(),
                        'isi' => 'pohon/tambah_pohon',
                        'title'=> 'Tambah Pohon'
                        );

                    $this->load->view('user/layout/wrapper', $error);
            }
            else
            {
                    $file = $this->upload->data();
                    //print_r($file);

                    $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './assets/marker/'. $file['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '20%',
                    'width' => 20,
                    'height' => 20
                    ));

                    if($this->image_lib->resize())
                {
                        $data = [
                                'nama_gambar'      => 'assets/marker/'.$file['raw_name'].'_thumb'.$file['file_ext'],
                                'nama_pohon'       => set_value('nama_pohon'),
                                'jenis_pohon'      => set_value('jenis_pohon')
                            ];
                    $this->pohon_model->insert($data);

                    $this->session->set_flashdata('message','Pohon Baru Telah Ditambahkan');
                    redirect('pohon');             
                }
                else
                {
                    $this->session->set_flashdata('message',$this->image_lib->display_errors());
                    redirect('pohon');                
                }

                   
            }
        }
    }

public function isPohonExist($nama_pohon) {
    $is_exist = $this->pohon_model->isPohonExist($nama_pohon);
    if ($is_exist) {
        $this->form_validation->set_message(
            'isPohonExist', 'Nama Pohon ini sudah terpakai'
        );    
        return false;
    } else {
        return true;
    }
}

    public function edit($id){
        $rules =    [
                        [
                                'field' => 'nama_pohon',
                                'label' => 'Nama Pohon',
                                'rules' => 'required'
                        ],
                        [
                                'field' => 'jenis_pohon',
                                'label' => 'jenis_pohon',
                                'rules' => 'required'
                        ]
                    ];


        $this->form_validation->set_rules($rules);
        $this->form_validation->set_message('required','Data Tidak Boleh Ada Yang Kosong');
        $image = $this->pohon_model->find($id)->row();

        if ($this->form_validation->run() == FALSE)
        {
            $data = array('isi' => 'pohon/edit_pohon',
                 'title' => 'Update Pohon',
                'image'=>$image );
            $this->load->view('user/layout/wrapper',$data);
        }
        else
        {
            if(isset($_FILES["userfile"]["name"]))
            {
                /* Start Uploading File */
                $config =   [
                                'upload_path'   => './assets/marker/',
                                'allowed_types' => 'gif|jpg|png',
                                'max_size'      => 100,
                                'max_width'     => 1024,
                                'max_height'    => 768
                            ];

               $this->upload->initialize($config);

                if ( ! $this->upload->do_upload())
                {
                    $error = array('error' => $this->upload->display_errors(),
                        'isi' => 'pohon/edit_pohon',
                        'title' => 'Update Pohon',
                        'image'=>$image,

                        );
                    $this->load->view('user/layout/wrapper', $error);
                }
                else
                {
                        $file = $this->upload->data();

                    $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './assets/marker/'. $file['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '20%',
                    'width' => 20,
                    'height' => 20
                    ));

                    if($this->image_lib->resize())
                {
                        $data = [
                                'nama_gambar'      => 'assets/marker/'.$file['raw_name'].'_thumb'.$file['file_ext'],
                                'nama_pohon'       => set_value('nama_pohon'),
                                'jenis_pohon'      => set_value('jenis_pohon')
                            ];
                    $this->pohon_model->update($id,$data);

                    $this->session->set_flashdata('message','Update Pohon Berhasil');
                    redirect('pohon');             
                }
                else
                {
                    $this->session->set_flashdata('message',$this->image_lib->display_errors());
                    redirect('pohon');                
                }


                        $data['nama_gambar'] = 'assets/marker/' . $file['file_name'];
                        unlink($image->file);
                }
            }
        }
    }



    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pohon' => $this->input->post('nama_pohon',TRUE),
		'jenis_pohon' => $this->input->post('jenis_pohon',TRUE),
		'nama_gambar' => $this->input->post('nama_gambar',TRUE),
	    );

            $this->pohon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pohon'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->pohon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pohon/update_action'),
		'id_pohon' => set_value('id_pohon', $row->id_pohon),
		'nama_pohon' => set_value('nama_pohon', $row->nama_pohon),
		'jenis_pohon' => set_value('jenis_pohon', $row->jenis_pohon),
		'nama_gambar' => set_value('nama_gambar', $row->nama_gambar),
	    );
            $this->load->view('pohon_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pohon'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pohon', TRUE));
        } else {
            $data = array(
		'nama_pohon' => $this->input->post('nama_pohon',TRUE),
		'jenis_pohon' => $this->input->post('jenis_pohon',TRUE),
		'nama_gambar' => $this->input->post('nama_gambar',TRUE),
	    );

            $this->pohon_model->update($this->input->post('id_pohon', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pohon'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->pohon_model->get_by_id($id);

        if ($row) {
            $this->pohon_model->delete($id);
            redirect(site_url('pohon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pohon'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pohon', ' Nama Gambar Harus Diisi ', 'trim|required');
	$this->form_validation->set_rules('jenis_pohon', ' ', 'trim|required');
	$this->form_validation->set_rules('nama_gambar', ' ', 'trim|required');

	$this->form_validation->set_rules('id_pohon', 'id_pohon', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pohon.xls";
        $judul = "pohon";
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
	xlsWriteLabel($tablehead, $kolomhead++, "nama_pohon");
	xlsWriteLabel($tablehead, $kolomhead++, "jenis_pohon");
	

	foreach ($this->pohon_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pohon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_pohon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pohon.doc");

        $data = array(
            'pohon_data' => $this->pohon_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pohon/pohon_html',$data);
    }

};

/* End of file Pohon.php */
/* Location: ./application/controllers/Pohon.php */