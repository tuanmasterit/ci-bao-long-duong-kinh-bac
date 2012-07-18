<div id="news_detail_v2">
	<div id="title">
		<h4>
			<?php 
			foreach ($page as $p)
			{
			?>			
            <span><a href="<?php echo base_url().'pages/index/'.$p->id;?>"><?php echo $p->post_title;?></a></span>      
            <?php }?>      
		</h4>
	</div>	
	<div class="content">
		<?php 
			foreach ($page as $p)
			{
			?>
		<h1><b><?php echo $p->post_title;?></b></h1>
		<span class="views"></span>
		<span class="date_modified">
			<?php				
				$time = strtotime($p->post_date);
				$myDate = date( 'd/m/y h:m:s', $time);
				echo $myDate;
			?>
		</span>
		
		
		<div class="clear"></div>
		<h2></h2>		
					
		<br/>
		<div style="text-align: justify;">
			<?php echo $p->post_content;?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<?php }?>      
	</div>
</div>
