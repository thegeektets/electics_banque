
<body>


	<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" data-position="right">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo $profile['0']['user_avatar'];?>"  height = "150px"alt="" /></div>
              <div class="info">
               <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo  "customer : ". $profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png');?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
             <ul class="cl-vnavigation">
                   <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                   <li ><a href="<?php echo base_url('index.php/admin') ?>">My Profile</a></li>
                </ul>
              </li>
             
              <li class="active"><a href="<?php echo base_url('index.php/admin/accounts_opening'); ?>"><i class="fa fa-table"></i><span>Accounts Opening</span></a>
              </li>
             <li><a href="<?php echo base_url('index.php/admin/customer_reports'); ?>"><i class="fa  fa-bar-chart-o"></i><span>Customer Reports</span></a>
              </li>
             
              </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">ng
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>
		 <div class="container-fluid" id="pcont">
    <div class="page-head">
      <h2>Open New Account</h2>
           
    </div>
    <div class="cl-mcont">    
    <div class="row wizard-row">
      <div class="col-md-12 fuelux">
        <div class="block-wizard">
          <div id="wizard1" class="wizard wizard-ux">
            <ul class="steps">
              <li data-target="#step1" class="active">Step 1<span class="chevron"></span></li>
              <li data-target="#step2">Step 2<span class="chevron"></span></li>
             
            </ul>
            <div class="actions">
              <button type="button" class="btn btn-xs btn-prev btn-default"> <i class="icon-arrow-left"></i>Prev</button>
              <button type="button" class="btn btn-xs btn-next btn-default" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
            </div>
          </div>
                         <?php if(strlen($success['0'])>0){
                ?>

               <div class="alert alert-success alert-white rounded">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                
                <strong style="margin-left:50px"> &nbsp;&nbsp;Success!</strong><?php echo $success; ?>
               </div>

               <?php
                }
                ?>

          <div class="step-content">
      <div class="step-pane active" id="step1">
                                
          <form role="form" onsubmit="return editcustomerdetails()"class="form-horizontal" enctype ='multipart/form-data' id="customer_details" name="customer_details">

        
               <div class="form-group">
                
                <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title"> Customer Details </h4>

                </div>
                </div>
                <div class="form-group">
                
                <div id="customer_message">
                      <div id="message"></div>   
             
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_id">Customers' Id</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Customers' Id" id="customer_id" value="<?php  echo $customer['0']['customer_id'];?>"
                      name="customer_id"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_id-error"> <?php echo form_error('customer_id'); ?></div>
        
                    </div>
                       </div>
                  

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_name">Customers' Name</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Customers' Name" id="customer_name" value="<?php  echo $customer['0']['customer_name'];?>"
                      name="customer_name"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_name-error"> <?php echo form_error('customer_name'); ?></div>
        
                    </div>
                       </div>
                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_gender">Customers' Gender</label>
                    <div class="col-sm-5">
                    <select class = "form-control" name="customer_gender" id="customer_gender" selected="<?php echo $customer['0']['customer_gender']?>">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <div style="color:#DF0D8A" id="customer_gender-error"> <?php echo form_error('customer_gender'); ?></div>
        
                    </div>
                       </div>
                                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_dob"> Customers' DOB</label>
                    <div class="col-sm-9">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo $customer['0']['customer_dob'] ?>"  size="16" name="customer_dob"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                   <div style="color:#DF0D8A" id="gender-error"> <?php echo form_error('customer_dob'); ?></div>
        
                    </div>
                       </div>


                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="gender"> Customers' Email</label>
                    <div class="col-sm-5">
                        <input type="email" placeholder="Customers' Email" id="customer_email" value="<?php  echo $customer['0']['customer_email'];?>"
                      name="customer_email"  required="true" class="form-control">
                    
                      <div style="color:#DF0D8A" id="customer_email-error"> <?php echo form_error('customer_email'); ?></div>
        
                    </div>
                       </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_phone">Customers' Phone</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Customers' Phone" id="customer_phone" value="<?php  echo $customer['0']['customer_phone'];?>"
                      name="customer_phone"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_phone-error"> <?php echo form_error('customer_phone'); ?></div>
        
                    </div>
                       </div>
                  
                     
                        <div class="form-group">
                  <div class="col-sm-offset-7 col-sm-4">
                    <button class="btn btn-default">Cancel</button>
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> &nbsp; Submit </button>
                    
                  </div>
                  </div>

                  </form>
      </div>        
            
             
            
      <div class="step-pane" id="step2">
                 <form role="form" onsubmit="return editaccountdetails()"
                 class="form-horizontal" enctype ='multipart/form-data' 
                 id="accountdetails" name="accountdetails">
                <div class="form-group">
                
                <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title"> Account  Details </h4>

                </div>
                </div>
                  
                   <div class="form-group">
                
                <div id="accountdetails_message">
                      <div id="message"></div>   
             
                </div>
                </div>
                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_id">Customers' Id</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Customers' Id" id="customer_id" value="<?php  echo $customer['0']['customer_id'];?>"
                      name="customer_id"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_id-error"> <?php echo form_error('customer_id'); ?></div>
        
                    </div>
                       </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="account_type">Account Type</label>
                    <div class="col-sm-5">
                    <select class = "form-control" name="account_type" id="account_type" selected="<?php echo $customer['0']['account_type']?>">
                      <option value="Current Account">Currrent Account</option>
                      <option value="Savings Account">Savings Account</option>
                    </select>
                    <div style="color:#DF0D8A" id="account_type-error"> <?php echo form_error('account_type'); ?></div>
        
                    </div>
                       </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_deposit">Opening Deposit</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Deposit" id="deposit"
                       value="<?php  echo $customer['0']['customer_deposit'];?>"
                      name="customer_deposit"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_deposit-error"> 
                             <?php echo form_error('customer_deposit'); ?></div>
        
                    </div>
                       </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_occupation">Occupation</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Occupation" id="occupation"
                       value="<?php  echo $customer['0']['customer_occupation'];?>"
                      name="customer_occupation"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_occupation-error"> 
                             <?php echo form_error('customer_occupation'); ?></div>
        
                    </div>
                       </div>
                     
                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="customer_income">Total income/Year</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Total Income/Year" id="customer_income" 
                      value="<?php  echo $customer['0']['customer_income'];?>"
                      name="customer_income"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="customer_phone-error">
                              <?php echo form_error('customer_income'); ?></div>
        
                    </div>
                       </div>
                      
                            

                       
                                             <div class="form-group">
                  <div class="col-sm-offset-7 col-sm-4">
                    <button class="btn btn-default">Cancel</button>
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> &nbsp; Submit </button>
                    
                  </div>
                  </div>
                  </form> 
     </div>
             
            
    
           
          </div>
        </div>

