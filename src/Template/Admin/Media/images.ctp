 <ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Images</span>
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
                        <span class="caption-subject font-purple bold uppercase">Images [<?php echo $folder_name['name'];?> Folder]</span>
                    </div>
                    <div class="actions">
                    <div class="btn-group">
                         <a class="btn btn-sm green" href="/admin/media/image_folders" >
                        <i class="fa fa-backward"></i>
                        Back
                        </a>
                         </div>
                        <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/media/add_image/<?php echo $folder_id;?>">
                            <i class="fa fa-plus"></i>
                            Add New Image
                        </a>
                    </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->Form->create('Media', ['url' => '/admin/media/images/'.$folder_id]); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                 <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Search... Image Name')); ?> 
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
                    <?php foreach($images as $image){?>
                      <div class="portfolio-content portfolio-1">
                        
                        <div id="js-grid-juicy-projects" class="cbp">
                            <div class="cbp-item graphic">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="/img/<?php echo$folder_name['name'];?>/<?php echo$image['image'];?>" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <a href="/img/<?php echo$folder_name['name'];?>/<?php echo$image['image'];?>" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
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