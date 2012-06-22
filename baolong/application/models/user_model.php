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
	function list_user(){
		$this->db->select('id,user_login,user_nicename,user_email,display_name');
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','group');
		$this->db->where('meta_value','thanhvien');
				
		$query = $this->db->get();
        
		return $query->result();
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
	
	function add_user($user_login,$user_nicename,$user_email,$user_regitered,$display_name)
	{
		$user = array(
			'user_login'=>$user_login,
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'user_regitered'=>$user_regitered,
			'display_name'=>$display_name
		);

		//Thêm thành viên
		$this->db->insert('ci_users',$user);
		$id = $this->get_id_last_row();
		
		//Thêm user_metadata
		$user_metadata = array(
			'user_id'=>$id,
			'meta_key'=>'group',
			'meta_value'=>'thanhvien'
		);
		$this->db->insert('ci_usermeta',$user_metadata);
	}
	
	//get id last record
	function get_id_last_row(){
		$query = $this->db->get('ci_users');			
		$last_row = $query->last_row();
		return $last_row->ID;
	}
}
?>