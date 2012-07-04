<div id="listnews">
	<div id="title">
		<h4>
			<?php
        		if($is_parent==true)
        		{
        	?>
            <span><a href="" class="parent">Tin tức</a> &gt; <a href="<?php echo base_url().'news/cat/'.$cat['term_id'];?>"><?php echo $cat['name'];?></a></span>
            <?php 
        		}
        		else
        		{ 
            ?>
            <span><a href="" class="parent">Tin tức</a>- <a href="<?php echo base_url().'news/cat/'.$parentCat['term_id'];?>"><?php echo $parentCat['name'];?></a> - <a href="<?php echo base_url().'news/cat/'.$cat['term_id'];?>"><?php echo $cat['name'];?></a></span>
            <?php 
        		}
        	?>
		</h4>
	</div>
	<div id="listnews_content">
	<?php 
	if(!count($lstNews))
	{
	?>
	<p style="color:red">Chuyên mục đang được cập nhật</p>
	<?php 
	}
	else {
	?>
		<ul>
			<?php 			
			foreach ($lstNews as $news)
			{
			?>
			<li>
			<div class="img">
				<a title="<?php echo $news->post_title;?>" href="<?php echo base_url().'news/'.$news->id;?>">
					<img alt="" src="<?php echo $this->Post_model->get_featured_image($news->id);?>">
				</a>
			</div>
			<h2>
				<a title="" href="<?php echo base_url().'news/detail/'.$news->id;?>"><?php echo $news->post_title;?></a>
			</h2>
			<p></p>
			<div class="clear"></div>
			</li>
		<?php 
			}
		}
			?>
		</ul>
		<div class="clear"> </div>
		<div id="paging">
			<?php echo $list_link;?>
		</div>
		<div class="clear"> </div>
	</div>
</div>