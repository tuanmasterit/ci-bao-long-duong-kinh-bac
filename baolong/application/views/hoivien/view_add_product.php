<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<SCRIPT language="javascript" type="text/javascript">
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php $this->load->view('hoivien/sidebar-left');?> 
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li><a href="<?php echo base_url();?>hoivien/products">Danh sách sản phẩm</a></li>
                    <li class="current"><a href="<?php echo base_url();?>hoivien/products/add">Thêm mới sản phẩm</a></li>
                    <li><a href="<?php echo base_url();?>hoivien/cats">Danh mục sản phẩm</a></li>
                </ul>
                <div class="content">                	
                	<form method="post" id="formID" action="<?php echo base_url();?>hoivien/products/save_add" class="stdform">
                	<div class="edit-main">                    	                    	                            
                            <p><label>Tên sản phẩm:</label></p>
                            <p><span class="field"><input type="text" class="longinput validate[required]" name="txttitle"></span></p>
                            <br/>
                            <p><label>Giá sản phẩm:</label></p>
                            <p><span class="field"><input type="text" class="longinput validate[required]" name="txtthitruong" onkeypress="return isNumberKey(event)"></span></p>
                            <br/>
                            <p><label>Mô tả:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>
                            <br/>
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"></textarea></p>
                            <input type="hidden" value="<?php echo $post_type;?>" name="hdfposttype"  />
                            <br/>
                    </div>
                    <div class="edit-right">
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Thao tác</span></h2></div>
                            <div class="widgetcontent" style="display: block;">                            	
                                <p class="stdformbutton">
                                    <button class="submit radius2">Thêm sản phẩm</button>
                                    <input type="reset" value="Hủy" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Danh mục sản phẩm</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                                <?php foreach($lstCategories as $Category){?>                            	
                                    <input type="checkbox" value="<?php echo $Category->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $Category->name;?><br>
                                    <?php
                                    $subCats = $this->Term_model->getSubCatProNav($Category->term_id);
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
<?php $this->load->view('back_end/footer');?>
                           
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