
<body>


	<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" >
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo $profile['0']['user_avatar'] ?>" height="150px" alt="" /></div>
              <div class="info">
               <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo " Admin :".$profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png')?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
               <ul class="cl-vnavigation">
               <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                   <li ><a href="<?php echo base_url('index.php/admin') ?>">My Profile</a></li>
                </ul>
              </li>
             
              <li><a href="<?php echo base_url('index.php/admin/accounts_opening'); ?>"><i class="fa fa-table"></i><span>Accounts Opening</span></a>
              </li>
             <li class="active"><a href="<?php echo base_url('index.php/admin/customer_reports'); ?>"><i class="fa  fa-bar-chart-o"></i><span>Customer Report</span></a>
              </li>
              </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>
	
		<div class="container-fluid" id="pcont">
		  <div class="cl-mcont">
		  
			  
        <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header">              
              <h3 style="font-weight:300;color:#7C3886"> CUSTOMER REPORTS </h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable-icons" >
                  <thead>
                    <tr style="background:#70871B;color:#fff;">
                      <th>Customer Id</th>
                     
                      <th>Customer Name</th>
                      <th>Customer Email</th>
                      <th>Customer Phone</th>
                      <th>Customer DOB</th>
                      <th>Customer Gender</th>
                      <th>Acccount Type</th>
                      <th>Total Income</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  for ($i=0;$i<count($customers);$i++){
                   ?>
                                      <tr class="gradeX">
                      <td><?php echo $customers[$i]['customer_id']  ;?></td>
                      <td><?php echo $customers[$i]['customer_name'] ;?></td>
                      
                      <td><?php echo $customers[$i]['customer_email'] ;?></td>
                      <td><?php echo $customers[$i]['customer_phone'] ;?></td>
                      <td><?php echo $customers[$i]['customer_dob'] ;?></td>
                      <td><?php echo $customers[$i]['customer_gender']  ;?></td>
                      <td><?php echo $customers[$i]['income'] ;?></td>
                      <td><?php echo $customers[$i]['account_type'] ;?></td>
                      <td>
              
                        <a class="btn btn-success btn-flat" type="button" 
                        href="<?php echo base_url('index.php/admin/customer_details/').'/'.$customers[$i]['customer_id'].'/';?>"  
                         data-original-title="Edit Customer Details" data-toggle="tooltip"><i class="fa fa-file"></i></a> 

                      </td>
                     
                    </tr>
                    <?php }
                    ?>
                      </tbody>
                </table>              
              </div>
            </div>
          </div>        
        </div>
      </div>
          
          

      </div>

  </div>
  </div>
  	
  </div> 
  	
  </div>
  <!-- Scripts 
  ==================================================================================-->
    
  	<script src="<?php echo base_url("/assets/js/jquery.js")?>"></script>
       <script type="text/javascript">
      
     $("span.detail").click(function() 
      {
       edit($(this));
       });
    
     
     $("input.detail").change(function(){
        change($(this));
     }).blur(function() {
      $(this).hide().siblings("span.detail").show();
      });
     
    
    
     
     
     function edit($field){
       $field.hide()
       .siblings("input" ,"textarea").attr("class" ,"detail")
       .show()
       .val($field.text())
       .attr("value" ,$("input").val())
      

       .focus();
        
      }
    function change($input){
      $input.hide();
      
      var $span = $input.siblings("span.detail");
      if ($input.val())
      {
      $span.text($input.val());
      }
      $span.show();
    }

    function editprofile(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/editadmin")?>',
      data:$('#editprofile').serialize(),
      success:
        function(data){
          if (data == '1'){
             $('#message').attr("class" ,"alert alert-success alert-white-alt rounded");
             $('#message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#message').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#message').append("<strong>Success!</strong> Changes has been saved successfully!"); 

            
          }
          else{
            
             $('#message').attr("class" ,"alert alert-danger alert-white-alt rounded");
             $('#message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#message').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#message').append("<strong>Error!</strong> saving changes"); 
          }
        },
      fail:
        function(data){
          console.log(data);
        }

    });
    
    return false;

    }

      function changeavatars(){

    var form = document.getElementById('avatars');
    var myfd = new FormData(form);

      $.ajax({
      
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/changeavatars")?>',
      data:myfd,
      processData: false,
      contentType:false,
      
      success:
        function(data){
          if ( data != '0'){
             $('#avatarmessage').attr("class" ,"alert alert-success alert-white-alt rounded");
             $('#avatarmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#avatarmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#avatarmessage').append("<strong>Success!</strong> Avatar changed"); 
             
          }
          else{
            
             $('#avatarmessage').attr("class" ,"alert alert-danger alert-white-alt rounded");
             $('#avatarmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#avatarmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#avatarmessage').append("<strong>Error!</strong> Avatar change failed"); 
          }
        },
      fail:
        function(data){
          console.log(data);
        }

    });
    
    return false;

    }



</script>


  </body>

</html>