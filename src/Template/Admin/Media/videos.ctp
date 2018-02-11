 <ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Videos</span>
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
                        <i class=" fa fa-video-camera  font-purple"></i>
                        <span class="caption-subject font-purple bold uppercase">Videos [<?php echo $folder_name['name'];?> Folder]</span>
                    </div>
                    <div class="actions">
                    <div class="btn-group">
                         <a class="btn btn-sm green" href="/admin/media/video_folders" >
                        <i class="fa fa-backward"></i>
                        Back
                        </a>
                         </div>
                        <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/media/add_video/<?php echo $folder_id;?>">
                            <i class="fa fa-plus"></i>
                            Add New Video
                        </a>
                    </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->Form->create('Media', ['url' => '/admin/media/videos/'.$folder_id]); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                 <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Search... Video Name')); ?> 
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
                    <?php foreach($videos as $video){?>
                      <div class="row">
                            <div class="col-md-9">
                                <iframe  width="750" height="350" src="<?php echo $video['link'];?>" frameborder="0"       
                                      allowfullscreen>
                                </iframe>
                                <button class="btn btn-primary"><?php echo $video['name'];?></button>
                            </div>
                             <div class="col-md-3">
                                <a href="/admin/media/edit_video/<?php echo $video['id'];?>" class="btn btn-info">Edit Video</a>
                                <a href="/admin/media/remove_video/<?php echo $video['id'];?>" class="btn btn-danger">Delete Video</a>
                             </div>
                      </div>
                      <?php }?>   
                            
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