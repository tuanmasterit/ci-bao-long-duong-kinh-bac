<div id="boxProducts">
	<div id="title">
		<h4>
        	<?php
        		if($is_parent==true)
        		{
        	?>
            <span><a href="" class="parent">Sản phẩm</a> &gt; <a href="<?php echo base_url().'welcome/cat/'.$cat->term_id;?>"><?php echo $cat->name;?></a></span>
            <?php 
        		}
        		else
        		{ 
            ?>
            <span><a href="" class="parent">Sản phẩm</a>- <a href="<?php echo base_url().'welcome/cat/'.$parentCat['term_id'];?>"><?php echo $parentCat['name'];?></a> - <a href="<?php echo base_url().'welcome/cat/'.$cat->term_id;?>"><?php echo $cat->name;?></a></span>
            <?php 
        		}
        	?>
        </h4> 
	</div>
	<div class="contentboxProduct">
		<div class="box_img_product_detail" style="position: relative;">
			<a id="imageZoom" class="imageZoom" href="<?php echo base_url().'welcome/product/'.$product->id;?>" style="outline-style: none; text-decoration: none; cursor: crosshair; display: block; position: relative; height: 271px; width: 269px;">
				<img id="lagerImage" alt="Hỏa Long" src="<?php echo $this->Post_model->get_featured_image($product->id); ?>" />
			</a>
		</div>
		<div class="box_product_detail">
			<div id="name"><?php echo $product->post_title;?></div>
			<div class="clear"></div>
			<div class="tech-detail">
				<div class="name">
					<span class="td1">Giá bán: </span>
					<span class="td2" style="color:red;"><?php echo $this->Post_model->get_meta_value($product->id,'price');?></span>
				</div>
				<div class="clear"></div>
				<div class="product-code">
					<span class="td1">Mã sản phẩm: </span>
					<span class="td2"></span>
				</div>
				<div class="clear"></div>
				<div class="status">
					<span class="td1">Khuyến mại: </span>
					<span class="td2"></span>
				</div>
				<div class="clear"></div>
				<div class="dimensions">
					<span class="td1">Tình trạng: </span>
					<span class="td2">Còn hàng</span>
				</div>				
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="productinfo">
			<?php echo $product->post_content;?>
		</div>
		<div class="clear"></div>
		<div id="products_ingroup">
			<div class="content">
				<div class="top">
					<h4>Sản phẩm liên quan</h4>
				</div>
				<div class="products-grid">
				<?php 
					foreach ($listProduct as $product)
        			{
        		?>
            	<div class="product_item">
            		<div class="img">
            			<a rel="lightbox"  href="<?php echo base_url().'welcome/product/'.$product->id;?>">
            				<img class="imgHotProduct" alt="<?php echo $product->post_title;?>" src="<?php echo base_url().'/'.$this->Post_model->get_featured_image($product->id);?>"/>
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
            			<span><?php echo $this->Post_model->get_meta_value($product->id,'price');?></span>            			
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
</div>
