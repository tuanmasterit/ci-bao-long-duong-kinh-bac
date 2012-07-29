<?php 
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
	function get($id,$limit,$offset,$user_activation_key){
		if($id==0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name,user_activation_key');
			$this->db->from('ci_users');
			$this->db->where('user_activation_key',$user_activation_key);
			if($limit>0)
			{
				$this->db->limit($limit,$offset);
			}
			$query = $this->db->get();        
			return $query->result();
		}
		elseif ($id>0)
		{
			$this->db->select('id,user_login,user_nicename,user_email,display_name,user_activation_key');
			$this->db->from('ci_users');			
			$this->db->where('id',$id);
			$query = $this->db->get();
        	$data = array();
        	$data = $query->row_array();
			return $data;
		}		
		
	}
	public function get_user_id_by_shop($shop_id){
		$this->db->select('user_id');
		$this->db->from('ci_usermeta');		
		
		$this->db->where('meta_key','boothtitle');
		$this->db->where('meta_value',$shop_id);		
		$query = $this->db->get();
		foreach($query->result() as $row){
			return $row->user_id;	
		}
		return 0;
	}
	
	function CongdiemchocacBo($childid,$tang){
			$newChild=-1;
			$this->db->select('meta_value');
			$this->db->from('ci_users');
			$this->db->join('ci_usermeta', 'id = user_id');
			$this->db->where('meta_key','chooseuser');
			$this->db->where('ci_users.id',$childid);
			$query = $this->db->get();  
			foreach ($query->result() as $row)
			{
				$newChild= $row->meta_value;
			}
			if($newChild!=-1 and $tang<11)
			{ 
				$this ->ThemDiemTK_Hethong($newChild,0.5);
				$this->logs_model->add($newChild,$this->common->getObject('diemthuong'),'Thưởng gián tiếp',date('Y-m-d h-i-s'),"0.5 V",$childid,$this->common->getStatus('duyet'));
				$tang=$tang+1;
				$this -> CongdiemchocacBo($newChild,$tang);
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
	
	function getCountLeft($user_id)
	{
		$count = $this->User_model->getCountByParent($user_id);
		$countUser=0;
		if($count>0)
		{			
			$lstUser = $this->User_model->getByParent($user_id);
			processMarkRef($lstUser[0]->user_login,$countUser);
		}
		return $countUser;
	}
	function getCountRight($user_id)
	{
		$count = $this->User_model->getCountByParent($user_id);
		$countUser=0;
		if($count==2)
		{			
			$lstUser = $this->User_model->getByParent($user_id);
			processMarkRef($lstUser[1]->user_login,$countUser);
		}
		return $countUser;
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
			$capdo=$this ->getCapdothuong($this->getByUsername($parentid),"capdodiemthuong");
			$lv='0';

			if($countUser1>6 && $countUser2>6 && $capdo=0)
			{
				$this->logs_model->add($id,$this->common->getObject('thuongcanve'),'Tiền thưởng cân vế: ',date('Y-m-d h-i-s'),$this->common->getStatus('chuanhantien'),'');
				$lv='1';
			}
			
			$user = array(
			'meta_value'=>$lv			
			);
			$this->db->where('meta_key','capdodiemthuong');		
			$this->db->where('user_id',$parentid);
			$this->db->update('ci_usermeta',$user);
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
				   'user_id'  =>$item->ID,
				   'display_name'  => $item->display_name,
                   'logged_in' => TRUE,
				   'user_activation_key' => $item->user_activation_key				   	
               );
			$this->session->set_userdata($userdata);
		 	return true;
		}
		return false;	
	}
	
	function add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$user_activation_key,$meta_references,$meta_boothtitle,$meta_chooseuser,$sex,$cmt,$dctt,$noio,$phone,$atm,$bank,$birthdate,$user_pass='1234567')
	{	
		//$user_pass_random = $this->common->generatePassword(7,0);
		//$user_pass_random='1234567';
		$this->load->helper('security');
		$user_pass_dohash = do_hash($user_pass, 'md5');
		$user = array(
			'user_login'=>$user_login,
			'user_nicename'=>$user_nicename,
			'user_email'=>$user_email,
			'user_registered'=>$user_regitered,
			'display_name'=>$display_name,
			'user_pass'=>$user_pass_dohash,
			'user_activation_key' => $meta_value
		);

		//Thêm thành viên
		$this->db->insert('ci_users',$user);
		$id = $this->get_id_last_row();
		
		//Thêm user_meta
		/*$user_meta = array(
			'user_id'=>$id,
			'meta_key'=>'group',
			'meta_value'=>$meta_value
		);*/
		$this->db->insert('ci_usermeta',$user_meta);
		$user_meta1 = array(
			'user_id'=>$id,
			'meta_key'=>'parent',
			'meta_value'=>$this->getByUsername($meta_references)
		);
		$this->db->insert('ci_usermeta',$user_meta1);
		$user_meta2 = array(
			'user_id'=>$id,
			'meta_key'=>'boothtitle',
			'meta_value'=>$meta_boothtitle
		);
		$this->db->insert('ci_usermeta',$user_meta2);
		$user_meta4 = array(
			'user_id'=>$id,
			'meta_key'=>'chooseuser',
			'meta_value'=>$this->getByUsername($meta_chooseuser)
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
		$capdo_meta = array(
			'user_id'=>$id,
			'meta_key'=>'capdodiemthuong',
			'meta_value'=>'0'
		);
		$this->db->insert('ci_usermeta',$capdo_meta);
		
		$diemthuong_meta = array(
			'user_id'=>$id,
			'meta_key'=>'TK_gianhang',
			'meta_value'=>'18'
		);
		$this->db->insert('ci_usermeta',$diemthuong_meta);
		$ongheo_meta = array(
			'user_id'=>$id,
			'meta_key'=>'TK_tichluyongheo',
			'meta_value'=>'0'
		);
		$this->db->insert('ci_usermeta',$ongheo_meta);
		$user_meta3 = array(
			'user_id'=>$id,
			'meta_key'=>'TK_hethong',
			'meta_value'=>''
		);
		$this->db->insert('ci_usermeta',$user_meta3);
		$this ->CongdiemchocacBo($id,1);
		//$this->logs_model->add($id,$this->common->getObject('diemthuong'),'Cập nhật điểm khi thêm mới hội viên: 18V -- Bởi: Hệ thống',date('Y-m-d h-i-s'),$this->common->getStatus('duyet'),'');
		//$this -> addVcoin($id,1.8);
		//$this->logs_model->add($this->getByUsername($meta_references),$this->common->getObject('diemthuong'),'Thưởng điểm giới thiệu thành viên mới: 1.8V -- Bởi: '.$user_login,date('Y-m-d h-i-s'),$this->common->getStatus('duyet'),$id);
		//$this->checkThuongcanve($meta_chooseuser);
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
	
	function getCount($user_activation_key)
	{
		$this->db->from('ci_users');
		$this->db->where('user_activation_key',$user_activation_key);		
		return $this->db->count_all_results();
	}
	
	function getCapdothuong($userid,$key)
	{
		$this->db->from('ci_usermeta');
		$this->db->where('meta_key',$key);
		$this->db->where('user_id',$userid);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			return $row->meta_value;
		}
		return -10;
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
	
	function getAjax($username,$limit,$offset,$user_activation_key)
	{
		$this->db->select('id,user_login,user_nicename,user_email,display_name,user_activation_key');
		$this->db->from('ci_users');
		$this->db->where('user_activation_key',$user_activation_key);
		if($username != ''){
			$this->db->like('user_login',$username);
		}
		if($limit>0)
		{
			$this->db->limit($limit,$offset);
		}
		$query = $this->db->get();        
		return $query->result();		
	}
	function searchByUsername($username)
	{
		$this->db->select('user_login,id');
		$this->db->from('ci_users');
		$this->db->like('user_login', $username);
		$this->db->limit(5,0);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function getById($id)
	{
		$this->db->select('id,user_login,user_pass,user_nicename,user_email,display_name,user_activation_key');
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
	
	function addVcoin($user_id,$vcoin)
	{
		$this->db->select('meta_value');
		$this->db->from('ci_usermeta');	
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key','vcoin');
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
				$user = array(
					'meta_value'=>($crrVcoin+$vcoin)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','vcoin');
				$this->db->update('ci_usermeta',$user);
		}
	}	
	
	function ThemDiemTK_Hethong($user_id,$diem)
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
				$user = array(
					'meta_value'=>($crrVcoin+$diem)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','TK_hethong');
				$this->db->update('ci_usermeta',$user);
				
				
		}
	}
	
	function getChooseUser($hoivien_id)
	{
		$this->db->select('user_login,user_login,display_name,meta_value');
		$this->db->from('ci_users');
		$this->db->join('ci_usermeta', 'id = user_id');
		$this->db->where('meta_key','chooseuser');
		$this->db->where('user_id',$hoivien_id);
		$query = $this->db->get();   
		return $query->result();
	}
	
	function ThemDiemTK_Gianhang($user_id,$diem)
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
				$user = array(
					'meta_value'=>($crrVcoin+$diem)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','TK_gianhang');
				$this->db->update('ci_usermeta',$user);
				
				
		}
	}		
}
?>