<?php 
//include('class.php');
class yeucaunaptien_model extends CI_Model{
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
			'status'=>$status,
			'created_date'=>date('Y-m-d h-i-s')
		);
		$this->db->insert('ci_yeucaunaptien',$arr);
	}
	
	function checkVcoin($user_id,$vcoin)
	{
		$this->db->select('meta_value');
		$this->db->from('ci_usermeta');	
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key','TK_gianhang');
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
	
	function checkAddVcoin($user_id,$vcoin)
	{
				
				$this->logs_model->add($user_id,$this->common->getObject('naptien'),'Yêu cầu nạp điểm: '.$vcoin.'V',date('Y-m-d h-i-s'),$this->common->getStatus('choxuly'),'');
				return 'true';
	}
}
?>