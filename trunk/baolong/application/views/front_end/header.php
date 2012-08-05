<div id="logo">
	<img src="<?php echo base_url();?>application/content/images/banner.png" />
</div>

<div id="shoppingcart">
	<a id="mini-cart" class="mini-cart" title="" href="<?php echo base_url()?>shoppingcart/index">
		<img class="img" src="<?php echo base_url();?>application/content/images/icon_cart.png">
		<p>
			Giỏ hàng:
			<strong id="cart-count"><?php echo $this->cart->total_items();?></strong>
		</p>
	</a>
</div>

<div class="clear"></div>
<div id="menu-top">
	<div id="menu-top-center">
		<ul id="nav">
			<li></li>
            <li class="home"><a href="<?php echo base_url();?>" title="Trang chủ"><img src="<?php echo base_url();?>application/content/images/home2.png" /></a></li>
            <li><a href="<?php if(isset($gioithieu_id)){ echo base_url().'news/cat/'.$gioithieu_id;}?>" class="parent"><span>Giới thiệu</span></a>
            	<ul class="sub-menu">
		            <?php 
		            	foreach ($lst_gioi_thieu as $gioi_thieu)
		            	{
		            ?>
		            	<li><a href="<?php echo base_url().'news/cat/'.$gioi_thieu->term_id;?>"><?php echo $gioi_thieu->name;?></a></li>
		            <?php }?>
	            </ul>
            </li>
            <li><a href="<?php echo base_url().'news/cat/'.$tintuc_id;?>" class="parent"><span>Tin tức</span></a>
                <ul class="tin_tuc_hover">
                    <?php 
                    foreach ($lst_tin_tuc as $tin_tuc)
                    {
                    ?>
                    <li><a href="<?php echo base_url().'news/cat/'.$tin_tuc->term_id;?>"><?php echo $tin_tuc->name;?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li><a href="#" class="parent"><span>Sản phẩm</span></a>
            	<ul class="cam_nang_hover">
                    <?php
                    foreach ($listCatNav as $catNav)
                    { 
                    ?>
                    <li><a href="<?php echo base_url().'cat/'.$catNav->term_id;?>"><?php echo $catNav->name;?></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </li>
            <li><a href="<?php echo base_url().'news/cat/'.$y_te_id;?>" class="parent"><span>Y tế sức khỏe</span></a>
            	<ul class="y_te_suc_khoe_hover">
                    <?php 
                   	foreach ($lst_y_te as $y_te)
                   	{
                    ?>
                    <li><a href="<?php echo base_url().'news/cat/'.$y_te->term_id;?>"><?php echo $y_te->name;?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li><a href="<?php echo base_url().'news/cat/'.$tu_van_id;?>" class="parent"><span>Tư vấn khám bệnh</span></a>
            	<ul class="tin_tuc_chuyen_nganh_hover">
                    <?php 
                   	foreach ($lst_tu_van as $tu_van)
                   	{
                    ?>
                    <li><a href="<?php echo base_url().'news/cat/'.$tu_van->term_id;?>"><?php echo $tu_van->name;?></a></li>
                    <?php }?>
                </ul>
            </li>                        
            <li><a href="#" class="parent"><span>Sách</span></a>
            	<ul class="">
                    <?php 
                   	foreach ($lst_sach as $sach)
                   	{
                    ?>
                    <li><a href="<?php echo base_url().'welcome/book/'.$sach->term_id;?>"><?php echo $sach->name;?></a></li>
                    <?php }?>
                    <li><a href="<?php echo base_url().'news/cat/'.$truyen_ngan_id;?>">Truyện Ngắn</a></li>
            		<li><a href="<?php echo base_url().'news/cat/'.$bao_tuong_id;?>">Báo tường</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url().'news/cat/58'?>" class="parent"><span>Tín ngưỡng tâm linh</span></a>
            	<ul>
            		<li><a href="<?php echo base_url().'news/cat/58'?>">Bài viết</a></li>
            		<li><a href="http://www.thichchanquang.com" target="_blank">Phật giáo Việt Nam</a></li>
            	</ul>
            </li>
            <li><a href="<?php echo base_url();?>pages/index/34" class="parent"><span>Tư vấn thiết kế website</span></a></li>
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