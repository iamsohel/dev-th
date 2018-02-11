 <ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Users</span>
    </li>
</ul>
<?php echo $this->Flash->render() ?>
<div class="row">
<div class="col-md-12">
<!-- BEGIN BORDERED TABLE PORTLET-->
<div class="portlet light portlet-fit bordered">
<div class="portlet-title">
<div class="caption font-red-sunglo">
<i class="fa fa-user font-red"></i>
<span class="caption-subject font-red bold uppercase">User</span>
</div>
<div class="actions">
<div class="btn-group">
    <a class="btn green-haze btn-outline btn-circle btn-sm" href="#">
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
        <?php echo $this->Form->create('Users', ['url' => '/admin/users/index']); ?>
        <tr>
            <th class="text-center"> # </th>
            <th class="text-center">Name </th>
            <th class="text-center">Email</th>
           <!--  <th class="text-center">Profession</th>
            <th class="text-center">Member Category</th> -->
            <th class="text-center"> Action </th>
        </tr>
        <?php echo $this->Form->end();?>
    </thead>
    <tbody>
        <?php foreach($users as $user){?>
        <tr>
            <td class="text-center"> 1</td>
            <td class="text-center"> <?php echo $user['name'];?></td>
            <td class="text-center"> <?php echo $user['email'];?></td>
            <!-- <td class="text-center"> <?php echo $user['profession'];?> </td>
            <td class="text-center"> <?php echo $user['category']['name'];?></td> -->
            <td class="text-center">
                <a href="/admin/users/view/<?php echo $user['id'];?>" class="btn btn-outline btn-circle btn-xs purple">View</a> 
                <?php if($session['Auth']['User']['id'] !=$user['id']){?>
                <a href="/admin/users/delete/<?php echo $user['id'];?>" class="btn btn-outline btn-circle btn-xs red">Delete</a>
                 <?php }?>
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