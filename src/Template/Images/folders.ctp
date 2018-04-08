<section class="section-content dark-contant">
    <div class="section-content pvb0 bg-cover" data-bg-image="/images/coming-bg.jpg">
    <div class="container pvt80">
        <div class="row">
		    <div class="col-md-12 mb-5 mt-5">
			 
			    <h1 class="dark text-right tuper">Our Image Gallery </h1>
            
			 
			    <ol class="breadcrumb text-right">
			    	<li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item"><a href="#">Image Gallery</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Folder Name</li>
                   
                 </ol>
            </div>
			
		</div>
		
		</div>
		
</div>       

           <!-- Committee Members  -->   
           <div class="container pv11 ">
                <div class="row mb-10">
				
				   <div class="col-sm-3">
				      
				   </div>
				   
				   <div class="col-sm-6">
				        <h3 class="cheading">IMAGE GALLERY</h3>
				   </div>
				   <div class="col-sm-3">
				      
				   </div>
                </div>
			
                <div class="row mb-5 mt-5">
                	<?php foreach($folders as $fol){?>
				 <div class="col-sm-3 col-xs-6 text-center "> <!-- Folder  --> 	
                       
                       <a href="/images/index/<?php echo $fol['id'];?>"><span class="image-folder"></span> 
					   <h4 class="image-folder-title" ><?php echo $fol['name'];?></h4></a> 
					   
					   
                  </div>
				  
				 
				  
				  <?php }?>
				  
                </div>
 

 <div class="row ">
<div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-8 col-xs-offset-4 col-xs-9 col-xs-offset-3 mt-5">

 <div class="pagination">
<?php echo $this->Paginator->prev(); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next(); ?>
</div>

    </div>
</div> 
           </div>  
           
</section>