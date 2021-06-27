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
										//IW
										"IW1"=>$iw1 = array_map(function ($iw1) {
											return $iw1;
										}, array(162.2196,1.9432,-30.4313,-73.838)),
										"IW2"=>$iw2 = array_map(function ($iw2) {
											return $iw2;
										}, array(35.4559,29.1807,119.3565,51.9114)),
										"IW3"=>$iw3 = array_map(function ($iw3) {
											return $iw3;
										}, array(-0.5488,-14.2959,-74.5185,-0.5821)),
										
										//LW
										"LW1"=>$lw1 = array_map(function ($lw1) {
											return $lw1;
										}, array(-0.31,170.5234,-1.5979)),
										"LW2"=>$lw2 = array_map(function ($lw2) {
											return $lw2;
										}, array(-6.4368,0.5047,3.7788)),
										"LW3"=>$lw3 = array_map(function ($lw3) {
											return $lw3;
										}, array(-0.356,-25.4993,-3.1601)),
										"LW4"=>$lw4 = array_map(function ($lw4) {
											return $lw4;
										}, array(2.0981,-95.3868,4.3764)),
										//ZW
										"ZW1"=>$zw1 = array_map(function ($lw1) {
											return $lw1;
										}, array(-21.0727)),
										"ZW2"=>$zw2 = array_map(function ($lw2) {
											return $lw2;
										}, array(37.9414)),
										"ZW3"=>$zw3 = array_map(function ($lw3) {
											return $lw3;
										}, array(4.1648)),
										
										// B
										"B1"=>$b1 = array_map(function ($b1) {
											return $b1;
										}, array(-9.0911,-12.4574,28.1333,-14.7112)),
										"B2"=>$b2  = array_map(function ($b2) {
											return $b2;
										}, array(6.3047,-44.1332,-10.6269)),
										"B3"=>$b3  = array_map(function ($b3) {
											return $b3;
										}, array(-21.5085)),
										
										//INPUT NORMALISASI
										"IN1"=>$in1=$row->hujan/100,
										"IN2"=>$in2=$row->suhu/100,
										"IN3"=>$in3=$row->kelembaban/100,
										//IW*INPUT
										"Z1"=>$z1 = ($in1 * $iw1[0]) + ($in2 * $iw2[0]) + ($in3 * $iw3[0]) + $b1[0],
										"Z2"=>$z2 = ($in1 * $iw1[1]) + ($in2 * $iw2[1]) + ($in3 * $iw3[1]) + $b1[1],
										"Z3"=>$z3 = ($in1 * $iw1[2]) + ($in2 * $iw2[2]) + ($in3 * $iw3[2]) + $b1[2],
										"Z4"=>$z4 = ($in1 * $iw1[3]) + ($in2 * $iw2[3]) + ($in3 * $iw3[3]) + $b1[3],

										//Z' (FUNGSI AKTIVASI)
										"Z1'"=>$A1 = 1 / (1 + exp(-1 * $z1)),
										"Z2'"=>$A2 = 1 / (1 + exp(-1 * $z2)),
										"Z3'"=>$A3 = 1 / (1 + exp(-1 * $z3)),
										"Z4'"=>$A4 = 1 / (1 + exp(-1 * $z4)),
										//Z' * lw1
										"ZZ1"=>$zz1 = ($A1 * $lw1[0]) + ($A2 * $lw2[0]) + ($A3 * $lw3[0]) + ($A4 * $lw4[0]) + $b2[0],
										"ZZ2"=>$zz2 = ($A1 * $lw1[1]) + ($A2 * $lw2[1]) + ($A3 * $lw3[1]) + ($A4 * $lw4[1]) + $b2[1],
										"ZZ3"=>$zz3 = ($A1 * $lw1[2]) + ($A2 * $lw2[2]) + ($A3 * $lw3[2]) + ($A4 * $lw4[2]) + $b2[2],
													
										//ZZ' (FUNGSI AKTIVASI)
										"ZZ1'"=>$aa1 = 1 / (1 + exp(-1 * $zz1)),
										"ZZ2'"=>$aa2 = 1 / (1 + exp(-1 * $zz2)),
										"ZZ3'"=>$aa3 = 1 / (1 + exp(-1 * $zz3)),
										
										//Y 
										"zzz"=>$zzz = ($aa1 * $zw1[0]) + ($aa2 * $zw2[0]) + ($aa3 * $zw3[0]) + $b3[0],
										
										//Y Output
										"Y'"=>$y = 1 / (1 + exp(-1 * $zzz)),

										//Y denormalisasi
										"yy"=>$yn = $y*100,];

										if($yn>=0.5){
													
											if($row->hujan>=1 && $row->hujan<=5){
													$kode = 2;
													$klas = "BERAWAN";
											}
											elseif ($row->hujan>5 && $row->hujan<=10){
												$kode = 3;
												$klas = "HUJAN RINGAN";
											}
											elseif ($row->hujan>10 && $row->hujan<=20){
												$kode = 4;
												$klas = "HUJAN SEDANG";
											}
											elseif ($row->hujan>20){
												$kode = 5;
												$klas = "HUJAN LEBAT";
											}
											}
											
											if($yn<0.5){
											if ($row->hujan==0){
												$kode = 1;
												$klas = "CERAH";
											}}
				$data['kategori']=[
										"kategori"=>$kode
									];
				$data['popUp']=[
										"popUp"=>"<strong> KEC. GUBENG </strong>"."<br>Waktu : $row->time WIB"."<br>Suhu : $row->suhu C"."<br>Kelembaban : $row->kelembaban %"."<br>"."<br>"."<strong> PREDIKSI </strong>"."<br>"."<strong> CUACA 3 JAM KEDEPAN </strong>"."<br>"."<br><strong>$klas</strong>"
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
?>