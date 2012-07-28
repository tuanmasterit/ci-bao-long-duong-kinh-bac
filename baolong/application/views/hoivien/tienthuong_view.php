<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li class="current"><a href="#"><?php echo $this->common->getObjectName($log_type);?></a></li>
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Danh sách <?php echo $this->common->getObjectName($log_type);?></span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">   
                    	<form method="post" action="<?php echo base_url();?>hoivien/giaodich/log/<?php echo $this->common->getObjectKey($log_type);?>">
                            Từ ngày:&nbsp;
                            <input type="text" class="txt datepicker" name="txtfromdate" value="<?php echo $from_date;?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Đến ngày:&nbsp;
                            <input type="text" class="txt datepicker" name="txttodate" value="<?php echo $to_date;?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn" value="Tìm kiếm"/>
                        </form>
                    </div><!--tableoptions-->	
                    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
                        <colgroup>
                            <col class="con0" />
                            <col class="con1" />
                            <col class="con0" />
                            <col class="con1" />
                        </colgroup>
                        <thead>
                            <tr>                                
                                <th class="head1" width="50%">Nội dung</th>
                                <th class="head0">Số điểm</th>
                                <th class="head1">Thời gian giao dịch</th>
                                <th class="head1">Trạng thái</th>
                            </tr>
                        </thead>
						<?php 
                           foreach ($lstLog as $log)
                          {?>
						  	<tr>				
                                <td class="head1"><?php echo $log->log_content; ?></td>
                                <td class="head0"><?php echo $log->amount; ?></td>
                                <td class="head1"><?php echo $log->created_date; ?></td>
                                <td class="head1"><?php echo $log->status; ?></td>
							</tr>
						<?php 
                          }?>
                        <tfoot>
                            <tr>
                                <th class="head1">Nội dung</th>
                                <th class="head0">Số điểm</th>
                                <th class="head1">Thời gian giao dịch</th>
                                <th class="head1">Trạng thái</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
                        </tbody>
                    </table>
                    <?php // echo $list_link;?>                                 
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php $this->load->view('back_end/footer');?>
