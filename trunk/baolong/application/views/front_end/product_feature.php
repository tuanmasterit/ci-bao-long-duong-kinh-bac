<div id="list_carousel">
	<a href="#" id="foo_prev" class="prev" style="display: block;"></a>
    <ul id="list-product-ad" style="float: none; margin: 0px; position: absolute;
                        height: 181px; left: 0px;padding-left:50px;">
    <?php
     	
    	foreach ($list_sp_noibat as $sp_noibat)
    	{
    ?>
    	<li>
    		<a title="<?php echo $sp_noibat->post_title;?>" href="javascript:void(0);">
           		<img alt="<?php echo $sp_noibat->post_title;?>" src="<?php echo $this->Post_model->get_featured_image($sp_noibat->id);?>"/>
           	</a>
            <p><?php echo $sp_noibat->post_title;?></p>
        </li>
    <?php 
    	
    	}
    ?>                  
    </ul>
    <a href="#" id="foo_next" class="next" style="display: block;"></a>
</div>
