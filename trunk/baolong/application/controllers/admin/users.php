<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
    }
    
	public function index()
	{
		$data['lstthanhvien'] = $this->User_model->get(0,10,0,'thanhvien');
		$this->load->view('back_end/view_users',$data);
	}
	
	public function add()
	{
		if($this->input->post('txtname'))
		{
			$user_login = $this->input->post('txtname');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');
			$user_regitered = date('Y-m-d h-i-s');
			$display_name = $this->input->post('txtdisplay');
			$meta_value = 'thanhvien';
			
			$this->User_model->add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$meta_value);
			$this-> session-> set_flashdata('message','Thêm thành viên thành công!');			
			redirect('admin/users','refresh');	
		}
		else 
		{
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/users','refresh');
		}
	}
	
	public function edit($id=0)
	{
		if($this->input->post('txtnicename'))
		{
			$user_id = $this->input->post('id');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');			
			$display_name = $this->input->post('txtdisplay');
			
			$this->User_model->edit($user_id,$user_nicename,$user_email,$display_name);
			redirect('admin/users','refresh');
		}
		else 
		{
			$data['user'] = $this->User_model->get($id,0,0,'thanhvien');
			$data['lstthanhvien'] = $this->User_model->get(0,10,0,'thanhvien');
			$this->load->view('back_end/view_users',$data);
		}
	}
	
	public function delete()
	{
		$param = $this->input->post('param');		
		$this->User_model->delete($param);		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */