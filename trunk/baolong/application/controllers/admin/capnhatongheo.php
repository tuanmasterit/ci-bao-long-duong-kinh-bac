<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class capnhatongheo extends CI_Controller {
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
		//load view
		$money = $this->input->post('txtMoney');
		$usn = $this->input->post('txtUsername');
		$type=$this->input->post('type');
		$_SESSION['message']='';
		if($money!='' && $usn!='')
		{
			if(!is_numeric($money))
			{
				$_SESSION['message']='Số tiền không hợp lệ.';
			}
			else
			{
				$uid=$this->User_model->getByUsername($usn);
				if($uid<1)
				{
					$_SESSION['message']='Tài khoản không tồn tại.';
				}
				else
				{
					$refusn=$this->User_model->get_usermeta($uid,'parent');
					if($refusn!='')
					{
						$refid=$this->User_model->getByUsername($refusn);
						$c30=(($money/100)*30)/100;
						$this->User_model->ThemDiemTK_Ongheo($refid,$c30);
						$c100=$money/100;
						$this->User_model->TruDiemTK_Gianhang($uid,$c100);
						$_SESSION['message']='Cập nhật thành công.';
					}
				}
			}

		}
		else
		{
			if($type!='')
			{
				$_SESSION['message']='Giá trị nhập vào không hợp lệ.';
			}
		}
	
		$this->load->view('back_end/capnhatongheo_view');
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */