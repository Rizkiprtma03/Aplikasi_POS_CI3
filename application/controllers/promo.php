<?php
class Promo extends CI_Controller{
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
        $this->load->view('pages/v_promo');
        $this->load->view('element/v_footer');
    }
	function export_excel()
	{
		$data['data_promo']=$this->model_app->getAllData('tbl_promo');
		
		require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Promo");
		$objPHPExcel->getProperties()->setLastModifiedBy("Promo");
		$objPHPExcel->getProperties()->setTitle("Data Promo");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1','No');
		$objPHPExcel->getActiveSheet()->setCellValue('B1','Kode Promo');
		$objPHPExcel->getActiveSheet()->setCellValue('C1','Nama Promo');
		$objPHPExcel->getActiveSheet()->setCellValue('D1','Deskripsi Promo');
		$objPHPExcel->getActiveSheet()->setCellValue('E1','Pertanggal Promo');
		$objPHPExcel->getActiveSheet()->setCellValue('F1','Target Penjualan');
		
		$baris=2;
		$x=1;
		
		foreach($data['data_promo'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris,$x );
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris,$data->id);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris,$data->nama_promo);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris,$data->give_promo);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris,$data->pertanggal);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris,$data->Target_value);
			
			$x++;
			$baris++;
		}
		$filename="Data-Promo".date(" d-m-Y"). '.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Data-Promo");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		
		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
		exit;
	}

}