<script src="<?php echo base_url("/assets/js/jquery.js")?>"></script>
       <script type="text/javascript">
      
    
    function editcustomerdetails(){
      var form = document.getElementById('customer_details');
      var myfd = new FormData(form);

      $.ajax({
      
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/editcustomerdetails/")?>',
      data:myfd,
      processData: false,
      contentType:false,
      
       success:
        function(data){
          if (data == '1'){
             $('#customer_message').attr("class" ,"alert alert-success alert-white rounded");
             $('#customer_message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#customer_message').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#customer_message').append("<strong>Success!</strong> Changes has been saved successfully!"); 

            
          }
          else{
            
             $('#customer_message').attr("class" ,"alert alert-danger alert-white rounded");
             $('#customer_message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#customer_message').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#customer_message').append("<strong style='margin-left:50px'>&nbsp;&nbsp;Error!</strong> saving changes"); 

   

          }
        },
      fail:
        function(data){
          console.log(data);
        }

    });
    
    return false;

    }
       
            function editaccountdetails(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/accountdetails")?>',
      data:$('#accountdetails').serialize(),
      success:
        function(data){
          if (data == '1'){
             $('#accountdetails_message').attr("class" ,"alert alert-success alert-white rounded");
             $('#accountdetails_message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#accountdetails_message').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#accountdetails_message').append("<strong>Success!</strong>Changes has been saved successfully!"); 

            
          }
          else{
            
             $('#accountdetails_message').attr("class" ,"alert alert-danger alert-white rounded");
             $('#accountdetails_message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#accountdetails_message').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#accountdetails_message').append("<strong style='margin-left:50px'>&nbsp;&nbsp;Error!</strong> submitting Application"); 

   

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