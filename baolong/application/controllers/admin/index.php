<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == 1 && $this->session->userdata('user_activation_key') == 'administrator'){
			redirect('admin/posts/lists/post');	
		}else{redirect('admin/login');}
    }		
	public function index()
	{		
		redirect('admin/posts/lists/post');
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */