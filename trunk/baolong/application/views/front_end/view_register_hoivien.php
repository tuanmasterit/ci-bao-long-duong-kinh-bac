<div id="main_left" style="margin-top:0px;">
<style type="text/css">
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 129px;
		margin: 10px 0px 0px 0px;
		width: 360px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
		top:38px;
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
		list-style-type: none;	
		list-style: none;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>

<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			jQuery('#suggestions').hide();
		} else {
			jQuery.post("<?php echo base_url();?>rpc/index", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					jQuery('#suggestions').show();
					jQuery('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		if(thisValue != null){
			jQuery('#inputString').val(thisValue);
			jQuery('#lblAuthor').html('<b>'+thisValue+'</b>');
			jQuery('#txtAuthor').val(thisValue);
			setTimeout("jQuery('#suggestions').hide();", 200);
		}
	}
</script>
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
						<label style="float: left"> Tên đăng nhập *</label>
						<input id="txtUserName" type="text" name="txtUserName" class="validate[required]"/>
						<?php 
							if($check_exit==true)
							{
						?>
						<label style="float: right; color:red; margin-right:15px;"> Tên đăng nhập đã tồn tại.</label>
						<?php }?>
					</div>
					<div class="row">
						<label style="float: left"> Mật khẩu *</label>
						<input id="txtPass" type="password" name="txtPass" class="validate[required]"/>
					</div>
					<div class="row">
						<label style="float: left"> Nhập lại mật khẩu *</label>
						<input id="txtPassRepeat" type="password" name="txtPassRepeat" class="validate[required,equals[txtPass]"/>
					</div>
	        		<div class="row">
						<label style="float: left"> Họ tên *</label>
						<input id="txtName" type="text" name="txtName" class="validate[required]" />
						
					</div>
					<div class="row">
						<label style="float: left"> Ngày sinh </label>
						<input id="txtName" type="text" name="txtNamSinh"/>
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
						<label style="float: left">Đại lý giới thiệu *</label>
						<input id="inputString" onkeyup="lookup(this.value);" type="text" name="txtHoiVien" class="validate[required]"/>
						<div class="suggestionsBox" id="suggestions" style="display: none;">
							<img src="<?php echo base_url();?>application/content/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
							<div class="suggestionList" id="autoSuggestionsList">
								&nbsp;
							</div>
						</div>						
					</div>
					<div class="row">
						<label style="float: left">Đại lý chỉ định *</label>
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