<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xulynaptien extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('yeucaunaptien_model');
		$this->load->model('logs_model');
		$this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index($status='',$row=0)
	{		
		//input data
		$user_id=$this->session->userdata('user_id');
		if($user_id == ''){redirect('admin/login');}
		$from_date = $this->input->post('txtfromdate');
		$to_date = $this->input->post('txttodate');
		$status = $this->input->post('status');
		
		//pagging
		include('paging.php');
		$config['base_url']= base_url()."/hoiviens/log/";
		$config['total_rows']=$this->yeucaunaptien_model->getCount($status,$from_date,$to_date);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();		
		
		//transfer data
		$data['status'] = $status;
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;		 		
		$data['lstQuydoi'] = $this->yeucaunaptien_model->get($config['per_page'],$row,$status,$from_date,$to_date);
		
		//load view
		$this->load->view('back_end/xulynaptien_view',$data);
	}	
	
	public function duyet()
	{		
		//input data
		$id = $this->input->get('id');
		$user_id = $this->input->get('user_id');
		$user_pr=$this->session->userdata('user_id');
		$v=$this->input->get('v');
		if($id!='')
		{
			$this->yeucaunaptien_model->updateStatus($id,$this->common->getStatus('duyet'),$v,$user_id);
			$this->logs_model->add($user_id,$this->common->getObject('naptien'),'Nạp tiền',date('Y-m-d h-i-s'),$v." V",$user_pr,$this->common->getStatus('duyet'));
			
		}
		redirect('admin/xulynaptien');
	}
	public function tralai()
	{		
		//input data
		$id = $this->input->get('id');
		$user_id = $this->input->get('user_id');
		$user_pr=$this->session->userdata('user_id');
		$v=$this->input->get('v');
		if($id!='')
		{
			$this->yeucaunaptien_model->updateStatus($id,$this->common->getStatus('tralai'),'','');
			$this->logs_model->add($user_id,$this->common->getObject('naptien'),'Nạp tiền',date('Y-m-d h-i-s'),$v." V",$user_pr,$this->common->getStatus('tralai'));
		}
		redirect('admin/xulynaptien');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */