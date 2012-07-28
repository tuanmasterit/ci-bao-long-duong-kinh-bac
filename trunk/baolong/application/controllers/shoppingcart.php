<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Term_model');
		$this->load->model('Post_model');
		$this->load->model('Cart_model');
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->library('cart');
		$this->cart->product_name_rules =  "\.\:\-_ a-z0-9áàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệóòỏõọơớờởỡợôốồổỗộúùủũụưứừửữựíìỉĩịýỳỷỹỵđÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÉÈẺẼẸÊẾỀỂỄỆÓÒỎÕỌƠỚỜỞỠỢÔỐỒỔỖỘÚÙỦŨỤƯỨỪỬỮỰÍÌỈĨỊÝỲỶỸỴĐ";
		$this->load->helper('captcha');
		$this->load->model('Option_model');
		$this->load->library('email');
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
		//$giahoivien = $this->Post_model->get_meta_value($id,'giahoivien');
		
		$gia= $giathitruong;			
		
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
	               'price'   => $gia,			   
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
			/*if($this->session->userdata('logged_in')!=1)
				{
					foreach ($this->cart->contents() as $items):
						$id = $items['id'];
						$price = $this->Post_model->get_meta_value($items['id'],'giathitruong');
						$qty = $items['qty'];
						$name = $items['name'];
						$data = array(
                              'rowid'     => $items['rowid'], 
                              'qty'       => 0,                              
                              );  
                        $this->cart->update($data);
                        
                        $data2 = array(
                              'id'      => $id,
                              'qty'       => $qty, 
                              'price'   => $price, 
                              'name'    => $name
                              );  
                        $this->cart->insert($data2);				
					endforeach;
				}
				else 
				{
					foreach ($this->cart->contents() as $items):
						$id = $items['id'];
						$price = $this->Post_model->get_meta_value($items['id'],'giahoivien');
						$qty = $items['qty'];
						$name = $items['name'];
						$data = array(
                              'rowid'     => $items['rowid'], 
                              'qty'       => 0,                              
                              );  
                        $this->cart->update($data);
                        
                        $data2 = array(
                              'id'      => $id,
                              'qty'       => $qty, 
                              'price'   => $price, 
                              'name'    => $name
                              );  
                        $this->cart->insert($data2);							
					endforeach;
				}*/
			$data['check']=true;			
		}
		
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
		$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
		$data['list_sp_noibat'] = $list_sp_noibat;
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
	
	function checkout()
	{
		if($this->cart->total_items()==0)
		{
			$data['check']=false;			
		}
		else 
		{
			if($this->session->userdata('logged_in')!=1)
				{
							
				}
				else 
				{
					$username =  $this->session->userdata('username');		
					$user_id = $this->User_model->getByUsername($username);
					$data['user'] = $this->User_model->get($user_id,0,0,'');
					
				}
			$data['check']=true;			
		}
		
		$vals = array(
		    
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'captcha/',
		    'font_path'	 => base_url().'system/fonts/texb.ttf',
		    'img_width'	 => '200',
		    'img_height' => 50,
		    'expiration' => 7200
		    );
		
		$cap = create_captcha($vals);
		$data['image']=$cap['image'];
		$data['word'] = $cap['word'];		
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
		
		//Sản phẩm tiêu biểu
		$sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
		$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
		$data['list_sp_noibat'] = $list_sp_noibat;
		
		//Navigation
		$data['listCatNav'] = $this->Term_model->getCatProNav();		
		
		$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
		$data['list_sp_noibat'] = $list_sp_noibat;
		
 		$data['main'] = 'front_end/view_cart_checkout';
 		$this->load->view('front_end/template_2',$data);
	}
	
	function sendcart()
	{
		if($this->input->post('txtFullName'))
		{
			$fullname = $this->input->post('txtFullName');
			$email = $this->input->post('txtEmail');
			$DienThoai = $this->input->post('txtDienThoai');
			$DiDong = $this->input->post('txtDiDong');
			$diachi = $this->input->post('txtDiachi');
			$comment = $this->input->post('txtComments');
			
			
			
			$this->email->from('muahang@baolongduong.com','Bảo Long Đường Kinh Bắc');
			
			//Email
			$ad_email = $this->Option_model->getOption('admin_email');
			$admin_email='';
			foreach ($ad_email as $e)
			{
				$admin_email = $e->option_value;
			}
			$this->email->to($admin_email);  
			$this->email->subject('Đăng ký mua sản phẩm');
			$email_msg='';
			$email_msg.="			
			<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			    <title></title>
			    <style type='text/css'>
			        .style1
			        {
			            width: 149px;
			        }
			        .style2
			        {
			            width: 447px;
			        }
			    </style>
			</head>
			<body style='width: 552px'>
			    <h2 align='center'>Thông tin mua hàng</h2>
			    <table style='border-style: solid; border-width: 1px; border-color: #999966; width: 100%;'>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;
			                Họ tên:</td>";
            	$email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$fullname."
			            </td>
			           
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;
			                Email:</td>";
			    $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$email."
			            </td>
			            
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;
			                Địa chỉ:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$diachi."
			            </td>
			            
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Điện thoại:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$DienThoai."</td>
			            
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Di động:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$DiDong."</td>
			            
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Nội dung ý kiến:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$comment."</td>
			            
			        </tr>
			    </table>
				";
	            
	            $email_msg.="<table>
								<thead>
									<tr>
										<th rowspan='1'> STT </th>
										<th rowspan='1'> Sản phẩm </th>
										<th colspan='1'> Giá (VNĐ)</th>
										<th rowspan='1'> Số lượng </th>
										<th colspan='1'> Tổng (VNĐ) </th>										
									</tr>
								</thead>
								<tbody>";
			$num = 1;
			$sum = 0;
			$i = 1;
			foreach ($this->cart->contents() as $items):
				$email_msg.="<tr><td>".$num."</td>";
				$email_msg.="<td><a>".$items['name']."</a></td>";
				$email_msg.="<td>".number_format($items['price'],0)."</td>";
				$email_msg.="<td>".$items['qty']."</td>";
				$email_msg.="<td>".number_format($items['subtotal'],0)."</td></tr>";				
			$num++;	
			endforeach;
			$email_msg.="</tbody>
							<tfoot>
								<tr>
									<td colspan='50'>
										<strong>Tổng cộng </strong>
										:
										<strong>".number_format($this->cart->total(),0)."VNĐ</strong>
									</td>						
								</tr>
							</tfoot>
						</table>";
			$email_msg.="</body>
			</html>";		
			$this->email->message($email_msg);  
			$this->email->send();   
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
		
		$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
		$data['list_sp_noibat'] = $list_sp_noibat;
		
 		$data['main'] = 'front_end/view_cart_send';
 		$this->load->view('front_end/template_2',$data);
	}
}
?>