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
<div id="main_left" style="margin-top:0px;">
	<div id="products_v2">
    	<div id="title">
        	<h4>
        		<?php
        			if($is_parent==true)
        			{
        		?>
            	<span><a href="" class="parent">Sản phẩm</a> &gt; <a href="<?php echo base_url().'cat/'.$cat['term_id'];?>"><?php echo $cat['name'];?></a></span>
            	<?php 
        			}
        			else
        			{ 
            	?>
            	<span><a href="" class="parent">Sản phẩm</a>- <a href="<?php echo base_url().'cat/'.$parentCat['term_id'];?>"><?php echo $parentCat['name'];?></a> - <a href="<?php echo base_url().'welcome/cat/'.$cat['term_id'];?>"><?php echo $cat['name'];?></a></span>
            	<?php 
        			}
        		?>
        	</h4>    
        </div>
        <div class="content">
        	<div class="products-grid">
        	
        	<?php
        	if(count($listProduct))
        	{ 
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
            			
            		</div>
            	</div>
            <?php 
        		}
        	}
        	else {
        	?>
        		<span style="color:red">Hiện tại chưa có sản phẩm nào!</span>
        	<?php
        	}
            ?>            
                <div class="clear"></div>
            </div>            
            <div class="clear"></div>
            <br/>
	        <div class="pager">
				<div class="pages"><?php echo $list_link;?></div>
				<div class="clear"></div>
			</div>
        </div>
	</div>
</div>