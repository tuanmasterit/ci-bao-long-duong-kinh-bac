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
        				<a title="<?php echo $catNav->name;?>" href="<?php echo base_url().'welcome/cat/'.$catNav->term_id;?>" class="parent"><span><?php echo $catNav->name;?></span></a>
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
	<iframe width="245" height="200" src="http://www.youtube.com/embed/3lShNj_FFDQ" frameborder="0" allowfullscreen></iframe>
</div>
<p>&nbsp;</p>
<div id="menu_list">
	<div class="menu">
    	<a href="#">
        	<img src="<?php echo base_url();?>application/content/images/tu-van-giai-dap-1.jpg"/>
        </a>
    </div>
    <div class="clear"></div>
    <div class="menu">
    	<a href="#">
        	<img src="<?php echo base_url();?>application/content/images/benhviendakhoabaolong.jpg"/>
        </a>
    </div>
    <div class="clear"></div>
    <div class="menu">
        <a href="#">
            <img src="<?php echo base_url();?>application/content/images/phac-do-dieu-tri.jpg"/>
        </a>
    </div>
    <div class="clear"></div>
    <div class="menu">
    	<a href="#">
        	<img src="<?php echo base_url();?>application/content/images/bien-chung-luan-tri.jpg"/>
        </a>
    </div>
    <div class="clear"></div>
    <div class="menu">
    	<a href="#">
        	<img src="<?php echo base_url();?>application/content/images/tu-chua-benh.jpg"/>
        </a>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div>
	<embed width="245" height="200" align="middle" quality="high" wmode="transparent" allowscriptaccess="always" flashvars="alink1=http%3A%2F%2Flogging.admicro.vn%2F_adc.html%3Fadm_domain%3Dhttp%253A%2F%2Fdantri.com.vn%2F%26adm_campaign%3D1023166%26adm_aditem%3D137522%26adm_zoneid%3D256%26adm_channelid%3D-1%26adm_rehttp%3Dhttp%253A%2F%2Fwww.vinamazda.vn%2FTin-tuc-Su-kien%2FTin-tuc%2FVinaMazda%2FUu-dai-len-den-50-trieu-cho-khach-hang-mua-Mazda-trong-thang-6%26adm_random%3D0.6802513646725901&amp;atar1=_blank" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" alt="" src="http://admicro2.vcmedia.vn/images/dan-tri-300x250_3.swf"/>
</div>
<p>&nbsp;</p>
<div>
	<embed width="245" height="200" align="middle" quality="high" wmode="transparent" allowscriptaccess="always" flashvars="alink1=http%3A%2F%2Flogging.admicro.vn%2F_adc.html%3Fadm_domain%3Dhttp%253A%2F%2Fdantri.com.vn%2F%26adm_campaign%3D1020634%26adm_aditem%3D136693%26adm_zoneid%3D224%26adm_channelid%3D-1%26adm_rehttp%3Dhttp%253A%2F%2Fbs.serving-sys.com%2FBurstingPipe%2FadServer.bs%253Fcn%253Dtf%257Cc%253D20%257Cmc%253Dclick%257Cpli%253D4526557%257CPluID%253D0%257Cord%253D%255Btimestamp%255D%26adm_random%3D0.9439774947383233&amp;atar1=_blank" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" alt="" src="http://admicro2.vcmedia.vn/images/300x250_shell_amazing_01-1.swf"/>
</div>
<p>&nbsp;</p>
<div>
	<embed width="245" height="200" align="middle" quality="high" wmode="transparent" allowscriptaccess="always" flashvars="alink1=http%3A%2F%2Flogging.admicro.vn%2F_adc.html%3Fadm_domain%3Dhttp%253A%2F%2Fdantri.com.vn%2F%26adm_campaign%3D1018243%26adm_aditem%3D111522%26adm_zoneid%3D227%26adm_channelid%3D-1%26adm_rehttp%3Dhttp%253A%2F%2Fsieuthidongho.com.vn%2F%26adm_random%3D0.8655418944778251&amp;atar1=_blank" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" alt="" src="http://st.polyad.net/AdImages/2012/07/02/Nestle_300x250_29062012.swf">
</div>