<section class="section-content dark-contant">
    <div class="section-content pvb0 bg-cover" data-bg-image="/images/coming-bg.jpg">
    <div class="container pvt80">
        <div class="row">
		    <div class="col-md-12 mb-5 mt-5">
			 
			    <h1 class="dark text-right tuper">Media & Publications </h1>
            
			 
			    <ol class="breadcrumb text-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Media & Publications</li>
                 </ol>
            </div>		
		</div>
		</div>	
</div>       

           <!-- Committee Members  -->   
           <div class="container pv11 ">
		  
		     <div class="row mb-5 mt-5">
			 <?php foreach ($pubs as $pub) {?>
			 <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="offer offer-default">
					<div class="shape">
						<div class="shape-text">
							Pub							
						</div>
					</div>
					<div class="offer-content">
					   
							<img class="img-responsive" src="/img/cover_image/<?php echo $pub['cover'];?>">
						
						<h3 class="lead">
							<?php echo $pub['name'];?>
						</h3>
						
					</div>
				</div>
			</div>
			<?php  }?>
		
	
					 
			
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
		