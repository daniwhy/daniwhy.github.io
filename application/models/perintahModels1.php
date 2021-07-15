<?php

class PerintahModels1 extends CI_Model
{
	
	function ambildataperintah(){
		$this->db->select('*');
		$this->db->from('dataperintah1');
		$this->db->where('id_perintah',0);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}
	function update($dataperintah1=array(),$where=array()){
		
		$this->db->update('dataperintah1',$dataperintah1);
	}
	
}

?>