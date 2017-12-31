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
<i class="fa fa-users font-red"></i>
<span class="caption-subject font-red bold uppercase">All Users</span>
</div>
<div class="actions">
<div class="btn-group">
    <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/users/add">
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
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Status</th>
            <th class="text-center"> Action </th>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="form-group">
                 <?php echo $this->Form->input('name',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Name')); ?> 
                </div>
            </td>
            <td>
                <div class="form-group">
                 <?php echo $this->Form->input('email',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Email')); ?> 
                </div>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
                <button class="btn btn-sm green" type="submit" name="search" value="search">
                    <i class="fa fa-search"></i>
                    Search
                </button>  
               <button class="btn btn-sm red" type="submit" name="reset" value="reset">
                    <i class="fa fa-times"></i>
                    Reset
                </button>
            </td>
        </tr>
        <?php echo $this->Form->end();?>
    </thead>
    <tbody>
        <?php foreach($users as $user){?>
        <tr>
            <td class="text-center"> <?php echo $user['id'];?></td>
            <td > <?php echo $user['name'];?></td>
            <td > <?php echo $user['email'];?></td>
            <td class="text-center"> <?php echo $user['phone'];?> </td>
            <td class="text-center"> <?php echo $user['address'];?></td>
            <td class="text-center"> <?php echo $user['status'];?></td>
            <td class="text-center">
                <a href="/admin/users/view" class="btn btn-outline btn-circle btn-xs purple">View</a> 
                <a href="/admin/users/edit" class="btn btn-outline btn-circle btn-xs blue">Edit</a>
                <a href="/admin/users/delete" class="btn btn-outline btn-circle btn-xs red">Delete</a>
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