<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customerstree extends CI_Controller {

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
	
	
	function GenHtmlTree($parentid,$tang)
	{
		$lstUser= $this->User_model->getByParent($parentid);
		$html='<ul>';
		foreach($lstUser as $item){
			if($item->user_activation_key=='hoivien')
			{
			$html.='<li><span>';
			$html.= $item ->user_login; 
			$tangt=$this->User_model->get_usermeta($item ->Id,'loai_hoi_vien');
			$html.='--( tầng '.$tang.')<font style="color:blue"> '.$tangt.'</font></span>';
			$count = $this->User_model->getCountByParent($item ->user_login);
			
			if($count>0)
			{
				$v=$item ->user_login;
				$t=$tang+1;
				//echo $v.'='.$t;
				$html .= $this ->GenHtmlTree($v,$t); 
			}
			$html.='</li>';
			}
		}
		$html.='</ul>';
		return $html;
	}
    
	public function index($row=0)
	{
		$count = $this->User_model->getCountByParent($this->session->userdata('username'));
		$html='';
		$html.='<ul id="mixed"><li><span>'.$this->session->userdata('username').'--( tầng 0)</span>';
		if($count>0)
		{
			$html.=$this ->GenHtmlTree($this->session->userdata('username'),1);
		}
		$html.='</li></ul>';
		$data['htmlTree'] = $html;
		$this->load->view('hoivien/customerstree_view',$data);
		//echo $html;
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */