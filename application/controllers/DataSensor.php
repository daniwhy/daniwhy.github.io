<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSensor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('SensorModels','Model');
	}
	public function sensor()
	{
		if($this->input->post()){
			$data=[
				'time'=>$this->input->post('time'),
				'hujan'=>$this->input->post('hujan'),
				'suhu'=>$this->input->post('suhu'),
			];
        }

	}
} 