
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
               <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo  "Student : ". $profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png');?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
            <ul class="cl-vnavigation">
             <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                  <li ><a href="<?php echo base_url("index.php/student");?>">My Profile</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-smile-o"></i><span>Applications</span></a>
                <ul class="sub-menu">
                  <li><a href="ui-elements.html">Edit</a></li>
                 </ul>
              </li>
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Vacancies</span></a>
                <ul class="sub-menu">
                  <li class="active"><a href="<?php base_url('index.php/student/internshipvacancies')?>">Internship Vacancies</a></li>
                  <li><a href="<?php base_url('index.php/student/fellowshipvacancies')?>">Fellowship Vacancies</a></li>
                  </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Projects</span></a>
                <ul class="sub-menu">
                  <li><a href="tables-general.html">Add</a></li>
                  <li><a href="tables-datatables.html">Edit</a></li>
                </ul>internship
              </li>              

                   <li><a href="#"><i class="fa fa-file"></i><span>Reports</span></a>
                <ul class="sub-menu">
                  <li><a href="pages-blank.html">Projects</a></li>
                  <li><a href="pages-blank-header.html">Attachment</a></li>
                  </ul>
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
              <h3 style="font-weight:300;color:#7C3886">INTERNSHIP VACANCIES </h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable-icons" >
                  <thead>
                    <tr style="background:#70871B;color:#fff;">
                      <th>Request User</th>
                      <th>Request Email</th>
                      <th>Bugdet Holder</th>
                      <th>Bugdet Holder Email</th>
                      <th>SD/Unit</th>
                      <th>Cost Center</th>
                      <th>Internship Purpose</th>
                      <th>Number of Interns</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Request Date</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  for ($i=0;$i<count($request);$i++){
                   ?>
                                      <tr class="gradeX">
                      <td><?php echo $request[$i]['username']  ;?></td>
                      <td><?php echo $request[$i]['useremail'] ;?></td>
                      <td><?php echo $request[$i]['budget_holder'] ;?></td>
                      <td><?php echo $request[$i]['email_budget_holder'] ;?></td>
                      <td><?php echo $request[$i]['sd_unit'] ;?></td>
                      <td><?php echo $request[$i]['cost_center'] ;?></td>
                      <td><?php echo $request[$i]['researchtitle_purposeinternship'] ;?></td>
                      <td><?php echo $request[$i]['number_students'] ;?></td>
                      <td><?php echo $request[$i]['start_date'] ;?></td>
                      <td><?php echo $request[$i]['end_date'] ;?></td>
                      <td><?php echo $request[$i]['request_date'] ;?></td>
                      <td class="center"></td>
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
              </div>
                </body>

</html>