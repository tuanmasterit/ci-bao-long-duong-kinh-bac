<?php 
//include('class.php');
class logs_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();		
    }
	//Add logs
	function add($user_id,$log_type,$log_content,$created_date){		
		$arr=array(
			'user_id'=>$user_id,
			'log_type'=>$log_type,
			'log_content'=>$log_content,
			'created_date'=>$created_date
		);
		$this->db->insert('ci_logs',$arr);
	}
}
?>