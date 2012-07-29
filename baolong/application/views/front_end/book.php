<div id="listnews">
	<div id="title">
		<h4>			
            <span><a href="<?php echo base_url().'welcome/book/'.$cat['term_id'];?>"><?php echo $cat['name'];?></a></span>            
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
				<a title="<?php echo $news->post_title;?>" href="<?php echo base_url().'welcome/bookdetail/'.$news->id;?>">
					<img alt="" src="<?php echo base_url().'application/content/images/book_stack.gif'?>">
				</a>
			</div>
			<h2>
				<a title="" href="<?php echo base_url().'welcome/bookdetail/'.$news->id;?>"><?php echo $news->post_title;?></a>
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