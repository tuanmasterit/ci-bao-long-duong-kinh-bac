<div id="ft">	
    <div class="ft_menuE">
        <a href="<?php echo base_url();?>">Bảo Long Đường Kinh Bắc</a> |
        <a class="selectedMenu" href="<?php echo base_url();?>shop/<?php echo $shop_id;?>">Trang Chủ</a> |
        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/gioi-thieu">Giới Thiệu</a> |
        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/cat/tin-tuc">Tin Tức</a> |
        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/cat/san-pham">Sản Phẩm</a> |
        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/lien-he">Liên Hệ</a>        
    </div>
    <div class="ft_cp">
        <?php echo $this->Option_model->getOption('footer',$this->User_model->get_user_id_by_shop($shop_id));?>
    </div>
</div>
</div>
</body></html>