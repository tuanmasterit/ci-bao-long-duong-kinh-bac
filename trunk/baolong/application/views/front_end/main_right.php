<div id="box_topnews">
	<div id="hot_news">
    	<div class="content">
            <div class="top">Tin nổi bật</div>
            <ul>
            <?php 
            	foreach($list_news as $news)
            	{             		         		
            ?>
                <li>
                    <div class="img"><img src="<?php echo base_url().'/'.$news->meta_value;?>"/></div>
                    <p>
                        <a title="<?php echo $news->post_title;?>" class="tooltip" href="">
                            <?php echo $news->post_title;?>
                        </a>
                    </p>
                </li>
            <?php }?>                
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>