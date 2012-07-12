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
		$this->cart->product_name_rules =  "\.\:\-_ a-z0-9áàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệóòỏõọơớờởỡợôốồổỗộúùủũụưứừửữựíìỉĩịýỳỷỹỵđÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÓÒỎÕỌƠỚỜỞỠỢÔỐỒỔỖỘÚÙỦŨỤƯỨỪỬỮỰÍÌỈĨỊÝỲỶỸỴĐ";
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
		$flag = false;//Biến kiểm tra có mặt hàng chưa
		foreach ($this->cart->contents() as $items):
			if($items['id']==$id)
			{
				$data = array(
					 'rowid' => $items['rowid'],
               		 'qty'   => $items['qty']+1
				);
				$this->cart->update($data);
				$flag=true;
			}
		endforeach;
		if($flag==false)
		{
			$data = array(
	               'id'      => $id,
	               'qty'     => 1,
	               'price'   => $giathitruong,			   
	               'name'    => $name				               
	            );
	     	$this->cart->insert($data);
		}
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
		foreach ($this->cart->contents() as $items):
			if($items['id']==$id)
			{
				$data = array(
					 'rowid' => $items['rowid'],
               		 'qty'   => 0
				);
				$this->cart->update($data);
				$flag=true;
			}
		endforeach;					
		
		$lstProduct = $this->Post_model->get($id,'product');
		if(count($lstProduct)>0)
		{
			$product = $lstProduct[0];				
			echo json_encode(array('message1'=>"Bạn đã xóa <b> ".$product->post_title.'</b> trong giỏ hàng.','message2'=>$this->cart->total(),'message3'=>$this->cart->total_items()));
		}			
	}
	
	function update()
	{
		$lst_id = $this->input->post('param');
		$arr_id = preg_split('/,/', $lst_id);
		
		$lst_soluong = $this->input->post('soluong');
		$arr_soluong = preg_split('/,/', $lst_soluong);
		
		$count = count($arr_id);
		for($k=0;$k<$count;$k++)
		{
			foreach ($this->cart->contents() as $items):
				if($items['id']==$arr_id[$k])
				{
					$data = array(
					 'rowid' => $items['rowid'],
               		 'qty'   => $arr_soluong[$k]
					);
					$this->cart->update($data);
				}
			endforeach;
		}
		
		$num = 1;
		$sum = 0;					
		$i = 1;
		$html='';
		foreach ($this->cart->contents() as $items):
			if(($num%2)==0)
			{
				$html.= "<tr class='even'>";
			}
			else 
			{
				$html.= "<tr>";
			}
			
			$html.= "<td class='product-number'>".$num." </td>";
			$html.= "<td class='product-name'>";
			$html.= "<a href='".base_url()."/welcome/product/".$items['id']."' title='".$items['name']."'> ".$items['name']."</a>";
			$html.= "</td>";
			$html.= "<td class='product-price'> ".number_format($items['price'],0)." </td>";
			$html.= "<td class='product-quantity'>";
			$html.= "<input id='txtQuantity' class='quantity' type='text' name='".$i."[qty]' value='".$items['qty']."' maxlength='8' onchange='CheckQuantity(this.id)' minquantity='0' productid='".$items['id']."'>";
			$html.= "</td>";
			$html.= "<td class='product-price'> ".number_format($items['subtotal'],0)."</td>";
			$html.= "<td>";
			$html.= "<input id='".$items['id']."' class='btnRemoveItem' type='image' name='btnRemoveItem' title='Xóa sản phẩm' src='".base_url()."application/content/images/btn_trash.gif' style='border-width:0px;' value='".base_url()."shoppingcart/delete'>";
			$html.= "</td>";
			$html.= "</tr>";						
								
		$num++;	
		endforeach;	
		$message2 = number_format($this->cart->total(),0);			
		echo json_encode(array('message1'=>$html,'message2'=>$message2));	
	}
}
?>