<div class="main_page_content" id="admin_users_add">
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Edit Video</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
  <div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
              <div class="caption font-red-sunglo">
                   <i class="fa fa-file-image-o font-red-sunglo"></i>
                   <span class="caption-subject bold"> Edit  Video [<?php echo $folder_name['name'];?>] Folder</span>
             </div>
            <div class="actions">
                 <div class="btn-group">
                    <a class="btn btn-sm green" href="/admin/media/videos/<?php echo $folder_name['id'];?>" >
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
                     <?php echo $this->Form->create($video, array('id'=>'add-form','type'=>'file')); ?>
                     
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Video Name *</label>
                                     <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Video Name')); ?> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Video Link *</label>
                                     <?php echo $this->Form->input('link',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Video Link')); ?> 
                                </div>
                            </div>

                        </div>
                        <div class="margiv-top-10">
                            <button class="btn green"> Save Changes </button>
                            <a href="/admin/media/videos/<?php echo $folder_name['id'];?>" class="btn default"> Cancel </a>
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
