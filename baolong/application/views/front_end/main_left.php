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
		<img src="<?php echo base_url().'/'.$this->Post_model->get_featured_image($tieubieu->id);?>" alt="" data-transition="slideInLeft" title="<?php echo $tieubieu->post_title;?>" />
	<?php 
		}
		else 
		{
	?>
    	<img src="<?php echo base_url().'/'.$this->Post_model->get_featured_image($tieubieu->id);?>" alt="" title="<?php echo $tieubieu->post_title;?>" />
        
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
    	<?php echo $tieubieu->post_title;?>
	</div>
	<?php 
	$i++;
	}
	?>	
</div>