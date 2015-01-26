
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
                  <li><a href="<?php echo base_url("index.php/student");?>">My Profile</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-smile-o"></i><span>Applications</span></a>
                <ul class="sub-menu">
                  <li><a href="ui-elements.html">Edit</a></li>
                 </ul>
              </li>
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Vacancies</span></a>
                     <ul class="sub-menu">
                           <li ><a href="<?php echo base_url('index.php/student/internshipvacancies')?>">Internship Vacancies</a></li>
                  <li class="active"><a href="<?php echo base_url('index.php/student/fellowshipvacancies')?>">Fellowship Vacancies</a></li>
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
    <div class="page-head">
      <h2>Apply Fellowship</h2>
     
    </div>
    <div class="cl-mcont">    
    <div class="row wizard-row">
      <div class="col-md-12 fuelux">
        <div class="block-wizard">
          <div id="wizard1" class="wizard wizard-ux">
            <ul class="steps">
              <li data-target="#step1" class="active">Step 1<span class="chevron"></span></li>
              <li data-target="#step2">Step 2<span class="chevron"></span></li>
              <li data-target="#step3">Step 3<span class="chevron"></span></li>
              <li data-target="#step4">Step 4<span class="chevron"></span></li>
              <li data-target="#step5">Step 5<span class="chevron"></span></li>
    
            </ul>
            <div class="actions">
              <button type="button" class="btn btn-xs btn-prev btn-default"> <i class="icon-arrow-left"></i>Prev</button>
              <button type="button" class="btn btn-xs btn-next btn-default" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
            </div>
          </div>
          <div class="step-content">
            <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate> 
              <div class="step-pane active" id="step1">
                                
          <form role="form" class="form-horizontal" enctype ='multipart/form-data' <?php echo form_open('student/editstudentdetails/'.$this->session->userdata('username'); ?>

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
                      <input type="text" placeholder="Applicants' Next of Kin " id="student_nextofkin" value="<?php  echo $student['0']['student_nextofkin']; ?>"
                      name="student_nextofkin"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="student_nextofkin-error"> <?php echo form_error('student_nextofkin'); ?></div>
        
                    </div>
                       </div>
                       <div class="form-group">
                    <label class="col-sm-3 control-label" for="student_nextofkincontact">Next of Kin Contacts</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Next of Kin Contacts" id="student_nextofkincontact"  value="<?php  echo $student['0']['student_nextofkincontact']; ?>"
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
                  <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default">Cancel</button>
                    <button class="btn btn-primary" type="submit">Submit &nbsp;<i class="fa fa-caret-right"></i></button>
                  </div>

                  </form>
                </div>        
              </div>
              <div class="step-pane" id="step2">
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
                    <label class="col-sm-3 control-label" for="student_fieldofstudy">Proposed Research Title</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Proposed Research Title" id="research_title"  value="<?php  echo set_value('research_title'); ?>"
                      name="research_title"  required="true" class="form-control">
                             <div style="color:#DF0D8A" id="research_title-error"> <?php echo form_error('research_title'); ?></div>
        
                    </div>
                       </div>
                                                          <div class="form-group">
                    <label class="col-sm-3 control-label" for="sponsor">Sponsor</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Sponsor" id="sponsor"  value="<?php  echo set_value('sponsor'); ?>"
                      name="sponsor"   class="form-control">
                             <div style="color:#DF0D8A" id="sponsor-error"> <?php echo form_error('sponsor'); ?></div>
        
                    </div>
                       </div>
                                                                             <div class="form-group">
                    <label class="col-sm-3 control-label" for="sponsor">Sponsor Contact</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Sponsor Contact" id="sponsor_contact"  value="<?php  echo set_value('sponsor_contact'); ?>"
                      name="sponsor"  class="form-control">
                             <div style="color:#DF0D8A" id="sponsor_contact-error"> <?php echo form_error('sponsor_contact'); ?></div>
        
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
                <label class="col-sm-3 control-label">Fellowship Requirements</label>
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
                    <label class="col-sm-3 control-label" for="relevantinformation">Any Other Relavant Information</label>
                    <div class="col-sm-5">
                      <textarea  name ="relevantinformation" id="relevantinformation" class="form-control">
                      <?php echo set_value('relevantinformation'); ?>
                        
                      </textarea> 
                           <div style="color:#DF0D8A" id="relevantinformation-error"> <?php echo form_error('relevantinformation'); ?></div>
            
                    </div>
                   
                  </div>
                  
                                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default">Cancel</button>
                    <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>     
    


              </div>
              <div class="step-pane" id="step3">
                          <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title">Applicants' Cover Letter </h4>

                </div>
              
                                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="applicant_coverletter">Applicants' Cover Letter</label>
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
                  <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default">Cancel</button>
                    <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>     
              </div>
              <div class="step-pane" id="step4">
                                                              <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title">Applicants' Curriculum Vitae</h4>

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
                  <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default">Cancel</button>
                    <button data-wizard="#wizard1" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>     
              </div>
            
             <div class="step-pane" id="step5">
                                         <div class="col-sm-10">
                    
                <h4  style="margin-left:50px;color:#7c3886;"class="widget-title">Applicants' Introduction Letter </h4>

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
                  <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default">Cancel</button>
                    <button  style="padding-left:20px;"data-wizard="#wizard1" class="btn btn-primary wizard-next">Finish <i class="fa fa-file"></i></button>
                  </div>
                </div>     
             </div>
           
          </div>
        </div>

  

                </body>

</html>