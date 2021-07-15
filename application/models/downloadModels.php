<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class downloadModels extends CI_Model{
	function get(){
		$data=$this->db->get('data1');
		return $data;
	}

	function getData($limit, $start){
		$data=$this->db->get('data1', $limit, $start);
		return $data;
		 
	}

	function countAll(){
		$data=$this->db->get('data1')->num_rows();
		return $data;
	}
}