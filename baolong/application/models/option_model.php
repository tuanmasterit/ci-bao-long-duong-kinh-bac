<?php
	class Option_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		function getOption($option_name)
		{
			$this->db->select('option_id,option_name,option_value');
			$this->db->from('ci_options');			
			$this->db->where('option_name',$option_name);
			$query  = $this->db->get();
			return $query->result();
		}
	}
?>