
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
                  <li class="active"><a href="form-elements.html">Internship Vacancies</a></li>
                  <li><a href="form-validation.html">Fellowship Vacancies</a></li>
                  </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Projects</span></a>
                <ul class="sub-menu">
                  <li><a href="tables-general.html">Add</a></li>
                  <li><a href="tables-datatables.html">Edit</a></li>
                </ul>
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
          <h3 class="widget-title">Apply Internship</h3>
                <div class="row">


            
          <form role="form" class="form-horizontal" enctype ='multipart/form-data' <?php echo form_open('student/applyinternship/'.$this->session->userdata('vacancyid')); ?>

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
               <div class="form-group">
                
                <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title"> Student Details </h4>

                </div>
                </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_name">Applicants' Name</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Applicants' Name" id="student_name" value="<?php  echo $student['0']['student_name'];?>"
                      name="student_name"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_name-error"> <?php echo form_error('student_name'); ?></div>
        
                    </div>
                       </div>
                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_gender">Applicants' Gender</label>
                    <div class="col-sm-5">
                    <select class = "form-control" name="student_gender" id="student_gender" selected="<?php echo $student['0']['student_gender']?>">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <div style="color:#DF0D8A" id="student_gender-error"> <?php echo form_error('student_gender'); ?></div>
        
                    </div>
                       </div>
                                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_dob"> Applicants' DOB</label>
                    <div class="col-sm-9">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo $student['0']['student_dob'] ?>"  size="16" name="student_dob"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                   <div style="color:#DF0D8A" id="gender-error"> <?php echo form_error('student_dob'); ?></div>
        
                    </div>
                       </div>


                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="gender"> Applicants' Email</label>
                    <div class="col-sm-5">
                        <input type="email" placeholder="Applicants' Email" id="student_email" value="<?php  echo $student['0']['student_email'];?>"
                      name="student_email"  required="true" class="form-control">
                    
                      <div style="color:#DF0D8A" id="student_email-error"> <?php echo form_error('student_email'); ?></div>
        
                    </div>
                       </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_name">Applicants' Phone</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Applicants' Phone" id="student_phone" value="<?php  echo $student['0']['student_phone'];?>"
                      name="student_phone"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_phone-error"> <?php echo form_error('student_phone'); ?></div>
        
                    </div>
                       </div>
                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_name">Applicants' Nationality</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Applicants' Nationality" id="student_nationality" value="<?php  echo $student['0']['student_nationality'];?>"
                      name="student_nationality"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_nationality-error"> <?php echo form_error('student_nationality'); ?></div>
        
                    </div>
                       </div>
         
                       <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_nextofkin">Applicants' Next of Kin</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Applicants' Next of Kin " id="student_nextofkin" value="<?php  echo set_value('student_nextofkin'); ?>"
                      name="student_nextofkin"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_nextofkin-error"> <?php echo form_error('student_nextofkin'); ?></div>
        
                    </div>
                       </div>
                       <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_nextofkincontact">Next of Kin Contacts</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Next of Kin Contacts" id="student_nextofkincontact"  value="<?php  echo set_value('student_nextofkincontact'); ?>"
                      name="student_nextofkincontact"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_nextofkincontact-error"> <?php echo form_error('student_nextofkincontact'); ?></div>
        
                    </div>
                       </div>
                                          <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_insitution">Applicants' Institution</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Applicants' Institution" id="student_institution" value="<?php  echo $student['0']['student_institution'];?>"
                      name="student_institution"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_institution-error"> <?php echo form_error('student_institution'); ?></div>
        
                    </div>
                       </div>

               <div class="form-group">
                
                <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title"> Application Details </h4>

                </div>
                </div>

                              <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_fieldofstudy">Applicants' Field of Study</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Applicants' Field of Study" id="student_fieldofstudy"  value="<?php  echo set_value('student_fieldofstudy'); ?>"
                      name="student_fieldofstudy"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_fieldofstudy-error"> <?php echo form_error('student_fieldofstudy'); ?></div>
        
                    </div>
                       </div>

                              <div class="form-group">
                    <label class="col-sm-3 control-label" for="applicant_skills">Applicants' Skills</label>
                    <div class="col-sm-5">
            
                      <textarea name="applicant_skills" id="applicant_skills"  class="form-control" required="true">
                        <?php  echo set_value('applicant_skills'); ?>
                      </textarea>

                             <div style="color:#DF0D8A" id="applicant_skills-error"> <?php echo form_error('applicant_skills'); ?></div>
        
                    </div>
                       </div>
                     <div class="form-group">
                <label class="col-sm-3 control-label">Internship Requirements</label>
                <div class="col-sm-6">
                  <div class="radio"> 
                    <label> <input type="checkbox" class="icheck" name="applicant_requirements"  value="Accident Cover"> Personal Accident Cover</label> 
                  </div>
                  <div class="radio"> 
                    <label> <input type="checkbox" name="applicant_requirements" class="icheck" value="Medical Insuarance"> Medical Insuarance</label> 
                  </div>
                </div>
              </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="position_enddate">Applicants' Cover Letter</label>
                    <div class="col-sm-9">
                   
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div>
                        <span class="btn btn-primary btn-file"><span class="fileinput-new">Select File</span>
                        <span class="fileinput-exists">Change</span><input type="file" name="applicant_coverletter"></span>
                      </div>
                    </div>

                <div  style="color:#DF0D8A"  id="applicant_coverletter-error"> <?php echo form_error('applicant_coverletter'); ?></div>
                    </div>
                  </div>
                       <div class="form-group">
                    <label class="col-sm-3 control-label" for="position_enddate">Applicants' Curriculum Vitae</label>
                    <div class="col-sm-9">
                   
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div>
                        <span class="btn btn-primary btn-file"><span class="fileinput-new">Select File</span>
                        <span class="fileinput-exists">Change</span><input type="file" name="applicant_curriculumvitae"></span>
                      </div>
                    </div>

                <div  style="color:#DF0D8A"  id="applicant_curriculumvitae-error"> <?php echo form_error('applicant_curriculumvitae'); ?></div>
                    </div>
                  </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label" for="introductionletter">Applicants' Introduction Letter</label>
                    <div class="col-sm-9">
                   
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div>
                        <span class="btn btn-primary btn-file"><span class="fileinput-new">Select File</span>
                        <span class="fileinput-exists">Change</span><input type="file" name="introductionletter"></span>
                      </div>
                    </div>

                <div  style="color:#DF0D8A"  id="introductionletter-error"> <?php echo form_error('introductionletter'); ?></div>
                    </div>
                  </div>
               
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="relevantinformation">Any Other Relavant Information</label>
                    <div class="col-sm-5">
                      <textarea  name ="relevantinformation" id="relevantinformation" class="form-control">
                      <?php echo set_value('relevantinformation'); ?>
                        
                      </textarea> 
                           <div style="color:#DF0D8A" id="relevantinformation-error"> <?php echo form_error('relevantinformation'); ?></div>
            
                    </div>
                   
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button class="btn btn-primary" type="submit">Apply Internship</button>
                      
                    </div>
                  </div>
         </form>
                </div>
              </div>
              </div>
                </body>

</html>