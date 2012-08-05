<?php 
	class Thongtin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if($this->session->userdata('logged_in') != 1){
				redirect('welcome');
			}
            date_default_timezone_set('Asia/Ho_Chi_Minh');	
		}

		public function index(){
			$user_id = $this->session->userdata('user_id');
			$data['banner'] = $this->Option_model->getOption('banner',$user_id);
			$data['support'] = $this->Option_model->getOption('support',$user_id);
			$data['footer'] = $this->Option_model->getOption('footer',$user_id);
			$data['gioithieu'] = $this->Option_model->getOption('gioithieu',$user_id);
			$data['lienhe'] = $this->Option_model->getOption('lienhe',$user_id);
						
			$this->load->view('hoivien/view_thongtin',$data);
		}
		public function save(){
			//input data
			$banner = $this->input->post('hdfbanner');
			$support = $this->input->post('txtsupport');
			$footer = $this->input->post('txtfooter');
			$gioithieu = $this->input->post('txtgioithieu');
			$lienhe = $this->input->post('txtlienhe');
			$user_id = $this->session->userdata('user_id');
			//save data
			$this->Option_model->update($user_id,'banner',$banner);
			$this->Option_model->update($user_id,'support',$support);
			$this->Option_model->update($user_id,'footer',$footer);
			$this->Option_model->update($user_id,'gioithieu',$gioithieu);
			$this->Option_model->update($user_id,'lienhe',$lienhe);
			
			redirect('hoivien/thongtin');
		}
	}
?>