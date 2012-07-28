<?php
 class Hoiviens extends CI_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->library('email');
 		$this->load->model('Term_model');
 		$this->load->library('parser');
 		$this->load->model('Option_model');
        $this->load->model('Post_model');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
       	$this->load->model('User_model');
 	}
 	
 	function register()
 	{
 		$data['check_exit'] = false;
 		if($this->input->post('txtName'))
		{
			$user_login = $this->input->post('txtUserName');
			if($this->User_model->getByUsername($user_login)>0)
			{
				$data['check_exit'] = true;
			}else{
				$user_pass = $this->input->post('txtPass');
				$name = $this->input->post('txtName');
				$namsinh = $this->input->post('txtNamSinh');
				$diachi = $this->input->post('txtDiaChi');
				$dienthoai = $this->input->post('txtDienThoai');
				$email = $this->input->post('txtEmail');
				$nguoi_gioi_thieu = $this->input->post('txtHoiVien');
	            $nguoi_chi_dinh = $this->input->post('txtChiDinh');
	            $gioitinh = $this->input->post('slGioiTinh');
	            $gianhang = $this->input->post('txtGianHang');
	            $cmt = $this->input->post('txtCMT');
	            $meta_value = 'hoivien';
	            $user_regitered = date('Y-m-d h-i-s');
	            
	            $noi_o = $this->input->post('txtNoiO');
	            $tai_khoan = $this->input->post('txtTaiKhoan');
	            $nganhang = $this->input->post('txtNganHang');
	            
	            $this->User_model->add($user_login,$name,$email,$user_regitered,$user_login,$meta_value,$nguoi_gioi_thieu,$gianhang,$nguoi_chi_dinh,$gioitinh,$cmt,$diachi,$noi_o,$dienthoai,$tai_khoan,$nganhang,$namsinh,$user_pass);
				$this-> session-> set_flashdata('message','Thêm hội viên thành công!');			
				  
			} 
			
			
            /*
			$this->email->from('dangky@baolongduong.com','Bảo Long Đường Kinh Bắc');
			
			//Email
			$ad_email = $this->Option_model->getOption('admin_email');
			$admin_email='';
			foreach ($ad_email as $e)
			{
				$admin_email = $e->option_value;
			}
			$this->email->to($admin_email);  
			$this->email->subject('Đăng ký hội viên');
			$email_msg="			
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
			    <h2 align='center'>Thông tin đăng ký</h2>
			    <table style='border-style: solid; border-width: 1px; border-color: #999966; width: 100%;'>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;
			                Họ tên:</td>";
            	$email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$name."
			            </td>
			           
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;
			                Ngày sinh:</td>";
			    $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$namsinh."
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
			                ".$dienthoai."</td>
			            
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Email:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$email."</td>
			            
			        </tr>
			        <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Người giới thiệu:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$nguoi_gioi_thieu."</td>
			            
			        </tr>
                    <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Người chỉ định:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$nguoi_chi_dinh."</td>
			            
			        </tr>
                    <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Giới tính:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$gioitinh."</td>
			            
			        </tr>
                    <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Tên gian hàng:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$gianhang."</td>
			            
			        </tr>
                    <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;CMT:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$cmt."</td>
			            
			        </tr>
                    
                    
                    <tr>
			            <td class='style1' style='border: 1px solid #999966'>
			                &nbsp;Số tài khoản:</td>";
	            $email_msg.="<td style='border: 1px solid #999966' class='style2'>
			                ".$tai_khoan."</td>
			            
			        </tr>
                    
			    </table>
			</body>
			</html>	";
			
			$this->email->message($email_msg);  
			$this->email->send();   
			*/
            
                     
            
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
        $sp_noibat_id = $this->Term_model->getCategoryByName('Sản phẩm nổi bật');
		$list_sp_noibat  = $this->Post_model->get(0,'product',5,0,'DESC','post_date',$sp_noibat_id);
		$data['list_sp_noibat'] = $list_sp_noibat;
		
 		$data['main'] = 'front_end/view_register_hoivien';
 		$this->load->view('front_end/template_2',$data);
 	}	
 	
 }
?>