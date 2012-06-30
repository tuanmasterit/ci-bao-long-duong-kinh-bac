<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('Term_model');
		$this->load->library('pagination');		
    }
	
	public function index($row=0){
		$config['base_url']= base_url()."/admin/categories/index/";
		$config['total_rows']=$this->Term_model->getCount('category');
		$config['per_page']='10';
		$config['cur_page']= $row;
		$config['num_links'] = 5;
		$config['full_tag_open'] = "<div id='dyntable_paginate' class='dataTables_paginate paging_full_numbers'>";
		$config['full_tag_close'] = "</div>";
		$config['first_link'] = 'First';
		$config['first_tag_open'] = "<span id='dyntable_first' class='first paginate_button paginate_button_disabled'>";
		$config['first_tag_close'] = "</span>";
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = "<span id='dyntable_last' class='last paginate_button'>";
		$config['last_tag_close'] = "</span>";
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = "<span id='dyntable_next' class='next paginate_button'>";
		$config['next_tag_close'] = "</span>";
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = "<span id='dyntable_previous' class='previous paginate_button paginate_button_disabled'>";
		$config['prev_tag_close'] = "</span>";
		$config['num_tag_open'] = "<span class='paginate_button'>";
		$config['num_tag_close'] = "</span>";
		$config['cur_tag_open'] = "<span class='paginate_active'>";
		$config['cur_tag_close'] = "</span>";
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		$data['lstCategories'] = $this->Term_model->get(0,$config['per_page'],$row,'category');
		$data['Categories'] = $this->Term_model->get(0,100,0,'category');
		$data['abc'] = 'fsfjs;ấ';
		$this->load->view('back_end/categories_view',$data);	
	}
	
	public function save_categories()
	{
		if($this->input->post('txttitle'))
		{
			$name = $this->input->post('txttitle');
			$slug = $this->input->post('txtslug');
			$taxonomy = 'category';
			$description = $this->input->post('txtexcerpt');
			$parent = $this->input->post('select');
			$this->Term_model->addTerm($name,$slug,$taxonomy,$description,$parent);			
			$this-> session-> set_flashdata('message','Category created');			
			redirect('admin/categories','refresh');				
		}
		else {
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/categories','refresh');
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
			$this-> Term_model-> updateCategory($id,$name,$slug,$description,$parent);
			$this-> session-> set_flashdata('message','Category updated');
			redirect('admin/categories','refresh');
		}else{
			$config['base_url']= base_url()."/admin/categories/edit/".$id."/";
			$config['total_rows']=$this->Term_model->getCount('category');
			$config['per_page']='10';
			$config['cur_page']= $row;
			$config['num_links'] = 5;
			$config['full_tag_open'] = "<div id='dyntable_paginate' class='dataTables_paginate paging_full_numbers'>";
			$config['full_tag_close'] = "</div>";
			$config['first_link'] = 'First';
			$config['first_tag_open'] = "<span id='dyntable_first' class='first paginate_button paginate_button_disabled'>";
			$config['first_tag_close'] = "</span>";
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = "<span id='dyntable_last' class='last paginate_button'>";
			$config['last_tag_close'] = "</span>";
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = "<span id='dyntable_next' class='next paginate_button'>";
			$config['next_tag_close'] = "</span>";
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = "<span id='dyntable_previous' class='previous paginate_button paginate_button_disabled'>";
			$config['prev_tag_close'] = "</span>";
			$config['num_tag_open'] = "<span class='paginate_button'>";
			$config['num_tag_close'] = "</span>";
			$config['cur_tag_open'] = "<span class='paginate_active'>";
			$config['cur_tag_close'] = "</span>";
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();
			$data['lstCategories'] = $this->Term_model->get(0,$config['per_page'],$row,'category');
			$data['category'] = $this->Term_model->get($id,0,0,'category');		
			
			$data['Categories'] = $this->Term_model->get(0,100,0,'category');
			//$this->load->vars($data);
			$this->load->view('back_end/categories_view',$data);	
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */