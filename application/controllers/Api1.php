<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api1 extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('data2Models');
	}

	public function data($jenis='data2',$type='point',$id='')
	{
		header('Content-Type: application/javascript');
		$response=[];
		if($jenis=='data2'){
			if($type=='point'){
				if($id!=''){
					$this->db->where('a.data2',$id);
				}
				$getHotspot=$this->data2Models->get();
				foreach ($getHotspot->result() as $row) {
					$data=null;
					$data['type']="Feature";
					$data['properties']=[
												"name"=>$row->id_aws,
												"Latitude"=>$row->Latitude,
												"Longitude"=>$row->Longitude,
												"time"=>$row->time,
												"hujan"=>$row->hujan,
												"suhu"=>$row->suhu,
												"kelembaban"=>$row->kelembaban,
												"popUp"=>"ID AWS : ".$row->id_aws.",<br>Latitude. ".$row->Latitude.",<br>Longitude. ".$row->Longitude."<br>Waktu : $row->time WIB"."<br>Hujan : $row->hujan mm"."<br>Suhu : $row->suhu C"."<br>Kelembaban : $row->kelembaban %"
												];
					$data['geometry']=[
												"type" => "Point",
												"coordinates" => [$row->Longitude,$row->Latitude ] 
												];	
					$response[]=$data;
				}
				echo 'var data2 ='.json_encode($response,JSON_PRETTY_PRINT);	
			}
			
		}
		
	}
}