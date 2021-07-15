<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class downloadModels1 extends CI_Model{
	function get(){
		$data=$this->db->get('data2');
		return $data;
	}

	function getData($limit, $start){
		$data=$this->db->get('data2', $limit, $start);
		return $data;
		 
	}

	function countAll(){
		$data=$this->db->get('data2')->num_rows();
		return $data;
	}
}