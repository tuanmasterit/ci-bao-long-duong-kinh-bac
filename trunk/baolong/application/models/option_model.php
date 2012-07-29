<?php
	class Option_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		function getOption($option_name,$blog_id=0)
		{
			$this->db->select('option_id,option_name,option_value');
			$this->db->from('ci_options');			
			$this->db->where('option_name',$option_name);
			if($blog_id != 0){
				$this->db->where('blog_id',$blog_id);
			}
			$query  = $this->db->get();
			return $query->result();
		}
		public function add($blog_id,$option_name,$option_value){
			$array_add = array(
				'blog_id'=>$blog_id,
				'option_name'=>$option_name,
				'option_value'=>$option_value				
			);	
			$this->db->insert('ci_options',$array_add);
		}
	}
?>