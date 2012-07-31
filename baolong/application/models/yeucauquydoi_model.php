<?php 
//include('class.php');
class yeucauquydoi_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
    }
	//Add logs
	function add($vcoin,$user_id,$user_process,$status){		
		$arr=array(
			'vcoin'=>$vcoin,
			'user_id'=>$user_id,
			'user_process'=>$user_process,
			'status'=>$status,
			'created_date'=>date('Y-m-d h-i-s')
		);
		$this->db->insert('ci_yeucauquydoi',$arr);
	}
	
	function getCrrVcoin($user_id)
	{
		$this->db->select('meta_value');
		$this->db->from('ci_usermeta');	
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key','TK_hethong');
		$query = $this->db->get();
		$crrVcoin = -2;
		foreach($query->result() as $row){
			$crrVcoin= $row->meta_value;	
		}
		return $crrVcoin;
	}
	
	function checkVcoin($user_id,$vcoin)
	{
		$this->db->select('meta_value');
		$this->db->from('ci_usermeta');	
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key','TK_hethong');
		$query = $this->db->get();
		$crrVcoin = -2;
		foreach($query->result() as $row){
			$crrVcoin= $row->meta_value;	
		}
		if($crrVcoin==-2)
		{
			return 'false';
		}
		else
		{
			if($crrVcoin<$vcoin)
			{
				return 'false';	
			}
			else
			{
				/*$user = array(
					'meta_value'=>($crrVcoin-$vcoin)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','vcoin');
				$this->db->update('ci_usermeta',$user);*/
				$this -> add($vcoin,$user_id,'',$this->common->getStatus('choxuly'));
				return 'true';
			}
		}
	}
	
	function checkAddVcoin($user_id,$vcoin)
	{
				
				$this->logs_model->add($user_id,$this->common->getObject('naptien'),'Yêu cầu nạp điểm: '.$vcoin.'V',date('Y-m-d h-i-s'),$this->common->getStatus('choxuly'),'');
				return 'true';
	}
	
	function getvcoinById($id){
			$this->db->select('vcoin');
			$this->db->from('ci_yeucauquydoi');
			$this->db->where('Id',$id);
			$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			return $row->vcoin;
		}
		return -10;

	}
	
	function get($limit,$offset,$status,$from_date='',$to_date=''){
			$this->db->select('ci_yeucauquydoi.Id,vcoin,user_id,user_process,status,process_date,created_date,user_login');
			$this->db->from('ci_yeucauquydoi');
			$this->db->join('ci_users', 'ci_users.id = user_id');
			if($from_date != ''){
				$this->db->where('created_date >=',$from_date);
			}
			if($to_date != ''){
				$this->db->where('created_date <=',$to_date);
			}
			if($status!='')
			{
				$this->db->where('status',$status);
			}		
			if($limit>0)
			{
				$this->db->limit($limit,$offset);
			}
			$query = $this->db->get();
        
			return $query->result();
	}
	function getCount($status,$from_date='',$to_date='')
	{
		$this->db->select('Id,vcoin,user_id,user_process,status,process_date,created_date');
			$this->db->from('ci_yeucauquydoi');
			if($from_date != ''){
				$this->db->where('created_date >=',$from_date);
			}
			if($to_date != ''){
				$this->db->where('created_date <=',$to_date);
			}
			if($status!='')
			{
				$this->db->where('status',$status);
			}		
		return $this->db->count_all_results();
	}
	
	function updateStatus($id,$status)
	{
	$user_pr=$this->session->userdata('user_id');
			$arrmeta = array(
				'status'=>$status,
				'user_process'=>$user_pr,
				'process_date'=>date('Y-m-d h-i-s')
			);
			$this->db->where('id',$id);
			$this->db->update('ci_yeucauquydoi',$arrmeta);
	}
}
?>