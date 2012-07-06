<?php
class Count_access extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();		
    }
}
?>