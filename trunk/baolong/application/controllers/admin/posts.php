<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/dashboard/login');
		}
		$this->load->model('Post_model');
		$this->load->model('Author_model');
    }
	public function delete()
	{		
			$this->Post_model->delete_post($param);								
	}
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index()
	{
		redirect('admin/posts/lists/post');			
	}
	public function lists($post_type)
	{
		$data['lstPosts'] = $this->Post_model->list_posts($post_type,10,0);
		$this->load->view('back_end/listposts_view',$data);				
	}
	//------------------------------------------------------------------------
	//-- Add post
	//-- Param: $post_type
	//------------------------------------------------------------------------
	public function add($post_type)
	{						
		$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
		$data['lstCategories'] = $this->Post_model->list_categories(100,0);
		$data['post_type'] = $post_type;		
		$this->load->view('back_end/view_add_post',$data);
	}
	//------------------------------------------------------------------------
	//-- Get Parameter
	//------------------------------------------------------------------------ 
	public function save_add(){
		$flag=false;		
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		$l_butdanh = $this->input->post('cbxbutdanh');		
		$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		if($flag==false){			
			//Insert posts			
			$last_id = $this->Post_model->add($l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_post_type,$l_featured_image,$l_arr_categories);
			if($last_id > 0){
				redirect('admin/posts/lists/post');							
			}
		}
		redirect('admin/posst/add/'.$l_post_type);									
	}
	//------------------------------------------------------------------------
	//-- Update post
	//------------------------------------------------------------------------ 
	public function update(){		
		$l_id = $this->input->post('post_id');
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		$l_butdanh = $this->input->post('cbxbutdanh');		
		$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		//Insert posts			
		if($this->Post_model->update($l_id,$l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories)){
			redirect('admin/posts/lists/post');							
		}		
		redirect('admin/posst/add/'.$l_post_type);
	}
	public function edit($id){
		$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
		$data['lstCategories'] = $this->Post_model->list_categories(100,0);
		$data['Post'] = $this->Post_model->get_post($id);
		$data['featured_image'] = $this->Post_model->get_featured_image($id);
		$data['categories_of_post'] = $this->Post_model->get_categories_of_post($id);
		$this->load->view('back_end/view_edit_post',$data);	
	}
	public function categories(){
		$data['lstCategories'] = $this->Post_model->list_categories(10,0);
		$data['Categories'] = $this->Post_model->list_categories(100,0);
		$this->load->view('back_end/categories_view',$data);	
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */