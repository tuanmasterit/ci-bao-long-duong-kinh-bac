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
            date_default_timezone_set('Asia/Ho_Chi_Minh');
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
			
			$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
			$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
			$data['list_sp_noibat'] = $list_sp_noibat;
						
			//Giới thiệu
			$gioithieu_id = $this->Term_model->getCategoryByName('Giới thiệu');
			$data['gioithieu_id'] = $gioithieu_id;
			$data['lst_gioi_thieu'] = $this->Term_model->getSubCatProNav($gioithieu_id,'category');
			
			//Tin tức
			$tintuc_id = $this->Term_model->getCategoryByName('Tin tức');
			$data['tintuc_id'] = $tintuc_id;
			$data['lst_tin_tuc'] = $this->Term_model->getSubCatProNav($tintuc_id,'category');
			
			//Y tế sức khoẻ
			$y_te_id = $this->Term_model->getCategoryByName('Y tế sức khỏe');
			$data['y_te_id'] = $y_te_id;
			$data['lst_y_te'] = $this->Term_model->getSubCatProNav($y_te_id,'category');
			
			//Tư vấn khám bệnh
			$tu_van_id = $this->Term_model->getCategoryByName('Tư vấn khám bệnh');
			$data['tu_van_id'] = $tu_van_id;
			$data['lst_tu_van'] = $this->Term_model->getSubCatProNav($tu_van_id,'category');
			
			//Sách
			$sach_id = $this->Term_model->getCategoryByName('Sách');
			$data['sach_id'] = $sach_id;
			$data['lst_sach'] = $this->Term_model->get(0,0,0,'book_cat',0);
			
			//Truyện ngắn
			$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
			$data['truyen_ngan_id'] = $truyen_ngan_id;
			
			//Báo tường
			$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
			$data['bao_tuong_id'] = $bao_tuong_id;
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
				
							
				//Giới thiệu
				$gioithieu_id = $this->Term_model->getCategoryByName('Giới thiệu');
				$data['gioithieu_id'] = $gioithieu_id;
				$data['lst_gioi_thieu'] = $this->Term_model->getSubCatProNav($gioithieu_id,'category');
				
				//Tin tức
				$tintuc_id = $this->Term_model->getCategoryByName('Tin tức');
				$data['tintuc_id'] = $tintuc_id;
				$data['lst_tin_tuc'] = $this->Term_model->getSubCatProNav($tintuc_id,'category');
				
				//Y tế sức khoẻ
				$y_te_id = $this->Term_model->getCategoryByName('Y tế sức khỏe');
				$data['y_te_id'] = $y_te_id;
				$data['lst_y_te'] = $this->Term_model->getSubCatProNav($y_te_id,'category');
				
				//Tư vấn khám bệnh
				$tu_van_id = $this->Term_model->getCategoryByName('Tư vấn khám bệnh');
				$data['tu_van_id'] = $tu_van_id;
				$data['lst_tu_van'] = $this->Term_model->getSubCatProNav($tu_van_id,'category');
				
				//Sách
				$sach_id = $this->Term_model->getCategoryByName('Sách');
				$data['sach_id'] = $sach_id;
				$data['lst_sach'] = $this->Term_model->get(0,0,0,'book_cat',0);
				
				//Truyện ngắn
				$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
				$data['truyen_ngan_id'] = $truyen_ngan_id;
				
				//Báo tường
				$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
				$data['bao_tuong_id'] = $bao_tuong_id;
				
				$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
				$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
				$data['list_sp_noibat'] = $list_sp_noibat;
				
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
				
							
				//Giới thiệu
				$gioithieu_id = $this->Term_model->getCategoryByName('Giới thiệu');
				$data['gioithieu_id'] = $gioithieu_id;
				$data['lst_gioi_thieu'] = $this->Term_model->getSubCatProNav($gioithieu_id,'category');
				
				//Tin tức
				$tintuc_id = $this->Term_model->getCategoryByName('Tin tức');
				$data['tintuc_id'] = $tintuc_id;
				$data['lst_tin_tuc'] = $this->Term_model->getSubCatProNav($tintuc_id,'category');
				
				//Y tế sức khoẻ
				$y_te_id = $this->Term_model->getCategoryByName('Y tế sức khỏe');
				$data['y_te_id'] = $y_te_id;
				$data['lst_y_te'] = $this->Term_model->getSubCatProNav($y_te_id,'category');
				
				//Tư vấn khám bệnh
				$tu_van_id = $this->Term_model->getCategoryByName('Tư vấn khám bệnh');
				$data['tu_van_id'] = $tu_van_id;
				$data['lst_tu_van'] = $this->Term_model->getSubCatProNav($tu_van_id,'category');
				
				//Sách
				$sach_id = $this->Term_model->getCategoryByName('Sách');
				$data['sach_id'] = $sach_id;
				$data['lst_sach'] = $this->Term_model->get(0,0,0,'book_cat',0);
				
				//Truyện ngắn
				$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
				$data['truyen_ngan_id'] = $truyen_ngan_id;
				
				//Báo tường
				$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
				$data['bao_tuong_id'] = $bao_tuong_id;
				
				include('paging.php');
				$config['per_page'] = 15;
				$config['base_url']= base_url()."/news/cat/".$id.'/';
				$listPro = $this->Post_model->get(0,'post',0,0,'DESC','post_date',$id);
				$config['total_rows']= count($listPro);
				$config['cur_page']= $row;
				$this->pagination->initialize($config);
				$data['list_link'] = $this->pagination->create_links();
				
				$data['lstNews'] = $this->Post_model->get(0,'post',$config['per_page'],$row,'DESC','post_date',$id);				
				$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
				$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
				$data['list_sp_noibat'] = $list_sp_noibat;
				
				//Sản phẩm	
				$data['cat'] = $cat;
				
				$data['main'] = 'front_end/view_news_cat';
				$this->load->view('front_end/template_2',$data);	
			}		
		}
	}
?>