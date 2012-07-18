<div id="list_carousel" class="slide_carousel">
	<a href="javascript:return false;" id="foo_prev" class="prev" style="display: block;"></a>
    <ul id="list-product-ad" style="float: none; margin: 0px; position: absolute;
                        height: 181px; left: 0px;padding-left:50px;">
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
    <a href="javascript:return false;" id="foo_next" class="next" style="display: block;"></a>
</div>
