<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data1Models extends CI_Model{
	function get(){
		$data=$this->db->get('data1');
		return $data;
	}
	
}
