<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php
		 include('sidebar-left.php');?>        
        <div class="maincontent" style="margin:0 45px 0 260px">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Thông tin chung</a></li>
                </ul><!--maintabmenu-->                
                <div class="content" style="width:100%">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0" style="width:60%">
                        <h2 class="table"><span>Thông tin chung về tài khoản</span></h2>
                    </div><!--contenttitle-->
                    
                    <table style="width:60%" cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                        <colgroup>
                            <col class="con0" />
                            <col class="con1" />                            
                        </colgroup>
                        <thead>
                            <tr>                                
                                <th class="head1">Thông tin&nbsp;&nbsp;</th>
                                <th class="head0">&nbsp;&nbsp;&nbsp;&nbsp;</th>                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>                               
                                <th class="head1">Thông tin&nbsp;&nbsp;</th>
                                <th class="head0">&nbsp;&nbsp;&nbsp;&nbsp;</th>                                
                            </tr>
                        </tfoot>
                        <tbody>                                                        	
                            <tr>
                            	<td width="45%">Tên tài khoản</td>
                            	<td><?php echo $hoivien['user_login'];?></td>
                            </tr>
                            <tr>
                            	<td>Họ và tên</td>
                            	<td><?php echo $hoivien['user_nicename'];?></td>
                            </tr>
                            <tr>
                            	<td>Tài khoản gian hàng</td>
                            	<td><?php echo $tk_gian_hang;?></td>
                            </tr>
                            <tr>
                            	<td>Tài khoản hệ thống</td>
                            	<td><?php echo $tk_he_thong;?></td>
                            </tr>
                            <tr>
                            	<td>Tài khoản ống heo</td>
                            	<td><?php echo $tk_ong_heo;?></td>
                            </tr>
                            <tr>
                            	<td>Người giới thiệu</td>
                            	<td>vanhung90_hd</td>
                            </tr>                            
                            <tr>
                            	<td>Cấp bậc</td>
                            	<td>vanhung90_hd</td>
                            </tr>
                            <tr>
                            	<td>Tổng điểm quy đổi thành công</td>
                            	<td>vanhung90_hd</td>
                            </tr>
                            <tr>
                            	<td>Tổng điểm đã được thưởng</td>
                            	<td>vanhung90_hd</td>
                            </tr>
                            <tr>
                            	<td>Tổng số hội viên cấp dưới</td>
                            	<td>vanhung90_hd</td>
                            </tr>
                            <tr>
                            	<td>Tổng hội viên nhánh trái</td>
                            	<td><?php echo $count_nhanh_trai;?></td>
                            </tr>
                            <tr>
                            	<td>Tổng hội viên nhánh phải</td>
                            	<td><?php echo $count_nhanh_phai;?></td>
                            </tr>
                            <tr>
                            	<td>Số điểm tích lũy nhánh trái còn</td>
                            	<td>vanhung90_hd</td>
                            </tr>
                            <tr>
                            	<td>Số điểm tích lũy nhánh phải còn</td>
                            	<td>vanhung90_hd</td>
                            </tr>
                        </tbody>
                    </table>    
                    
                <br clear="all" /><br />                    
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');?>
