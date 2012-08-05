<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Post_model');
		$this->load->model('Term_model');
    }
	public function index($shop_id='',$module='',$object_id='')
	{		
		if($shop_id != ''){
			switch($module){
				case '':
					$this->home($shop_id);
					break;
				case 'post':
					$this->post($shop_id,$object_id);
					break;
				case 'cat':
					category($shop_id,$object_id);
					break;
				case 'product':
					product($shop_id,$object_id);
					break;				
			}
		}else{
			redirect('welcome');	
		}
	}
	function home($shop_id){		
		$data['shop_id'] = $shop_id;
		$user_id = $this->User_model->get_user_id_by_shop($shop_id);
		$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc';
		//Tin tức nổi bật
		$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
		$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
		$data['list_news'] = $list_news;		
								
		//Sản phẩm mặc định
		$data['listProduct'] = $this->Post_model->get(0, 'product',10,0,'DESC','post_date',0,$user_id);
		
		$this->load->view('shop/index',$data);		
	}
	function post($shop_id,$object_id){
		$user_id = $this->User_model->get_user_id_by_shop($shop_id);
		if($object_id == 'gioi-thieu'){
			$data['content'] = $this->Option_model->getOption('gioithieu',$user_id);						
			$data['title'] = "Giới thiệu";		
		}elseif($object_id == 'lien-he'){
			$data['content'] = $this->Option_model->getOption('lienhe',$user_id);
			$data['title'] = "Liên hệ";
		}else{
			$data['lstpost'] = $this->Post_model->get($object_id);
			$data['title'] = $data['lstpost'][0]->post_title;			
		}
		$data['shop_id'] = $shop_id;
		$this->load->view('shop/post',$data);
	}
}