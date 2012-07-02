<div id="listnews">
	<div id="title">
		<h4>
			<span>
				<a href="<?php echo base_url()?>news">Tin tức</a>
			</span>
		</h4>
	</div>
	<div id="listnews_content">
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
			?>
		</ul>
		<div class="clear"> </div>
		<div id="paging">
			<?php echo $list_link;?>
		</div>
		<div class="clear"> </div>
	</div>
</div>