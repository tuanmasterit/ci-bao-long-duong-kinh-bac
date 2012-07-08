<div id="box_login">
	<div id="box_login_left">
    	<div class="content">
            <div class="top">Đăng nhập</div>
			<div>
				<form action="<?php echo base_url()?>welcome/login" method="post"  id="index_login">
					<div class="loginerror"><p>Invalid username or password</p></div>
					<div class="line">
					Tài khoản:
					<input type="text" class="txt" name="txtUsername" id="username" />
					</div>
					<div class="line">
					Mật khẩu:
					<input type="password" class="txt" name="txtPassword" />
					</div>
					<div class="line">
					<input type="submit" value="Đăng nhập" />
					</div>
				</form>
			</div>         
            <div class="clear"></div>
        </div>
    </div>
</div>