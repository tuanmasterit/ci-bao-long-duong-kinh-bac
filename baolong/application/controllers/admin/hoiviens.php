<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoiviens extends CI_Controller {

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
		if($this->session->userdata('logged_in') == 1 && $this->session->userdata('user_activation_key') == 'administrator'){
			$this->load->model('User_model');
			$this->load->library('pagination');	
			date_default_timezone_set('Asia/Ho_Chi_Minh');				
		}else{redirect('admin/login');}		
    }
    
	public function index($row=0)
	{	
		include('paging.php');		
		$config['base_url']= base_url()."/admin/hoiviens/index/";
		$config['total_rows']=$this->User_model->getCount('hoivien');		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links(); 		
		$data['lstthanhvien'] = $this->User_model->get(0,$config['per_page'],$row,'hoivien');
		$this->load->view('back_end/hoivien_view',$data);
	}
	
	public function add()
	{
		if($this->input->post('txtname'))
		{
			
			$user_login = $this->input->post('txtname');
			$at=$this->User_model->getByUsername($user_login);
			if($at!=-10)
			redirect('admin/hoiviens','refresh');
			$user_pass = $this->input->post('txtPass');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');
			$user_regitered = date('Y-m-d h-i-s');
			$display_name = $this->input->post('txtdisplay');
			$meta_value = 'hoivien';
			$meta_references=$this->input->post('txtreference');
			$meta_chooseuser=$this->input->post('txtchoose');
			$sex=$this->input->post('sex');
			$cmt=$this->input->post('txtCMT');
			$dctt=$this->input->post('txtDCTT');
			$noio=$this->input->post('txtNoio');
			$phone=$this->input->post('txtPhone');
			$atm=$this->input->post('txtATM');
			$bank=$this->input->post('txtBank');
			$birthdate=$this->input->post('txtBirthDate');
			$meta_boothtitle=$this->input->post('txtboothtitle');
			$this->User_model->add($user_login,$user_nicename,$user_email,$user_regitered,$display_name,$meta_value,$meta_references,$meta_boothtitle,$meta_chooseuser,$sex,$cmt,$dctt,$noio,$phone,$atm,$bank,$birthdate,$user_pass);
			$this-> session-> set_flashdata('message','Thêm hội viên thành công!');			
			redirect('admin/hoiviens','refresh');	
		}
		else 
		{
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/hoiviens','refresh');
		}
	}
	
	public function edit($id=0,$row=0)
	{
		if($this->input->post('txtnicename'))
		{
			$user_id = $this->input->post('id');
			$user_nicename = $this->input->post('txtnicename');
			$user_email = $this->input->post('txtemail');			
			$display_name = $this->input->post('txtdisplay');
			
			$this->User_model->edit($user_id,$user_nicename,$user_email,$display_name);
			redirect('admin/hoiviens','refresh');
		}
		else 
		{
			include('paging.php');
			$config['base_url']= base_url()."/admin/hoiviens/edit/".$id."/";
			$config['total_rows']=$this->User_model->getCount('hoivien');
			$config['cur_page']= $row;
			
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links(); 		
			$data['lstthanhvien'] = $this->User_model->get(0,$config['per_page'],$row,'hoivien');
			$data['user'] = $this->User_model->get($id,0,0,'hoivien');			
			$this->load->view('back_end/hoivien_view',$data);
		}
	}
	
	public function delete()
	{
		$param = $this->input->post('param');		
		$this->User_model->delete($param);		
	}
	public function SearchUsername()
	{
		$param = $this->input->post('txtusername');
		$type = $this->input->post('type');		
		$html='<ul>';
		$lstUser =$this->User_model->searchByUsername($param);
		foreach($lstUser as $item){
		$username=$item ->user_login;
		$ct=$this->User_model->getCountByParent($item ->id);
		
			if($type=='ref')
			{
				
			$html .= '<li><a href="javascript:void(0)" id="'.$username.'" onclick="javascript:ChooseUserRef(this.id);">'.$username.'</a></li>'; 	
			}
			else
			{
				if($ct<2)
				{
					$html .= '<li><a href="javascript:void(0)" id="'.$username.'" onclick="javascript:ChooseUserCh(this.id);">'.$username.'--<span style="color:blue">'.$ct.'</span></a></li>'; 	
				}
				else
				{
					$html .= '<li><a href="javascript:void(0)" id="'.$username.'" onclick="javascript:void(0);">'.$username.'-- <span style="color:red">'.$ct.'</span></a></li>'; 
				}
			}
		}
		$html.='</ul>';
		echo $html;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */