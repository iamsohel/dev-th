 <ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="/admin/dashboard">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Notices</span>
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
<span class="caption-subject font-red bold uppercase">Notices</span>
</div>
<div class="actions">
<div class="btn-group">
    <a class="btn green-haze btn-outline btn-circle btn-sm" href="/admin/notices/add">
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
        <?php echo $this->Form->create('Users', ['url' => '/admin/notices/index']); ?>
        <tr>
            <th width="10%" class="text-center">Date </th>
            <th class="text-center">Message </th>
            <th width="22%" class="text-center"> Action </th>
        </tr>
        <tr>
           
            <td>
                <div class="form-group">
                 <?php echo $this->Form->input('date',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control form-control-inline input-medium date-picker','placeholder'=>'Date','data-date-format' => 'yyyy-mm-dd')); ?> 
                </div>
            </td>
            <td>
                <div class="form-group">
                 <?php echo $this->Form->input('message',array('type' => 'text', 'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Message')); ?> 
                </div>
            </td>
       
           
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
        <?php foreach($notices as $notice){?>
        <tr>
            <td class="text-center"> <?php echo date('d-m-Y',strtotime($notice['date']));?></td>
            <td> <?php echo $notice['name'];?></td>
            <td class="text-center">
                <a href="/admin/notices/update/<?php echo $notice['id'];?>" class="btn btn-outline btn-circle btn-xs purple">Update</a> 
                <a href="/admin/notices/delete/<?php echo $notice['id'];?>" class="btn btn-outline btn-circle btn-xs red">Delete</a>
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