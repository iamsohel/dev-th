 <?php
$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
?>
 <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet bordered">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="/img/profile/<?php echo $user['image'];?>" class="img-responsive" alt=""> 
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?php echo $user['name'];?> </div>
                    <div class="profile-usertitle-job"> <?php echo $user['profession'];?> </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li <?php if($action == 'admin_Users_view'){ ?> class="active" <?php }?>>
                            <a href="/admin/users/view/<?php echo $user['id'];?>">
                                <i class="fa fa-cog"></i> Account Settings </a>
                        </li>
                        <?php if($user['id'] == $session['Auth']['User']['id']){?>
                         <li <?php if($action == 'admin_Users_changePassword'){ ?> class="nav-item active" <?php }?>>
                            <a href="/admin/users/change_password/<?php echo $user['id'];?>">
                                <i class="fa fa-cog"></i> Change Password</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>