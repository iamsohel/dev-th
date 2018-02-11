<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Committee</span>
    </li>
</ul>
<div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" fa fa-users font-red"></i>
                        <span class="caption-subject font-red bold uppercase">Ongoing Committee</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="mt-element-card mt-element-overlay">
                        <div class="row">
                            <?php foreach($on_going as $going){?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <div class="mt-card-item">
                                    <div class="mt-card-avatar mt-overlay-1">
                                        <img src="/img/profile/<?php echo $going['image'];?>" />
                                        <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <a class="btn default btn-outline" href="javascript:;">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mt-card-content">
                                        <h3 class="mt-card-name"><?php echo $going['name'];?></h3>
                                        <p class="mt-card-desc font-grey-mint"><?php echo $going['profession'];?></p>
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
<div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" fa fa-users font-purple"></i>
                        <span class="caption-subject font-purple bold uppercase">Advisor Committee</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="mt-element-card mt-element-overlay">
                        <div class="row">
                            <?php foreach($advisor as $ad){?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <div class="mt-card-item">
                                    <div class="mt-card-avatar mt-overlay-1">
                                        <img src="/img/profile/<?php echo $ad['image'];?>" />
                                        <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <a class="btn default btn-outline" href="javascript:;">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mt-card-content">
                                        <h3 class="mt-card-name"><?php echo $ad['name'];?></h3>
                                        <p class="mt-card-desc font-grey-mint"><?php echo $ad['profession'];?></p>
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
<div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" fa fa-users font-green"></i>
                        <span class="caption-subject font-green bold uppercase">General Member</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="mt-element-card mt-element-overlay">
                        <div class="row">
                            <?php foreach($general as $ge){?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <div class="mt-card-item">
                                    <div class="mt-card-avatar mt-overlay-1">
                                        <img src="/img/profile/<?php echo $ge['image'];?>" />
                                        <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <a class="btn default btn-outline" href="javascript:;">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mt-card-content">
                                        <h3 class="mt-card-name"><?php echo $ge['name'];?></h3>
                                        <p class="mt-card-desc font-grey-mint"><?php echo $ge['profession'];?></p>
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

