<?php $this->load->view('back_end/header'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php
		 include('sidebar-left.php');?>        
        <div class="maincontent" style="margin:0 45px 0 260px">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="./dashboard.html">CÂY KHÁCH HÀNG</a></li>
                </ul><!--maintabmenu-->                
                <div class="content" style="width:100%">
                	<ul class="">
                    	<?php echo $htmlTree;?>
                    </ul>
                    
                    <br clear="all" /><br />
        
                <br /><br />

                    
                </div><!--content-->
                
            </div><!--maincontentinner-->                
        </div><!--maincontent-->        
             
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->    
</body>
</html>
