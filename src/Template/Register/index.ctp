<section class="section-content dark-contant">
    <div class="section-content pvb0 bg-cover" data-bg-image="/images/coming-bg.jpg">
    <div class="container pvt80">
        <div class="row">
		    <div class="col-md-12 mb-5 mt-5">
			 
			    <h1 class="dark text-right tuper">Register </h1>
            
			 
			    <ol class="breadcrumb text-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Register</li>
                 </ol>
            </div>
			
		</div>
         
		
		
		
		</div>
		
</div>       

           <!-- Register  -->   
           <div class="container pv11 ">
		  
		   
		     <div class="row mb-5 mt-5">
			 
			
			 <div class="col-md-12 col-xs-12 comming_movie vp-2">
             <div class="panel panel-black"> 
              	<div class="panel-body"> 

                 <div class="container">
		               <div class="row mb-5 mt-5">
			               <div class="col-md-8 col-xs-12 bpr">				
			                  <h3 class="dark"> If you don't have the registration form yet.</h3>
			                  <h4 class="dark"> Download it right now and submit it bellow </h4>	
				           </div>						
			           
						  <div class="col-md-4 col-xs-12 dark">	
						  
                              	<p style="text-align:center;"> 
								<!-- Pdf / Doc / Image file Download link -->
								<a href="/register/download"><i class="fa fa-download fa-3x"></i></a>
								</p>				  
						 </div>	
				   </div>	
			    </div>						
			</div>							   
            						
										   
            </div>
			 
            
		   </div> 
         
		 <div class="col-md-12 col-xs-12 comming_movie vp-2">
             <div class="panel panel-black"> 
              	<div class="panel-body"> 

                 <div class="container">
		               <div class="row mb-5 mt-5">
					   
					       <div class="col-md-4 col-xs-12 dark">	
                              	<img class="img-responsive" src="/images/reg.jpg"/>			  
						  </div>	
						  
			               <div class="col-md-6 col-xs-12 dark">				

			                  <?php echo $this->Form->create("Register", array('url' => '/admin/register/email','id'=>'add-form','type'=>'file')); ?>

							  <h3>SUBMIT FORM</h3>
							  <hr>
							      <div class="form-group">
                                    <label for="Name">Name</label>

                                    <?php echo $this->Form->input('name',array('type' => 'text',
                                     'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Name')); ?>
                                  </div>
								  
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <?php echo $this->Form->input('email',array('type' => 'email',
                                                                        'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Email')); ?>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                   <?php echo $this->Form->input('phohe',array('type' => 'text',
                                                                       'label' => false,'div'=>'false','class' => 'form-control','placeholder'=>'Phone')); ?>
                                  </div>
                                  <div class="form-group">
								  <!-- Pdf / Doc / Image file upload -->
                                    <label for="exampleInputFile">Upload Form</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Upload the Registration Form.</p>
                                  </div>
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox"> Agree the terms & conditions
                                    </label>
                                  </div>
                                  <button type="submit" class="btn btn-default">Submit</button>
                            <?php echo $this->Form->end(); ?>
				           </div>						
			           
						  
				   </div>	
			    </div>						
			</div>							   
            						
										   
            </div>
			 
            
		   </div>
		   
		</div> 		 
</div> 		 

</section>