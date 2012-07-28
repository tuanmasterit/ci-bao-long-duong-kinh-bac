<div id="main_left" style="margin-top:0px;">
	<div id="products_v2">
    	<div id="title">
        	<h4>        		
            	<span><a href="" class="parent">Đăng ký hội viên</a></span>	
            </h4>    
        </div>
        <div id="content" style="margin-top:20px">
        	<div id="contactBox">
        	<?php echo form_open('hoiviens/register',array('id'=>'formID','class'=>'stdform'));?>
	        	
	        	<fieldset class="box_Contact">
	        		<div class="row">
						<label style="float: left"> Họ tên *</label>
						<input id="txtName" type="text" name="txtName" class="validate[required]"/>
					</div>
					<div class="row">
						<label style="float: left"> Năm sinh *</label>
						<input id="txtName" type="text" name="txtNamSinh" class="validate[required]"/>
					</div>
					<div class="row">
						<label style="float: left"> Địa chỉ *</label>
						<input id="txtName" type="text" name="txtDiaChi" class="validate[required]"/>
					</div>
					<div class="row">
						<label style="float: left"> Điện thoại *</label>
						<input id="txtName" type="text" name="txtDienThoai" class="validate[required]"/>
					</div>
					<div class="row">
						<label style="float: left">Email</label>
						<input id="txtName" type="text" name="txtEmail"/>
					</div>
					<div class="row">
						<label style="float: left">Người giới thiệu *</label>
						<input  type="text" name="txtHoiVien" class="validate[required]"/>						
					</div>
					<div class="row">
						<label style="float: left">Người chỉ định *</label>
						<input  type="text" name="txtChiDinh" class="validate[required]"/>						
					</div>
                    <div class="row">
						<label style="float: left">Giới tính </label>
						<select name="slGioiTinh">
                            <option value="None">None</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>						
					</div>
                    <div class="row">
						<label style="float: left">Tên gian hàng  *</label>
						<input  type="text" name="txtGianHang" class="validate[required]"/>						
					</div>
                    <div class="row">
						<label style="float: left" >Chứng minh thư  *</label>
						<input  type="text" name="txtCMT" class="validate[required]"/>						
					</div>
                    
                    <div class="row">
						<label style="float: left">Nơi ở hiện tại </label>
						<input  type="text" name="txtNoiO"/>						
					</div>
                    <div class="row">
						<label style="float: left">Số tài khoản </label>
						<input  type="text" name="txtTaiKhoan"/>						
					</div>
                    <div class="row">
						<label style="float: left">Tên ngân hàng</label>
						<input  type="text" name="txtNganHang"/>						
					</div>
					<br/>
					<div class="row1">
						<input id="btnSubmit" class="btnSubmit" type="submit"  value="Gửi đi" name="btnSubmit"/>
						<input id="btnReset" class="btnSubmit" type="reset"  value="Làm lại" name="btnReset"/>
					</div>
	        	</fieldset>
	        	<?php echo form_close();?>
	        </div>
        </div>
	</div>
</div>