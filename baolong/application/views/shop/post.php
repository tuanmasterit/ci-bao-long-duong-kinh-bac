<?php $this->load->view('shop/header');?>	    
    <div id="Container_E">
		<?php $this->load->view('shop/left');?>
		<div class="Right_E">
			<div class="BoxRight_B1_LEFT content_page">
                <div class="spDN">
                    <?php foreach($lstpost as $post){?>
                        <div class="spDN_top"><?php echo $post->post_title;?></div>
                        <div class="spDN_ct">
                            <?php echo $post->post_content;?>
                        </div>
                    <?php }?>
                </div>
            </div>    				
			<?php $this->load->view('shop/right');?>
		</div>
	</div>
<?php $this->load->view('shop/footer');?>