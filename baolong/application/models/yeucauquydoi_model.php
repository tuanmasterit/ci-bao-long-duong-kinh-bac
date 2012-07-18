<?php 
//include('class.php');
class yeucauquydoi_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();		
    }
	//Add logs
	function add($vcoin,$user_id,$user_process,$status){		
		$arr=array(
			'vcoin'=>$vcoin,
			'user_id'=>$user_id,
			'user_process'=>$user_process,
			'status'=>$status
		);
		$this->db->insert('ci_yeucauquydoi',$arr);
		return $last_id;
	}
}
?>