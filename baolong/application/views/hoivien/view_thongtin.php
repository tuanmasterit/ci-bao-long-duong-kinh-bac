<?php $this->load->view('hoivien/header');?>
 
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
					<li class="current"><a href="<?php echo base_url();?>hoivien/cats">Thông tin gian hàng</a></li>
                </ul>
                <div class="content">
                	<form method="post" action="<?php echo base_url();?>hoivien/thongtin/save">                	
                        <div class="info">
                            <div class="title"><span>Chọn banner(998px * 195px):</span></div>
                            <div class="widgetcontent" style="display: block;">
                                <input type="hidden" id="featured_image" name="hdfbanner" value="<?php echo $banner;?>">
                                <img src="<?php echo $banner;?>" id="featured_image_src" width="600px" height="auto" style="margin-bottom:10px;" />
                                </br>
                                <button id="imageUpload" class="submit button-brow">Chọn Banner</button>
                            </div>
                        </div>                        
                        <div class="info area-editor">
                            <p>Thông tin hỗ trợ:</p>
                            <textarea id="editor_content_basic" name="txtsupport"><?php echo $support;?></textarea>
                        </div>
                        <div class="info area-editor">
                            <p>Thông tin footer:</p>
                            <textarea id="editor_content_basic_footer" name="txtfooter"><?php echo $footer;?></textarea>
                        </div>
                        <br/> 
                        <input type="submit" class="button-brow" value="Lưu thông tin" />	       
                    </form>                          
                </div><!--content-->                
            </div><!--maincontentinner-->            
<?php $this->load->view('back_end/footer');?>
<script type="text/javascript">		
	var editor = CKEDITOR.replace( 'editor_content_basic',
	{			
		toolbar : 'Basic'
	});
	var editor = CKEDITOR.replace( 'editor_content_basic_footer',
	{			
		toolbar : 'Basic'
	});
</script>