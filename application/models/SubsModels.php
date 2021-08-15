<?php

class SubsModels extends CI_Model
{
	function get(){
		$this->db->select('*');
		$this->db->from('subscribe');
		$this->db->where('email');
		$query = $this->db->get();
		//if ($query->num_rows()>0) {
			return $query->result();
		//}
	}
	function insert($data=array()){
		$this->db->insert('subscribe',$data);
	}
}

?>