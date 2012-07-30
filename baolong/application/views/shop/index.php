<?php $this->load->view('shop/header');?>	    
    <div id="Container_E">
		<?php $this->load->view('shop/left');?>
		<div class="Right_E">
            <div class="BoxRight_B1_LEFT">
                <div class="spHot">
                    <div class="spHot_top">Sản phẩm mới</div>
                    <div class="spHot_ct">
                    	<?php if(isset($listProduct)){?>
                            <?php foreach($listProduct as $product_hot){?>
	                            <?php //print_r($product_hot);?>                                
                                <div class="spDN_1_group_box">
                                    <div class="spDN_1_group_img">
                                        <a title="<?php echo $product_hot->post_title;?>" href="<?php echo base_url().'shop/'.$shop_id.'/product/'.$product_hot->id;?>">
                                            <img src="<?php echo $this->Post_model->get_featured_image($product_hot->id); ?>" />
                                        </a>
                                    </div>
                                    <div class="spDN_1_group_txt">
                                        <div style="line-height:20px;">
                                            <a title="<?php echo $product_hot->post_title;?>" href="<?php echo base_url().'shop/'.$shop_id.'/product/'.$product_hot->id;?>"><?php echo $product_hot->post_title;?></a>
                                        </div>
                                        <div style="line-height:20px; color:#FF0000">
                                            <?php echo $this->Post_model->get_meta_value($product_hot->id,'giathitruong');?> VNĐ
                                        </div>
                                    </div>
                                </div>			    	        					        
                            <?php }?>
                        <?php }?>                            
                    </div>     	        	                 
                </div>                    
            </div>        
		    <?php $this->load->view('shop/right');?>
		</div>
</div>
<?php $this->load->view('shop/footer');?>