<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api2 extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('data3Models');
	}

	public function data($jenis='data3',$type='point',$id='')
	{
		header('Content-Type: application/javascript');
		$response=[];
		if($jenis=='data3'){
			if($type=='point'){
				if($id!=''){
					$this->db->where('a.data3',$id);
				}
				$getHotspot=$this->data3Models->get();
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
				echo 'var data3 ='.json_encode($response,JSON_PRETTY_PRINT);	
			}
			
		}
		
	}
}
