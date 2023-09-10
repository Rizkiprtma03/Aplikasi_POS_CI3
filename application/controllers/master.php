<?php
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }

    function index(){
     
        $data=array(
            'title'=>'Data Toko',
            'active_master'=>'active',
            'kd_barang'=>$this->model_app->getKodeBarang(),
            'kd_pelanggan'=>$this->model_app->getKodePelanggan(),
            'kd_pegawai'=>$this->model_app->getKodePegawai(),
            'kd_promo'=>$this->model_app->getKodePromo(),
            'data_barang'=>$this->model_app->getAllData('tbl_barang'),
            'data_pelanggan'=>$this->model_app->getAllData('tbl_pelanggan'),
            'data_contact'=>$this->model_app->getAllData('tbl_contact'),
            'data_pegawai'=>$this->model_app->getAllData('tbl_pegawai'),
			'data_promo'=>$this->model_app->getAllData('tbl_promo'),
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('pages/v_master');
        $this->load->view('element/v_footer');
    }

//
//    ===================== INSERT =====================
    function tambah_barang(){
        $data=array(
            'kd_barang'=>$this->input->post('kd_barang'),
            'nm_barang'=>$this->input->post('nm_barang'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_app->insertData('tbl_barang',$data);
        redirect("master");
    }
    function tambah_pelanggan(){
        $data=array(
            'kd_pelanggan'=> $this->input->post('kd_pelanggan'),
            'nm_pelanggan'=>$this->input->post('nm_pelanggan'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
        );
        $this->model_app->insertData('tbl_pelanggan',$data);
        redirect("master");
    }
    function tambah_pegawai(){
        $data=array(
            'kd_pegawai'=> $this->input->post('kd_pegawai'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_app->insertData('tbl_pegawai',$data);
        redirect("master");
    }
	function tambah_promo(){
        $file=$_FILES['file']['name'];
        if($file=""){

        }else{
            $config['upload_path']		='./uploads/item/';
		    $config['allowed_types']	='jpg|png|docx|xlsx|pdf';		
		    $config['max_size']			= 2048;
            $config['file_name']        = 'Item Promo-'.date('d-M-Y').'_'.substr(md5(rand()),0,10);

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('file')){
                echo "downlaod gagal"; die();
            }

            $data=array(
                'kd_promo'=>$this->input->post('kd_promo'),
                'nama_promo'=>$this->input->post('nama_promo'),
                'give_promo'=>$this->input->post('give'),
                'pertanggal'=>$this->input->post('tanggal'),
                'Target_value'=>$this->input->post('target'),
                'file_promo'=>$_FILES['file']['name'],
            );
            $this->model_app->insertData('tbl_promo',$data);
            redirect("master");
        }
		
	}


//    ======================== EDIT =======================
    function edit_barang(){
        $id['kd_barang'] = $this->input->post('kd_barang');
        $data=array(
            'nm_barang'=>$this->input->post('nm_barang'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_app->updateData('tbl_barang',$data,$id);
        redirect("master");
    }
    function edit_pelanggan(){
        $id['kd_pelanggan'] = $this->input->post('kd_pelanggan');
        $data=array(
            'nm_pelanggan'=>$this->input->post('nm_pelanggan'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
        );
        $this->model_app->updateData('tbl_pelanggan',$data,$id);
        redirect("master");
    }
    function edit_contact(){
        $id['id'] = 1;
        $data=array(
            'nama'=> $this->input->post('nama'),
            'owner'=>$this->input->post('owner'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'desc'=>$this->input->post('desc'),
        );
        $this->model_app->updateData('tbl_contact',$data,$id);
        redirect("master");
    }
    function edit_pegawai(){
        $id['kd_pegawai'] = $this->input->post('kd_pegawai');
        $data=array(
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_app->updateData('tbl_pegawai',$data,$id);
        redirect("master");
    }
	function edit_promo(){
		$id['kd_promo'] = $this->input->post('kd_promo');
		$data=array(
			'nama_promo'=>$this->input->post('nama_promo'),
			'give_promo'=>$this->input->post('give_promo'),
			'pertanggal'=>$this->input->post('tanggal'),
			'Target_value'=>$this->input->post('target'),
			'file_promo'=>$this->input->post('file_promo'),
		);
		$this->model_app->updateData('tbl_promo',$data,$id);
		redirect("master");
		
	}

//    ========================== DELETE =======================
    function hapus_barang(){
        $id['kd_barang'] = $this->uri->segment(3);
        $this->model_app->deleteData('tbl_barang',$id);
        redirect("master");
    }
    function hapus_pelanggan(){
        $id['kd_pelanggan'] = $this->uri->segment(3);
        $this->model_app->deleteData('tbl_pelanggan',$id);
        redirect("master");
    }
    function hapus_pegawai(){
        $id['kd_pegawai'] = $this->uri->segment(3);
        $this->model_app->deleteData('tbl_pegawai',$id);
        redirect("master");
    }
	function hapus_promo(){
		$id['kd_promo'] = $this->uri->segment(3);
		$this->model_app->deleteData('tbl_promo',$id);
		redirect("master");
	}
	//    ========================== Fitur Export EXCEL =======================
	function export_excel()
	{
		$data['data_barang']=$this->model_app->getAllData('tbl_barang');
		
		require(APPPATH.'libraries/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'libraries/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Data Barang");
		$objPHPExcel->getProperties()->setLastModifiedBy("Data Barang");
		$objPHPExcel->getProperties()->setTitle("Data Barang");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1','No');
		$objPHPExcel->getActiveSheet()->setCellValue('B1','Kode Barang');
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Nama Barang');
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Jumlah Barang Tersedia');
		$objPHPExcel->getActiveSheet()->setCellValue('E1','Harga Barang');
		
		$baris=2;
		$x=1;
		
		foreach($data['data_barang'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris,$x );
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris,$data->kd_barang);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris,$data->nm_barang);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris,$data->stok);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris,$data->harga);
			
			$x++;
			$baris++;
		}
		$filename="Data-Barang".'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Data-Barang");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		
		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
}


