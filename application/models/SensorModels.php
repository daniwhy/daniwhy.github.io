<?php
class SensorModels extends CI_Model
{
	
	function save($datasensor)
	{
		$this->db->insert('data1',$datasensor );
		return TRUE;
	}
}

?>