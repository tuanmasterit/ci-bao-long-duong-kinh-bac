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
	function add($user_id,$log_type,$log_content,$created_date,$amount,$userprocess,$status){		
		$arr=array(
			'user_id'=>$user_id,
			'log_type'=>$log_type,
			'log_content'=>$log_content,
			'created_date'=>$created_date,
			'amount'=>$amount,
			'userprocess'=>$userprocess,
			'status'=>$status
		);
		$this->db->insert('ci_logs',$arr);
	}
	
	function get($limit,$offset,$user_id,$stype,$from_date='',$to_date=''){
			$this->db->select('user_id,user_login,log_type,log_content,created_date,amount,status');
			$this->db->from('ci_logs');
			$this->db->join('ci_users', 'ci_users.id = user_id');
			if($from_date != ''){
				$this->db->where('created_date >=',$from_date);
			}
			if($to_date != ''){
				$this->db->where('created_date <=',$to_date);
			}
			if($user_id!=0)
			{
				$this->db->where('user_id',$user_id);
			}
			if($stype!='')
			{
				$this->db->where('log_type',$stype);
			}			
			if($limit>0)
			{
				$this->db->limit($limit,$offset);
			}
			$query = $this->db->get();
        
			return $query->result();
	}
	function getCount($user_id,$stype)
	{
		$this->db->from('ci_logs');
		if($user_id!=0)
			{
			$this->db->where('user_id',$user_id);
			}
		if($stype!='')
		{
			$this->db->where('log_type',$stype);
		}	
		return $this->db->count_all_results();
	}
}
?>