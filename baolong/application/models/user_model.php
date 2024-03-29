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
	function get($id,$limit=-1,$offset=0,$user_activation_key=''){
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
			$cid=$this->getByUsername($childid);
			if($cid>0)
			{
				$this->db->select('meta_value');
				$this->db->from('ci_usermeta');
				$this->db->where('meta_key','chooseuser');
				$this->db->where('user_id',$cid);
				$query = $this->db->get();  
				foreach ($query->result() as $row)
				{
					$newChild= $row->meta_value;
				}
				if($newChild!=-1 and $tang<11)
				{ 
					$this ->ThemDiemTK_Hethong($this->getByUsername($newChild),0.5);
					$this->logs_model->add($this->getByUsername($newChild),$this->common->getObject('diemthuong'),'Thưởng gián tiếp',date('Y-m-d h-i-s'),"0.5 V",$cid,$this->common->getStatus('duyet'));
					$tang=$tang+1;
					$this -> CongdiemchocacBo($newChild,$tang);
				}
			}
	}
	
	function Capnhat_socon($childid){
			$newChild=-1;
			$cid=$this->getByUsername($childid);
			if($cid>0)
			{
				$this->db->select('meta_value');
				$this->db->from('ci_usermeta');
				$this->db->where('meta_key','chooseuser');
				$this->db->where('user_id',$cid);
				$query = $this->db->get();  
				foreach ($query->result() as $row)
				{
					$newChild= $row->meta_value;
				}
				if($newChild!=-1)
				{ 
					$this ->Add_socon($this->getByUsername($newChild));
					$this -> Capnhat_socon($newChild);
				}
			}
	}
	
		function Add_socon($user_id)
	{
		$this->db->select('meta_value');
		$this->db->from('ci_usermeta');	
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key','All_child');
		$query = $this->db->get();
		$crrChild = -2;
		foreach($query->result() as $row){
			$crrChild= $row->meta_value;	
		}
		if($crrChild==-2)
		{
			$user_meta3333 = array(
			'user_id'=>$user_id,
			'meta_key'=>'All_child',
			'meta_value'=>'1'
			);
			$this->db->insert('ci_usermeta',$user_meta3333);
		}
		else
		{
				$user = array(
					'meta_value'=>($crrChild+1)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','All_child');
				$this->db->update('ci_usermeta',$user);
				$usn=$this->getuser_loginById($user_id);				
				$count = $this->User_model->getCountByParent($usn);
				if($count==2)
				{
					$lstUser = $this->User_model->getByParent($usn);
					$countUser1=$this -> getMeta_value($this->getByUsername($lstUser[0]->user_login),'All_child')+1;
					$countUser2=$this -> getMeta_value($this->getByUsername($lstUser[1]->user_login),'All_child')+1;
					$capdo=$this -> getMeta_value($user_id,'capdodiemthuong');
					//echo $countUser1 . '-'.$countUser2.'[]';
					if($capdo>-1)
					{}
					else
					{
						$user_meta33331 = array(
						'user_id'=>$user_id,
						'meta_key'=>'capdodiemthuong',
						'meta_value'=>'0'
						);
						$this->db->insert('ci_usermeta',$user_meta33331);
					}
						if($countUser1 >= ($capdo+7) && $countUser2>=($capdo+7))
						{
							$this->ThemDiemTK_Hethong($user_id,18.9);
							$this->logs_model->add($user_id,$this->common->getObject('diemthuong'),'Tiền thưởng cân vế',date('Y-m-d h-i-s'),18.9,$this->session->userdata('user_id'),$this->common->getStatus('duyet'));
							$user = array(
							'meta_value'=>($capdo+7)			
							);
							$this->db->where('meta_key','capdodiemthuong');		
							$this->db->where('user_id',$user_id);
							$this->db->update('ci_usermeta',$user);
						}
					
				}
		}
	}
	
	function getMeta_value($user_id,$meta_key)
	{
				$this->db->select('meta_value');
				$this->db->from('ci_usermeta');
				$this->db->where('meta_key',$meta_key);
				$this->db->where('user_id',$user_id);
				$query = $this->db->get(); 
				$value='[null]';
				foreach ($query->result() as $row)
				{
					$value= $row->meta_value;
				}
				return $value;
	}
	
	//
	function getuser_loginById($user_id){
			$this->db->select('user_login');
			$this->db->from('ci_users');
			$this->db->where('id',$user_id);
			$query = $this->db->get();   
			foreach ($query->result() as $row)
			{
				return $row->user_login;
			}
			return -10;
	}
	//List User byParent
	function getByParent($parentid){
			$this->db->select('ci_users.Id,user_login,display_name,meta_value,user_activation_key');
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
		$this->db->join('ci_usermeta', 'user_id=id','left');
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
			$countUser=1;		
			$lstUser = $this->User_model->getByParent($user_id);
			$this->processMarkRef($lstUser[0]->user_login,$countUser);
		}
		return $countUser;
	}
	function getCountRight($user_id)
	{
		$count = $this->User_model->getCountByParent($user_id);
		$countUser=0;
		if($count==2)
		{	
			$countUser=1;
			$lstUser = $this->User_model->getByParent($user_id);
			$this->processMarkRef($lstUser[1]->user_login,$countUser);
		}
		return $countUser;
	}
	
	function TinhCanBangVe()
	{
		$this->db->select('user_login');
		$this->db->from('ci_users');
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$this -> checkThuongcanve($row->user_login);
		}
	}
	
	function checkThuongcanve($parentid)
	{
		
		$count = $this->User_model->getCountByParent($parentid);
		if($count==2)
		{
			$uid=$this->getByUsername($parentid);
			$countUser1=1;
			$countUser2=1;
			$lstUser = $this->User_model->getByParent($parentid);
			$this ->processMarkRef($lstUser[0]->user_login,$countUser1);
			$this ->processMarkRef($lstUser[1]->user_login,$countUser2);
			$capdo=$this ->getCapdothuong($uid,"capdodiemthuong");
			//echo $countUser1 . '-'.$countUser2.'[]';
			if($capdo>-1)
			{
				if($countUser1 >= ($capdo+7) && $countUser2>=($capdo+7))
				{
					$this->ThemDiemTK_Hethong($uid,18.9);
					$this->logs_model->add($uid,$this->common->getObject('diemthuong'),'Tiền thưởng cân vế',date('Y-m-d h-i-s'),18.9,$this->session->userdata('user_id'),$this->common->getStatus('duyet'));
					$user = array(
					'meta_value'=>($capdo+7)			
					);
					$this->db->where('meta_key','capdodiemthuong');		
					$this->db->where('user_id',$uid);
					$this->db->update('ci_usermeta',$user);
				}
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
	
	function add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$user_activation_key,$meta_references,$meta_boothtitle,$meta_chooseuser,$sex,$cmt,$dctt,$noio,$phone,$atm,$bank,$birthdate,$user_pass='1234567',$loai_hoi_vien='')
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
			'user_activation_key' => $user_activation_key
		);

		//Thêm thành viên
		$this->db->insert('ci_users',$user);
		$id = $this->getByUsername($user_login);
		
		//Thêm user_meta
		/*$user_meta = array(
			'user_id'=>$id,
			'meta_key'=>'group',
			'meta_value'=>$meta_value
		);
		$this->db->insert('ci_usermeta',$user_meta);
		*/
		if($id>0)
		{
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
			
			$capdo_meta = array(
				'user_id'=>$id,
				'meta_key'=>'capdodiemthuong',
				'meta_value'=>'0'
			);
			$this->db->insert('ci_usermeta',$capdo_meta);
			
			if($user_activation_key=='choduyet' or $loai_hoi_vien=='tặng')
			{
				$diemthuong_meta = array(
					'user_id'=>$id,
					'meta_key'=>'TK_gianhang',
					'meta_value'=>'0'
				);
			}
			else
			{
				$diemthuong_meta = array(
					'user_id'=>$id,
					'meta_key'=>'TK_gianhang',
					'meta_value'=>'18'
				);
			}			
			$this->db->insert('ci_usermeta',$diemthuong_meta);
			
			//add loại hội viên
			$arr_loai_hoi_vien = array(
				'user_id'=>$id,
				'meta_key'=>'loai_hoi_vien',
				'meta_value'=>$loai_hoi_vien
			);
			$this->db->insert('ci_usermeta',$arr_loai_hoi_vien);			
			
			$ongheo_meta = array(
				'user_id'=>$id,
				'meta_key'=>'TK_tichluyongheo',
				'meta_value'=>'0'
			);
			$this->db->insert('ci_usermeta',$ongheo_meta);
			$user_meta3 = array(
				'user_id'=>$id,
				'meta_key'=>'TK_hethong',
				'meta_value'=>'0'
			);
			$this->db->insert('ci_usermeta',$user_meta3);
			$user_meta3333 = array(
				'user_id'=>$id,
				'meta_key'=>'All_child',
				'meta_value'=>'0'
			);
			$this->db->insert('ci_usermeta',$user_meta3333);
			if($user_activation_key=='choduyet')
			{
			}
			else
			{
				$this ->CongdiemchocacBo($user_login,1);
				$this ->Capnhat_socon($user_login);
				$this->logs_model->add($id,$this->common->getObject('diemthuong'),'Cập nhật điểm khi thêm mới hội viên: 18V -- Bởi: Hệ thống',date('Y-m-d h-i-s'),1.8,'',$this->common->getStatus('duyet'));
			$this ->ThemDiemTK_Hethong($this -> getByUsername($meta_references),1.8);
			}
			
			
		}

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
	
	function TruDiemTK_Hethong($user_id,$diem)
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
					'meta_value'=>($crrVcoin-$diem)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','TK_hethong');
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
	
	function ThemDiemTK_Ongheo($user_id,$diem)
	{
		$this->db->select('meta_value');
		$this->db->from('ci_usermeta');	
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key','TK_tichluyongheo');
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
				$this->db->where('meta_key','TK_tichluyongheo');
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
	
	function TruDiemTK_Gianhang($user_id,$diem)
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
					'meta_value'=>($crrVcoin-$diem)
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','TK_gianhang');
				$this->db->update('ci_usermeta',$user);
				
				
		}
	}	

	function get_usermeta($user_id,$meta_key)
	{
		$this->db->select('user_id,meta_key,meta_value');
		$this->db->from('ci_usermeta');
		$this->db->where('user_id',$user_id);
		$this->db->where('meta_key',$meta_key);
		
		$query = $this->db->get();
		$result = '';
		foreach ($query->result() as $row)
		{
		    $result = $row->meta_value;
		}
		return $result;		
	}
	
	function get_sum_quydoi($user_id)
	{
		$this->db->select_sum('vcoin');
		$this->db->from('ci_yeucauquydoi');
		$this->db->where('user_id',$user_id);
		$this->db->where('status',$this->common->getStatus('duyet'));
		
		$query = $this->db->get();
		return $query->row()->vcoin;
	}
	
	function getDiemThuong($user_id)
	{
		$this->db->select_sum('amount');
		$this->db->from('ci_logs');
		$this->db->where('user_id',$user_id);
		$this->db->where('log_type',$this->common->getObject('diemthuong'));
		$this->db->where('status',$this->common->getStatus('duyet'));
		
		$query = $this->db->get();
		return $query->row()->amount;
	}
	public function pheduyet($user_id){
		$arr_update = array(
			'user_activation_key'=>'hoivien'
		);
		$this->db->where('ID',$user_id);
		$this->db->update('ci_users',$arr_update);	
		
		$this ->CongdiemchocacBo($this->getuser_loginById($user_id),1);
		$this ->Capnhat_socon($this->getuser_loginById($user_id));
				$user = array(
					'meta_value'=>'18'
				);		
				$this->db->where('user_id',$user_id);
				$this->db->where('meta_key','TK_gianhang');
				$this->db->update('ci_usermeta',$user);
				$this->logs_model->add($user_id,$this->common->getObject('diemthuong'),'Cập nhật điểm khi thêm mới hội viên: 18V -- Bởi: Hệ thống',date('Y-m-d h-i-s'),1.8,'',$this->common->getStatus('duyet'));
				$this ->ThemDiemTK_Hethong($this -> getByUsername($this->get_usermeta($user_id,'parent')),1.8);
	}
}
?>