<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->library('pagination');
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('Term_model');
		$this->load->model('User_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
							 		
    }
	public function delete()
	{		
		$param = $this->input->post('param');
		$this->Post_model->delete_post($param);
		redirect('admin/books/');								
	}
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index($term=0,$row=0)
	{
		// Get category
		
		$hoivien_id = 0;	
		$data['category'] = $term;
		if($this->input->post('slcategory') != ''){
			$data['category'] = $this->input->post('slcategory');
		}
		//paging
		include('paging.php');
		$config['per_page'] = 10;
		$config['base_url']= base_url()."/admin/books/index/".$data['category']."/";
		$listPro = $this->Post_model->get(0,'book',0,0,'DESC','post_date',$data['category'],$hoivien_id);
		$config['total_rows']= count($listPro);
		$config['cur_page']= $row;
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		$data['lstPosts'] = $this->Post_model->get(0,'book',$config['per_page'],$row,'DESC','post_date',$data['category'],$hoivien_id);
		$data['lstCategories'] = $this->Term_model->get(0,0,0,'book_cat',$hoivien_id);
		$this->load->view('back_end/book_view',$data);		
	}
	
	//------------------------------------------------------------------------
	//-- Add post
	//-- Param: $post_type
	//------------------------------------------------------------------------
	public function add()
	{		
			
		$hoivien_id = 0;		
		$data['lstCategories'] = $this->Term_model->getCatProNav('book_cat',$hoivien_id);
		$data['post_type'] = 'book';		
		$this->load->view('back_end/view_add_book',$data);
	}
	//------------------------------------------------------------------------
	//-- Get Parameter
	//------------------------------------------------------------------------ 
	public function save_add(){
				
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = '';
		
		$l_butdanh = 0;		
		$l_post_type = 'book';
		
		
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');					
			//Insert posts		
		$lastID= $this->Post_model->add($l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_post_type,$l_featured_image,$l_arr_categories);	
		
		redirect('admin/books/');									
	}
	//------------------------------------------------------------------------
	//-- Update post
	//------------------------------------------------------------------------ 
	public function update(){		
		$l_id = $this->input->post('post_id');
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		
		$l_butdanh = 0;
		
				
		//$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		//Insert posts			
		$this->Post_model->update($l_id,$l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories,'book_cat');
		
		redirect('admin/books/');			
		
	}
	public function edit($id){		
		
		$hoivien_id = 0;
		$data['lstCategories'] = $this->Term_model->getCatProNav('book_cat',$hoivien_id);
		$data['Post'] = $this->Post_model->get($id,'book');
		$data['featured_image'] = $this->Post_model->get_featured_image($id);
		$data['categories_of_post'] = $this->Post_model->get_categories_of_post($id);
		$this->load->view('back_end/book_edit',$data);	
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */