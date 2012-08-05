<div id="adv-top" class="slider-wrapper theme-default">                
<div class="slider-wrapper theme-default">
    <div class="ribbon"></div>
    <div id="coi-slider" class="nivoSlider">
        <?php foreach ($list_tieubieu as $tieubieu)
        {?>                                                
            <a href="<?php echo base_url().'news/detail/'.$tieubieu->id;?>"><img src="<?php echo $this->Post_model->get_featured_image($tieubieu->id);?>" alt="" title="<?php echo $tieubieu->post_title;?>" /></a>
        <?php }?>
    </div>
    <?php $i=1;?>
    <?php foreach ($list_tieubieu as $tieubieu)
    {?>
        <div id="caption<?php echo $i;?>" class="nivo-html-caption">
            <a href="<?php echo base_url().'news/detail/'.$tieubieu->id;?>"><?php echo $tieubieu->post_title;?></a>
        </div>
    <?php $i++;}?>
</div>            
</div>