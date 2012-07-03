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
            			<a rel="lightbox"  href="<?php echo base_url().'welcome/product/'.$product->id;?>">
            				<img class="imgHotProduct" alt="<?php echo $product->post_title;?>" src="<?php echo $this->Post_model->get_featured_image($product->id);?>"/>
            			</a>
            		</div>
            		<div class="clear"></div>
            		<div class="title">
            			<a href="<?php echo base_url().'welcome/product/'.$product->id;?>">
            				<h2><?php echo $product->post_title;?></h2>
            			</a>
            		</div>
            		<div class="clear"></div>
            		<div class="price">
            			<span>Thị trường: <?php echo $this->Post_model->get_meta_value($product->id,'giathitruong');?> </span>
            			<br/>
            			<span>Hội viên: <?php echo $this->Post_model->get_meta_value($product->id,'giahoivien');?></span>
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