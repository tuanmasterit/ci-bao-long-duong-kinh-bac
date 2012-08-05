<?php $this->load->view('front_end/index_login');?> 
<div id="menuleftv3">
	<div id="menuleft_boxcontent">
    	<div class="content">
        	<div class="title"><h4>Danh sách sản phẩm</h4></div>
        	<ul id="menuleft_content" style="width: 163px;">
        	<?php 
        	foreach ($listCatNav as $catNav)
        	{
        	?>
	        	<?php 
	        	$subCats = $this->Term_model->getSubCatProNav($catNav->term_id);
	        	if(count($subCats))
	        	{
	        	?>
	        	<li id="menu565" class="menusub" style="width: 158px;">
	        		<a title="<?php echo $catNav->name;?>" href="<?php echo base_url().'cat/'.$catNav->term_id;?>" class="parent">
        				<span class="on"><?php echo $catNav->name;?></span>
        			</a>
        			<ul style="display: block ! important; width: 158px; margin-left: 10px;">
        				<?php
        				foreach ($subCats as $subCat)
        				{
        				?>
        					<li style="width: 148px;">
        						<a href="<?php echo base_url().'cat/'.$subCat->term_id;?>"><?php echo $subCat->name;?></a>
        					</li>
        				<?php 
        				}
        				?>
        			</ul>        			
	        	</li>
	        	<?php 	        		
	        	}
	        	else 
	        	{
	        	?>
	        		<li style="width: 158px;">
        				<a title="<?php echo $catNav->name;?>" href="<?php echo base_url().'cat/'.$catNav->term_id;?>" class="parent"><span><?php echo $catNav->name;?></span></a>
        			</li>
	        	<?php 
	        	}
	        	?>   
        	<?php 
        	}
        	?>        		        		
        	</ul>
     	</div>
	</div>
	<div class="clear"></div>
</div>
<div>	
    <?php $lstpost = $this->Post_model->get($this->common->get_configuration('video'),'page');?>    
    <?php foreach($lstpost as $post){?>
    	<?php echo $post->post_content;?>
    <?php }?>
	<!--<object width="245" height="200"><param value="http://www.youtube.com/v/IJlxxfFmjHA?version=3&amp;autoplay=1" name="movie"><param value="true" name="allowFullScreen"><param value="always" name="allowScriptAccess"><embed width="245" height="200" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" src="http://www.youtube.com/v/IJlxxfFmjHA?version=3&amp;autoplay=1"></object>-->
</div>
<p>&nbsp;</p>
<?php $lstpost = $this->Post_model->get($this->common->get_configuration('quangcao'),'page');?>    
<?php foreach($lstpost as $post){?>
	<?php echo $post->post_content;?>
<?php }?>