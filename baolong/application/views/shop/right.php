<div class="BoxRight_B2_Right">
					       

<div class="BoxR1_online">
	<ul class="BoxR1_Right_1_top ">
	<li>Đăng nhập</li>
	</ul>
	<div class="BoxR1_Right_1_ct">
	
	  <table border="0" cellpadding="0" cellspacing="5" width="100%">
        <tbody>
        <tr>
            <td>
                <span id="ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_lblError" style="color:Red;"></span>
            </td>
        </tr>
        <tr>
          <td>
              <input name="ctl00$ContentPlaceHolder1$ctl07$lw$uctrLogin1$txtUser" maxlength="50" id="ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_txtUser" onkeypress="return clickButton(event,'ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_btnDangNhap')" style="width: 130px; border: 1px solid rgb(102, 102, 102);" type="text">
              <span id="ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_RequiredFieldValidator1" style="color:Red;visibility:hidden;">*</span> 
          </td>
          
        </tr>
        <tr>
          <td>
            <input name="ctl00$ContentPlaceHolder1$ctl07$lw$uctrLogin1$txtPass" maxlength="50" id="ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_txtPass" onkeypress="return clickButton(event,'ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_btnDangNhap')" style="width: 130px; border: 1px solid rgb(102, 102, 102);" type="password"> 
            <span id="ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_RequiredFieldValidator2" style="color:Red;visibility:hidden;">*</span> 
          </td>
        </tr>
        <tr>
          <td valign="middle">
              <input name="ctl00$ContentPlaceHolder1$ctl07$lw$uctrLogin1$btnDangNhap" value="Đăng Nhập" onclick='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$ContentPlaceHolder1$ctl07$lw$uctrLogin1$btnDangNhap", "", true, "chklogin", "", false, false))' id="ctl00_ContentPlaceHolder1_ctl07_lw_uctrLogin1_btnDangNhap" style="width: 110px;" type="submit">
          </td>  
        </tr>        
      </tbody></table>
	
	</div>
	
</div>
    
<div id="ctl00_ContentPlaceHolder1_ctl08_pnlSupport">
	
    <div class="BoxR2_Right2">
	    <div class="BoxR2_Right2_Top">Hổ trợ trực tuyến 7/24</div>
		<div class="BoxR2_Right2_ct">
		    <?php echo $this->Option_model->getOption('support',$this->User_model->get_user_id_by_shop($shop_id));?>
        </div>
    </div>

</div>                     