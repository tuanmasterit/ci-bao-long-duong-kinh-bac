<div id="logo">
	<img src="<?php echo base_url();?>application/content/images/banner.png" />
</div>
<div id="shoppingcart">
<a id="mini-cart" class="mini-cart" title="" href="<?php echo base_url();?>shoppingcart/index">
<img class="img" src="<?php echo base_url()?>application/content/images/icon_cart.png" />
<p>
Giỏ hàng:
<strong id="cart-count">0</strong>
</p>
</a>
</div>
<div class="clear"></div>
<div id="menu-top">
	<div id="menu-top-center">
		<ul id="nav">
			<li></li>
            <li class="home"><a href="<?php echo base_url();?>" title="Trang chủ"><img src="<?php echo base_url();?>application/content/images/home2.png" /></a></li>
            <li><a href="#" class="parent"><span>Giới thiệu</span></a>
            	<ul class="gioi_thieu_hover">
		            <li><a href="#">Tập đoàn</a></li>
		            <li><a href="#">Cơ cấu tổ chức</a></li>
		            <li><a href="#">Thành tích</a></li>
		            <li><a href="#">Tổng giám đốc</a></li>
	            </ul>
            </li>
            <li><a href="<?php echo base_url()?>news" class="parent"><span>Tin tức</span></a>
                <ul class="tin_tuc_hover">
                    <?php 
                    foreach ($listNewsNav as $NewsNav)
                    {
                    ?>
                    <li><a href="<?php echo base_url().'news/cat/'.$NewsNav->term_id;?>"><?php echo $NewsNav->name;?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li><a href="#" class="parent"><span>Sản phẩm</span></a>
            	<ul class="cam_nang_hover">
                    <?php
                    foreach ($listCatNav as $catNav)
                    { 
                    ?>
                    <li><a href="<?php echo base_url().'welcome/cat/'.$catNav->term_id;?>"><?php echo $catNav->name;?></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </li>
            <li><a href="#" class="parent"><span>Y tế sức khỏe</span></a>
            	<ul class="y_te_suc_khoe_hover">
                    <li><a href="#">Chuyên đề đông y</a></li>
                    <li><a href="#">Bệnh thường gặp</a></li>
                    <li><a href="#">Ăn kiêng theo bệnh</a></li>
                    <li><a href="#">Tự xoa bóp bấm huyệt</a></li>
                    <li><a href="#">Làm đẹp</a></li>
                </ul>
            </li>
            <li><a href="#" class="parent"><span>Tư vấn khám bệnh</span></a>
            	<ul class="tin_tuc_chuyen_nganh_hover">
                    <li><a href="#">Phác đồ điều trị</a></li>
                    <li><a href="#">Tự chữa bệnh tại nhà</a></li>
                    <li><a href="#">Biện chứng luận trị</a></li>
                    <li><a href="#">Tư vấn và giải đáp</a></li>
                </ul>
            </li>                        
            <li><a href="#" class="parent"><span>Sách</span></a>
            	<ul class="">
                    <li><a href="#">Văn học-thơ ca</a></li>
                    <li><a href="#">Y học</a></li>
                    <li><a href="#">Khí công-Y võ dưỡng sinh</a></li>
                </ul>
            </li>
            <li><a href="#" class="parent"><span>Truyện Ngắn</span></a></li>
            <li><a href="#" class="parent"><span>Báo tường</span></a></li>
            <li><a href="#" class="parent"><span>Tư vấn thiết kế website</span></a></li>
        </ul>
        <div class="clean"></div>
	</div>
</div>
<div class="clear"></div>
<div id="search_box">
	<form action="<?php echo base_url()?>welcome/search" method="post">
		<input type="text" name="txtKey" onfocus="javascript:this.value='';" onblur="javascript:this.value='Từ khóa tìm kiếm';"
	                    class="txtSearch" value="Từ khóa tìm kiếm" />
	    <input type="submit" class="btnSearch" value="Tìm kiếm" />
    </form>
</div>