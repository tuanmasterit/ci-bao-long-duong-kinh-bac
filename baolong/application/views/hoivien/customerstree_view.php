<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
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
<?php $this->load->view('back_end/footer');?>