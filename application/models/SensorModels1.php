<?php
class SensorModels1 extends CI_Model
{
	
	function save($datasensor1)
	{
		$this->db->insert('data2',$datasensor1 );
		return TRUE;
	}
}

?>