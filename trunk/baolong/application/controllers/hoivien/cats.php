<?php 
	class Cats extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
			}
			$this->load->model('Term_model');
			$this->load->model('User_model');
			$this->load->library('pagination');	
            date_default_timezone_set('Asia/Ho_Chi_Minh');	
		}

		public function index($row=0){
			$username =  $this->session->userdata('username');		
			$hoivien_id = $this->User_model->getByUsername($username);	
			include('paging.php');
			$config['base_url']= base_url()."/hoivien/cats/index/";
			$config['per_page']=10;
			$config['total_rows']=$this->Term_model->getCount('catpro',$hoivien_id);
			$config['cur_page']= $row;
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();
			$data['lstCategories'] = $this->Term_model->get(0,$config['per_page'],$row,'catpro',$hoivien_id);
			$data['Categories'] = $this->Term_model->get(0,0,0,'catpro',$hoivien_id);
			$this->load->view('hoivien/cats_view',$data);	
		}
		
		public function save_categories()
		{
			if($this->input->post('txttitle'))
			{
				$username =  $this->session->userdata('username');		
				$hoivien_id = $this->User_model->getByUsername($username);	
				$name = $this->input->post('txttitle');
				$slug = $this->input->post('txtslug');
				$taxonomy = 'catpro';
				$description = $this->input->post('txtexcerpt');
				$parent = $this->input->post('select');
				$this->Term_model->add($name,$slug,$taxonomy,$description,$parent,$hoivien_id);			
				$this-> session-> set_flashdata('message','Category created');			
				redirect('hoivien/cats','refresh');				
			}
			else {
				$this-> session-> set_flashdata('message','Lỗi!');
				redirect('hoivien/cats','refresh');
			}
		}
		//delete ajax
		public function delete()
		{		
			$param = $this->input->post('param');		
			$this->Term_model->delete($param);			
		}		
		
		function edit($id=0,$row=0)
		{	
			//echo $id;			
			$name = $this->input->post('txttitle');
			$slug = $this->input->post('txtslug');		
			$description = $this->input->post('txtexcerpt');
			$parent = $this->input->post('select');
			if ($this-> input-> post('txttitle')){
				$id=$this->input->post('term_id');
				$this-> Term_model-> update($id,$name,$slug,$description,$parent);
				$this-> session-> set_flashdata('message','Category updated');
				redirect('hoivien/cats','refresh');
			}else{
				$username =  $this->session->userdata('username');		
				$hoivien_id = $this->User_model->getByUsername($username);
				include('paging.php');
				$config['base_url']= base_url()."/hoivien/cats/edit/".$id."/";
				$config['total_rows']=$this->Term_model->getCount('catpro',$hoivien_id);				
				$config['cur_page']= $row;				
				$this->pagination->initialize($config);
				$data['list_link'] = $this->pagination->create_links();
				$data['lstCategories'] = $this->Term_model->get(0,$config['per_page'],$row,'catpro',$hoivien_id);
				$data['Categories'] = $this->Term_model->get(0,0,0,'catpro',$hoivien_id);
				
				$data['category'] = $this->Term_model->get($id,0,0,'catpro');		
				
				
				//$this->load->vars($data);
				$this->load->view('hoivien/cats_view',$data);	
			}
		}
	}
?>