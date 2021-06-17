<?php
class SensorModels2 extends CI_Model
{
	
	function save($datasensor2)
	{
		$this->db->insert('data3',$datasensor2 );
		return TRUE;
	}
}

?>