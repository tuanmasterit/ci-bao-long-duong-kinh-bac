<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://baolongduong.vn/vi/trang-chu.aspx -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
    <title><?php if(isset($title)){echo $title;} else {echo "Công ty cổ phần Bảo Long Đường Kinh Bắc";}?></title>
    <link href="<?php base_url();?>application/content/css/global.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/menutree.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/news.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/product.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/carouFredsel.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/video.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/contact.css" rel="stylesheet" type="text/css"/>
    <link href="<?php base_url();?>application/content/css/common.css" rel="stylesheet" type="text/css"/>
    
    <script type="text/javascript" src="<?php base_url();?>application/content/js/jquery-1.4.2.min.js"></script>
    
    <link rel="stylesheet" href="<?php base_url();?>application/content/css/nivo/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php base_url();?>application/content/css/nivo/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php base_url();?>application/content/css/nivo/style.css" type="text/css" media="screen" />

	
    <script type="text/javascript" src="<?php base_url();?>application/content/css/nivo/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="<?php base_url();?>application/content/js/jquery.jcarousel.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php base_url();?>application/content/css/tango/skin.css" />

<script>    
    jQuery(document).ready(function() {
		jQuery('#coin-slider').nivoSlider();
    jQuery('#list_carousel').jcarousel({    	
        auto: 5,
        wrap: 'circular',
        initCallback: mycarousel_initCallback    		
    	});
	});
	function mycarousel_initCallback(carousel)
	{
	    // Disable autoscrolling if the user clicks the prev or next button.
	    carousel.buttonNext.bind('click', function() {
	        carousel.startAuto(0);
	    });
	
	    carousel.buttonPrev.bind('click', function() {
	        carousel.startAuto(0);
	    });
	
	    // Pause autoscrolling if the user moves with the cursor over the clip.
	    carousel.clip.hover(function() {
	        carousel.stopAuto();
	    }, function() {
	        carousel.startAuto();
	    });
	};
</script>
</head>
<body>
    <form>
    <div id="wrraper">
        <div id="header">
            <?php $this->load->view('front_end/header');?>
        </div><!-- end of header -->
        <div class="clear">
        </div>
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
                <div id="main_left">    
            

