<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--[if lt IE 7]>
<style type="text/css">
.rope80 { behavior: url(iepngfix.htc); cursor: pointer;}
.line50{ behavior: url(iepngfix.htc); cursor: pointer;}
span { behavior: url(iepngfix.htc); cursor: pointer;}
</style>
<![endif]-->
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title><?php echo $title;?></title>
<link id="ctl00_lCss" rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/shop/css.css">       
</head>
<body>			
<div id="head_back">
</div>
    <div id="Estore">
	    <div id="header_E">
            <div class="header_inside">
                <img src="<?php echo $this->Option_model->getOption('banner',$this->User_model->get_user_id_by_shop($shop_id));?>" width="998px" height="195px" />			
            </div>
            <ul class="nav_menu_E">
                <li><a href="<?php echo base_url();?>">Bảo Long Đường Kinh Bắc</a></li>
                <li><a class="selectedMenu" href="<?php echo base_url();?>shop/<?php echo $shop_id;?>">Trang Chủ</a></li>
                <li><a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/gioi-thieu">Giới Thiệu</a></li>
                <li><a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/cat/tin-tuc">Tin Tức</a></li>
                <li><a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/cat/san-pham">Sản Phẩm</a></li>            
                <li><a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/lien-he">Liên Hệ</a></li>
            </ul>
	    </div>