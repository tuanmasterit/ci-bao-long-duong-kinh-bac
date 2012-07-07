<?php
	class Rpc extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
		}
		
		function index()
		{
			// Is there a posted query string?
			if($this->input->post('queryString')) {
				$user_name = $this->input->post('queryString');
				$lstUser = $this->User_model->getAjax($user_name,0,0,'hoivien');
					if(count($lstUser)>0) {						
						foreach ($lstUser as $User){							
		         			echo '<li onClick="fill(\''.$User->user_login.'\');">'.$User->user_login.'</li>';
		         		}
					} else {
						echo 'Không có hội viên nào.';
					}
				} else {
					// Dont do anything.
				} // There is a queryString.
			
		}
	}
?>