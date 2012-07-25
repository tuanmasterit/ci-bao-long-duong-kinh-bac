<?php 
include('class.php');
class User_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();		
		$this->load->database();
		$this->load->model('logs_model');
    }		
	//List User
	function get($id,$limit,$offset,$meta_value){
		if($id==0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'id = user_id');
			$this->db->where('meta_key','group');
			$this->db->where('meta_value',$meta_value);
			if($limit>0)
			{
				$this->db->limit($limit,$offset);
			}
			$query = $this->db->get();
        
			return $query->result();
		}
		elseif ($id>0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'id = user_id');
			
			if($meta_value!='')
			{
				$this->db->where('meta_key','group');
				$this->db->where('meta_value',$meta_value);
			}
			$this->db->where('id',$id);
			$query = $this->db->get();
        	$data = array();
        	$data = $query->row_array();
			return $data;
		}		
		
	}
	
	//List User byParent
	function getByParent($parentid){
			$this->db->select('user_login,display_name,meta_value');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'id = user_id');
			$this->db->where('meta_key','chooseuser');
			$this->db->where('meta_value',$parentid);
			$query = $this->db->get();   
			return $query->result();
	}
	
	function getCountByParent($parentid)
	{
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','chooseuser');
		$this->db->where('meta_value',$parentid);	
		return $this->db->count_all_results();
	}
	
	function checkThuongcanve($parentid)
	{
		
		$count = $this->User_model->getCountByParent($parentid);
		if($count==2)
		{
			$countUser1=0;
			$countUser2=0;
			$lstUser = $this->User_model->getByParent($parentid);
			processMarkRef($lstUser[0]->user_login,$countUser1);
			processMarkRef($lstUser[1]->user_login,$countUser2);
			if($countUser1>6 && $countUser2>6)
			{
				$this->logs_model->add($id,'1','Cập nhật điểm thưo: 18V',date('Y-m-d h-i-s'));
			}
		} 
	}
	
	function processMarkRef($parentid,&$countUser)
	{
		$lstUser = $this->User_model->getByParent($parentid);
		$count1=0;
		foreach($lstUser as $item){
			$countUser=($countUser+1);
			$count = $this->User_model->getCountByParent($item ->user_login);
			if($count>0)
			{
				$this->processMarkRef($item ->user_login,$countUser); 
			}
		} 		
	}
	
	
	function authentication($user_name,$password){
		$this->load->helper('security');
		$user_pass = do_hash($password, 'md5'); // MD5
		$query = $this->db->get_where('ci_users',array('user_login'=>$user_name,'user_pass'=>$user_pass));
		if ($query->num_rows() > 0)
		{
			$item=$query -> first_row();
			$userdata = array(
                   'username'  => $user_name,
				   'display_name'  => $item->display_name,
                   'logged_in' => TRUE
				   	
               );
			$this->session->set_userdata($userdata);
		 	return true;
		}
		return false;	
	}
	
	function add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$meta_value,$meta_references,$meta_boothtitle,$meta_chooseuser,$sex,$cmt,$dctt,$noio,$phone,$atm,$bank,$birthdate)
	{	
		$user_pass_random = $this->common->generatePassword(7,0);
		$user_pass_random='1234567';
		$this->load->helper('security');
		$user_pass = do_hash($user_pass_random, 'md5');
		$user = array(
			'user_login'=>$user_login,
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'user_registered'=>$user_regitered,
			'display_name'=>$display_name,
			'user_pass'=>$user_pass
		);

		//Thêm thành viên
		$this->db->insert('ci_users',$user);
		$id = $this->get_id_last_row();
		
		//Thêm user_meta
		$user_meta = array(
			'user_id'=>$id,
			'meta_key'=>'group',
			'meta_value'=>$meta_value
		);
		$this->db->insert('ci_usermeta',$user_meta);
		$user_meta1 = array(
			'user_id'=>$id,
			'meta_key'=>'parent',
			'meta_value'=>$meta_references
		);
		$this->db->insert('ci_usermeta',$user_meta1);
		$user_meta2 = array(
			'user_id'=>$id,
			'meta_key'=>'boothtitle',
			'meta_value'=>$meta_boothtitle
		);
		$this->db->insert('ci_usermeta',$user_meta2);
		$user_meta3 = array(
			'user_id'=>$id,
			'meta_key'=>'vcoin',
			'meta_value'=>'18'
		);
		$this->db->insert('ci_usermeta',$user_meta3);
		$user_meta4 = array(
			'user_id'=>$id,
			'meta_key'=>'chooseuser',
			'meta_value'=>$meta_chooseuser
		);
		$this->db->insert('ci_usermeta',$user_meta4);
		
		
		$birthdate_meta = array(
			'user_id'=>$id,
			'meta_key'=>'birthdate',
			'meta_value'=>$birthdate
		);
		$this->db->insert('ci_usermeta',$birthdate_meta);
		
		$bank_meta = array(
			'user_id'=>$id,
			'meta_key'=>'bank',
			'meta_value'=>$bank
		);
		$this->db->insert('ci_usermeta',$bank_meta);
		
		$atm_meta = array(
			'user_id'=>$id,
			'meta_key'=>'atm',
			'meta_value'=>$atm
		);
		$this->db->insert('ci_usermeta',$atm_meta);
		
		$phone_meta = array(
			'user_id'=>$id,
			'meta_key'=>'phone',
			'meta_value'=>$phone
		);
		$this->db->insert('ci_usermeta',$phone_meta);
		$noio_meta = array(
			'user_id'=>$id,
			'meta_key'=>'noio',
			'meta_value'=>$noio
		);
		$this->db->insert('ci_usermeta',$noio_meta);
		
		$dctt_meta = array(
			'user_id'=>$id,
			'meta_key'=>'dctt',
			'meta_value'=>$dctt
		);
		$this->db->insert('ci_usermeta',$dctt_meta);
		
		$cmt_meta = array(
			'user_id'=>$id,
			'meta_key'=>'cmt',
			'meta_value'=>$cmt
		);
		$this->db->insert('ci_usermeta',$cmt_meta);
		$sex_meta = array(
			'user_id'=>$id,
			'meta_key'=>'sex',
			'meta_value'=>$sex
		);
		$this->db->insert('ci_usermeta',$sex_meta);
		
		$diemthuong_meta = array(
			'user_id'=>$id,
			'meta_key'=>'capdodiemthuong',
			'meta_value'=>'0'
		);
		$this->db->insert('ci_usermeta',$diemthuong_meta);

		$this->logs_model->add($id,'1','Cập nhật điểm khi thêm mới hội viên: 18V',date('Y-m-d h-i-s'));
		$this->checkThuongcanve($meta_references);
	}
	
	//get id last record
	function get_id_last_row(){
		$query = $this->db->get('ci_users');			
		$last_row = $query->last_row();
		return $last_row->ID;
	}
	
	function edit($id,$user_nicename,$user_email,$display_name)
	{
		$user = array(
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'display_name'=>$display_name,			
		);		
		$this->db->where('id',$id);
		$this->db->update('ci_users',$user);
	}
	
	function delete($id)
	{
		//Delete User		
		$this->db->delete('ci_users',array('id'=>$id));
		
		//Delete User Meta		
		$this->db->delete('ci_usermeta',array('user_id'=>$id));
	}
	
	function getCount($meta_value)
	{
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','group');
		$this->db->where('meta_value',$meta_value);		
		return $this->db->count_all_results();
	}
	
	function getByUsername($username)
	{
		$this->db->from('ci_users');
		$this->db->where('user_login',$username);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			return $row->ID;
		}
		return -10;
	}
	
	function getAjax($username,$limit,$offset,$meta_value)
	{
		$this->db->select('id,user_login,user_nicename,user_email,display_name');
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','group');
		$this->db->where('meta_value',$meta_value);
		$this->db->like('user_login',$username);
		if($limit>0)
		{
			$this->db->limit($limit,$offset);
		}
		$query = $this->db->get();
        
		return $query->result();		
	}
	function searchByUsername($username)
	{
		$this->db->select('user_login');
		$this->db->from('ci_users');
		$this->db->like('user_login', $username);
		$this->db->limit(5,0);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function getById($id)
	{
		$this->db->select('id,user_login,user_pass,user_nicename,user_email,display_name');
		$this->db->from('ci_users');		
		$this->db->where('id',$id);
		$query = $this->db->get();
        $data = array();
        if($query->num_rows>0)
        {
        	$data = $query->row_array();        	
        }
        return $data;
	}			
}
?>