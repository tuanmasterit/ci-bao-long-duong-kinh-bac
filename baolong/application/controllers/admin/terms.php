<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/dashboard/login');
		}
		$this->load->model('Term_model');		
    }
	
	public function index(){
		$data['lstCategories'] = $this->Term_model->list_categories(10,0);
		$data['Categories'] = $this->Term_model->list_categories(100,0);
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
			$parent = $this->input->post('butdanh');
			$this->Term_model->addCategory($name,$slug,$taxonomy,$description,$parent);			
			$this-> session-> set_flashdata('message','Category created');			
			redirect('admin/terms','refresh');				
		}
		else {
			$this-> session-> set_flashdata('message','Lỗi!');
			redirect('admin/terms','refresh');
		}
	}
	
	public function delete()
	{
		$method	= $this->input->post('method');
		$param = $this->input->post('param');		
		$this->Term_model->delete_term($param);
			
	}
	
	public function categories_delete($id)
	{
		$this-> Term_model-> deleteCategory($id);
		$this-> session-> set_flashdata('message','Category deleted');
		redirect('admin/terms','refresh');
	}
	
	function editCat($id=0)
	{
		
		$name = $this->input->post('txttitle');
		$slug = $this->input->post('txtslug');		
		$description = $this->input->post('txtexcerpt');
		$parent = $this->input->post('select');
		if ($this-> input-> post('txttitle')){
			$id=$this->input->post('term_id');
			$this-> Term_model-> updateCategory($id,$name,$slug,$description,$parent);
			$this-> session-> set_flashdata('message','Category updated');
			redirect('admin/terms','refresh');
		}else{
			$data['category'] = $this-> Term_model-> getCategory($id);
			$data['TermTaxonomy'] = $this->Term_model->getTermTaxonomy($id);
			$data['lstCategories'] = $this->Term_model->list_categories(10,0);
			$data['Categories'] = $this->Term_model->list_categories(100,0);
			$this->load->vars($data);
			$this->load->view('back_end/categories_edit');	
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */