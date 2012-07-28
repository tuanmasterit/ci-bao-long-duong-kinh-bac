<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giaodich extends CI_Controller {
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
	public function index($type='',$row=0)
	{		
		/*include('paging.php');		
		$user_id=$this->session->userdata('user_id');
		$user_id=26;
		$config['base_url']= base_url()."/hoiviens/index/";
		$config['total_rows']=$this->logs_model->getCount($user_id);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		//echo $config['total_rows'];
		$data['list_link'] = $this->pagination->create_links(); 		
		$data['lstLog'] = $this->logs_model->get($config['per_page'],$row,$user_id);
		$this->load->view('hoivien/tienthuong_view',$data);*/
	}	
	public function log($type='',$row=0){						
		//input data
		$user_id=$this->session->userdata('user_id');
		if($user_id == ''){redirect('admin/login');}
		$from_date = $this->input->post('txtfromdate');
		$to_date = $this->input->post('txttodate');
		
		//pagging
		include('paging.php');
		$config['base_url']= base_url()."/hoiviens/log/";
		$config['total_rows']=$this->logs_model->getCount($user_id,$type);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();		
		
		//transfer data
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$data['log_type'] = $this->common->getObject($type);		 		
		$data['lstLog'] = $this->logs_model->get($config['per_page'],$row,$user_id,$data['log_type'],$from_date,$to_date);
		
		//load view
		$this->load->view('hoivien/tienthuong_view',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */