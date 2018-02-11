 <ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Video Folders</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" fa fa-folder  font-purple"></i>
                        <span class="caption-subject font-purple bold uppercase">Video Folders</span>
                    </div>
                    <div class="actions">
                    <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/media/create_video_folder">
                            <i class="fa fa-plus"></i>
                            Add Folder
                        </a>
                    </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->Form->create('Media', ['url' => '/admin/media/video_folders']); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                 <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Search... Folder Name')); ?> 
                                </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-sm green" type="submit" name="search" value="search">
                                <i class="fa fa-search"></i>
                                Search
                            </button> 
                             <button class="btn btn-sm red" type="submit" name="reset" value="reset">
                                <i class="fa fa-times"></i>
                                Reset
                            </button>
                        </div> 
                    </div>
                    <?php echo $this->Form->end();?>
                    <div class="mt-element-card mt-element-overlay">
                        <div class="row">
                            <?php foreach($folders as $folder){?>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="color-demo" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_yellow-haze">
                                    <div class="color-view bg-yellow-haze bg-font-yellow-haze bold uppercase">  </div>
                                    
                                    <div class="mt-body-icons">
                                         <a href="/admin/media/videos/<?php echo $folder['id'];?>" class="btn btn-circle btn-info btn-sm"><?php echo $folder['name'];?></a>
                                    </div>
                                    <div class="mt-footer-button">
                                        <a href="/admin/media/remove_folder/<?php echo $folder['id'];?>" class="btn btn-circle btn-danger btn-sm">Delete Folder</a>
                                    </div>
                                </div>
                                
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <?php if ($this->Paginator->hasPage(null, 2)): ?>
                            <div class="paginator text-center">
                                <ul class="pagination pagination-sm">
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                </ul>
                            </div>
                        <?php endif ?>
                </div>
            </div>
        </div>
</div>
</div>
</div>