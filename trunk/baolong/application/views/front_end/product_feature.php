<div id="list_carousel">
	<a href="#" id="foo_prev" class="prev" style="display: block;"></a>
    <ul id="list-product-ad" style="float: none; margin: 0px; position: absolute;
                        height: 181px; left: 0px;padding-left:50px;">
    <?php
     	$count =0; 
    	foreach ($list_sp_noibat as $sp_noibat)
    	{
    ?>
    	<li>
    		<a title="<?php echo $sp_noibat->post_title;?>" href="javascript:void(0);">
           		<img alt="Rượu ngọc dương sâm" src="<?php echo base_url().'/'.$array_sp_img[$count];;?>"/>
           	</a>
            <p><?php echo $sp_noibat->post_title;?></p>
        </li>
    <?php 
    	$count++;
    	}
    ?>                  
    </ul>
    <a href="#" id="foo_next" class="next" style="display: block;"></a>
</div>
