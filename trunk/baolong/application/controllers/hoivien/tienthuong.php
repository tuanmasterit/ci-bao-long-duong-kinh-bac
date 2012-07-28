<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tienthuong extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('logs_model');
		$this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index($row=0)
	{
		
		include('paging.php');	
		$stype="";
		if($this->input->post('stype'))
		{
			$stype=$this->input->post('stype');
		}
		$user_id=$this->session->userdata('user_id');
		//$user_id=26;
		$config['base_url']= base_url()."/hoiviens/index/";
		$config['total_rows']=$this->logs_model->getCount($user_id,$stype);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		//echo $config['total_rows'];
		$data['list_link'] = $this->pagination->create_links(); 		
		$data['lstLog'] = $this->logs_model->get($config['per_page'],$row,$user_id,$stype);
		$data['stype']=$stype;
		$this->load->view('hoivien/tienthuong_view',$data);			
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */