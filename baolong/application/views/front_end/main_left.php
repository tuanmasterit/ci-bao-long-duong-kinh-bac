<div id="adv-top" class="slider-wrapper theme-default">
	<div class="ribbon"></div>
	<div id="coin-slider" class="nivoSlider">
	<?php
	$i=0; 
	foreach ($list_tieubieu as $tieubieu)
	{
		if($i==2)
		{
	?>	
		<a href="<?php echo base_url().'news/detail/'.$tieubieu->id;?>"><img src="<?php echo $this->Post_model->get_featured_image($tieubieu->id);?>" alt="" data-transition="slideInLeft" title="<?php echo $tieubieu->post_title;?>" /></a>
	<?php 
		}
		else 
		{
	?>
    	<a href="<?php echo base_url().'news/detail/'.$tieubieu->id;?>"><img src="<?php echo $this->Post_model->get_featured_image($tieubieu->id);?>" alt="" title="<?php echo $tieubieu->post_title;?>" /></a>
        
    <?php 
		}
		$i++;
	}
	?>
	</div>
	<?php 
	$i=1;
	foreach ($list_tieubieu as $tieubieu)
	{
	?>
	<div id="caption<?php echo $i;?>" class="nivo-html-caption">
    	<a href="<?php echo base_url().'news/detail/'.$tieubieu->id;?>"><?php echo $tieubieu->post_title;?></a>
	</div>
	<?php 
	$i++;
	}
	?>	
</div>