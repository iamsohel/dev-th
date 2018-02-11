<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Media & Publications</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" fa fa-newspaper-o font-red"></i>
                        <span class="caption-subject font-red bold uppercase">Media & Publications</span>
                    </div>
                    <div class="actions">
                    <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/publications/add">
                            <i class="fa fa-plus"></i>
                            Add  
                        </a>
                    </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php echo $this->Form->create('Publications', ['url' => '/admin/publications/index']); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                 <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Search...  Name')); ?> 
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
                            <?php foreach($publications as $publication){?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <div class="mt-card-item">
                                    <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                                        <img src="/img/cover_image/<?php echo $publication['cover'];?>" />
                                        <!-- <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <a class="btn default btn-outline" href="javascript:;">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <div class="mt-card-content">
                                        <a class="mt-card-name" href="/files/<?php echo $publication['file'];?>"><?php echo $publication['name'];?></a>
                                        <!-- <p class="mt-card-desc font-grey-mint"><?php echo $publication['file'];?></p> -->
                                        <div class="mt-card-social">
                                            <ul>
                                                <li>
                                                    <a href="/admin/publications/update/<?php echo $publication['id'];?>" class="tooltips" data-container="body" data-placement="top" data-original-title="Update">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/admin/publications/delete/<?php echo $publication['id'];?>" class="tooltips" data-container="body" data-placement="top" data-original-title="Delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

