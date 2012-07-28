<?php include('header.php'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li class="current"><a href="#">Giao dịch</a></li>
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Danh sách giao dịch</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                    	<form name="frmfilter" method="post" action="<?php echo base_url();?>hoivien/tienthuong" >
	                        &nbsp;
	                        <select class="category" name="stype" onchange="javascript:this.form.submit();">
                                <option <?php if($stype==''){echo 'selected="selected"';}?> value="">--- Tất cả ---</option>
								<option <?php if($stype=='1'){echo 'selected="selected"';}?> value="1">Nạp tiền</option>
								<option <?php if($stype=='2'){echo 'selected="selected"';}?>  value="2">Quy đổi</option>
								<option <?php if($stype=='3'){echo 'selected="selected"';}?>  value="3">Điểm thưởng</option>
								<option <?php if($stype=='4'){echo 'selected="selected"';}?>  value="4">Thưởng cân vế</option>
							</select> &nbsp;
                            <input type="submit" class="btn" value="Tìm kiếm"/>
							</form>
                    </div><!--tableoptions-->	
                    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                        <colgroup>
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con0" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="head1">Người hưởng</th>                                
                                <th class="head0">Loại</th>
                                <th class="head1" width="40%">Nội dung</th>
                                <th class="head0">Trạng thái</th>
                                <th class="head1">Ngày cập nhật</th>
                            </tr>
                        </thead>
						<?php 
                           foreach ($lstLog as $log)
                          {?>
						  	<tr>
						  		<td class="head1"><?php echo $log->user_login; ?></td>                                
                                <td class="head0" align="center"><?php echo  $this->common->getObjectName($log->log_type);?></td>
                                <td class="head1" width="40%"><?php echo $log->log_content; ?></td>
                                <td class="head0"><?php echo $this->common->getStatusName($log->status); ?></td>
                                <td class="head1"><?php echo $log->created_date; ?></td>
							</tr>
						<?php 
                          }?>
                        <tfoot>
                            <tr>
                                <th class="head1">Người hưởng</th>                                
                                <th class="head0">Loại</th>
                                <th class="head1">Nội dung</th>
                                <th class="head0">Trạng thái</th>
                                <th class="head1">Ngày cập nhật</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
                        </tbody>
                    </table>
                    <?php // echo $list_link;?>                                 
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php $this->load->view('back_end/footer');?>
