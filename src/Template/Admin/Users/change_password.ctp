<div class="main_page_content" id="admin_users_cpassword">
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">User Profile</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
 <div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <?php echo $this->element('Admin/profile_sidebar'); ?>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <?php echo $this->Form->create($user, array('id'=>'cpassword-form','url'=>'/admin/users/change_password/'.$user['id'])); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Current Password *</label>
                                                 <?php echo $this->Form->input('opassword',array('type' => 'password', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Current Password','id'=>'opassword')); ?> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">New Password *</label>
                                                 <?php echo $this->Form->input('npassword',array('type' => 'password', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'New Password','id'=>'npassword')); ?> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Confirm Password * </label>
                                                <?php echo $this->Form->input('cpassword',array('type' => 'password', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Confirm Password','id'=>'cpassword'));?> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="margiv-top-10">
                                        <button class="btn green"> Save Changes </button>
                                        <a href="/admin/users" class="btn default"> Cancel </a>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                              
                                <!-- END CHANGE PASSWORD TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
</div>