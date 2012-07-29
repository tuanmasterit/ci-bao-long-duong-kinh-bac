<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php
		 include('sidebar-left.php');?>        
        <div class="maincontent" style="margin:0 45px 0 260px">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">YÊU CẦU QUY ĐỔI</a></li>
                </ul><!--maintabmenu-->                
                <div class="content" style="width:100%">
                	<form action="<?php echo base_url()?>hoivien/yeucauquydoi" method="post"  id="index_login">
					<?php if($result=='false')
					{?>
					<div class="loginerror" style="display:block"><p>Số điểm không hợp lệ</p></div>
					<?php }else if($result=='true'){?>
					<div class="loginerror" style="display:block"><p>Quy đổi thành công</p></div>
					<?php }else{}?>
					<div class="line">
					<label> Điểm muốn quy đổi:</label>
					<input type="text" class="txt" name="txtVcoin" id="username" />( số điểm có trong tài khoản: <?php echo $crrVcoin; ?>)
					<input type="hidden" name="typeQD" value="2"/>
					</div>
					<div class="line" id="btn">
					<input type="submit" value="Thực hiện"  class="btn" />
					</div>
				</form>
                    <br clear="all" /><br />
        
                <br /><br />

                    
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');?>
