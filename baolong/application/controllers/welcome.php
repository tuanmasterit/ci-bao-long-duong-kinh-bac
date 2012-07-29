<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Post_model');
		$this->load->model('Term_model');
		$this->load->library('pagination');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    } 
	public	function logout(){
		$userdata = array(
                   'username'  => '',
                   'logged_in' => FALSE
               );
		$this->session->set_userdata($userdata);
		$this->session->sess_destroy();
		redirect('welcome/index','refresh');
	}
	public function login()
	{
		$html='';
		if(!is_null($_REQUEST['txtUsername']) && !is_null($_REQUEST['txtPassword'])){
			$user_name =	$_REQUEST['txtUsername'];
			$password = $_REQUEST['txtPassword'];
			$this->load->model('User_model');
			if($this->User_model->authentication($user_name,$password)){
				$html.='<div class="lineinfo">';
				$html.=	'Xin chào:';
				$html.=	$this->session->userdata('display_name');
				$html.=	'</div>';
				$html.=	'<div class="lineinfo">';
				$html.=		'<a href="'.base_url().'hoivien" class="link">Trang quản trị</a>';
				$html.=	'</div>';
				$html.=	'<div class="lineinfo">';
				$html.=	'<a href="'.base_url().'welcome/logout" class="link">Đăng xuất</a>';
				$html.=	'</div>';
			}else{
				$html='';
			}
		}else{
			$html='';
		}	
		echo $html;	
	}
	public function index($row=0)
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
		$data['lst_sach'] = $this->Term_model->getSubCatProNav($sach_id,'category');
		
		//Truyện ngắn
		$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
		$data['truyen_ngan_id'] = $truyen_ngan_id;
		
		//Báo tường
		$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
		$data['bao_tuong_id'] = $bao_tuong_id;
				
		//Navigation
		$data['listCatNav'] = $this->Term_model->getCatProNav();
		$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
		//Sản phẩm mặc định
		$firstTopCat = $this->Term_model->getCatProTopFirst();
		$data['firstTopCat'] = $firstTopCat;
		//paging
		include('paging.php');
		$config['per_page'] = 32;
		$config['base_url']= base_url()."/welcome/index/";
		$listPro = $this->Post_model->get(0,'product',0,0,'DESC','post_date',$firstTopCat);
		$config['total_rows']= count($listPro);
		$config['cur_page']= $row;
		$this->pagination->initialize($config);
		$data['list_link'] = $this->pagination->create_links();
		
		$data['listProduct'] = $this->Post_model->get(0,'product',$config['per_page'],$row,'DESC','post_date',$firstTopCat);
		$data['main'] = 'front_end/main_left_middle';
		$this->load->view('front_end/template',$data);
	}
	
	public function cat($id,$row=0)
	{
		$id = $this->uri->segment(2);		
		$cat = $this->Term_model->get($id,0,0,'catpro');
		
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
			$data['lst_sach'] = $this->Term_model->getSubCatProNav($sach_id,'category');
			
			//Truyện ngắn
			$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
			$data['truyen_ngan_id'] = $truyen_ngan_id;
			
			//Báo tường
			$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
			$data['bao_tuong_id'] = $bao_tuong_id;
			
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
			//Sản phẩm	
			include('paging.php');
			$config['per_page'] = 32;
			$config['base_url']= base_url()."/welcome/cat/".$id.'/';
			$listPro = $this->Post_model->get(0,'product',0,0,'DESC','post_date',$id);
			$config['total_rows']= count($listPro);
			$config['cur_page']= $row;
			$this->pagination->initialize($config);
			$data['list_link'] = $this->pagination->create_links();
			
			$data['listProduct'] = $this->Post_model->get(0,'product',$config['per_page'],$row,'DESC','post_date',$id);
			$data['cat'] = $cat;
			
			$data['main'] = 'front_end/category';
			$this->load->view('front_end/template_2',$data);	
		}		
	}
	
	public function product($id)
	{
		//echo $id;
		$pro_id = $id;				
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
			$data['lst_sach'] = $this->Term_model->getSubCatProNav($sach_id,'category');
			
			//Truyện ngắn
			$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
			$data['truyen_ngan_id'] = $truyen_ngan_id;
			
			//Báo tường
			$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
			$data['bao_tuong_id'] = $bao_tuong_id;
					
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
			//
			$data['listProduct'] = $this->Post_model->getRelationProducts($pro_id,12,'product','DESC','post_date');
			//Sản phẩm	
			$data['cat'] = $cat;
			$data['product'] = $product[0];
			$data['main'] = 'front_end/product';
			
			$this->load->view('front_end/template_2',$data);	
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
				$data['lst_sach'] = $this->Term_model->getSubCatProNav($sach_id,'category');
				
				//Truyện ngắn
				$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
				$data['truyen_ngan_id'] = $truyen_ngan_id;
				
				//Báo tường
				$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
				$data['bao_tuong_id'] = $bao_tuong_id;
						
				//Navigation
				$data['listCatNav'] = $this->Term_model->getCatProNav();				
				$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
				$data['main'] = 'front_end/search_result';
				
				$this->load->view('front_end/template_2',$data);
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
				$data['lst_sach'] = $this->Term_model->getSubCatProNav($sach_id,'category');
				
				//Truyện ngắn
				$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
				$data['truyen_ngan_id'] = $truyen_ngan_id;
				
				//Báo tường
				$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
				$data['bao_tuong_id'] = $bao_tuong_id;
						
				//Navigation
				$data['listCatNav'] = $this->Term_model->getCatProNav();
				$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
				//
				$data['listProduct'] = $this->Post_model->getRelationProducts($pro_id,12,'product','DESC','post_date');
				//Sản phẩm	
				$data['cat'] = $cat;
				$data['product'] = $product[0];
				$data['main'] = 'front_end/search_result';
				
				$this->load->view('front_end/template_2',$data);
			}
		}
		else
		{
			redirect('welcome/index');
		}
	}
	
	function readbook()
	{
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
			$data['lst_sach'] = $this->Term_model->getSubCatProNav($sach_id,'category');
			
			//Truyện ngắn
			$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
			$data['truyen_ngan_id'] = $truyen_ngan_id;
			
			//Báo tường
			$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
			$data['bao_tuong_id'] = $bao_tuong_id;
			
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');
			
			
			
			$data['main'] = 'front_end/view_book_detail';
			$this->load->view('front_end/template_2',$data);	
	}
}