<div id="products_v2">
    
        <div id="title">
        <h4>
            <span><a href="#" class="parent">Sản phẩm</a> - <a href="/vi/san-pham/dong-duoc.aspx">Đông Dược</a></span>
        </h4>    
        </div>
            <div class="content">
                <div class="products-grid">
                                   
                        <div class="product-item" style="margin-left: 5px;"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_469_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-469/hoa-long.aspx"><img class="imgHotProduct" alt="Hỏa Long" src="<?php base_url();?>application/content/images/hoa-long.png"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-469/hoa-long.aspx"><h2>Hỏa Long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,469); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_453_675" href="/vi/san-pham/dong-duoc/benh-tre-em/p-453/sieu-nhan-tieu-bao.aspx"><img class="imgHotProduct" alt="Siêu nhân tiểu bảo" src="<?php base_url();?>application/content/images/sieu nhan tieu bao.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-tre-em/p-453/sieu-nhan-tieu-bao.aspx"><h2>Siêu nhân tiểu bảo</h2></a></div><div class="clear"></div><div class="price"><span>48,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,453); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_452_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-452/nuoc-suc-mieng-da-hoa-tieu.aspx"><img class="imgHotProduct" alt="Nước súc miệng dã hoa tiêu" src="<?php base_url();?>application/content/images/nuoc suc mieng da hoa tieu.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-452/nuoc-suc-mieng-da-hoa-tieu.aspx"><h2>Nước súc miệng dã hoa tiêu</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,452); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_451_672" href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-451/linh-chi-luc-vi.aspx"><img class="imgHotProduct" alt="Linh chi lục vị" src="<?php base_url();?>application/content/images/linh chi luc vi.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-451/linh-chi-luc-vi.aspx"><h2>Linh chi lục vị</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,451); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_450_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-450/kim-long.aspx"><img class="imgHotProduct" alt="Kim long" src="<?php base_url();?>application/content/images/Kim long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-450/kim-long.aspx"><h2>Kim long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,450); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_449_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-449/con-xoa-bop.aspx"><img class="imgHotProduct" alt="Cồn xoa bóp" src="<?php base_url();?>application/content/images/con xoa bop.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-449/con-xoa-bop.aspx"><h2>Cồn xoa bóp</h2></a></div><div class="clear"></div><div class="price"><span>20,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,449); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_448_671" href="/vi/san-pham/dong-duoc/benh-sinh-duc-tiet-nieu/p-448/co-tinh-hoan.aspx"><img class="imgHotProduct" alt="Cố tinh hoàn" src="<?php base_url();?>application/content/images/co tinh hoan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-sinh-duc-tiet-nieu/p-448/co-tinh-hoan.aspx"><h2>Cố tinh hoàn</h2></a></div><div class="clear"></div><div class="price"><span>50,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,448); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_447_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-447/bo-than-hoan-mem.aspx"><img class="imgHotProduct" alt="Bổ thận hoàn mềm" src="<?php base_url();?>application/content/images/bo than hoan mem.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-447/bo-than-hoan-mem.aspx"><h2>Bổ thận hoàn mềm</h2></a></div><div class="clear"></div><div class="price"><span>100,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,447); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_446_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-446/bao-long-y-vo-hoan.aspx"><img class="imgHotProduct" alt="Bảo long y võ hoàn" src="<?php base_url();?>application/content/images/bao long y vo hoan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-446/bao-long-y-vo-hoan.aspx"><h2>Bảo long y võ hoàn</h2></a></div><div class="clear"></div><div class="price"><span>1,800,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,446); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_445_672" href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-445/hoi-long.aspx"><img class="imgHotProduct" alt="Hội long" src="<?php base_url();?>application/content/images/hoi long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-445/hoi-long.aspx"><h2>Hội long</h2></a></div><div class="clear"></div><div class="price"><span>60,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,445); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_444_674" href="/vi/san-pham/dong-duoc/benh-phu-khoa/p-444/xich-long-hoan.aspx"><img class="imgHotProduct" alt="Xích long hoàn" src="<?php base_url();?>application/content/images/xich long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-phu-khoa/p-444/xich-long-hoan.aspx"><h2>Xích long hoàn</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,444); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_443_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-443/viem-ngam-tri-dau-hong.aspx"><img class="imgHotProduct" alt="Viêm ngậm trị đau họng" src="<?php base_url();?>application/content/images/viem ngam tri viem hong.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-443/viem-ngam-tri-dau-hong.aspx"><h2>Viêm ngậm trị đau họng</h2></a></div><div class="clear"></div><div class="price"><span>15,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,443); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item" style="margin-left: 5px;"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_442_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-442/bach-long-thuy.aspx"><img class="imgHotProduct" alt="Bạch long thủy" src="<?php base_url();?>application/content/images/bach-long-thuy.png"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-442/bach-long-thuy.aspx"><h2>Bạch long thủy</h2></a></div><div class="clear"></div><div class="price"><span>25,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,442); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_441_677" href="/vi/san-pham/dong-duoc/benh-da-lieu/p-441/moc-long.aspx"><img class="imgHotProduct" alt="Mộc long" src="<?php base_url();?>application/content/images/moc long hoan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-da-lieu/p-441/moc-long.aspx"><h2>Mộc long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,441); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_440_675" href="/vi/san-pham/dong-duoc/benh-tre-em/p-440/tho-long.aspx"><img class="imgHotProduct" alt="Thổ long" src="<?php base_url();?>application/content/images/tho long.gif"></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-tre-em/p-440/tho-long.aspx"><h2>Thổ long</h2></a></div><div class="clear"></div><div class="price"><span>25,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,440); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_439_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-439/bo-than-hoan-cung.aspx"><img class="imgHotProduct" alt="Bổ thận hoàn cứng" src="<?php base_url();?>application/content/images/bo than hoan goi.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-439/bo-than-hoan-cung.aspx"><h2>Bổ thận hoàn cứng</h2></a></div><div class="clear"></div><div class="price"><span>120,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,439); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_438_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-438/quan-long.aspx"><img class="imgHotProduct" alt="Quần long" src="<?php base_url();?>application/content/images/quan long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-438/quan-long.aspx"><h2>Quần long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,438); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_437_661" href="/vi/san-pham/dong-duoc/benh-tieu-hoa-tri-gan-mat/p-437/tiem-long.aspx"><img class="imgHotProduct" alt="Tiềm long" src="<?php base_url();?>application/content/images/tiem long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-tieu-hoa-tri-gan-mat/p-437/tiem-long.aspx"><h2>Tiềm long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,437); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_434_661" href="/vi/san-pham/dong-duoc/benh-tieu-hoa-tri-gan-mat/p-434/huynh-long.aspx"><img class="imgHotProduct" alt="Huỳnh long" src="<?php base_url();?>application/content/images/huynh long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-tieu-hoa-tri-gan-mat/p-434/huynh-long.aspx"><h2>Huỳnh long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,434); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_433_672" href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-433/hac-long-hoan.aspx"><img class="imgHotProduct" alt="Hắc long hoàn" src="<?php base_url();?>application/content/images/hac long hoan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-433/hac-long-hoan.aspx"><h2>Hắc long hoàn</h2></a></div><div class="clear"></div><div class="price"><span>30,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,433); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_432_674" href="/vi/san-pham/dong-duoc/benh-phu-khoa/p-432/ich-mau-hoan.aspx"><img class="imgHotProduct" alt="Ích mẫu hoàn" src="<?php base_url();?>application/content/images/ich mau hoan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-phu-khoa/p-432/ich-mau-hoan.aspx"><h2>Ích mẫu hoàn</h2></a></div><div class="clear"></div><div class="price"><span>30,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,432); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_431_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-431/thang-long.aspx"><img class="imgHotProduct" alt="Thăng long" src="<?php base_url();?>application/content/images/thang long.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-431/thang-long.aspx"><h2>Thăng long</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,431); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_430_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-430/bach-long-hoan.aspx"><img class="imgHotProduct" alt="Bạch long hoàn" src="<?php base_url();?>application/content/images/Bach long hoan.jpg"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-430/bach-long-hoan.aspx"><h2>Bạch long hoàn</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,430); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_422_677" href="/vi/san-pham/my-pham/kem-duong-da/p-422/kem-ngu-linh.aspx"><img class="imgHotProduct" alt="Kem ngũ linh" src="/Uploads/anh my pham/kem duong da/kem ngu linh.gif"></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/my-pham/kem-duong-da/p-422/kem-ngu-linh.aspx"><h2>Kem ngũ linh</h2></a></div><div class="clear"></div><div class="price"><span>20,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,422); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item" style="margin-left: 5px;"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_409_674" href="/vi/san-pham/dong-duoc/benh-phu-khoa/p-409/nhu-nham-hoan.aspx"><img class="imgHotProduct" alt="Nhũ nham hoàn" src="<?php base_url();?>application/content/images/Nhu nham hoan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-phu-khoa/p-409/nhu-nham-hoan.aspx"><h2>Nhũ nham hoàn</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,409); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_406_673" href="/vi/san-pham/dong-duoc/benh-nam-khoa/p-406/kim-mau-hoan.aspx"><img class="imgHotProduct" alt="Kim mâu hoàn" src="<?php base_url();?>application/content/images/kim-mau.png"></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-nam-khoa/p-406/kim-mau-hoan.aspx"><h2>Kim mâu hoàn</h2></a></div><div class="clear"></div><div class="price"><span>1,200,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,406); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_405_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-405/thong-nhi-hoan.aspx"><img class="imgHotProduct" alt="Thông nhĩ hoàn" src="<?php base_url();?>application/content/images/thong nhi hoan 250.png"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-405/thong-nhi-hoan.aspx"><h2>Thông nhĩ hoàn</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,405); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_403_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-403/dai-bo-tru-phong-thap.aspx"><img class="imgHotProduct" alt="Đại bổ trừ phong thấp" src="<?php base_url();?>application/content/images/dai-bo-phong-thap.png"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-403/dai-bo-tru-phong-thap.aspx"><h2>Đại bổ trừ phong thấp</h2></a></div><div class="clear"></div><div class="price"><span>60,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,403); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product-item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_404_672" href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-404/thong-mach-hoan.aspx"><img class="imgHotProduct" alt="Thông mạch hoàn" src=""/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/tuan-hoan-nao-than-kinh/p-404/thong-mach-hoan.aspx"><h2>Thông mạch hoàn</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,404); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_402_655" href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-402/thai-bach-dan.aspx"><img class="imgHotProduct" alt="Thái bạch đan" src="<?php base_url();?>application/content/images/Thai bach dan.gif"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-ho-hap-tai-mui-hong/p-402/thai-bach-dan.aspx"><h2>Thái bạch đan</h2></a></div><div class="clear"></div><div class="price"><span>30,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,402); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_401_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-401/bo-than-sang-mat.aspx"><img class="imgHotProduct" alt="Bổ thận sáng mắt" src="<?php base_url();?>application/content/images/bo-than-sang-mat.png"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-401/bo-than-sang-mat.aspx"><h2>Bổ thận sáng mắt</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,401); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                                    
                        <div class="product_item"><div class="img"><a rel="lightbox" data-tooltip="sticky_featured_400_654" href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-400/bo-than-mat-gan.aspx"><img class="imgHotProduct" alt="Bổ thận mát gan" src="<?php base_url();?>application/content/images/bo-than-mat-gan.png"/></a></div><div class="clear"></div><div class="title"><a href="/vi/san-pham/dong-duoc/benh-co-xuong-khop/p-400/bo-than-mat-gan.aspx"><h2>Bổ thận mát gan</h2></a></div><div class="clear"></div><div class="price"><span>35,000 VND</span><a class="imgBtnCss" onclick="AddToCart(this.href,400); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a></div></div>
                    
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
             <div class="pager">
                    <div class="pages">
                    <ol>
                        <li>
                            
                        </li>
                       <div style="float:left">Trang</div>
                        
                                <li>
                                    <span style="font-weight:bold; text-decoration:none; color:Black">1</span></li>
                            
                                <li>
                                    <a href="/vi/san-pham/dong-duoc/page/2.aspx">2</a></li>
                            
                        <li>
                            
                        </li>
                    </ol>
                </div>
                <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>        
                </div>                
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
    </form>
</body>
</html>