<?php
	class Pages extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Post_model');
			$this->load->model('Term_model');	
            date_default_timezone_set('Asia/Ho_Chi_Minh');		
		}

		function index($id)
		{
			$page = $this->Post_model->get($id,'page');
			$data['page'] = $page;
			
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
			$data['lst_sach'] = $this->Term_model->get(0,0,0,'book_cat',0);
			
			//Truyện ngắn
			$truyen_ngan_id = $this->Term_model->getCategoryByName('Truyện ngắn');
			$data['truyen_ngan_id'] = $truyen_ngan_id;
			
			//Báo tường
			$bao_tuong_id = $this->Term_model->getCategoryByName('Báo tường');
			$data['bao_tuong_id'] = $bao_tuong_id;
			
			//Navigation
			$data['listCatNav'] = $this->Term_model->getCatProNav();
			$data['listNewsNav'] = $this->Term_model->getCatProNav('category');

			$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
			$data['list_sp_noibat'] = $list_sp_noibat;
			
			$data['main'] = 'front_end/view_page';
			$this->load->view('front_end/template_2',$data);
		}
	}
?>