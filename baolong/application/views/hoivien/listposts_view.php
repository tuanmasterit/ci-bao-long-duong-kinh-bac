<?php $this->load->view('hoivien/header');?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<?php if($post_type == 'post'){?>
                		<li class="current"><a href="<?php echo base_url();?>hoivien/posts/lists/post">Tất cả bài viết</a></li>
                    	<li><a href="<?php echo base_url();?>hoivien/posts/add/post">Thêm mới bài viết</a></li>
                    	<li><a href="<?php echo base_url();?>hoivien/categories">Danh mục bài viết</a></li>
                    <?php }elseif($post_type == 'page'){?>
                    	<li class="current"><a href="<?php echo base_url();?>hoivien/posts/lists/page">Tất cả các trang</a></li>
                    	<li><a href="<?php echo base_url();?>hoivien/posts/add/page">Thêm mới trang</a></li>
                    <?php }?>
                    
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Table with Action</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                        <form name="frmfilter" method="post" action="<?php echo base_url();?>hoivien/posts/lists/<?php echo $post_type;?>" >                        	
                        	<button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>hoivien/posts/delete">Delete Selected</button> &nbsp;
                        	<?php if($post_type == 'post'){?>
                            <select class="category" name="slcategory">
                                <option value="">--- Tất cả ---</option>
                                <?php foreach($lstCategories as $l_category){?>                                 
                                	<?php if($l_category->term_id == $category){?>
                                    	<option selected="selected" value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }else{?>
                                    	<option value="<?php echo $l_category->term_id;?>"><?php echo $l_category->name;?></option>
                                    <?php }?>
                                <?php }?>
                            </select> &nbsp;
                            <input type="submit" class="btn" value="Tìm kiếm"/>
                            <?php }?>
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
                                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Tiêu đề</th>
                                <th class="head0">Tác giả</th>
                                <th class="head1">Tóm tắt</th>
                                <th class="head0">Ngày cập nhật</th>
                                <th class="head0" width="60">&nbsp;</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Tiêu đề</th>
                                <th class="head0">Tác giả</th>
                                <th class="head1">Tóm tắt</th>
                                <th class="head0">Ngày cập nhật</th>
                                <th class="head0">&nbsp;</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($lstPosts as $Post){?>                            	
                            	<tr>
                                	<td class="center"><input value="<?php echo $Post->id;?>" type="checkbox"></td>
                                    <td><?php echo $Post->post_title;?></td>
                                    <td><?php echo $Post->user_nicename;?></td>
                                    <td><?php echo $Post->post_excerpt;?></td>
                                    <td><?php
                                    if($Post->post_modified=='0000-00-00 00:00:00')
                                    {                                     	
										echo date_format(date_create($Post->post_date),'d-m-Y H:i:s');
                                    }
                                    else 
                                    {
                                    	echo date_format(date_create($Post->post_modified),'d-m-Y H:i:s');
                                    }
                                    ?></td>
                                    <td class="center">
                                    	<a class="edit" href="<?php echo base_url();?>hoivien/posts/edit/<?php echo $Post->post_type;?>/<?php echo $Post->id;?>">Sửa</a> &nbsp; 
                                        <a class="delete" name="delete_post" id="<?php echo $Post->id;?>" href="<?php echo base_url();?>hoivien/posts/delete">Xóa</a></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>    
                    <?php echo $list_link;?>                             
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php $this->load->view('back_end/footer');?>
