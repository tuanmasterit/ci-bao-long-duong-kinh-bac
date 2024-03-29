<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
    <title><?php if(isset($title)){echo $title;} else {echo "Công ty cổ phần Bảo Long Đường Kinh Bắc";}?></title>
    <link href="<?php echo base_url();?>application/content/css/global.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/menutree.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/news.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>application/content/css/indexlogin.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/product.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/carouFredsel.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/video.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/contact.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>application/content/css/common.css" rel="stylesheet" type="text/css"/>
    
    <script type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/content/js/validation.js"></script>
   
    <link rel="stylesheet" href="<?php echo base_url();?>application/content/css/nivo/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>application/content/css/nivo/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>application/content/css/nivo/style.css" type="text/css" media="screen" />	
    
    
    
    <script type="text/javascript" src="<?php echo base_url();?>application/content/js/jquery.jcarousel.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/content/css/tango/skin.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>application/content/css/ShoppingCart.css" type="text/css" media="screen" />
	<script src="<?php echo base_url();?>application/content/js/script.js" type="text/javascript"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/content/css/tango/skin.css" />
    <link href="<?php echo base_url();?>application/content/css/nivo/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
   
    <div id="wrraper">
        <div id="header">
            <?php $this->load->view('front_end/header');?>
        </div><!-- end of header -->
        <div class="clear"></div>
        <div id="main">
            <div class="clear">
            </div>
            <div id="main_left">
                <?php $this->load->view('front_end/main_left');?>
            </div>
            <div id="main_right">
                <?php $this->load->view('front_end/main_right');?>
            </div>
            <div class="clear">
            </div>
            <div id="product-feature">
                <?php $this->load->view('front_end/product_feature');?>
            </div>
            <div class="clear">
            </div>
            <div id="main_left_middle">
            	<?php $this->load->view($main)?>                
            </div>                
            
            <div id="main_right_middle">
				
            	<?php $this->load->view('front_end/main_right_middle');?>                
            </div>
        </div>        
        <div class="clear">
        </div>
        <div id="footer">        
        	<?php $this->load->view('front_end/footer');?>    
        </div>
    </div>
   
</body>
</html>
<script type="text/javascript" src="<?php echo base_url();?>application/content/css/nivo/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#coi-slider').nivoSlider();
});
</script>