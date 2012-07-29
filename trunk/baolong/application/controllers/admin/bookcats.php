<?php
	class Bookcats extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
			}
			$this->load->database();
			$this->load->model('Term_model');
			$this->load->model('User_model');
			$this->load->library('pagination');	
			date_default_timezone_set('Asia/Ho_Chi_Minh');			
		}
		
	public function index($row=0){
			$username =  $this->session->userdata('username');		
			$hoivien_id = $this->User_model->getByUsername($username);	
			include('paging.php');
			$config['base_url']= base_url()."/admin/bookcats/index/";
			$config['per_page']=10;
			$config['total_rows']=$this->Term_model->getCount('book_cat',0);
			$config['cur_page']= $row;
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();
			$data['lstCategories'] = $this->Term_model->get(0,$config['per_page'],$row,'book_cat',0);
			$data['Categories'] = $this->Term_model->get(0,0,0,'book_cat',0);
			$this->load->view('back_end/books_view',$data);	
		}
		
		public function save_categories()
		{
			if($this->input->post('txttitle'))
			{
				
				$name = $this->input->post('txttitle');
				$slug = $this->input->post('txtslug');
				$taxonomy = 'book_cat';
				$description = $this->input->post('txtexcerpt');
				$parent = 0;
				$this->Term_model->add($name,$slug,$taxonomy,$description,0);			
				$this-> session-> set_flashdata('message','Category created');			
				redirect('admin/bookcats','refresh');				
			}
			else {
				$this-> session-> set_flashdata('message','Lỗi!');
				redirect('admin/bookcats','refresh');
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
				redirect('admin/bookcats','refresh');
			}else{
					
				$hoivien_id = 0;
				include('paging.php');
				$config['base_url']= base_url()."/admin/books/edit/".$id."/";
				$config['total_rows']=$this->Term_model->getCount('book_cat',0);				
				$config['cur_page']= $row;				
				$this->pagination->initialize($config);
				$data['list_link'] = $this->pagination->create_links();
				$data['lstCategories'] = $this->Term_model->get(0,$config['per_page'],$row,'book_cat',0);
				$data['Categories'] = $this->Term_model->get(0,0,0,'book_cat',0);
				
				$data['category'] = $this->Term_model->get($id,0,0,'book_cat');		
				
				
				//$this->load->vars($data);
				$this->load->view('back_end/books_view',$data);	
			}
		}
	}
?>