<section class="section-content dark-contant">
    <div class="section-content pvb0 bg-cover" data-bg-image="/images/coming-bg.jpg">
    <div class="container pvt80">
        <div class="row">
		    <div class="col-md-12 mb-5 mt-5">
			 
			    <h1 class="dark text-right tuper">Images Gallery </h1>
            
			 
			    <ol class="breadcrumb text-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
                 </ol>
            </div>
			
		</div>
         
		
		
		
		</div>
		
</div>       

           <!-- Committee Members  -->   
           <div class="container pv11 ">
		   
		   
		     <div class="row mb-5 mt-5">
			 
			<?php foreach($images as $img){?>
			 
			 <div class="col-md-4">
			    <!-- thumbnail image wrapped in a link -->
                <a href="#img1">
                  <img src="/img/<?php echo $folder_name['name'];?>/<?php echo $img['image'];?>" class="thumbnail">
                </a>
                
                <!-- lightbox container hidden with CSS -->
                <a href="#_" class="lightbox" id="img1">
                  <img src="/img/<?php echo $folder_name['name'];?>/<?php echo $img['image'];?>">
				  
                </a>
		     </div> 
         <?php }?>
			

			  </div> 
 
             <div class="row">
			<div class="col-md-12">  
			   <a href="/images/folders" class="btn" style="float: right;"><< Back</a>
			 
			 </div> 
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