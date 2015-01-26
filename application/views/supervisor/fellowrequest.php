
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
                  <li><a href="<?php echo base_url('index.php/supervisor/newinternrequest') ?>">Request Interns</a></li>
                   <li  class="active"><a href="<?php echo base_url('index.php/supervisor/newfellowrequest') ?>">Request Fellows</a></li>
               
                  <li><a href="<?php echo base_url('index.php/supervisor/requeststatus') ?>">View Progress</a></li>
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
          
          <div class="tab-container">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#intern">Request Fellow(s)</a></li>
                      </ul>
            <div class="tab-content">
              <div id="intern" class="tab-pane active cont">
            <h3 class="widget-title">Request New Fellow(s)</h3>
                <div class="row friends-list">



                            <form role="form" style="color:#000;" class="form-horizontal" <?php echo form_open('supervisor/newfellowrequest'); ?>
             
                  <div class="form-group spacer2">
                    <div class="col-sm-3"></div>
                    </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="skills">Skills,Qualifications & Experience of the Desired Fellow</label>
                    <div class="col-sm-9">
                      <textarea type="text" required ="true" value="<?php echo set_value('skills'); ?>" name="skills" id="skills" class="form-control">

                      </textarea>
                      <div style="color:#DF0D8A" id="skills-error"> <?php echo form_error('skills'); ?></div>
        
                    </div>
                     
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="number">Number of Fellow(s) Required</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="number of fellows" value="<?php echo set_value('number'); ?>" id="number" name="number" class="form-control">
                          <div style="color:#DF0D8A"  id="number-error"> <?php echo form_error('number'); ?></div>
             
                    </div>
                   </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="education">Level of Education</label>
                    <div class="col-sm-9">
                  
                     <select name="education" value="<?php echo set_value('education'); ?>" class="form-control">
                    
                    <option value="Diploma">Diploma</option>
                    <option value="Undergraduate"> Undergraduate</option>
                    <option value="MSC">MSC</option>
                    <option value="PHD">PHD</option>
                    </select>                 
                   <div  style="color:#DF0D8A" id="education-error"> <?php echo form_error('education'); ?></div>
                 
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="summary">Summary of the Project where fellowship will be undertaken </label>
                    <div class="col-sm-9">
                      <textarea type="text"  value="<?php echo set_value('summary'); ?>" name="summary" id="summary" class="form-control">

                      </textarea>
                  <div style="color:#DF0D8A" id="summary-error"> <?php echo form_error('summary'); ?></div>
                 
                    </div>
                  </div>
                     <!--
                       <div class="form-group">
                    <label class="col-sm-3 control-label" for="summary">Suggested fellows</label>
                    <div class="col-sm-9">
                      <textarea type="text" placeholder="summary" name="summary" id="summary" class="form-control">

                      </textarea>
                    </div>
                
                  </div>
                    -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="purpose">Research Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="purpose" value="<?php echo set_value('purpose'); ?>" id="purpose" class="form-control"/>

                  
                    <div style="color:#DF0D8A" id="purpose-error"> <?php echo form_error('purpose'); ?></div>
                
                    </div>
                   
                  </div>
                        <div class="form-group">
                    <label class="col-sm-3 control-label" for="sd_unit">SD/Unit</label>
                    <div class="col-sm-9">
                      
                           <select name="sd_unit"  selected="<?php echo set_value('sd_unit'); ?>" class="form-control">
                    <option>Select One</option>
                   
                    <option value="Communication">Communication</option>
                    <option value="Undergraduate"> Undergraduate</option>
                    <option value="MSC">MSC</option>
                    <option value="PHD">PHD</option>
                    </select> 
                      <div style="color:#DF0D8A"  id="sd_unit-error"> <?php echo form_error('sd-unit'); ?></div>
                  
                    </div>
                  
                  </div>
                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="budgetholder">Budget Holder</label>
                    <div class="col-sm-9">
                      <input type="text"   value="<?php echo set_value('budgetholder'); ?>"  placeholder="Name of the Budget Holder" id="budgetholder" name="budgetholder" class="form-control">
                        <div  style="color:#DF0D8A"  id="budgetholder-error"> <?php echo form_error('budgetholder'); ?></div>
        
                    </div>
             
                  </div>
                        <div class="form-group">
                    <label class="col-sm-3 control-label"   value="<?php echo set_value('budgetholderemail'); ?>"  for="budgetholderemail">Budget Holder Email </label>
                    <div class="col-sm-9">
                      <input type="email" placeholder="Email" id="budgetholderemail" name="budgetholderemail" class="form-control">
                  <div style="color:#DF0D8A"  id="budgetholderemail-error"> <?php echo form_error('budgetholderemail'); ?></div>
         
                    </div>
                       
                  </div>
                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="CostCentre">Charge Code</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="Cost Centre"  value="<?php echo set_value('costcenter'); ?>"  id="costcenter"  name="costcenter" class="form-control">
                      
                       <div  style="color:#DF0D8A"  id="costcenter-error"> <?php echo form_error('costcenter'); ?></div>
             
                    </div>
                     
                  </div>
                         <div class="form-group">
                    <label class="col-sm-3 control-label" for="provisions">Provisions</label>
                    <div class="col-sm-9">
                       <div class="radio"> 
                    <label> <input type="checkbox" checked=""  value="<?php echo set_value('provisions'); ?>"  name="provisions" class="icheck"> Student ID</label> 
                  </div>
                
                  <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck"> Office space</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck"> Email connectivity</label> 
                  </div>
                    <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">  Computer</label> 
                  </div>
                    <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">  Research/field costs</label> 
                  </div>
                      <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">   Medical insurance</label> 
                  </div>
                         <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">    Personal Accident cover</label> 
                  </div>
                             <div class="radio"> 
                    <label> <input type="checkbox" name="provisions" class="icheck">    Other Specify</label> 
                  </div>
                          <div  style="color:#DF0D8A"  id="provisions-error"> <?php echo form_error('provisions'); ?></div>
             
                    </div>
                  </div>
             
                            <div class="form-group">
                    <label class="col-sm-3 control-label" for="CostCentre">Region</label>
                    <div class="col-sm-9">

                           <select name="region"  value="<?php echo set_value('region'); ?>"  class="form-control">
                  
                      
                    <option value="Diploma">South East Asia</option>
                    <option value="Undergraduate"> Undergraduate</option>
                    <option value="MSC">MSC</option>
                    <option value="PHD">PHD</option>
                    </select>      
                  <div   style="color:#DF0D8A"  id="region-error"> <?php echo form_error('region'); ?></div>
             
                    </div>
             
                  </div>
                            <div class="form-group">
                    <label class="col-sm-3 control-label" for="CostCentre">Country</label>
                    <div class="col-sm-9">
                            <select name="country"   value="<?php echo set_value('country'); ?>"  class="form-control">
                  
                        <option value="Diploma">South East Asia</option>
                    <option value="Undergraduate"> Undergraduate</option>
                    <option value="MSC">MSC</option>
                    <option value="PHD">PHD</option>
                    </select>      
                 <div  style="color:#DF0D8A"  id="country-error"> <?php echo form_error('country'); ?></div>
                  
                    </div>
               
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tors">Terms of Reference </label>
                    <div class="col-sm-9">
                      <textarea type="text"  value="<?php echo set_value('tors'); ?>"   name="tors" id="tors" class="form-control">

                      </textarea>
                          <div  style="color:#DF0D8A"  id="tors-error"> <?php echo form_error('tors'); ?></div>
            
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="expected">Expected Output </label>
                    <div class="col-sm-9">
                      <textarea type="text"  value="<?php echo set_value('expected'); ?>"  name="expected" id="expected" class="form-control">

                      </textarea>
                    <div  style="color:#DF0D8A"  id="expected-error"> <?php echo form_error('expected'); ?></div>
        
                    </div>
             
                  </div>
              
                     <div class="form-group">
                <label class="col-sm-3 control-label"> Start Date </label>
                <div class="col-sm-6">
                  <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo set_value('startdate'); ?>"  size="16" name="startdate"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>          
                <div  style="color:#DF0D8A"  id="startdate-error"> <?php echo form_error('startdate'); ?></div>
        
                </div>
             
              </div>
     
                                <div class="form-group">
                <label class="col-sm-3 control-label"> End Date </label>
                <div class="col-sm-6">
                  <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"  value="<?php echo set_value('enddate'); ?>"  size="16" name="enddate"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>          
                <div  style="color:#DF0D8A"  id="enddate-error"> <?php echo form_error('enddate'); ?></div>
        
                </div>
             
              </div>
                     

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                  </div>
              </form>
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