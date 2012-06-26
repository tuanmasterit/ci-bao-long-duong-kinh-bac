<div id="box_topnews">
	<div id="hot_news">
    	<div class="content">
            <div class="top">Tin nổi bật</div>
            <ul>
            <?php 
            	$i=0;
            	foreach($list_news as $news)
            	{             		         		
            ?>
                <li>
                    <div class="img"><img src="<?php echo base_url().'/'.$arr_img[$i];?>"/></div>
                    <p>
                        <a title="<?php echo $news->post_title;?>" class="tooltip" href="">
                            <?php echo $news->post_title;?>
                        </a>
                    </p>
                </li>
            <?php 
            	$i++;
            	}
            ?>                
            </ul>            
            <div class="clear"></div>
        </div>
    </div>
</div>