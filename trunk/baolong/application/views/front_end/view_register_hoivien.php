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
						<input id="txtName" type="text" name="txtName" class="validate[required]">
					</div>
					<div class="row">
						<label style="float: left"> Năm sinh *</label>
						<input id="txtName" type="text" name="txtNamSinh" class="datepicker">
					</div>
					<div class="row">
						<label style="float: left"> Địa chỉ *</label>
						<input id="txtName" type="text" name="txtDiaChi" class="validate[required]">
					</div>
					<div class="row">
						<label style="float: left"> Điện thoại *</label>
						<input id="txtName" type="text" name="txtDienThoai" class="validate[required]">
					</div>
					<div class="row">
						<label style="float: left">Email *</label>
						<input id="txtName" type="text" name="txtEmail" class="validate[required,custom[email]] ">
					</div>
					<div class="row">
						<label style="float: left">Người giới thiệu </label>
						<input id="inputString" type="text" name="txtHoiVien" onkeyup="lookup(this.value);" onblur="fill();"/>						
					</div>
					<div class="suggestionsBox" id="suggestions" style="display: none;">
						<img src="<?php echo base_url()?>application/content/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
						<div class="suggestionList" id="autoSuggestionsList">
							&nbsp;
						</div>
					</div>
					<br>
					<div class="row1">
						<input id="btnSubmit" class="btnSubmit" type="submit"  value="Gửi đi" name="btnSubmit">
						<input id="btnReset" class="btnSubmit" type="reset"  value="Làm lại" name="btnReset">
					</div>
	        	</fieldset>
	        	<?php echo form_close();?>
	        </div>
        </div>
	</div>
</div>