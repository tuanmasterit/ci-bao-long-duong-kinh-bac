<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Term_model');
		$this->load->model('Post_model');
		$this->load->model('Cart_model');
		$this->load->library('session');
		$this->load->library('cart');
		$this->product_name_rules = '\d\D';
	}
	
	function addToCart()
	{			
		$id = $this->input->post('param');
		$product = $this->Post_model->get($id,'product');
		$name='';
		if(count($product)>0)
		{
			$name = $product[0]->post_title;
		}
		$giathitruong = $this->Post_model->get_meta_value($id,'giathitruong');
		$giahoivien = $this->Post_model->get_meta_value($id,'giahoivien');
		$data = array(
               'id'      => $id,
               'qty'     => 1,
               'price'   => $giathitruong,			   
               'name'    => $name				               
            );
     	$this->cart->insert($data);
     	echo $this->cart->total_items();     	 	       		
	}
	
	
	function index()
	{
		if($this->cart->total_items()==0)
		{
			$data['check']=false;			
		}
		else 
		{
			$data['check']=true;			
		}
		
		
		
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
	
	function delete()
	{			
		//$cart=$_SESSION['cart'];
		$id = $this->input->post('param');
		if($id == 0)
		{
			unset($_SESSION['cart']);
		}
		else
		{
			$giathitruong = (int)$this->Post_model->get_meta_value($id,'giathitruong');					
						
			unset($_SESSION['cart'][$id]);
			$lstProduct = $this->Post_model->get($id,'product');
			if(count($lstProduct)>0)
			{
				$product = $lstProduct[0];				
				echo json_encode(array('message1'=>"Bạn đã xóa <b> ".$product->post_title.'</b> trong giỏ hàng.','message2'=>$this->Cart_model->getSumCart()));
			}
			if(isset($_SESSION['countcart']))
			{
				$_SESSION['countcart'] = $_SESSION['countcart']-1;
			}
		}	
	}
	
	function update()
	{
		
	}
}
?>