<?php
	class Info extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('logged_in') != 1){
				redirect('admin/login');
			}
			$this->load->model('User_model');
		}
		
		function index()
		{
			$username =  $this->session->userdata('username');		
			$hoivien_id = $this->User_model->getByUsername($username);
			$hoivien = 	$this->User_model->get($hoivien_id,0,0,'');
			
			//$chooseUser = $this->User_model->getChooseUser($hoivien_id);
			$data['count_nhanh_trai'] =  $this->User_model->getCountLeft($username);
			$data['count_nhanh_phai'] =  $this->User_model->getCountRight($username);
			$data['tk_ong_heo'] = $this->User_model->get_usermeta($hoivien_id,'TK_tichluyongheo');
			$data['tk_he_thong'] = $this->User_model->get_usermeta($hoivien_id,'TK_hethong');
			$data['tk_gian_hang'] = $this->User_model->get_usermeta($hoivien_id,'TK_gianhang');
			$data['chooseUser'] = $this->User_model->get_usermeta($hoivien_id,'chooseuser');
			$data['sum_quydoi'] = $this->User_model->get_sum_quydoi($hoivien_id);
			$data['diemthuong'] = $this->User_model->getDiemThuong($hoivien_id);
			$data['hoivien'] = $hoivien;			
			
			$this->load->view('hoivien/view_info',$data);
		}
		
		
	}
?>