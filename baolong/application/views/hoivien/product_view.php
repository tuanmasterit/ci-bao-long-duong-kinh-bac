<?php include('header.php'); ?>
<!-- START OF MAIN CONTENT -->
<div class="mainwrapper">
    <div class="mainwrapperinner">
		<?php include('sidebar-left.php');?>        
        <div class="maincontent noright">
        	<div class="maincontentinner">            	
                <ul class="maintabmenu multipletabmenu">
                	<li class="current"><a href="<?php echo base_url();?>hoivien/products/">Tất cả sản phẩm</a></li>
                    <li><a href="<?php echo base_url();?>hoivien/products/add">Thêm mới sản phẩm</a></li>
                    <li><a href="<?php echo base_url();?>hoivien/cats">Danh mục sản phẩm</a></li>
                </ul>                
                <div class="content">
                	<h1 id="ajaxtitle"></h1>                       	                            
                    <div class="contenttitle radiusbottom0">
                        <h2 class="table"><span>Danh sách sản phẩm</span></h2>
                    </div><!--contenttitle-->
                    <div class="tableoptions">
                    	<form name="frmfilter" method="post" action="<?php echo base_url();?>hoivien/products/" >
	                        <button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>hoivien/posts/delete">Delete Selected</button> &nbsp;
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
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Tên sản phẩm</th>                                
                                <th class="head0">Mô tả</th>
                                <th class="head1">Giá</th>
                                
                                <th class="head0">Ngày cập nhật</th>
                                <th class="head1" width="60">&nbsp;</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="head0"><input type="checkbox" class="checkall" /></th>
                                <th class="head1">Tiêu đề</th>                                
                                <th class="head0">Mô tả</th>
                                <th class="head1">Giá</th>
                                
                                <th class="head1">Ngày cập nhật</th>
                                <th class="head0" width="60">&nbsp;</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($lstPosts as $Post){?>                            	
                            	<tr>
                                	<td class="center"><input value="<?php echo $Post->id;?>" type="checkbox"></td>
                                    <td><?php echo $Post->post_title;?></td>                                    
                                    <td><?php echo $Post->post_excerpt;?></td>
                                    <td><?php echo $this->Post_model->get_meta_value($Post->id,'giathitruong');?></td>
                                    <td><?php echo $this->Post_model->get_meta_value($Post->id,'giahoivien');?></td>
                                    <td>
                                    	<?php
                                    if($Post->post_modified=='0000-00-00 00:00:00')
                                    {                                     	
										echo date_format(date_create($Post->post_date),'d-m-Y H:i:s');
                                    }
                                    else 
                                    {
                                    	echo date_format(date_create($Post->post_modified),'d-m-Y H:i:s');
                                    }
                                    ?>
                                    </td>
                                    <td class="center">
                                    	<a class="edit" href="<?php echo base_url();?>hoivien/products/edit/<?php echo $Post->id;?>">Sửa</a> &nbsp; 
                                        <a class="delete" name="delete_post" id="<?php echo $Post->id;?>" href="<?php echo base_url();?>hoivien/products/delete">Xóa</a></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <?php echo $list_link;?>                                 
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php $this->load->view('back_end/footer');?>
