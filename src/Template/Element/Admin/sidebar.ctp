        <!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li <?php if($this->name=='Dashboard'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/dashboard" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
             <li <?php if($this->name=='Notices'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/notices" class="nav-link nav-toggle">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Events</span>
                </a>
            </li>
             <li <?php if($this->name=='Publications'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/publications" class="nav-link nav-toggle">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">Media & Publications</span>
                </a>
            </li>
            <li <?php if($this->name=='Member'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/member" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Users</span>
                </a>
            </li>
            <li <?php if($this->name=='Users'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/users" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Members</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="/admin/users/committee" class="nav-link ">
                            <i class="fa fa-users"></i>
                            <span class="title">Committee</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/admin/users/index" class="nav-link ">
                            <i class="fa fa-user"></i>
                            <span class="title">All Members</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users/add" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add New Members</span>
                        </a>
                    </li>
                </ul>
            </li>
           
            <li <?php if($this->name=='Media'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/media" class="nav-link nav-toggle">
                    <i class="fa fa-video-camera"></i>
                    <span class="title">Gallery</span>
                     <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="/admin/media/image_folders" class="nav-link ">
                            <i class="fa fa-picture-o"></i>
                            <span class="title">Images</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="/admin/media/video_folders" class="nav-link ">
                            <i class="fa fa-video-camera"></i>
                            <span class="title">Videos</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php if($this->name=='Ads'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/ads" class="nav-link nav-toggle">
                    <i class="fa fa-video-camera"></i>
                    <span class="title">Advertisement</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->