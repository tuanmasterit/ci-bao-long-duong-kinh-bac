<?php $this->load->view('back_end/header'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php
		 include('sidebar-left.php');?>        
        <div class="maincontent" style="margin:0 45px 0 260px">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">CẬP NHẬT CHIẾT KHẤU</a></li>
                </ul><!--maintabmenu-->                
                <div class="content" style="width:100%">
                	<form action="<?php echo base_url()?>admin/capnhatongheo" method="post"  id="index_login">
					
					<?php 
					if($_SESSION['message']!='')
					{					echo '<div class="loginerror" style="display:block"><p>'.$_SESSION['message'].'</p></div>';
					}
					?>
					
					<div class="line">
					<label> Số tiền được giảm giá:</label>
					<input type="text" class="txt" name="txtMoney" style="text-align:right" id="username" />(000 VND)	
											<label>&nbsp;&nbsp;&nbsp;&nbsp; Tài khoản mua hàng:</label>
<input type="text" class="txt" name="txtUsername" id="username" />
<input type="hidden" name="type" value="1" />
					</div>
					
					<div class="line" id="btn">
					<input type="submit" value="Cập nhật"  class="btn" />
					</div>
				</form>
                    <br clear="all" /><br />
        
                <br /><br />

                    
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');?>

