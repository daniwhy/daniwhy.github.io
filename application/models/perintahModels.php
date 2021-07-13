<?php

class PerintahModels extends CI_Model
{
	
	function ambildataperintah(){
		$this->db->select('*');
		$this->db->from('dataperintah');
		$this->db->where('id_perintah',0);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}
	function update($dataperintah=array(),$where=array()){
		
		$this->db->update('dataperintah',$dataperintah);
	}
	
}

?>