<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Post_model');
		$this->load->model('Term_model');
    }
	public function index()
	{
		$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc';
		//Tin tức nổi bật
		$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
		$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
		$data['list_news'] = $list_news;		

		//Tin tức tiêu biểu
		$tieubieu_id = $this->Term_model->getCategoryByName('Tin tức tiêu biểu');
		$list_tieubieu  = $this->Post_model->get(0,'post',3,0,'DESC','post_date',$tieubieu_id);
		$data['list_tieubieu'] = $list_tieubieu;
				
		//Sản phẩm tiêu biểu
		$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
		$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
		$data['list_sp_noibat'] = $list_sp_noibat;
				
		//Navigation
		$data['listCatNav'] = $this->Term_model->getCatProNav();
		$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
		//Sản phẩm mặc định
		$firstTopCat = $this->Term_model->getCatProTopFirst();
		$data['listProduct'] = $this->Term_model->getListProduct($firstTopCat);
		$data['main'] = 'front_end/main_left_middle';
		$this->load->view('front_end/template',$data);
	}
	
	public function cat($id)
	{
		$cat_id = $this->uri->segment(3);		
		$cat = $this->Term_model->get($cat_id,0,0,'catpro');
		if(!count($cat))
		{
			redirect('welcome/index','refresh');
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
				$data['parentCat'] = $this->Term_model->get($cat['parent'],0,0,'catpro');
			}
			
			$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc |'.$cat['name'];
			//Tin tức nổi bật
			$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
			$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
			$data['list_news'] = $list_news;		
	
			//Tin tức tiêu biểu
			$tieubieu_id = $this->Term_model->getCategoryByName('Tin tức tiêu biểu');
			$list_tieubieu  = $this->Post_model->get(0,'post',3,0,'DESC','post_date',$tieubieu_id);
			$data['list_tieubieu'] = $list_tieubieu;
					
			//Sản phẩm tiêu biểu
			$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
			$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
			$data['list_sp_noibat'] = $list_sp_noibat;
					
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
			//Sản phẩm	
			$data['cat'] = $cat;
			$data['listProduct'] = $this->Term_model->getListProduct($cat_id);
			$data['main'] = 'front_end/category';
			$this->load->view('front_end/template',$data);	
		}		
	}
	
	public function product($id)
	{
		$pro_id = $this->uri->segment(3);				
		$product = $this->Post_model->get($pro_id,'product',0,0);		
		
		if(!count($product))
		{
			redirect('welcome/index','refresh');
		}
		else 
		{
			$term_taxonomy_id = $this->Post_model->get_categories_of_post($pro_id);	
		
			$cat = $this->Term_model->getCategoryByTaxonomyID($term_taxonomy_id[0]->term_taxonomy_id);
			if($cat->parent ==0)
			{
				$data['is_parent'] = true;
			}
			else  
			{
				$data['is_parent'] = false;
				$data['parentCat'] = $this->Term_model->get($cat->parent,0,0,'catpro');
			}
			
			$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc |'.$product[0]->post_title;
			//Tin tức nổi bật
			$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
			$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
			$data['list_news'] = $list_news;		
	
			//Tin tức tiêu biểu
			$tieubieu_id = $this->Term_model->getCategoryByName('Tin tức tiêu biểu');
			$list_tieubieu  = $this->Post_model->get(0,'post',3,0,'DESC','post_date',$tieubieu_id);
			$data['list_tieubieu'] = $list_tieubieu;
					
			//Sản phẩm tiêu biểu
			$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
			$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
			$data['list_sp_noibat'] = $list_sp_noibat;
					
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
			//
			$data['listProduct'] = $this->Post_model->getRelationProducts($pro_id,12,'product','DESC','post_date');
			//Sản phẩm	
			$data['cat'] = $cat;
			$data['product'] = $product[0];
			$data['main'] = 'front_end/product';
			
			$this->load->view('front_end/template',$data);	
		}	
	}
	
	function search()
	{
		if($this->input->post('txtKey'))
		{
			$key = $this->input->post('txtKey');
			$pro_id = $this->Post_model->getProductByName($key);
			
			
			
			if($pro_id==0)
			{
				$data['check_exit']=false;
				$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc |';
				//Tin tức nổi bật
				$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
				$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
				$data['list_news'] = $list_news;		
		
				//Tin tức tiêu biểu
				$tieubieu_id = $this->Term_model->getCategoryByName('Tin tức tiêu biểu');
				$list_tieubieu  = $this->Post_model->get(0,'post',3,0,'DESC','post_date',$tieubieu_id);
				$data['list_tieubieu'] = $list_tieubieu;
						
				//Sản phẩm tiêu biểu
				$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
				$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
				$data['list_sp_noibat'] = $list_sp_noibat;
						
				//Navigation
				$data['listCatNav'] = $this->Term_model->getCatProNav();				
				$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
				$data['main'] = 'front_end/search_result';
				
				$this->load->view('front_end/template',$data);
			}
			elseif($pro_id>0) 
			{
				$product = $this->Post_model->get($pro_id,'product',0,0);
				$term_taxonomy_id = $this->Post_model->get_categories_of_post($pro_id);	
		
				$cat = $this->Term_model->getCategoryByTaxonomyID($term_taxonomy_id[0]->term_taxonomy_id);
				$data['check_exit']=true;
				if($cat->parent ==0)
				{
					$data['is_parent'] = true;
				}
				else  
				{
					$data['is_parent'] = false;
					$data['parentCat'] = $this->Term_model->get($cat->parent,0,0,'catpro');
				}
				
				$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc |'.$product[0]->post_title;
				//Tin tức nổi bật
				$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
				$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
				$data['list_news'] = $list_news;		
		
				//Tin tức tiêu biểu
				$tieubieu_id = $this->Term_model->getCategoryByName('Tin tức tiêu biểu');
				$list_tieubieu  = $this->Post_model->get(0,'post',3,0,'DESC','post_date',$tieubieu_id);
				$data['list_tieubieu'] = $list_tieubieu;
						
				//Sản phẩm tiêu biểu
				$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
				$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
				$data['list_sp_noibat'] = $list_sp_noibat;
						
				//Navigation
				$data['listCatNav'] = $this->Term_model->getCatProNav();
				$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
				//
				$data['listProduct'] = $this->Post_model->getRelationProducts($pro_id,12,'product','DESC','post_date');
				//Sản phẩm	
				$data['cat'] = $cat;
				$data['product'] = $product[0];
				$data['main'] = 'front_end/search_result';
				
				$this->load->view('front_end/template',$data);
			}
		}
		else
		{
			redirect('welcome/index');
		}
	}
}