<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Term_model');
		$this->load->library('session');
	}
	
	function addToCart()
	{			
		$id = $this->input->post('param');
		if(isset($_SESSION['cart'][$id]))
		{
		 	$qty = $_SESSION['cart'][$id] + 1;
		}
		else
		{
		 	$qty=1;
		}
		$_SESSION['cart'][$id]=$qty;
		
		$ok=1;
		 if(isset($_SESSION['cart']))
		 {
			  foreach($_SESSION['cart'] as $k=>$v)
			  {
				   if(isset($v))
				   {
				   		$ok=2;
				   }
			  }
		 }
		 if ($ok != 2)
		 {
		  	echo '0';
		 } 
		 else {
			  $items = $_SESSION['cart'];
			  echo count($items);
		}
	}
	
	function index()
	{
		foreach($_SESSION['cart'] as $key=>$value)
		{
		 $item[]=$key;
		}
		$str=implode(",",$item);
		
		
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
		
 		$data['main'] = 'front_end/view_cart';
 		$this->load->view('front_end/template_2',$data);
	}
}
?>