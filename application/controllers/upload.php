<?php
class Upload extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Login Gagal!! Username atau Password Salah !');
            redirect('');
        };
        $this->load->model('model_app');
    }

    function index(){
        $data=array(
            'title'=>'Promo',
            'active_promo'=>'active',
            'data_promo'=>$this->model_app->getAllData('tbl_promo'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_tab_master_promo');
        $this->load->view('element/v_footer');
    }
	function proses()
	{
	 $this->load->view('pages/v_tab_master_promo');
		$config['upload_path']		='./upload/';
		$config['allowed_types']	='jpg|png|docx|xlsx|pdf';		
		$config['max_size']			= 2048;
		$config['encrypt_name']		= TRUE;
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload('file'))
		{
			$error = $this->upload->display_errors();
			$this->load->view('pages/v_tab_master_promo', $error);
			
		}
		else
		{
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			$file_encode=base64_encode($imgdata);
			$data['id'] = $this->input->post('kd_promo');
			$data['nama_promo'] = $this->input->post('nama_name');
			$data['give_promo'] = $this->input->post('give');
			$data['pertanggal'] = $this->input->post('tanggal');
			$data['Target_value'] = $this->input->post('target');
			$data['file_promo'] = $this->input->post('file');
			$this->model_app->insertData('tbl_promo',$data);
			redirect('upload');
		}
	}
}