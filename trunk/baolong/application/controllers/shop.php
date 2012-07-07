<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Post_model');
		$this->load->model('Term_model');
    }
	public function index($shop_id = '')	
	{
		echo $shop_id;
		/*$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc';
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
		
		//Sản phẩm mặc định
		$firstTopCat = $this->Term_model->getCatProTopFirst();
		$data['listProduct'] = $this->Term_model->getListProduct($firstTopCat);
		$data['main'] = 'front_end/main_left_middle';
		$this->load->view('front_end/template',$data);*/
	}
		
}