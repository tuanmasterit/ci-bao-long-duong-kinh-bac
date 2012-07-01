<?php 
include('class.php');
class User_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();		
		$this->load->database();		
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
			$this->db->limit($limit,$offset);
			$query = $this->db->get();
        
			return $query->result();
		}
		elseif ($id>0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'id = user_id');
			$this->db->where('meta_key','group');
			$this->db->where('meta_value',$meta_value);
			$this->db->where('id',$id);
			$query = $this->db->get();
        	$data = array();
        	$data = $query->row_array();
			return $data;
		}		
		
	}
	
	function authentication($user_name,$password){
		//$this->load->helper('security');
		//$user_pass = do_hash($pasword, 'md5'); // MD5
		$query = $this->db->get_where('ci_users',array('user_login'=>$user_name,'user_pass'=>$password));
		if ($query->num_rows() > 0)
		{
			$userdata = array(
                   'username'  => $user_name,
                   'logged_in' => TRUE
               );
			$this->session->set_userdata($userdata);
		 	return true;
		}
		return false;	
	}
	
	function add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$meta_value)
	{
		$user = array(
			'user_login'=>$user_login,
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'user_registered'=>$user_regitered,
			'display_name'=>$display_name
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
		$row =  $query->first_row();
		return $row->ID;		
	}
}
?>