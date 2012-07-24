<?php $this->load->view('back_end/header'); ?>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>application/ckfinder/ckfinder.js"></script>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php $this->load->view('back_end/sidebar-left');?>       
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<?php if($post_type == 'post'){?>
                	<li><a href="<?php echo base_url();?>admin/posts/lists/post">Tất cả bài viết</a></li>
                    <li class="current"><a href="">Cập nhật bài viết</a></li>
                    <li><a href="<?php echo base_url();?>admin/categories">Danh mục bài viết</a></li>
                    <?php }elseif($post_type == 'page'){?>
                    <li><a href="<?php echo base_url();?>admin/posts/lists/page">Tất cả các trang</a></li>
                    <li class="current"><a href="">Cập nhật trang</a></li>
                    <?php }?>
                </ul>
                <div class="content">     
                	<?php //print_r($Post);?>           	                	
                	<?php foreach($Post as $l_post){?>
                	<form method="post" action="<?php echo base_url();?>admin/posts/update" class="stdform">
                	<input type="hidden" name="hdfgianhang" value="<?php echo $gianhang;?>">
                	<input type="hidden" name="hdfposttype" value="<?php echo $post_type;?>">                             
                	<div class="edit-main">                    	                    	                            
                    		<input type="hidden" value="<?php echo $l_post->id;?>" name="post_id" />
                    		<input type="hidden" value="<?php echo $l_post->post_author;?>" name="cbxbutdanh" />
                            <p><label>Tiêu đề:</label></p>
                            <p><span class="field"><input type="text" class="longinput" name="txttitle" value="<?php echo $l_post->post_title;?>"></span></p>
                            <br/>
                            <p><label>Tóm tắt:</label></p>                            
                            <p><span class="field"><textarea name="txtexcerpt"><?php echo $l_post->post_excerpt;?></textarea></span></p>
                            <br/>
                            <p><label>Nội dung:</label></p>                            
                            <p><textarea name="txtcontent" id="editor_content"><?php echo $l_post->post_content;?></textarea></p>
                            <br/>
                    </div>
                    <div class="edit-right">
                    	<div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Xuất bản</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                            	<p class="stdformbutton">
                                    <button class="submit radius2">Cập nhật</button>
                                    <input type="reset" value="Hủy" class="reset radius2">
                                </p>
                            </div><!--widgetcontent-->
                        </div>
                        <?php if($post_type == 'post'){?>
                        <div class="widgetbox">
                            <div class="title"><h2 class="general"><span>Danh mục bài viết</span></h2></div>
                            <div class="widgetcontent" style="display: block;">
                               <?php $flag=false;?>
                                <?php foreach($lstCategories as $Category){?>
                                	<?php $flag=false;?>
                                    <?php $term_id = $Category->term_id;?>
									<?php foreach($categories_of_post as $category_of_post){
										if($term_id == $category_of_post->term_taxonomy_id){$flag=true;}		
									}?>                                	
                                	<?php if($flag){?>
                                    	<input type="checkbox" checked="checked" value="<?php echo $Category->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $Category->name;?>
                                        <br>                                    
                                    <?php }else{?>
                                    	<input type="checkbox" value="<?php echo $Category->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $Category->name;?>
                                        <br>
                                    <?php }?>
                                    <?php
                                    $subCats = $this->Term_model->getSubCatProNav($Category->term_id,'category');
			        				foreach ($subCats as $subCat)
			        				{
			        				?>
			        				<?php foreach($categories_of_post as $category_of_post){
										if($subCat->term_id == $category_of_post->term_taxonomy_id){$flag=true;}		
									}?>                                	
                                	<?php if($flag){?>
                                    	<input type="checkbox" checked="checked" value="<?php echo $subCat->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;----<?php echo $subCat->name;?>
                                        <br>                                    
                                    <?php }else{?>
                                    	<input type="checkbox" value="<?php echo $subCat->term_id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;----<?php echo $subCat->name;?>
                                        <br>
                                    <?php }?>	
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
                                <input type="hidden" id="featured_image" name="hdffeatured_image" value="<?php echo $featured_image;?>" >
                                <img src="<?php echo $featured_image;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                                <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                            </div>
                        </div>
                    </div>
                    </form>    
                    <?php }?>          
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
