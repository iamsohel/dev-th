<section class="section-content">
    <div class="section-content pvb0 bg-cover" data-bg-image="/images/coming-bg.jpg">
    <div class="container pvt80">
        <div class="row">
            <div class="col-md-12 mb-5 mt-5">
             
                <h1 class="dark text-right tuper">Our Members </h1>
            
             
                <ol class="breadcrumb text-right">
                   <li class="breadcrumb-item"><a href="/">Home</a></li>
                   <li class="breadcrumb-item"><a href="/members">Pages</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Members</li>
                 </ol>
            </div>  
        </div>
        </div>  
</div> 
<div class="container-fluid pv11 ">
                <div class="row">
				
				   <div class="col-sm-3">
				      
				   </div>
				   
				   <div class="col-sm-6">
				        <h3 class="cheading">ADVISOR COMITTEE</h3>
				   </div>
				   <div class="col-sm-3">
				      
				   </div>
                    <div class="col-sm-12">
                      
                        <div class="ticket-carousel pvt85">
                            
                               <?php foreach($users_ad as $user){?>
								    <div class="col-lg-2 col-md-3 col-sm-6 mb-5 mt-2">
                                       <div class="swiper-slide">
                                            <div class="movie-image" data-bg-image="/img/profile/<?php echo $user['image'];?>">
                                                <div class="entry-hover">
                                                    <div class="entry-actions">
                                                        
                                                        <a class="btn-ticket order_btn" onclick = "launch_comment_modal(<?php echo $user['id']; ?>)" data-toggle="modal" data-target="#membe" data-whatever="@fat">Read More</a>
                                                    </div>
                                                </div>
                                                <div class="entry-desc">
                                                    <h3 class="entry-title"><?php echo $user['name'];?></h3>
                                                    
                                                </div>
                                            </div>
                                        </div>
									</div>	
                                    <?php }?>
									
								
							

						   </div>
                            
                        </div>

                    
                </div>
 
           </div>    
		
		  <!-- Advisor Committee Members  --> 	
		  
		  <div class="container-fluid ">
                <div class="row">
				
				   <div class="col-sm-3">
				      
				   </div>
				   
				   <div class="col-sm-6">
				        <h3 class="cheading">ON GOING COMITTEE</h3>
				   </div>
				   <div class="col-sm-3">
				      
				   </div>
                    <div class="col-sm-12">
                      
                        <div class="ticket-carousel pvt85">
                            
                               
								    <?php foreach($users_on as $user){?>
                                    <div class="col-lg-2 col-md-3 col-sm-6 mb-5 mt-2">
                                       <div class="swiper-slide">
                                            <div class="movie-image" data-bg-image="/img/profile/<?php echo $user['image'];?>">
                                                <div class="entry-hover">
                                                    <div class="entry-actions">
                                                        
                                                        <a class="btn-ticket order_btn" onclick = "launch_comment_modal(<?php echo $user['id']; ?>)" data-toggle="modal" data-target="#membe" data-whatever="@fat">Read More</a>
                                                    </div>
                                                </div>
                                                <div class="entry-desc">
                                                    <h3 class="entry-title"><?php echo $user['name'];?></h3>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <?php }?>
                                    
									
									
                          
							

						   </div>
                            
                        </div>

                    
                </div>
 
           </div>    
		
		  <!-- General Members  --> 	
		  
		  <div class="container-fluid pv11 ">
                <div class="row">
				
				   <div class="col-sm-3">
				      
				   </div>
				   
				   <div class="col-sm-6">
				        <h3 class="cheading">GENERAL MEMBERS</h3>
				   </div>
				   <div class="col-sm-3">
				      
				   </div>
                    <div class="col-sm-12">
                      
                        <div class="ticket-carousel pvt85">
                            
                               
								    <?php foreach($users_ge as $user){?>
                                    <div class="col-lg-2 col-md-3 col-sm-6 mb-5 mt-2">
                                       <div class="swiper-slide">
                                            <div class="movie-image" data-bg-image="/img/profile/<?php echo $user['image'];?>">
                                                <div class="entry-hover">
                                                    <div class="entry-actions">
                                                        
                                                        <a class="btn-ticket order_btn" onclick = "launch_comment_modal(<?php echo $user['id']; ?>)" data-toggle="modal" data-target="#membe" data-whatever="@fat">Read More</a>
                                                    </div>
                                                </div>
                                                <div class="entry-desc">
                                                    <h3 class="entry-title"><?php echo $user['name'];?></h3>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <?php }?>
                                    
									
									
							

						   </div>
                            
                        </div>

                    
                </div>
 
           </div>    
		

