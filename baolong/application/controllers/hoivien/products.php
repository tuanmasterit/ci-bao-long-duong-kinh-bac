<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
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
		redirect('hoivien/products/');								
	}
	//------------------------------------------------------------------------
	//-- Function default: List posts by post_type
	//------------------------------------------------------------------------ 
	public function index($term=0,$row=0)
	{
		// Get category
		$username =  $this->session->userdata('username');		
		$hoivien_id = $this->User_model->getByUsername($username);	
		$data['category'] = $term;
		if($this->input->post('slcategory') != ''){
			$data['category'] = $this->input->post('slcategory');
		}
		//paging
		include('paging.php');
		$config['per_page'] = 10;
		$config['base_url']= base_url()."/hoivien/products/index/".$data['category']."/";
		$listPro = $this->Post_model->get(0,'product',0,0,'DESC','post_date',$data['category'],$hoivien_id);
		$config['total_rows']= count($listPro);
		$config['cur_page']= $row;
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		$data['lstPosts'] = $this->Post_model->get(0,'product',$config['per_page'],$row,'DESC','post_date',$data['category'],$hoivien_id);
		$data['lstCategories'] = $this->Term_model->get(0,0,0,'catpro',$hoivien_id);
		$this->load->view('hoivien/product_view',$data);		
	}
	
	//------------------------------------------------------------------------
	//-- Add post
	//-- Param: $post_type
	//------------------------------------------------------------------------
	public function add()
	{		
		$username =  $this->session->userdata('username');		
		$hoivien_id = $this->User_model->getByUsername($username);		
		$data['lstCategories'] = $this->Term_model->getCatProNav('catpro',$hoivien_id);
		$data['post_type'] = 'product';		
		$this->load->view('hoivien/view_add_product',$data);
	}
	//------------------------------------------------------------------------
	//-- Get Parameter
	//------------------------------------------------------------------------ 
	public function save_add(){
				
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');
		$username =  $this->session->userdata('username');		
		$l_butdanh = $this->User_model->getByUsername($username);		
		$l_post_type = 'product';
		$l_thitruong = $this->input->post('txtthitruong');
		$l_hoivien = $this->input->post('txthoivien');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');					
			//Insert posts		
		$lastID= $this->Post_model->add($l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_post_type,$l_featured_image,$l_arr_categories);	
		if($lastID >0)
		{
			//Insert Price			 
			$this->Post_model->addProductPrice($lastID,$l_thitruong,$l_hoivien);
		}
		redirect('hoivien/products/');									
	}
	//------------------------------------------------------------------------
	//-- Update post
	//------------------------------------------------------------------------ 
	public function update(){		
		$l_id = $this->input->post('post_id');
		$l_title = $this->input->post('txttitle');		
		$l_exerpt = $this->input->post('txtexcerpt');		
		$l_content = $this->input->post('txtcontent');		
		$username =  $this->session->userdata('username');		
		$l_butdanh = $this->User_model->getByUsername($username);
		$l_thitruong = $this->input->post('txtthitruong');
		$l_hoivien = $this->input->post('txthoivien');		
		//$l_post_type = $this->input->post('hdfposttype');
		$l_arr_categories = $this->input->post('cbcategory');
		$l_featured_image = $this->input->post('hdffeatured_image');
		//Insert posts			
		$this->Post_model->update($l_id,$l_butdanh,date('Y-m-d h-i-s'),$l_content,$l_title,$l_exerpt,$l_featured_image,$l_arr_categories,'catpro');
		$this->Post_model->updatePrice($l_id,$l_thitruong,$l_hoivien);
		redirect('hoivien/products/');			
		
	}
	public function edit($id){		
		$username =  $this->session->userdata('username');		
		$hoivien_id = $this->User_model->getByUsername($username);	
		$data['lstCategories'] = $this->Term_model->getCatProNav('catpro',$hoivien_id);
		$data['Post'] = $this->Post_model->get($id,'product');
		$data['featured_image'] = $this->Post_model->get_featured_image($id);
		$data['categories_of_post'] = $this->Post_model->get_categories_of_post($id);
		$this->load->view('hoivien/product_edit',$data);	
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */