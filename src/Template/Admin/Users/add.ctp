<div class="main_page_content" id="admin_users_add">
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Add Memeber</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
  <div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
              <div class="caption font-red-sunglo">
                   <i class="icon-settings font-red-sunglo"></i>
                   <span class="caption-subject bold"> Add New Member</span>
             </div>
            <div class="actions">
                 <div class="btn-group">
                    <a class="btn btn-sm green" href="/admin/users" >
                        <i class="fa fa-backward"></i>
                        Back
                    </a>
                 </div>
            </div>
        </div>
        <div class="portlet-body">
            <div class="tab-content">
                <!-- PERSONAL INFO TAB -->
                <div class="tab-pane active">
                     <?php echo $this->Form->create("Users", array('id'=>'add-form','type'=>'file')); ?>
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile1"> Upload Profile Picture</label>
                                    <input type="file" name="file1" id="exampleInputFile1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile1"> Upload QR Code</label>
                                    <input type="file" name="file2" id="exampleInputFile1">
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
            </div>
        </div>
     </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
</div>
