<div id="main_left">
	<div id="products_v2">
    	<div id="title">
        	<h4>
            	<span><a href="" class="parent">Sản phẩm</a> - <a href="/vi/san-pham/dong-duoc.aspx">Đông Dược</a></span>
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
            			<a rel="lightbox"  href="<?php echo base_url().'welcome/product/'.$product['id'];?>">
            				<img class="imgHotProduct" alt="<?php echo $product['post_title'];?>" src="<?php echo base_url().'/'.$this->Post_model->get_featured_image($product['id']);?>"/>
            			</a>
            		</div>
            		<div class="clear"></div>
            		<div class="title">
            			<a href="<?php echo base_url().'welcome/product/'.$product['id'];?>">
            				<h2><?php echo $product['post_title'];?></h2>
            			</a>
            		</div>
            		<div class="clear"></div>
            		<div class="price">
            			<span><?php echo $this->Post_model->get_meta_value($product['id'],'price');?></span>
            			<a class="imgBtnCss" onclick="AddToCart(this.href,453); return false;" target="_blank" href="/vi/shoppingcart.aspx">Đặt mua</a>
            		</div>
            	</div>
            <?php 
        		}
            ?>
            </div>            
            <div class="clear"></div>
        </div>
        </div>
        </div>