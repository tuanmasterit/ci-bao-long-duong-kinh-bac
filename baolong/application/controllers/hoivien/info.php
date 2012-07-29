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
			$data['hoivien'] = $hoivien;
			$this->load->view('hoivien/view_info',$data);
		}
	}
?>