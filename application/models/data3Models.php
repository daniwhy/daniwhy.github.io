<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data3Models extends CI_Model{
	function get(){
		$data=$this->db->get('data3');
		return $data;
	}
}
