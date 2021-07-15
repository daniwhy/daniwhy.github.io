<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class downloadModels2 extends CI_Model{
	function get(){
		$data=$this->db->get('data3');
		return $data;
	}

	function getData($limit, $start){
		$data=$this->db->get('data3', $limit, $start);
		return $data;
		 
	}

	function countAll(){
		$data=$this->db->get('data3')->num_rows();
		return $data;
	}
}