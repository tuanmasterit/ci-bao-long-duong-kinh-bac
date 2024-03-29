<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xulyquydoi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('yeucauquydoi_model');
		$this->load->model('logs_model');
		$this->load->model('User_model');
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
		$config['total_rows']=$this->yeucauquydoi_model->getCount($status,$from_date,$to_date);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();		
		
		//transfer data
		$data['status'] = $status;
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;		 		
		$data['lstQuydoi'] = $this->yeucauquydoi_model->get($config['per_page'],$row,$status,$from_date,$to_date);
		
		//load view
		$this->load->view('back_end/xulyquydoi_view',$data);
	}	
	
	public function duyet()
	{		
		//input data
		$id = $this->input->get('id');
		$user_id = $this->input->get('user_id');
		$user_pr=$this->session->userdata('user_id');
		
		if($id!='')
		{
			$vcoin=$this->yeucauquydoi_model->getvcoinById($id);
			if($vcoin>0)
			{
			$this->User_model->TruDiemTK_Hethong($user_id,$vcoin);
			$this->yeucauquydoi_model->updateStatus($id,$this->common->getStatus('duyet'));
			$this->logs_model->add($user_id,$this->common->getObject('quydoi'),'Quy đổi',date('Y-m-d h-i-s'),$vcoin,$user_pr,$this->common->getStatus('duyet'));
			}
		}
		redirect('admin/xulyquydoi');
	}
	public function tralai()
	{		
		//input data
		$id = $this->input->get('id');
		$user_id = $this->input->get('user_id');
		$user_pr=$this->session->userdata('user_id');
		if($id!='')
		{
			$vcoin=$this->yeucauquydoi_model->getById($id)->vcoin;
			$this->yeucauquydoi_model->updateStatus($id,$this->common->getStatus('tralai'));
			$this->logs_model->add($user_id,$this->common->getObject('quydoi'),'Quy đổi',date('Y-m-d h-i-s'),$vcoin,$user_pr,$this->common->getStatus('tralai'));
		}
		redirect('admin/xulyquydoi');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */