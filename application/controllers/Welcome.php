<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library(array('upload','image_lib'));
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
                            'allowed_types' => 'gif|jpg|png',
                            'max_size'      => 100,
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
                    'source_image' => './assets/'. $file['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '20%',
                    'width' => 10,
                    'height' => 10
                    ));

                    if($this->image_lib->resize())
                {
                        $data = [
                                'nama_gambar'      => 'assets/' . $file['file_name'],
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
                    sredirect('pohon');                
                }

                   
            }
        }
	}
	
	public function index()
	{
		$data = array();
		$data['error'] = '';
		$data['output'] = '';
		
		if(isset($_FILES['userfile']))
		{
			$this->upload->initialize(array(
				'upload_path' => './assets/',
				'allowed_types' => 'png|jpg|gif',
				'max_size' => '5000',
				'max_width' => '3000',
				'max_height' => '3000'
			)); 
		
			if($this->upload->do_upload())
			{
				$data_upload = $this->upload->data();
				$this->image_lib->initialize(array(
					'image_library' => 'gd2',
					'source_image' => './assets/'. $data_upload['file_name'],
					'maintain_ratio' => false,
					'create_thumb' => true,
					'quality' => '20%',
					'width' => 240,
					'height' => 172
				));
				
				if($this->image_lib->resize())
				{
					$output = '<h4>Thumb - hasil Resize</h4>';
					$output .= img('./assets/'.$data_upload['raw_name'].'_thumb'.$data_upload['file_ext']);
					$output .= '<h4 style="margin-top: 30px">Gambar Original</h4>';
					$output .= img('./assets/'.$data_upload['file_name']);
					
					$data['output'] = $output;
				}
				else
				{
					$data['error'] = $this->image_lib->display_errors();
				}
				
			}
			else
			{
				$data['error'] = $this->upload->display_errors();
			}
		}
		
		$this->load->view('pohon/tambah_pohon', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */