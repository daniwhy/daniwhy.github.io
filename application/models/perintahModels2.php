<?php

class PerintahModels2 extends CI_Model
{
	
	function ambildataperintah(){
		$this->db->select('*');
		$this->db->from('dataperintah2');
		$this->db->where('id_perintah',0);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}
	function update($dataperintah2=array(),$where=array()){
		
		$this->db->update('dataperintah2',$dataperintah2);
	}
	
}

?>