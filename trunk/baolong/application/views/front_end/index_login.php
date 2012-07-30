<div id="box_login">
	<div id="box_login_left">
    	<div class="content">
            <div class="top">Đăng nhập</div>
			<div id="c_loginindex">
				<?php if($this->session->userdata('logged_in') != 1){?>
				<form action="<?php echo base_url()?>welcome/login" method="post"  id="index_login">
					<div class="loginerror"><p>Thông tin đăng nhập không hợp lệ</p></div>
					<div class="line">
					<label> Tài khoản:</label>
					<input type="text" class="txt" name="txtUsername" id="username" />
					</div>
					<div class="line">
					<label>Mật khẩu:</label>
					  <input type="password" class="txt" name="txtPassword" id="password" />
					</div>
					<div class="line" id="btn">
						<input type="submit" value="Đăng nhập"  class="btn" /> &nbsp; | &nbsp; <a href="<?php echo base_url();?>hoiviens/register">Đăng ký</a>
					</div>
					<div class="line" id="notiProcess">
					Đang xử lý <img alt="" src="<?php echo base_url()?>application/content/images/ajax-loader.gif"/>
					</div>
				</form>
				<?php }
				else{
				 ?>
					<div class="lineinfo">
					Xin chào:
					 <?php echo $this->session->userdata('display_name') ?>
					</div>
					<div class="lineinfo">
						 <a href="<?php echo base_url()?>hoivien" class="link">Trang quản trị</a>
					</div>
					<div class="lineinfo">
					<a href="<?php echo base_url()?>welcome/logout" class="link">Đăng xuất</a>
					</div>
				 <?php }
				 ?>
			</div>         
            <div class="clear"></div>
        </div>
    </div>
</div>