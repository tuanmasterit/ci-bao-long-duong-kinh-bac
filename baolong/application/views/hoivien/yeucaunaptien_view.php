<?php $this->load->view('back_end/header'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php
		 include('sidebar-left.php');?>        
        <div class="maincontent" style="margin:0 45px 0 260px">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">YÊU CẦU NẠP ĐIỂM VÀO TÀI KHOẢN</a></li>
                </ul><!--maintabmenu-->                
                <div class="content" style="width:100%">
                	<form action="<?php echo base_url()?>hoivien/yeucaunaptien" method="post"  id="index_login">
					<?php if($result=='false')
					{?>
					<div class="loginerror" style="display:block"><p>Số điểm không hợp lệ</p></div>
					<?php }else if($result=='true'){?>
					<div class="loginerror" style="display:block"><p>Yêu cầu nạp điểm thành công</p></div>
					<?php }else{}?>
					<div class="line">
					<label> Số tiền muốn nạp:</label>
					<input type="text" class="txt" name="txtVcoin" id="username" />
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
