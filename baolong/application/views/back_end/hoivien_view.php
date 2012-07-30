<?php include('header.php'); ?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">                	
	                <li><a href="<?php echo base_url();?>admin/users">Quản trị Thành viên</a></li>
                    <li class="current"><a href="<?php echo base_url();?>admin/hoiviens">Quản trị Hội viên</a></li>
                    <li><a href="<?php echo base_url();?>admin/hoiviens/pheduyet">Phê duyệt Hội viên</a></li>
                </ul>
                <div class="content">                	
                	<div class="edit-left">                		
                		<?php 
                			if(!isset($user))
                			{
                		?>   
                			<?php echo form_open('admin/hoiviens/add',array('id'=>'formID','class'=>'stdform'));?>
							<input type="hidden" id="hdfUrlAjax" value="<?php echo base_url();?>admin/hoiviens/SearchUsername" />
                    		 <p><label  style="width:90px;display:inline-block;text-align:left">Người giới thiệu:</label>
							 
							 <input type="text" AUTOCOMPLETE=OFF class="sb_input0 longinput"  style="width:250px" onkeyup="javascript:SearchUser();"/>
								<span id="spUserReferences"  style="width:250px"></span>
								<ul class="sb_dropdown sb_dropdown0" style="display:none">
									<li>
										<a href="javascript:void(0);" onclick="javascript:jQuery('.sb_dropdown').css('display','none');" style="float:right" title="Đóng">x</a>
									</li>
									<li>
										<span id="dataSearch"></span>
									</li>
								</ul>
								<input type="hidden" value="" name="txtreference" id="txtreference" />
							 </p>
							<br />
							<p><label  style="width:90px;display:inline-block;text-align:left">Người chỉ định:</label>
							<input type="text" AUTOCOMPLETE=OFF class="sb_input1 longinput" style="width:250px"  onkeyup="javascript:SearchUser1();"/>
							<span id="spUserChoose" style="width:250px;display:inline-block"></span>
								<ul class="sb_dropdown sb_dropdown1" style="display:none">
									<li>
										<a href="javascript:void(0);" onclick="javascript:jQuery('.sb_dropdown1').css('display','none');" style="float:right" title="Đóng">x</a>
									</li>
									<li>
										<span id="dataSearch1"></span>
									</li>
								</ul>
								<input type="hidden" value=""  style="width:250px" name="txtchoose" id="txtchoose"  />
							</p>
							<br />
                            <p>
                            	<label style="width:90px;display:inline-block;text-align:left">Tài khoản tặng:</label>
                                <input type="checkbox" name="cbxloaihoivien" value="tặng" />
                            </p>							
							<br />
                            <p><label style="width:90px;display:inline-block;text-align:left">Tên đăng nhập:</label><input type="text" style="width:250px" class="longinput validate[required]" name="txtname" /></p>
                            <br />
                            <p><label style="width:90px;display:inline-block;text-align:left">Mật khẩu:</label><input type="password" style="width:250px" class="longinput validate[required]" name="txtPass" /></p>
                            <br />
                            <p><label style="width:90px;display:inline-block;text-align:left">Họ tên hội viên mới:</label><input style="width:250px" type="text" class="longinput validate[required]" name="txtnicename" /></p>                            
                            <br />
                            <p><label style="width:90px;display:inline-block;text-align:left">Email:</label><input type="text" style="width:250px" class="longinput validate[required,custom[email]]" name="txtemail" /></p>                            
                            <br />
                            <p><label style="width:90px;display:inline-block;text-align:left">Tên hiển thị:</label><input type="text" class="longinput" style="width:250px" name="txtdisplay" /></p>                            <br />
							 <p><label style="width:90px;display:inline-block;text-align:left">Giới tính:</label>
							 <select name="sex">
									<option value="-1">-None-</option>
									<option value="1">Nam</option>
									<option value="0">Nữ</option>
								</select>
							 </p>                            
                            <br />
							 <p><label style="width:90px;display:inline-block;text-align:left">Tên gian hàng:</label><input style="width:250px" type="text" class="longinput" name="txtboothtitle" /></p>                            
                            <br />
							 <p><label style="width:90px;display:inline-block;text-align:left">CMT:</label><input style="width:250px" type="text" class="longinput  validate[required]" name="txtCMT" /></p>                            
                            <br />
							 <p><label style="width:90px;display:inline-block;text-align:left">D/C thường trú:</label><input style="width:250px" type="text" class="longinput validate[required]" name="txtDCTT" /></p>                            
                            <br />
							<p><label style="width:90px;display:inline-block;text-align:left">Nơi ở hiện tại:</label><input style="width:250px" type="text" class="longinput " name="txtNoio" /></p>                            
                            <br />
							<p><label style="width:90px;display:inline-block;text-align:left">Điện thoại:</label><input style="width:250px" type="text" class="longinput validate[required]" name="txtPhone" /></p>                            
                            <br />
							<p><label style="width:90px;display:inline-block;text-align:left">Số tài khoản:</label><input style="width:250px" type="text" class="longinput" name="txtATM" /></p>                            
                            <br />
							<p><label style="width:90px;display:inline-block;text-align:left">Tên ngân hàng:</label><input style="width:250px" type="text" class="longinput" name="txtBank" /></p>                            
                            <br />
							<p><label style="width:90px;display:inline-block;text-align:left">Ngày sinh:</label><input style="width:250px" type="text" class="longinput" name="txtBirthDate" /></p>                            
                            <br />
                            <p class="stdformbutton">
                            	<button class="submit radius2">Thêm mới</button>
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>        
	                    
                            <?php echo form_close();?>
                        <?php 
                			}
                			else {
                		?>
                			<?php echo form_open('admin/hoiviens/edit',array('id'=>'formID','class'=>'stdform'));?>
                			<input type="hidden" name="id" value="<?php echo $user['id'];?>">
                            <p><label>Tên đăng nhập:</label></p>
                            <p><span class="field"><input type="text" value="<?php echo $user['user_login']?>" readonly="readonly" class="longinput validate[required]" name="txtname" /></span></p>
                            <br />
                            <p><label>Họ tên hội viên mới:</label></p>                            
                            <p><span class="field"><input type="text" value="<?php echo $user['user_nicename'];?>" class="longinput validate[required]" name="txtnicename" /></span></p>
                            <br />
                            <p><label>Email:</label></p>                            
                            <p><span class="field"><input type="text" value="<?php echo $user['user_email']?>" class="longinput validate[required,custom[email]]" name="txtemail" /></span></p>
                            <br />
                            <p><label>Tên hiển thị:</label></p>                            
                            <p><span class="field"><input type="text" value="<?php echo $user['display_name']?>" class="longinput" name="txtdisplay" /></span></p>
                            <br />
                            <p class="stdformbutton">
                            	<button class="submit radius2">Cập nhật</button>
                                <input type="reset" value="Hủy" class="reset radius2">
                            </p>                            
                            <?php echo form_close();?>
                		<?php }?>
                    </div>
                    <div class="list-right">
                    	<div class="contenttitle radiusbottom0">
                            <h2 class="table"><span>Danh sách hội viên</span></h2>
                        </div><!--contenttitle-->
                        <div class="tableoptions">
                            <button class="deletebutton radius3" name="delete" value="<?php echo base_url();?>admin/hoiviens/delete" title="table2">Delete Selected</button> &nbsp;
                            
                        </div><!--tableoptions-->	
                        <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                            <colgroup>
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Tên đăng nhập</th>
                                    <th class="head0">Tên hội viên</th>
                                    <th class="head0">Email</th>                                    
                                    <th class="head0" width="60">&nbsp;</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="head0"><input type="checkbox" class="checkall" /></th>
                                    <th class="head1">Tên đăng nhập</th>
                                    <th class="head0">Tên hội viên</th>
                                    <th class="head0">Email</th>                                    
                                    <th class="head0" width="60">&nbsp;</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($lstthanhvien as $thanhvien){?>                            	
                                    <tr>
                                        <td class="center"><input value="<?php echo $thanhvien->id;?>" type="checkbox"></td>
                                        <td><?php echo $thanhvien->user_login;?></td> 
                                        <td><?php echo $thanhvien->user_nicename;?></td> 
                                        <td><?php echo $thanhvien->user_email;?></td>                                                                             
                                        <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>admin/hoiviens/edit/<?php echo $thanhvien->id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $thanhvien->id;?>" title="Xóa hội viên" href="<?php echo base_url();?>admin/hoiviens/delete" name="delete" >Xóa</a></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <?php echo $list_link;?>						                              
                </div><!--content-->                
            </div><!--maincontentinner-->            
            <div class="footer">
            	<p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
            </div><!--footer-->
            
        </div><!--maincontent--> 

     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->        

</body>
</html>

