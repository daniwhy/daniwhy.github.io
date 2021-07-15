<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class download extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->logged!==true){
	      redirect('admin/auth');
	    }
	    if($this->session->level!=='Admin'){
	      redirect('admin/beranda');
	    }
		$this->load->model('downloadModels','Model');
	}

	public function index()
	{
		$this->load->library('pagination');
		
		$config['base_url'] = 'http://localhost/webcuaca/admin/download/index';
		$config['total_rows'] =  $this->Model->countAll();
		$config['per_page'] = 10;
		
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		
		$config['next_link']='Next';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		
		$config['prev_link']='Prev';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';
		
		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']='</a></li>';
		
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$datacontent['start']=$this->uri->segment(4);
		$datacontent['datatable']=$this->Model->getData($config['per_page'],$datacontent['start']);

		$datacontent['url']='admin/download';
		$datacontent['title']='Download Data';
		//$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/download/downloadView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$csv = new PHPExcel();
		// Settingan awal fil excel
		$csv->getProperties()->setCreator('My Notes Code')
					 ->setLastModifiedBy('My Notes Code')
					 ->setTitle("Data Cuaca")
					 ->setSubject("Cuaca")
					 ->setDescription("Laporan Data Cuaca")
					 ->setKeywords("Cuaca");
		// Buat header tabel nya pada baris ke 1
		$csv->setActiveSheetIndex(0)->setCellValue('A1', "NO"); 
		$csv->setActiveSheetIndex(0)->setCellValue('B1', "ID AWS"); 
		$csv->setActiveSheetIndex(0)->setCellValue('C1', "Latitude"); 
		$csv->setActiveSheetIndex(0)->setCellValue('D1', "Longitde"); 
		$csv->setActiveSheetIndex(0)->setCellValue('E1', "Time Stemp"); 
		$csv->setActiveSheetIndex(0)->setCellValue('F1', "Hujan"); 
		$csv->setActiveSheetIndex(0)->setCellValue('G1', "Suhu"); 
		$csv->setActiveSheetIndex(0)->setCellValue('H1', "Kelembaban"); 
		
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$data=$this->Model->get();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach ($data->result() as $row) {
		  $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->id_aws);
		  $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->Latitude);
		  $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->Longitude);
		  $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->time);
		  $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->hujan);
		  $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row->suhu);
		  $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row->kelembaban);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set orientasi kertas jadi LANDSCAPE
		$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$csv->getActiveSheet(0)->setTitle("Laporan Data Cuaca");
		$csv->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Cuaca.csv"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = new PHPExcel_Writer_CSV($csv);
		$write->save('php://output');
	  }
}