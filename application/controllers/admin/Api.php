<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->logged!==true){
	      redirect('auth');
	    }
	    $this->load->model('lokasiawsModels');
	}

	public function data($jenis='lokasiaws',$type='point',$id='')
	{
		header('Content-Type: application/javascript');
		$response=[];
		if($jenis=='lokasiaws'){
			if($type=='point'){
				if($id!=''){
					$this->db->where('a.lokasiaws',$id);
				}
				$getHotspot=$this->lokasiawsModels->get();
				foreach ($getHotspot->result() as $row) {
					$data=null;
					$data['type']="Feature";
					$data['properties']=[
												"name"=>$row->id_aws,
												"Latitude"=>$row->Latitude,
												"Longitude"=>$row->Longitude,
												"popUp"=>"ID AWS : ".$row->id_aws.",<br>Latitude. ".$row->Latitude."<br>Longitude : ".$row->Longitude
												];
					$data['geometry']=[
												"type" => "Point",
												"coordinates" => [$row->Longitude,$row->Latitude ] 
												];	

					$response[]=$data;
				}
				echo 'var lokasiaws ='.json_encode($response,JSON_PRETTY_PRINT);	
			}
			
		}
		
	}
}
