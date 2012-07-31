<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class genealogytree extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('User_model');
		$this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
	
	
	function GenHtmlTree($parentid,$tang,&$lstUser,$txtArr)
	{
		$lstUserDB = $this->User_model->getByParent($parentid);
		$cnt=1;		
		foreach($lstUserDB as $item){
			if($item->user_activation_key=='hoivien')
			{
				$txtArr1=$txtArr.'.'.$cnt;
				$cnt=($cnt+1);
				$lstUser[$txtArr1]='<a href="'.base_url().'hoivien/genealogytree?u='.$item ->user_login.'">'.$item ->user_login.'</a>';
				//$lstUser[$txtArr1]=$item ->user_login;
				$count = $this->User_model->getCountByParent($item ->user_login);
				if($count>0 && $tang<3)
				{
					$this ->GenHtmlTree($item ->user_login,($tang+1),$lstUser,$txtArr1); 
				}
			}
		}
	}
    
	public function index($row=0)
	{
	
		$lstUser = array("1"=>" ","1.1"=>" ","1.2"=>" ","1.1.1"=>" ","1.1.2"=>" ","1.2.1"=>" ","1.2.2"=>" "
		,"1.1.1.1"=>" "
		,"1.1.1.2"=>" "
		,"1.1.2.1"=>" "
		,"1.1.2.2"=>" "
		,"1.2.1.1"=>" "
		,"1.2.1.2"=>" "
		,"1.2.2.1"=>" "
		,"1.2.2.2"=>" ");
		$usn=$this->session->userdata('username');	
		if($this->input->get('u') != ''){
			$usn = $this->input->get('u');
		}
		$lstUser["1"]='<a href="'.base_url().'hoivien/genealogytree?u='.$usn.'">'.$usn.'</a>';
		$count = $this->User_model->getCountByParent($usn);
		if($count>0)
		{
			$this ->GenHtmlTree($usn,1,$lstUser,"1");
		}

		$data['lstUser'] = $lstUser;
		$this->load->view('hoivien/genealogytree_view',$data);
		//echo $html;
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */