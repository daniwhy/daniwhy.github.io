<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda  extends CI_Controller {	
	public function __construct(){
	parent::__construct();
	$this->load->model('lokasiawsModels','Model');
	$this->load->model('data1Models','Model');
	$this->load->model('data2Models','Model');
	$this->load->model('data3Models','Model');

	
	
	}

	public function index()
	{
		$datacontent['url']='Beranda';
		$datacontent['title']='Beranda';
		$data['title']='Selamat Datang';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('website/layouts/view',$datacontent,TRUE);
		$data['js']=$this->load->view('website/cuaca/js/cuacaJs',$datacontent,TRUE);
		$this->load->view('website/layouts/html.php',$data);
	}
	public function sensor(){
	    $this->load->model('sensorModels');
		if (isset($_GET['hujan'],$_GET['suhu'], $_GET['kelembaban'])){
			echo "OK";
			$dat1 = $this->input->get('hujan');
			$dat2 = $this->input->get('suhu');	
			$dat3 = $this->input->get('kelembaban');	
			//echo $panjang;
			$datasensor = array('hujan' => $dat1, 'suhu' => $dat2,'kelembaban' => $dat3,);
            
			if($this->sensorModels->save($datasensor)){
				echo "BERHASIL";
			}else{
				echo "ERROR";
			}
		}
		else{
			echo "Variabel data tidak terdefinisi";
		}
	}
	public function sensor1(){
	    $this->load->model('sensorModels1');
		if (isset($_GET['hujan'],$_GET['suhu'], $_GET['kelembaban'])){
			echo "OK";
			$dat1 = $this->input->get('hujan');
			$dat2 = $this->input->get('suhu');	
			$dat3 = $this->input->get('kelembaban');	
			//echo $panjang;
			$datasensor1 = array('hujan' => $dat1, 'suhu' => $dat2,'kelembaban' => $dat3,);
            
			if($this->sensorModels1->save($datasensor1)){
				echo "BERHASIL";
			}else{
				echo "ERROR";
			}
		}
		else{
			echo "Variabel data tidak terdefinisi";
		}
	}
	public function sensor2(){
	    $this->load->model('sensorModels2');
		if (isset($_GET['hujan'],$_GET['suhu'], $_GET['kelembaban'])){
			echo "OK";
			$dat1 = $this->input->get('hujan');
			$dat2 = $this->input->get('suhu');	
			$dat3 = $this->input->get('kelembaban');	
			//echo $panjang;
			$datasensor2 = array('hujan' => $dat1, 'suhu' => $dat2,'kelembaban' => $dat3,);
            
			if($this->sensorModels2->save($datasensor2)){
				echo "BERHASIL";
			}else{
				echo "ERROR";
			}
		}
		else{
			echo "Variabel data tidak terdefinisi";
		}
	}
	public function bacaperintah(){
		$this->load->model('perintahModels');

		$dataperintah = $this->perintahModels->ambildataperintah();

		foreach ($dataperintah as $key => $value) {
			if ($value->dataperintah > 5){
				echo "ON";
			}
			else 
				echo "OFF";
			}
		}
	
	public function bacaperintah1(){
		$this->load->model('perintahModels1');

		$dataperintah1 = $this->perintahModels1->ambildataperintah();

		foreach ($dataperintah1 as $key => $value) {
			if ($value->dataperintah1 > 5){
				echo "ON";
			}
			else 
				echo "OFF";
			}
		}
	
	public function bacaperintah2(){
		$this->load->model('perintahModels2');

		$dataperintah2 = $this->perintahModels2->ambildataperintah();

		foreach ($dataperintah2 as $key => $value) {
			if ($value->dataperintah2 > 5){
				echo "ON";
			}
			else 
				echo "OFF";
			}
		}
	public function autosave()
	  {
	  	$this->load->model('perintahModels');
	  	if($this->input->post()){
	 		$dataperintah=[
	  			'id_perintah'=>$this->input->post('id_perintah'),
	  			'dataperintah'=>$this->input->post('dataperintah'),
	  		];
	  			$this->perintahModels->update($dataperintah,['id_perintah'=>$this->input->post('id_perintah')]);
				 
	  		}
	  		redirect();
	  		var_dump($dataperintah);
	}

	public function autosave1()
	  {
	  	$this->load->model('perintahModels1');
	  	if($this->input->post()){
	 		$dataperintah1=[
	  			'id_perintah'=>$this->input->post('id_perintah'),
	  			'dataperintah1'=>$this->input->post('dataperintah1'),
	  		];
	  			$this->perintahModels1->update($dataperintah1,['id_perintah'=>$this->input->post('id_perintah')]);
				 
	  		}
	  		redirect();
	  		//var_dump($dataperintah);
	}

	public function autosave2()
	  {
	  	$this->load->model('perintahModels2');
	  	if($this->input->post()){
	 		$dataperintah2=[
	  			'id_perintah'=>$this->input->post('id_perintah'),
	  			'dataperintah2'=>$this->input->post('dataperintah2'),
	  		];
	  			$this->perintahModels2->update($dataperintah2,['id_perintah'=>$this->input->post('id_perintah')]);
				 
	  		}
	  		redirect();
	  		//var_dump($dataperintah);
	}
	public function sendemail()
    {
		$this->load->model('SubsModels');
		$query = $this->db->get('subscribe');
		$result = $query->result_array();
		// if ($query->num_rows())
		// {
		// 	/*for multiple array*/
		 
		// 	$result = $query->result_array();
		// 	/*for single array
		// 	$row = $query->row_array();
		// 	*/
		// }
		foreach($result as $key =>$row)
		{
			$dataa = implode (" ",$row);
    	echo $dataa;
		}
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'webcuaca.alert@gmail.com';
        $mail->Password = 'Dani11121997';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
		

        $mail->setFrom('webcuaca.alert@gmail.com', 'WEBCUACA ALERT');

        // email tujuan mu
       	$mail->addAddress($dataa);

        // Attracmhent File

        // Email subject
        $mail->Subject = 'ALERT';

        // Set email format to HTML
        // $mail->isHTML(true);

        // Email body content / isi
        $mail->Body = 'PERINGATAN BAHAYA !!! Prakiraan Cuaca Hujan Lebat. Untuk informasi lebih lanjut klik http://webcuaca.airsensormonitoring.online/';

        // Send email
        if(!$mail->send()){
            echo "email terkirim";
        }else{
			echo "email gagal terkirim";
      }
	}
    
}
	
