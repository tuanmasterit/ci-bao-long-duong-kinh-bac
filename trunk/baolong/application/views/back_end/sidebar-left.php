<div class="mainleft">
    <div class="mainleftinner">    
        <div class="leftmenu">
            <ul>
                <li class="current"><a href="<?php echo base_url();?>admin/index" class="dashboard"><span>Quản trị</span></a></li>
                <li><a href="<?php echo base_url();?>admin/posts/lists/post" class="tables menudrop"><span>Bài viết</span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>admin/posts/lists/post"><span>Tất cả bài viết</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/posts/add/post"><span>Thêm mới bài viết</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/posts/categories"><span>Danh mục bài viết</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>admin/posts/lists/topic" class="elements menudrop"><span>Chủ đề</span></a>
                    <ul>
                    	<li><a href="<?php echo base_url();?>admin/posts/lists/topic"><span>Tất cả chủ đề</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/posts/add/topic"><span>Thêm mới chủ đề</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>admin/author" class="widgets menudrop"><span>Bút Danh</span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>admin/author"><span>Danh sách bút danh</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/magazine"><span>Danh sách báo</span></a></li>                        
                    </ul>
                </li>                                        
                <li><a href="<?php echo base_url();?>admin/user" class="elements menudrop"><span>Thành viên</span></a>
                    <ul>
                    	<li><a href="<?php echo base_url();?>admin/user"><span>Tất cả thành viên</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/user/add"><span>Thêm mới thành viên</span></a></li>
                    </ul>
                </li>                        
            </ul>                
        </div><!--leftmenu-->
        <div id="togglemenuleft"><a></a></div>
    </div><!--mainleftinner-->
</div><!--mainleft-->