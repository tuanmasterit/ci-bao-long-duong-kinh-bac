<?php $this->load->view('hoivien/header');?>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php $this->load->view('hoivien/sidebar-left');?> 
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<?php if($post_type == 'post'){?>
                		<li><a href="<?php echo base_url();?>hoivien/posts/lists/post">Tất cả bài viết</a></li>
                    	<li class="current"><a href="<?php echo base_url();?>hoivien/posts/add/post">Thêm mới bài viết</a></li>
                    	<li><a href="<?php echo base_url();?>hoivien/categories">Danh mục bài viết</a></li>
                    <?php }elseif($post_type == 'page'){?>
                    	<li><a href="<?php echo base_url();?>hoivien/posts/lists/page">Tất cả các trang</a></li>
                    	<li class="current"><a href="<?php echo base_url();?>hoivien/posts/add/page">Thêm mới trang</a></li>
                    <?php }?>
                </ul>
                <div class="content">                	
                	<form method="post" action="<?php echo base_url();?>hoivien/posts/save_add" class="stdform">
                	<div class="edit-main">                    	                    	                            
                            <p><label>Tiêu đề:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txttitle"></span></p>
                            <br/>
                            <p><label>Tóm tắt:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>
                            <br/>
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"></textarea></p>
                            <input type="hidden" value="<?php echo $post_type;?>" name="hdfposttype"  />
                            <br/>
                    </div>
                    <div class="edit-right">
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Xuất bản</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                            	
                                <p class="stdformbutton">
                                    <button class="submit radius2">Xuất bản</button>
                                    <input type="reset" value="Hủy" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>
                        <?php if($post_type == 'post'){?>
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Danh mục bài viết</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                                <?php foreach($lstCategories as $Category){?>                            	
                                    <input type="checkbox" value="<?php echo $Category->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $Category->name;?><br>
                                    <?php
                                    $subCats = $this->Term_model->getSubCatProNav($Category->term_id,'category');
			        				foreach ($subCats as $subCat)
			        				{
			        				?>
			        				<input type="checkbox" value="<?php echo $subCat->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;---- <?php echo $subCat->name;?><br>	
			        				<?php 
			        				}
			        				?>                                    
                                <?php }?>                                   
                            </div>
                        </div>
                        <?php }?>
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                                <input type="hidden" id="featured_image" name="hdffeatured_image" >
                                <img src="" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                                <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                            </div>
                        </div>
                    </div>
                    </form>              
                </div><!--content-->                
            </div><!--maincontentinner-->                               
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'editor_content',
	{			
		filebrowserBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=file',
		filebrowserImageBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
		filebrowserFlashBrowseUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
		filebrowserImageUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=image',
		filebrowserFlashUploadUrl : '<?php echo base_url();?>application/elfinder/elfinder.php?mode=flash',
		filebrowserImageWindowWidth : '950',
		filebrowserImageWindowHeight : '490',
		filebrowserWindowWidth : '950',
		filebrowserWindowHeight : '490'
	});

</script>
<?php $this->load->view('back_end/footer');?>