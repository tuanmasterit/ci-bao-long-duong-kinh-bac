<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li class="current"><a href="#">Xử lý quy đổi</a></li>
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Danh sách yêu cầu quy đổi</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">   
                    	<form method="post" action="<?php echo base_url();?>admin/xulyquydoi">
                            Từ ngày:&nbsp;
                            <input type="text" class="txt datepicker" name="txtfromdate" value="<?php echo $from_date;?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Đến ngày:&nbsp;
                            <input type="text" class="txt datepicker" name="txttodate" value="<?php echo $to_date;?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Trạng thái:
							<select class="category" name="status" onchange="javascript:this.form.submit();">
								<option value="" <?php if($status==''){echo 'selected="selected"';} ?> >--Tất cả--</option>
								<option value="1" <?php if($status=='1'){echo 'selected="selected"';} ?> >Chờ xử lý</option>
								<option value="2" <?php if($status=='2'){echo 'selected="selected"';} ?> >Duyệt</option>
								<option value="3" <?php if($status=='3'){echo 'selected="selected"';} ?> >Trả lại</option>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <th class="head1">Điểm quy đổi</th>
                                <th class="head0">Hội viên</th>
                                <th class="head1">Trạng thái</th>
                                <th class="head1">Ngày tạo</th>
								<th class="head1">Ngày xử lý</th>
								<th class="head1">Xử lý</th>
                            </tr>
                        </thead>
						<?php 
                           foreach ($lstQuydoi as $item)
                          {?>
						  	<tr>				
                                <td class="head1"><?php echo $item->vcoin.' V'; ?></td>
                                <td class="head0"><?php echo $item->user_login; ?></td>
                                <td class="head1"><?php echo $this->common->getStatusName($item->status); ?></td>
                                <td class="head1"><?php echo $item->created_date; ?></td>
								<td class="head1"><?php echo $item->process_date; ?></td>
								 <td class="head1">
								 <?php 
								 	if($item->status==$this->common->getStatus('choxuly'))
									{
									?>
									<a href="<?php echo base_url();?>admin/xulyquydoi/duyet?id=<?php echo $item->Id;?>&user_id=<?php echo $item->user_id;?>" >Duyệt</a>&nbsp;&nbsp;
									<a href="<?php echo base_url();?>admin/xulyquydoi/tralai?id=<?php echo $item->Id;?>&user_id=<?php echo $item->user_id;?>">Trả lại</a>
									<?php
									}
									else if($item->status==$this->common->getStatus('duyet'))
									{
									?>
									<a href="<?php echo base_url();?>admin/xulyquydoi/tralai?id=<?php echo $item->Id;?>&user_id=<?php echo $item->user_id;?>">Trả lại</a>
									<?php
									}
									else
									{
									?>
									<a href="<?php echo base_url();?>admin/xulyquydoi/duyet?id=<?php echo $item->Id;?>&user_id=<?php echo $item->user_id;?>" >Duyệt</a>&nbsp;&nbsp;
									<?php
									}
		                          ?>
								 </td>
							</tr>
						<?php 
                          }?>
                        <tfoot>
                            <tr>
                                 <th class="head1">Điểm quy đổi</th>
                                <th class="head0">Hội viên</th>
                                <th class="head1">Trạng thái</th>
                                <th class="head1">Ngày tạo</th>
								<td class="head1">Ngày xử lý</td>
								<th class="head1">Xử lý</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           
                        </tbody>
                    </table>
                    <?php // echo $list_link;?>                                 
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php $this->load->view('back_end/footer');?>
