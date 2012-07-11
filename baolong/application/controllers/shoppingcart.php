<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Term_model');
		$this->load->model('Post_model');
		$this->load->model('Cart_model');
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
		 	  $sum = 0;
			  foreach($_SESSION['cart'] as $k=>$v)
			  {			  	
				   if(isset($v))
				   {
				   		$ok=2;
					   	$lstProduct = $this->Post_model->get($k,'product');
						foreach ($lstProduct as $product)
						{					
							$giathitruong = (int)$this->Post_model->get_meta_value($k,'giathitruong');
							$sum=$sum+$giathitruong*$v;
						}
				   }				   	
			  }
			  
		 }
		 if ($ok != 2)
		 {
		  	echo '0';
		 } 
		 else {
			  $items = $_SESSION['cart'];
			  $_SESSION['countcart'] =	count($items);
			  echo $_SESSION['countcart'];
		}
	}
	
	function index()
	{
		if(!isset($_SESSION['countcart']) || $_SESSION['countcart']==0)
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
		$cart=$_SESSION['cart'];
		$lst_id = $this->input->post('param');
		$arr_id = preg_split('/,/', $lst_id);
		
		$lst_soluong = $this->input->post('soluong');
		$arr_soluong = preg_split('/,/', $lst_soluong);
		print_r($arr_soluong);
		
		$length = count($arr_id);
		for ($i=0;$i<$length;$i++)
		{
			if($arr_soluong[$i]==0)
			{
				unset($_SESSION['cart'][$arr_id[$i]]);
				if(isset($_SESSION['countcart']))
				{
					$_SESSION['countcart'] = $_SESSION['countcart']-1;
				}
			}
			else 
			{
				$_SESSION['cart'][$arr_id[$i]] = $arr_soluong[$i];
			}
		}
		$message1='';
		
					if(isset($_SESSION['cart']))
					{
						$num = 1;
						$sum = 0;
						foreach($_SESSION['cart'] as $key=>$value)
						{
							$lstProduct = $this->Post_model->get($key,'product');
							foreach ($lstProduct as $product)
							{											
				
                                $message1.="<tr"; if(($num%2)==0) {$message1.= "class='even'";}$message1.=">";
                                $message1.="<td class='product-number'>".$num."</td>";
                                $message1.="<td class='product-name'>";
                                $message1.="<a title='".$product->post_title."' href='".base_url().'welcome/product/'.$product->id."'>".$product->post_title."</a>";
                                $message1.="</td>";
                                $message1.="<td class='product-price'>".number_format($this->Post_model->get_meta_value($key,'giathitruong'),0)." </td>";
                                $giathitruong = (int)$this->Post_model->get_meta_value($key,'giathitruong');
                                $message1.="<td class='product-quantity'>";
                                $message1.="<input id='txtQuantity' class='quantity' type='text' productid='".$key."'  minquantity='0' onchange='CheckQuantity(this.id)' maxlength='8' value='".$value."' name='txtQuantity'>";
                                $message1.="</td>";
                                $message1.="<td class='product-price'>".number_format($giathitruong*$value,0)." </td>";
                                $message1.="<td>";
                                $message1.="<input class='btnRemoveItem' id='".$key."' value='".base_url()."shoppingcart/delete' type='image' style='border-width:0px;'  src='".base_url()."application/content/images/btn_trash.gif' title='Xóa sản phẩm' name='btnRemoveItem'>";
                                $message1.="</td>";
                                $message1.="</tr>";					
					
								$sum=$sum+$giathitruong*$value;
								} 
							$num++;	
						}
					}
	$message2 = $this->Cart_model->getSumCart();			
	echo json_encode(array('message1'=>$message1,'message2'=>$message2));	
	}
}
?>