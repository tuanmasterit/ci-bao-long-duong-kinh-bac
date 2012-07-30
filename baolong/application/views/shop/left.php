<div class="left_E">
		    <div class="BoxL1">
				<div class="BoxL1_Top">Danh mục sản phẩm</div>
                    <div class="BoxL1_ct">                        	
                        <ul>                        
                            <?php $lstcategory=$this->Term_model->get(0,-1,0,'catpro',$this->User_model->get_user_id_by_shop($shop_id));?>
                            <?php foreach($lstcategory as $category){?>
                                <li><a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/category/<?php echo $category->term_id;?>"><?php echo $category->name;?></a></li>
                            <?php }?>                            	 
                        </ul>
                    </div>
		        </div>
<div id="ctl00_ContentPlaceHolder1_ctl09_pnlNews">
	
    <div class="sukien">
		<div class="sukien_top">Tin tức &amp; Sự kiện</div>
		
		<div class="sukien_ct">
		    	<?php $lstnews=$this->Post_model->get(0, 'post',3,0,'DESC','post_date',0,$this->User_model->get_user_id_by_shop($shop_id));?>
                <?php foreach($lstnews as $new){?>
			    <div class="sukien_group">                	
				    <div class="sukien_group_img">
				        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/<?php echo $new->id;?>">
				        	<img src="<?php echo $this->Post_model->get_featured_image($new->id); ?>" />
                        </a>
				    </div>
				    <div class="sukien_group_txt">
					    <div class="sukien_tt">
					        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/<?php echo $new->id;?>"><?php echo $new->post_title;?></a>
					    </div>
					    <div class="sukien_dt"><?php echo $new->post_date;?></div>
				        <?php echo $new->post_excerpt;?>    				
				    </div>
				    <div class="desc_link">
				        <a href="<?php echo base_url();?>shop/<?php echo $shop_id;?>/post/<?php echo $new->id;?>">Xem tiếp »</a>
				    </div>    			
			    </div>
                <?php }?>			    
		</div>
	</div>

</div> 
</div>