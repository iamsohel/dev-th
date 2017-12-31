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
            <li <?php if($this->name=='Users'){ ?> class="nav-item active" <?php }?>>
                <a href="/admin/users" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="/admin/users/index" class="nav-link ">
                            <i class="fa fa-user"></i>
                            <span class="title">All Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users/add" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add User</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->