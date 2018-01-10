<div class="main_page_content" id="admin_users_profile">
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
                                    <a href="#tab_1_2" data-toggle="tab">Personal Info</a>
                                </li>
                                <li>
                                    <a href="#tab_1_1" data-toggle="tab">Update Info</a>
                                </li>
                                 <li>
                                    <a href="#tab_1_4" data-toggle="tab">Change Avatar</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Upload QR Code</a>
                                </li>
                                <li>
                                    <a href="#tab_1_5" data-toggle="tab">Upload ID Card</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane" id="tab_1_1">
                                    <?php echo $this->Form->create($user, array('id'=>'edit-form','url'=>'/admin/users/edit/'.$user['id'])); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Member Id *</label>
                                                 <?php echo $this->Form->input('member_id',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Member Id')); ?> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Name *</label>
                                                 <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Name')); ?> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Profession </label>
                                                <?php echo $this->Form->input('profession',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Profession')); ?> 
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Email *</label>
                                                <?php echo $this->Form->input('email',array('type' => 'email', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Email')); ?> 
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <?php echo $this->Form->input('phone',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Phone')); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <?php echo $this->Form->input('address',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Address')); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">NID *</label>
                                                <?php echo $this->Form->input('nid',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'NID')); ?> 
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Blood Group</label>
                                                <?php echo $this->Form->input('blood_id',array('options' => $bloods, 'label' => false,'div'=>'false','class' => 'form-control','empty'=>'-Select Blood Group-')); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Member Category</label>
                                                <?php echo $this->Form->input('member_category',array('options' => $categories, 'label' => false,'div'=>'false','class' => 'form-control','empty'=>'-Select Category-')); ?>
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
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane active" id="tab_1_2">
                                    <div class="portlet light">
                                        <div class="portlet-body">
                                             <div class="table-scrollable table-scrollable-borderless">
                                                <table class="table table-hover table-light">

                                                     <tbody>
                                                    <tr>
                                                        <td>
                                                       <strong>Member Id</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['member_id'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                       <strong>Member Category</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['category']['name'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                       <strong>Name</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['name'];?> </strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                       <strong>Profession</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['profession'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                       <strong>Email</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['email'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                       <strong>Address</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['address'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                       <strong>Phone</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['phone'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                       <strong>NID</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['nid'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                       <strong>Blood Group</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong><?php echo $user['blood']['name'];?></strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                       <strong>QR Code</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong>  <img src="/img/qr/<?php echo $user['qr_code'];?>" class="img-responsive" alt="" style="height: 70px;width: 80px;"> </div></strong></td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                       <strong>Id Card</strong>
                                                        </td>
                                                        <td></td>
                                                        <td> <strong>  <img src="/img/id_card/<?php echo $user['id_card'];?>" class="img-responsive" alt="" style="height: 70px;width: 80px;"> </div></strong></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                   <?php echo $this->Form->create($user, array('id'=>'edit-form','type'=>'file','url'=>'/admin/users/upload_qr/'.$user['id'])); ?>
                                       <div class="form-group">
                                            <label for="exampleInputFile1">Upload QR Code</label>
                                            <input type="file" id="exampleInputFile1" name="file">
                                        </div>
                                       <div class="margiv-top-10">
                                            <button class="btn green"> Save Changes </button>
                                            <a href="/admin/users" class="btn default"> Cancel </a>
                                       </div>
                                    <?php echo $this->Form->end();?>
                                </div>
                                <div class="tab-pane" id="tab_1_4">
                                    <?php echo $this->Form->create($user, array('id'=>'edit-form','type'=>'file','url'=>'/admin/users/change_avatar/'.$user['id'])); ?>
                                       <div class="form-group">
                                            <label for="exampleInputFile1">Upload Profile Image</label>
                                            <input type="file" id="exampleInputFile1" name="file">
                                        </div>
                                       <div class="margiv-top-10">
                                            <button class="btn green"> Save Changes </button>
                                            <a href="/admin/users" class="btn default"> Cancel </a>
                                       </div>
                                    <?php echo $this->Form->end();?>
                                </div>
                                <div class="tab-pane" id="tab_1_5">
                                    <?php echo $this->Form->create($user, array('id'=>'edit-form','type'=>'file','url'=>'/admin/users/upload_id/'.$user['id'])); ?>
                                       <div class="form-group">
                                            <label for="exampleInputFile1">Upload ID Card</label>
                                            <input type="file" id="exampleInputFile1" name="file">
                                        </div>
                                       <div class="margiv-top-10">
                                            <button class="btn green"> Save Changes </button>
                                            <a href="/admin/users" class="btn default"> Cancel </a>
                                       </div>
                                    <?php echo $this->Form->end();?>
                                </div>
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