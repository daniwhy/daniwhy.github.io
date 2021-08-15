<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('data1Models');
	}

	public function data($jenis='data1',$type='point',$id='')
	{
		header('Content-Type: application/javascript');
		$response=[];
		
		if($jenis=='data1'){
			if($type=='point'){
				if($id!=''){
					$this->db->where('a.data1',$id);
				}
				$getHotspot=$this->data1Models->get();
				foreach ($getHotspot->result() as $row) {
					$data=null;
					$data['type']="Feature";
					$data['properties']=[		"name"=>$row->id_aws,
												"Latitude"=>$row->Latitude,
												"Longitude"=>$row->Longitude,
												"time"=>$row->time,

												
												//IW
												"IW1"=>$iw1 = array_map(function ($iw1) {
													return $iw1;
												}, array(-11.4576,3.0264,-7.3986,0.0324,2.0318,-12.433)),
												"IW2"=>$iw2 = array_map(function ($iw2) {
													return $iw2;
												}, array(44.4497,59.7286,-51.1208,43.8468,57.4107,38.577)),
												"IW3"=>$iw3 = array_map(function ($iw3) {
													return $iw3;
												}, array(1.7142,-6.7927,-7.1576,13.815,-3.2597,-4.5187)),

												
												//LW
												"LW1"=>$lw1 = array_map(function ($lw1) {
													return $lw1;
												}, array(5.5055,6.2937,3.5229,4.5884,-3.5164,-2.8291,2.7915,5.7301,5.1891,-1.6202,3.5179)),
												"LW2"=>$lw2 = array_map(function ($lw2) {
													return $lw2;
												}, array(4.4565,2.9153,-5.7463,4.8949,-3.7752,0.9199,-6.2051,-8.2579,4.1973,-2.9255,5.4747)),
												"LW3"=>$lw3 = array_map(function ($lw3) {
													return $lw3;
												}, array(3.9953,0.8248,-0.2232,2.0582,2.3774,-6.2553,2.4117,-0.5858,1.7807,4.0131,-1.5069,)),
												"LW4"=>$lw4 = array_map(function ($lw4) {
													return $lw4;
												}, array(-6.2628,4.8779,3.549,-3.7853,-3.5887,0.0434,-10.2708,-2.0533,-0.2825,-2.1526,3.083)),
												"LW5"=>$lw5 = array_map(function ($lw5) {
													return $lw5;
												}, array(0.6396,3.9395,-3.5772,1.3006,-3.9721,4.4479,1.3636,5.2875,-7.576,3.2977,0.0591)),
												"LW6"=>$lw6 = array_map(function ($lw6) {
													return $lw6;
												}, array(3.3473,-2.1128,-3.7916,6.704,-3.2258,-3.5017,3.6488,7.3899,1.1339,4.4492,-3.8719)),
												
												
												//ZW
												"ZW1"=>$zw1 = array_map(function ($zw1) {
													return $zw1;
												}, array(-1.9892)),
												"ZW2"=>$zw2 = array_map(function ($zw2) {
													return $zw2;
												}, array(-1.6858)),
												"ZW3"=>$zw3 = array_map(function ($zw3) {
													return $zw3;
												}, array(-2.861)),
												"ZW4"=>$zw4 = array_map(function ($zw4) {
													return $zw4;
												}, array(-1.5629)),
												"ZW5"=>$zw5 = array_map(function ($zw5) {
													return $zw5;
												}, array(-0.5372)),
												"ZW6"=>$zw6 = array_map(function ($zw6) {
													return $zw6;
												}, array(-1.738)),
												"ZW7"=>$zw7 = array_map(function ($zw7) {
													return $zw7;
												}, array(-8.0984)),
												"ZW8"=>$zw8 = array_map(function ($zw8) {
													return $zw8;
												}, array(-5.9701)),
												"ZW9"=>$zw9 = array_map(function ($zw9) {
													return $zw9;
												}, array(7.3795)),
												"ZW10"=>$zw10 = array_map(function ($zw10) {
													return $zw10;
												}, array(0.7675)),
												"ZW11"=>$zw11 = array_map(function ($zw11) {
													return $zw11;
												}, array(-0.1963)),
												
												// B
												"B1"=>$b1 = array_map(function ($b1) {
													return $b1;
												}, array(-14.3763,-9.0859,20.9877,-23.113,-4.9892,-6.3724)),
												"B2"=>$b2  = array_map(function ($b2) {
													return $b2;
												}, array(-9.2421,-8.1863,0.7472,-7.8449,8.3873,1.6392,0.3974,-4.4144,-0.7861,-7.9658,0.7431)),
												"B3"=>$b3  = array_map(function ($b3) {
													return $b3;
												}, array(-1.1394)),

												
												//INPUT NORMALISASI
												"IN1"=>$in1=$row->hujan/100,
												"IN2"=>$in2=$row->suhu/100,
												"IN3"=>$in3=$row->kelembaban/100,
												
												//IW*INPUT
												"Z1"=>$z1 = ($in1 * $iw1[0]) + ($in2 * $iw2[0]) + ($in3 * $iw3[0]) + $b1[0],
												"Z2"=>$z2 = ($in1 * $iw1[1]) + ($in2 * $iw2[1]) + ($in3 * $iw3[1]) + $b1[1],
												"Z3"=>$z3 = ($in1 * $iw1[2]) + ($in2 * $iw2[2]) + ($in3 * $iw3[2]) + $b1[2],
												"Z4"=>$z4 = ($in1 * $iw1[3]) + ($in2 * $iw2[3]) + ($in3 * $iw3[3]) + $b1[3],
												"Z5"=>$z5 = ($in1 * $iw1[4]) + ($in2 * $iw2[4]) + ($in3 * $iw3[4]) + $b1[4],
												"Z6"=>$z6 = ($in1 * $iw1[5]) + ($in2 * $iw2[5]) + ($in3 * $iw3[5]) + $b1[5],

												//Z' (FUNGSI AKTIVASI)
												"Z1'"=>$A1 = 1 / (1 + exp(-1 * $z1)),
												"Z2'"=>$A2 = 1 / (1 + exp(-1 * $z2)),
												"Z3'"=>$A3 = 1 / (1 + exp(-1 * $z3)),
												"Z4'"=>$A4 = 1 / (1 + exp(-1 * $z4)),
												"Z5'"=>$A5 = 1 / (1 + exp(-1 * $z5)),
												"Z6'"=>$A6 = 1 / (1 + exp(-1 * $z6)),
												//Z' * lw1
												"ZZ1"=>$zz1 = ($A1 * $lw1[0]) + ($A2 * $lw2[0]) + ($A3 * $lw3[0]) + ($A4 * $lw4[0]) + ($A5 * $lw5[0]) + ($A6 * $lw6[0]) + $b2[0],
												"ZZ2"=>$zz2 = ($A1 * $lw1[1]) + ($A2 * $lw2[1]) + ($A3 * $lw3[1]) + ($A4 * $lw4[1]) + ($A5 * $lw5[1]) + ($A6 * $lw6[1]) + $b2[1],
												"ZZ3"=>$zz3 = ($A1 * $lw1[2]) + ($A2 * $lw2[2]) + ($A3 * $lw3[2]) + ($A4 * $lw4[2]) + ($A5 * $lw5[2]) + ($A6 * $lw6[2]) + $b2[2],
												"ZZ4"=>$zz4 = ($A1 * $lw1[3]) + ($A2 * $lw2[3]) + ($A3 * $lw3[3]) + ($A4 * $lw4[3]) + ($A5 * $lw5[3]) + ($A6 * $lw6[3]) + $b2[3],
												"ZZ5"=>$zz5 = ($A1 * $lw1[4]) + ($A2 * $lw2[4]) + ($A3 * $lw3[4]) + ($A4 * $lw4[4]) + ($A5 * $lw5[4]) + ($A6 * $lw6[4]) + $b2[4],
												"ZZ6"=>$zz6 = ($A1 * $lw1[5]) + ($A2 * $lw2[5]) + ($A3 * $lw3[5]) + ($A4 * $lw4[5]) + ($A5 * $lw5[5]) + ($A6 * $lw6[5]) + $b2[5],
												"ZZ7"=>$zz7 = ($A1 * $lw1[6]) + ($A2 * $lw2[6]) + ($A3 * $lw3[6]) + ($A4 * $lw4[6]) + ($A5 * $lw5[6]) + ($A6 * $lw6[6]) + $b2[6],
												"ZZ8"=>$zz8 = ($A1 * $lw1[7]) + ($A2 * $lw2[7]) + ($A3 * $lw3[7]) + ($A4 * $lw4[7]) + ($A5 * $lw5[7]) + ($A6 * $lw6[7]) + $b2[7],
												"ZZ9"=>$zz9 = ($A1 * $lw1[8]) + ($A2 * $lw2[8]) + ($A3 * $lw3[8]) + ($A4 * $lw4[8]) + ($A5 * $lw5[8]) + ($A6 * $lw6[8]) + $b2[8],
												"ZZ10"=>$zz10 = ($A1 * $lw1[9]) + ($A2 * $lw2[9]) + ($A3 * $lw3[9]) + ($A4 * $lw4[9]) + ($A5 * $lw5[9]) + ($A6 * $lw6[9]) + $b2[9],
												"ZZ11"=>$zz11 = ($A1 * $lw1[10]) + ($A2 * $lw2[10]) + ($A3 * $lw3[10]) + ($A4 * $lw4[10]) + ($A5 * $lw5[10]) + ($A6 * $lw6[10]) +$b2[10],
												//ZZ' (FUNGSI AKTIVASI)
												"ZZ1'"=>$aa1 = 1 / (1 + exp(-1 * $zz1)),
												"ZZ2'"=>$aa2 = 1 / (1 + exp(-1 * $zz2)),
												"ZZ3'"=>$aa3 = 1 / (1 + exp(-1 * $zz3)),
												"ZZ4'"=>$aa4 = 1 / (1 + exp(-1 * $zz4)),
												"ZZ5'"=>$aa5 = 1 / (1 + exp(-1 * $zz5)),
												"ZZ6'"=>$aa6 = 1 / (1 + exp(-1 * $zz6)),
												"ZZ7'"=>$aa7 = 1 / (1 + exp(-1 * $zz7)),
												"ZZ8'"=>$aa8 = 1 / (1 + exp(-1 * $zz8)),
												"ZZ9'"=>$aa9 = 1 / (1 + exp(-1 * $zz9)),
												"ZZ10'"=>$aa10 = 1 / (1 + exp(-1 * $zz10)),
												"ZZ11"=>$aa11 = 1 / (1 + exp(-1 * $zz11)),
												
												//Y 
												"zzz"=>$zzz = ($aa1 * $zw1[0]) + ($aa2 * $zw2[0]) + ($aa3 * $zw3[0]) 
														+($aa4 * $zw4[0]) +($aa5 * $zw5[0]) +($aa6 * $zw6[0]) + ($aa7 * $zw7[0]) +
														($aa8 * $zw8[0]) +($aa9 * $zw9[0]) +($aa10 * $zw10[0]) +($aa11 * $zw11[0]) +$b3[0],

												
												//Y Output
												"Y'"=>$y = 1 / (1 + exp(-1 * $zzz)),
												
												//Y denormalisasi
												"yy"=>$yn = $y*100,];

												
													if($yn>=0.5){
														$kode = 3;
														$klas = "HUJAN RINGAN";
													}
													if ($row->hujan>=6 && $row->hujan<11){
														$kode = 4;
														$klas = "HUJAN SEDANG";
													}
													if ($row->hujan>=11 && $row->hujan<=20){
														$kode = 5;
														$klas = "HUJAN LEBAT";
													}
													if($yn<0.5){
													if ($row->hujan==0){
														$kode = 1;
														$klas = "CERAH";
														}
													}
											
					$data['kategori']=[
												"kategori"=>$kode,
											];					
				
					$data['popUp']=[			
												"popUp"=>"<strong> KEC. MULYOREJO </strong>"."<br>Waktu : $row->time WIB"."<br>Suhu : $row->suhu C"."<br>Kelembaban : $row->kelembaban %"."<br>"."<br>"."<strong> PREDIKSI </strong>"."<br>"."<strong> CUACA 3 JAM KEDEPAN </strong>"."<br>"."<br><strong>$klas</strong>"
											];
												
					$data['geometry']=[
												"type" => "Point",
												"coordinates" => [$row->Longitude,$row->Latitude ] 
												];	
					$response[]=$data;
				}
				echo 'var data1 ='.json_encode($response,JSON_PRETTY_PRINT);	
											
			}

			
		}
		
	}
}
?>

