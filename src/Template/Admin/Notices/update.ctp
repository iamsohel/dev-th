<div class="main_page_content" id="admin_users_add">
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Update Notice</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
  <div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
              <div class="caption font-red-sunglo">
                   <i class="fa fa-envelope font-red-sunglo"></i>
                   <span class="caption-subject bold"> Update Notice</span>
             </div>
            <div class="actions">
                 <div class="btn-group">
                    <a class="btn btn-sm green" href="/admin/notices" >
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
                     <?php echo $this->Form->create($notice, array('id'=>'add-form','type'=>'file')); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php $date = date('Y-m-d', strtotime($notice['date'])); ?>
                                    <label>Date *</label>
                                    <?php echo $this->Form->text('date', ['class' => 'form-control form-control-inline date-picker', "data-date-format" => "yyyy-mm-dd", 'value' => $date,'id'=>'date']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                 <label>Notice</label>
                                <?php echo $this->Form->input('name', array('class' => 'form-control', 'id'=>'summernote_1','type' => 'textarea', 'label' => false, 'div' => false)); ?>
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
