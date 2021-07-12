<?php

class PerintahModels extends CI_Model
{
	
	function ambildataperintah(){
		$this->db->select('*');
		$this->db->from('perintah');
		$this->db->where('id_perintah',1);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}
	function update($data=array(),$where=array()){
		
		$this->db->update('perintah',$data);
	}
	
}

?>