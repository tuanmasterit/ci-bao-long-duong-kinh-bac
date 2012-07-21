<div id="list-product-featured">	
    <ul id="featured-product" class="jcarousel-skin-tango">
    <?php
     	
    	foreach ($list_sp_noibat as $sp_noibat)
    	{
    ?>
    	<li>
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
