<script type="text/javascript">
function AddToCart(url,id){
	//var url = jQuery(this).attr('href');
	//var id = jQuery(this).attr('id');			
	jQuery.post(url,{param:id},function(data) {
		jQuery("#cart-count").text(data);
		alert("Bạn đã thêm một sản phẩm!");				
	});
}
</script>
<div id="main_left">
	<div id="products_v2">
    	<div id="title">
        	<h4>
            	<span><a href="" class="parent">Sản phẩm</a> - <a href="<?php echo base_url()."welcome/cat/".$firstTopCat;?>">Đông Dược</a></span>
        	</h4>    
        </div>
        <div class="content">
        	<div class="products-grid">
        	<?php 
        		foreach ($listProduct as $product)
        		{
        	?>
            	<div class="product_item">
            		<div class="img">
            			<a rel="lightbox"  href="<?php echo base_url().'product/'.$product->id;?>">
            				<img class="imgHotProduct" alt="<?php echo $product->post_title;?>" src="<?php echo $this->Post_model->get_featured_image($product->id);?>"/>
            			</a>
            		</div>
            		<div class="clear"></div>
            		<div class="title">
            			<a href="<?php echo base_url().'product/'.$product->id;?>">
            				<h2><?php echo $product->post_title;?></h2>
            			</a>
            		</div>
            		<div class="clear"></div>
            		<div class="price">
            			<span>Giá: <?php echo $this->Post_model->get_meta_value($product->id,'giathitruong');?> VNĐ</span>
            			
            			<a class="imgBtnCss" id="<?php echo $product->id;?>" onclick="AddToCart(this.href,<?php echo $product->id;?>); return false;" href="<?php echo base_url();?>shoppingcart/addToCart">Đặt mua</a>
            			<br/>
            			<p class="p-giamgia">Hội viên giảm 5-25%</p>
            		</div>
            	</div>
            <?php 
        		}
            ?>
            </div>            
        </div>
        <div class="clear"></div>
        <br/>
        <div class="pager">
			<div class="pages"><?php echo $list_link;?></div>
			<div class="clear"></div>
		</div>
    </div>
</div>