
<body>


	<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" data-position="right" >
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo $profile['0']['user_avatar'] ?>"  height="150px"alt="" /></div>
              <div class="info">
                <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo "Supervisor :".$profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png')?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
            <ul class="cl-vnavigation">
               <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                  <li ><a href="<?php echo base_url('index.php/supervisor') ?>">My Profile</a></li>
                </ul>
              </li>
        
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Requests</span></a>
                <ul class="sub-menu">
                  <li ><a href="<?php echo base_url('index.php/supervisor/newinternrequest') ?>">Request Interns</a></li>
                   <li><a href="<?php echo base_url('index.php/supervisor/newfellowrequest') ?>">Request Fellows</a></li>
               
                  <li class="active"><a href="<?php echo base_url('index.php/supervisor/requeststatus') ?>">View Progress</a></li>
                  </ul>
              </li>
                    <li><a href="#"><i class="fa fa-user"></i><span>Students</span></a>
                <ul class="sub-menu">
                  <li><a href="ui-elements.html">Interns</a></li>
                  <li><a href="ui-buttons.html">Fellows</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Reports</span></a>
                <ul class="sub-menu">
                  <li><a href="tables-general.html">Interns</a></li>
                  <li><a href="tables-datatables.html">Fellows</a></li>
                </ul>
              </li>              
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
        <div class="col-sm-12">
             <?php if(strlen($success['0'])>0){
                ?>

               <div class="alert alert-success alert-white rounded">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                
                <strong style="margin-left:50px"> &nbsp;&nbsp;Success!</strong>Your intern request has been sent to the CDU for processing!
               </div>

               <?php
                }
                ?>
                <div class="block-flat">
            <div class="header">              
              <h3>Your Interns Requests</h3>
            </div>
            <div class="content">
              <div class="list-group">
                <a href="#" class="list-group-item ">
                <h5 class="list-group-item-heading">John Doe</h5>
                <div><i class="fa fa-mobile-phone"></i> 457 760 3244</div>
                <div><i class="fa fa-envelope"></i> johndoe@emailserver.com</div>
                </a>
                <a href="#" class="list-group-item">
                <h5 class="list-group-item-heading">Mark Anonymous Person</h5>
                <div><i class="fa fa-mobile-phone"></i> 547 457 7484</div>
                <div><i class="fa fa-envelope"></i> markanonymous@emailserver.com</div>
                </a>
                <a href="#" class="list-group-item">
                <h5 class="list-group-item-heading">Jessica Smith Norway</h5>
                <div><i class="fa fa-mobile-phone"></i> 595 541 9578</div>
                <div><i class="fa fa-envelope"></i> jessysmith@emailserver.com</div>
                </a>
              </div>            
            </div>
          </div>
              <div class="block-flat">
            <div class="header">              
              <h3>Your Fellows Requests</h3>
            </div>
            <div class="content">
              <div class="list-group">
                <a href="#" class="list-group-item ">
                <h5 class="list-group-item-heading">John Doe</h5>
                <div><i class="fa fa-mobile-phone"></i> 457 760 3244</div>
                <div><i class="fa fa-envelope"></i> johndoe@emailserver.com</div>
                </a>
                <a href="#" class="list-group-item">
                <h5 class="list-group-item-heading">Mark Anonymous Person</h5>
                <div><i class="fa fa-mobile-phone"></i> 547 457 7484</div>
                <div><i class="fa fa-envelope"></i> markanonymous@emailserver.com</div>
                </a>
                <a href="#" class="list-group-item">
                <h5 class="list-group-item-heading">Jessica Smith Norway</h5>
                <div><i class="fa fa-mobile-phone"></i> 595 541 9578</div>
                <div><i class="fa fa-envelope"></i> jessysmith@emailserver.com</div>
                </a>
              </div>            
            </div>
          </div>

      </div>

  </div>
  </div>
  	
  </div> 
  	
  </div>
  
  </body>

</html>