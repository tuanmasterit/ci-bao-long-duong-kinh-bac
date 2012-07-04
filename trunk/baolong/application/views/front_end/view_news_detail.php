<div id="news_detail_v2">
	<div id="title">
		<h4>
			<?php
        		if($is_parent==true)
        		{
        	?>
            <span><a href="" class="parent">Tin tức</a> &gt; <a href="<?php echo base_url().'welcome/cat/'.$cat->term_id;?>"><?php echo $cat->name;?></a></span>
            <?php 
        		}
        		else
        		{ 
            ?>
            <span><a href="" class="parent">Tin tức</a>- <a href="<?php echo base_url().'welcome/cat/'.$parentCat['term_id'];?>"><?php echo $parentCat['name'];?></a> - <a href="<?php echo base_url().'welcome/cat/'.$cat->term_id;?>"><?php echo $cat->name;?></a></span>
            <?php 
        		}
        	?>
		</h4>
	</div>	
	<div class="content">
		<h1><b><?php echo $news_detail->post_title;?></b></h1>
		<span class="views"></span>
		<span class="date_modified">
			<?php				
				$time = strtotime($news_detail->post_date);
				$myDate = date( 'd/m/y h:m:s', $time);
				echo $myDate;
			?>
		</span>
		<div class="clear"></div>
		<div class="relative_news">
		<?php 
			foreach ($listRelation as $relation)
			{
		?>
			<a title="<?php echo $relation->post_title;?>" href="<?php echo base_url().'news/detail/'.$relation->id;?>"> &gt;&gt; <?php echo $relation->post_title;?></a>
			<br>			
		<?php }?>
		</div>
		<div class="clear"></div>
		<h2></h2>		
					
		<br/>
		<div style="text-align: justify;">
			<?php echo $news_detail->post_content;?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