</section>

      
  <div class="modal fade bs-example-modal-lg" id="member" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title tuper" id="myModalLabel">Member Details</h4>
        </div>
        <div class="modal-body member-modal">
        <div id="print-content">
            <div class="container-fluid" >
                  <div class="row">   
                      <div class="col-md-4 col-xs-12">
                        <img class="img-responsive" src="" id="img-1"/> 
                          <div class="panel panel-default">
                          <div class=" panel-body"> 
                               <div class="row">
                               <div class="col-md-4">						
                                <img class="img-responsive" src="" id="img-2"/> 
                              </div>   
                              <div class="col-md-8">						
                                <h2 class="tuper" >MAMBER ID: <p id="m-id"><p></h2>
                              </div>   
                              </div> 
                           </div> 
                          </div> 
                        
                      </div>
                      <div class="col-md-8 col-xs-12">
                      <article class="blog-item single" >
                       <div class="post-content bg-cover">
                              <div class="content-meta"> 
                                  <h2 class="entry-title" id="user_nam">
                                 
                                  </h2>

                                  <div class="social-links">
                                      <a href="#"  onClick="printDiv('print-content')"><i class="fa fa-print"></i></a>
                                  </div>
                              </div>
                              
                              <p class="entry-text"></p>
                              <div class="info-content">
                                  <ul class="item-info">
                                      
                                      <li><span>Name:</span>  <p id="user_name"></p></li>
                                      <li><span>Member id: </span>  <p id="mid"></p></li>
                                       <li><span>Member Category:</span>  <p id="user_cat"></p></li>
                                      <li><span>Profession:</span>  <p id="prof"></p></li>
                                      <li><span>Phone:</span>  <p id="phone"></p></li>
                                      <li><span>Address:</span>  <p id="address"></p></li>
                                      <li><span>Email:</span>  <p id="user_email"></p></li>
                                      <li><span>Blood Group:</span>  <p id="blood"></p></li>
                                      <li><span>NID No:</span>  <p id="nid"></p></li>
                                  </ul>
                                 </div>
                              
                          </div>
                          
                          </div>
                      </div>
                  </div>	
           </div>
        </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button onClick="printDiv('member')" type="button" class="btn btn-default">Print</button>
        </div>
      </div>
    </div>
  </div>	
         
 


  <script>
    //$('#member').modal({ show: true});
    function launch_comment_modal(id){
       $.ajax({
          type: "POST",
          url: "/members/view/"+id,
          dataType: 'html',
          success: function(response){
            var data = $.parseJSON(response);
            console.log(data);
            console.log(data.name);
            //console.log(data.email);
            $('.print-content').html(data);
            $("#user_name").html(data.name);
            $("#user_nam").html(data.name);
            $("#user_email").html(data.email);
            $("#mid").html(data.member_id);
             $("#m-id").html(data.member_id);
            $("#nid").html(data.nid);
            $("#phone").html(data.phone);
            $("#address").html(data.address);
             $("#blood").html(data.blood.name);
              $("#user_cat").html(data.category.name);
            $("#prof").html(data.profession);
            $("#img-1").attr("src","/img/profile/"+data.image);
             $("#img-2").attr("src","/img/qr/"+data.qr_code);
        $('#member').modal("show");
     }
    });

 }

    </script>