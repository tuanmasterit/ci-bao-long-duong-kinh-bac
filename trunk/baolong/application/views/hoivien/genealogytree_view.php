<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>       
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu">
                	<li class="current"><a href="./dashboard.html">CÂY PHẢ HỆ</a></li>
                </ul><!--maintabmenu-->                
                <div class="content">
                	<ul class="">
                    	
						
                    </ul>
                    <table width="500px" class="tblPhahe">
						<tr>
							<td colspan="4">
								<?php echo $lstUser['1'];?>&nbsp;
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<div class="divphahe">	
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.2'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.1'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="divphahe">
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.1.1'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.1.2'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1.1'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
								
							</td>
							<td colspan="2">
								<div class="divphahe">
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.2.1'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.2.2'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1.2'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="divphahe">
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.1.1.1'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.1.1.2'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1.1.1'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
							</td>
							<td>
								<div class="divphahe">
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.1.2.1'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.1.2.2'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1.1.2'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
							</td>
							<td>
								<div class="divphahe">
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.2.1.1'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.2.1.2'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1.2.1'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
							</td>
							<td>
								<div class="divphahe">
									<table width="100%" height="100%">
										<tr>
											<td class="p1"><?php echo $lstUser['1.2.2.1'];?>&nbsp;</td>
											<td class="p2"><?php echo $lstUser['1.2.2.2'];?>&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="p3"><?php echo $lstUser['1.2.2'];?>&nbsp;</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
					
                    <br clear="all" /><br />
        
                <br /><br />

                    
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');?>
