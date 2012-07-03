<?php 
	class News extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Post_model');
			$this->load->model('User_model');
			$this->load->library('pagination');	
			$this->load->model('Term_model');
		}
		
		public function index($row=0)
		{
			$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc';
			
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
			include('paging.php');
			$config['base_url']= base_url()."/news/index/";
			$config['per_page']=15;
			$listPost = $this->Post_model->get(0,'post',0,0,'DESC', 'post_date', '');
			$config['total_rows']= count($listPost);
			$config['cur_page']= $row;
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();
			$data['lstNews'] = $this->Post_model->get(0,'post',$config['per_page'],$row,'DESC','post_date','');
			
			$data['main'] = 'front_end/view_news';
			$this->load->view('front_end/template_2',$data);
		}
		
		public function detail($id)
		{
			$id = $this->uri->segment(3);
			$news_detail = $this->Post_model->get($id, 'post', 0, 0);
			if(!count($news_detail))
			{
				redirect('welcome/news');				
			}
			else
			{
				$data['title']='Công ty Bảo Long Đường Kinh Bắc| Tin tức';
				$term_taxonomy_id = $this->Post_model->get_categories_of_post($id);	
		
				$cat = $this->Term_model->getCategoryByTaxonomyID($term_taxonomy_id[0]->term_taxonomy_id,'category');
				$data['check_exit']=true;
				if($cat->parent ==0)
				{
					$data['is_parent'] = true;
				}
				else  
				{
					$data['is_parent'] = false;
					$data['parentCat'] = $this->Term_model->get($cat->parent,0,0,'category');
				}
				
						
				//Navigation
				$data['listCatNav'] = $this->Term_model->getCatProNav();
				$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
				
				$data['news_detail'] = $news_detail[0];
				$data['cat'] = $cat;
				$data['listRelation'] = $this->Post_model->getRelationProducts($id,3,'post','DESC','post_date');
				$data['main'] = 'front_end/view_news_detail';
				$this->load->view('front_end/template_2', $data);
			}
		}
		
		public function cat($id,$row=0)
		{
			$id = $this->uri->segment(3);		
			$cat = $this->Term_model->get($id,0,0,'category');
			if(!count($cat))
			{
				redirect('news/index','refresh');
			}
			else 
			{
				if($cat['parent'] ==0)
				{
					$data['is_parent'] = true;
				}
				else  
				{
					$data['is_parent'] = false;
					$data['parentCat'] = $this->Term_model->get($cat['parent'],0,0,'category');
				}
				
				$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc |'.$cat['name'];
				
						
				//Navigation
				$data['listCatNav'] = $this->Term_model->getCatProNav();
				$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
				
				include('paging.php');
				$config['per_page'] = 15;
				$config['base_url']= base_url()."/news/cat/".$id.'/';
				$listPro = $this->Post_model->get(0,'post',0,0,'DESC','post_date',$id);
				$config['total_rows']= count($listPro);
				$config['cur_page']= $row;
				$this->pagination->initialize($config);
				$data['list_link'] = $this->pagination->create_links();
				
				$data['lstNews'] = $this->Post_model->get(0,'post',$config['per_page'],$row,'DESC','post_date',$id);				
				
				//Sản phẩm	
				$data['cat'] = $cat;
				
				$data['main'] = 'front_end/view_news_cat';
				$this->load->view('front_end/template_2',$data);	
			}		
		}
	}
?>