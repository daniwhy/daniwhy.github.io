<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data2Models extends CI_Model{
	function get(){
		$data=$this->db->get('data2');
		return $data;
	}
}
