<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('Post_model');
		$this->load->model('Author_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
		$this->load->model('User_model');
    }
	public function delete()
	{		
		$param = $this->input->post('param');
		$this->Post_model->delete_post($param);
		redirect('admin/posts/lists/post');										
	}
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index()
	{
		redirect('admin/posts/lists/post');			
	}
	public function lists($post_type='post',$gianhang=0,$term=0,$row=0)
	{
		// Get post type
		$data['post_type'] = $post_type;
		if($this->input->post('hdfposttype') != ''){
			$data['post_type'] = $this->input->post('hdfposttype');	
		}
		$data['gianhang'] = $gianhang;
		if($this->input->post('ddlGianHang'))
		{
			$data['gianhang'] = $this->input->post('ddlGianHang');
		}
		// Get category
		$data['category'] = $term;
		if($this->input->post('slcategory') != ''){
			$data['category'] = $this->input->post('slcategory');
		}
		//paging
		include('paging.php');			
		$config['base_url']= base_url()."/admin/posts/lists/".$post_type.'/'.$data['gianhang']."/".$data['category']."/";
		$lstPosts = $this->Post_model->get(0,$data['post_type'],0,0,'DESC','post_date',$data['category'],$data['gianhang']);
		$config['total_rows']= count($lstPosts);		
		$config['cur_page']= $row;		
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();	
		//data tranfer
		$data['lstPosts'] = $this->Post_model->get(0,$data['post_type'],$config['per_page'],$row,'DESC','post_date',$data['category'],$data['gianhang']);
		$data['lstCategories'] = $this->Term_model->get(0,0,0,'category',$data['gianhang']);
		$data['post_type'] = $post_type;
		$data['lstHoiVien'] = $this->User_model->get(0,0,0,'hoivien');
		$this->load->view('back_end/listposts_view',$data);
	}
	//------------------------------------------------------------------------
	//-- Add post
	//-- Param: $post_type
	//------------------------------------------------------------------------
	public function add($post_type)
	{						
		$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
		$data['lstCategories'] = $this->Term_model->getCatProNav('category');
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
		$username =  $this->session->userdata('username');		
		$l_butdanh = $this->User_model->getByUsername($username);		
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
		redirect('admin/posts/add/'.$l_post_type);									
	}
	//------------------------------------------------------------------------
	//-- Update post
	//------------------------------------------------------------------------ 
	public function update(){		
		$l_id = $this->input->post('post_id');
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		//$l_butdanh = $this->input->post('cbxbutdanh');
		$gianhang = $this->input->post('hdfgianhang');		
		$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		//Insert posts			
		if($this->Post_model->update($l_id,$gianhang,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories)){
			redirect('admin/posts/lists/'.$l_post_type);							
		}		
		redirect('admin/posts/add/'.$l_post_type);
	}
	public function edit($post_type='post', $id,$gianhang=0){
		
		$post_type = $this->uri->segment(4);
		$data['post_type'] = $post_type;
		//$data['lstbutdanh'] = $this->Author_model->get(0,100,0);
		$data['lstCategories'] = $this->Term_model->getCatProNav('category',$gianhang);
		$data['gianhang'] = $gianhang;
		$data['Post'] = $this->Post_model->get($id,$post_type);
		
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