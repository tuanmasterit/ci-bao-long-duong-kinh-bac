<div id="list_promo" class="slide_carousel">	
	<ul id="promo" class="jcarousel-skin-tango promo-slider">
        <?php     	
    	foreach ($list_sp_noibat as $sp_noibat)
    	{
		?>
			<li class="item">
				<a title="<?php echo $sp_noibat->post_title;?>" href="<?php echo base_url();?>product/<?php echo $sp_noibat->id;?>">
					<img alt="<?php echo $sp_noibat->post_title;?>" src="<?php echo $this->Post_model->get_featured_image($sp_noibat->id);?>"/>
				</a>
				<p><a href="<?php echo base_url();?>product/<?php echo $sp_noibat->id;?>"><?php echo $sp_noibat->post_title;?></a></p>
			</li>
		<?php 			
		}
		?>
	</ul>	    
</div>
<div id="footer_text">
	<p class="otherinfo">Bản quyền thuộc công ty TNHH Bảo Long Đường Kinh Bắc</p>
    <p class="adr">Địa chỉ:  Số 31 - Phố Mới - P. Đồng Nguyên - Từ Sơn - Bắc Ninh</p>
    <p class="tel">Điện thoại: 0241.374.3870 | Fax: 0241.374.3870 </p>
    <p class="tel">Mã số thuế: 2300742687</p>
</div>            
<div id="menu_bottom">
	<ul>
		<li><a title="Trang chủ" href="<?php echo base_url();?>">Trang chủ</a></li>
		<li><a title="Tuyển dụng" href="">Tuyển dụng</a></li>
		<li><a onclick="window.scroll(); return false" href="#">Go to top</a></li>
	</ul>
	<div class="clear"></div>
</div>            
<div id="counter">
	<div class="content">
    	<span><strong>Lượt truy cập: </strong><?php	echo $this->Count_access->countAccess();?></span>
        <span><strong>Online: </strong> <?php echo $this->Count_access->countOnline();?></span>
        
        <a target="_blank" href="http://tasvis.com.vn" title="">Powered by Bảo Long Đường Kinh Bắc</a>
	</div>
</div>