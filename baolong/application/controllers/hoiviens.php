<?php
 class Hoiviens extends CI_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->library('email');
 		$this->load->model('Term_model');
 		$this->load->library('parser');
 	}
 	
 	function register()
 	{
 		if($this->input->post('txtName'))
		{
			$name = $this->input->post('txtName');
			$namsinh = $this->input->post('txtNamSinh');
			$diachi = $this->input->post('txtDiaChi');
			$dienthoai = $this->input->post('txtDienThoai');
			$email = $this->input->post('txtEmail');
			$nguoi_gioi_thieu = $this->input->post('txtHoiVien');
			$this->email->from('dangky@baolongduong.com','Bảo Long Đường Kinh Bắc');

			//Email
			
			$this->email->to("phamvanhung0818@gmail.com");  
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
			    </table>
			</body>
			</html>	";
			
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
		
 		$data['main'] = 'front_end/view_register_hoivien';
 		$this->load->view('front_end/template_2',$data);
 	}	
 	
 }
?>