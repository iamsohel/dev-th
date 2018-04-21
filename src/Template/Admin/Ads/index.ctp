 <ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Advertisement</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
<div class="col-md-12">
<!-- BEGIN BORDERED TABLE PORTLET-->
<div class="portlet light portlet-fit bordered">
<div class="portlet-title">
<div class="caption font-red-sunglo">
<i class="fa fa-envelope font-red"></i>
<span class="caption-subject font-red bold uppercase">Advertisement</span>
</div>
<div class="actions">
<div class="btn-group">
    <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/ads/add">
        <i class="fa fa-plus"></i>
        Add  
    </a>
</div>
</div>
</div>
<div class="portlet-body">
<div class="table-scrollable">
<table class="table table-bordered table-hover">
    <thead>
        <?php echo $this->Form->create('Ads', ['url' => '/admin/ads/index']); ?>
        <tr>
            <th width="10%" class="text-center">Id </th>
            <th class="text-center">Image </th>
              <th class="text-center">Url </th>
            <th width="22%" class="text-center"> Action </th>
        </tr>
        
        <?php echo $this->Form->end();?>
    </thead>
    <tbody>
        <?php foreach($ads as $ad){?>
        <tr>
            <td class="text-center"> <?php echo $ad['id'];?></td>
            <td> <img src="/img/ads/<?php echo $ad['image'];?>" class="img-responsive" alt="" style="height: 20px;width: 70px;"></td>
               <td> <?php echo $ad['url'];?></td>
            <td class="text-center">
                <!-- <a href="/admin/ads/update/<?php echo $ad['id'];?>" class="btn btn-outline btn-circle btn-xs purple">Update</a>  -->
                <a href="/admin/ads/delete/<?php echo $ad['id'];?>" class="btn btn-outline btn-circle btn-xs red">Delete</a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
</div>
</div>
</div>
<!-- END BORDERED TABLE PORTLET-->
</div>                     
 </div>