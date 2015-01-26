<?php
class student_model extends CI_Model {
    private $username;
    private $vacancyid;
 
 public function __construct(){
    $this->load->database();     }
 
   public function get_emails(){
    $query = $this->db->query("select email from user");
    return $query->result_array();
  }

  public function get_email(){
    $user = $this->input->post("user"); 
    $query = $this->db->query("select email from user where username = '".$user."'");
    return $query->result_array();
  }

    public function get_student($username){
    $query = $this->db->query("select * from student_details,user where user.userid = 
   student_details.user_id and user.username = '".$username."'");
    return $query->result_array();}

    public function get_userid($username){
    $query = $this->db->query("select userid from user where user.username = '".$username."'");
     $query->result();
        foreach ($query->result() as $row)
        {
            return $row->userid;
        }
    }

     public function check_student($username){
      $userid =$this->get_userid($username);


    $query = $this->db->query("select user_id from student_details where user_id = '".$userid['0']."'");
    $query->result();

        if($query->result() != null){

          foreach ($query->result() as $row)
        {
            return $row->user_id;
        }  
        
        }
        else{
          return null;
        }
        
    }
   public function check_application($vacancyid){
        $this->load->library('session');
   
        $user_id =$this->get_userid($this->session->userdata('username'));
    

    $query = $this->db->query("select * from internship_application where user_id = '".$user_id."' and vacancy_id = '".$vacancyid."'");
    $query->result();

        if($query->result() != null){

          foreach ($query->result() as $row)
        {
            return $row->user_id;
        }  
        
        }
        else{
          return null;
        }
   }
      public function check_fapplication($vacancyid){
        $this->load->library('session');
   
        $user_id =$this->get_userid($this->session->userdata('username'));
    

    $query = $this->db->query("select * from fellowship_application where user_id = '".$user_id."' and vacancy_id = '".$vacancyid."'");
    $query->result();

        if($query->result() != null){

          foreach ($query->result() as $row)
        {
            return $row->user_id;
        }  
        
        }
        else{
          return null;
        }
   }
   public function apply_internship($vacancyid) {
      $this->load->library('session');
    
        $application_status ="pending";
        $user_id =$this->get_userid($this->session->userdata('username'));
        $student_name = $this->input->post("student_name");
        $student_gender = $this->input->post("student_gender");
        $student_dob = $this->input->post("student_dob");
        $student_email = $this->input->post("student_email");
        $student_phone = $this->input->post("student_phone");
        $student_nationality = $this->input->post("student_nationality");
        $student_nextofkin = $this->input->post("student_nextofkin");
        $student_nextofkincontact = $this->input->post("student_nextofkincontact");
        $student_institution = $this->input->post("student_institution");
        $student_fieldofstudy = $this->input->post("student_fieldofstudy");
        $applicant_skills = $this->input->post("applicant_skills");
        $applicant_coverletter = $this->input->post("applicant_coverletter");
        $applicant_curriulumvitae = $this->input->post("applicant_curriculumvitae");
        $introductionletter = $this->input->post("introductionletter");
        $relevantinformation = $this->input->post("relevantinformation");
        $internshiprequirements = $this->input->post("applicant_requirements");
        

            $sql = "UPDATE student_details set student_name ='$student_name',
            student_gender ='$student_gender' ,student_dob ='$student_dob',
            student_email='$student_email',student_phone='$student_phone',
            student_nationality='$student_nationality',student_nextofkin='$student_nextofkin',
            student_nextofkincontact='$student_nextofkincontact',student_institution='$student_institution',
            student_fieldofstudy='$student_fieldofstudy' WHERE user_id =".$user_id."";

            $this->db->query($sql);

           $sqll = "INSERT INTO internship_application (vacancy_id,applicant_skills,relevantinformation,applicant_requirements,application_status,user_id) " .
            "VALUES (" . $this->db->escape($vacancyid) . ",".$this->db->escape($applicant_skills) .",".$this->db->escape($relevantinformation).",".$this->db->escape($internshiprequirements) 
              .",".$this->db->escape($application_status).",".$this->db->escape($user_id).");";
            $this->db->query($sqll);

    }
       public function apply_fellowship($vacancyid) {
      $this->load->library('session');
      $this->load->helper('url');
   
      $upload_data = $this->upload->data(); 
 
        $application_status ="pending";
        $user_id =$this->get_userid($this->session->userdata('username'));
        $student_name = $this->input->post("student_name");
        $student_gender = $this->input->post("student_gender");
        $student_dob = $this->input->post("student_dob");
        $student_email = $this->input->post("student_email");
        $student_phone = $this->input->post("student_phone");
        $student_nationality = $this->input->post("student_nationality");
        $student_nextofkin = $this->input->post("student_nextofkin");
        $student_nextofkincontact = $this->input->post("student_nextofkincontact");
        $student_institution = $this->input->post("student_institution");
        $student_fieldofstudy = $this->input->post("student_fieldofstudy");
        $applicant_skills = $this->input->post("applicant_skills");
        $applicant_coverletter = $this->input->post("applicant_coverletter");
        $applicant_curriulumvitae = $this->input->post("applicant_curriculumvitae");
        $introductionletter = $this->input->post("introductionletter");
        $relevantinformation = $this->input->post("relevantinformation");
        $internshiprequirements = $this->input->post("applicant_requirements");
        $research_title = $this->input->post("research_title");
        $sponsor = $this->input->post("sponsor");
        $sponsor_contact = $this->input->post("sponsor_contact");

          $applicant_coverletter =   $upload_data['file_name'];
          $applicant_curriculumvitae =   $upload_data['file_name'];
          $introductionletter =   $upload_data['file_name'];

          $uapplicant_coverletter = base_url("assets/coverletter/".$applicant_coverletter); 
          $uapplicant_curriculumvitae = base_url("assets/cv/".$applicant_curriculumvitae); 
          $uintroductionletter = base_url("assets/introductionletter/".$introductionletter); 
     
    
                

            $sql = "UPDATE student_details set student_name ='$student_name',
            student_gender ='$student_gender' ,student_dob ='$student_dob',
            student_email='$student_email',student_phone='$student_phone',
            student_nationality='$student_nationality',student_nextofkin='$student_nextofkin',
            student_nextofkincontact='$student_nextofkincontact',student_institution='$student_institution',
            student_fieldofstudy='$student_fieldofstudy' WHERE user_id =".$user_id."";

            $this->db->query($sql);

           $sqll = "INSERT INTO fellowship_application (vacancy_id,applicant_skills,relevantinformation,
            applicant_requirements,application_status,user_id,research_title,sponsor,sponsor_contact,applicant_coverletter,curriculumvitae,introductionletter) " .
            "VALUES (" . $this->db->escape($vacancyid) . ",".$this->db->escape($applicant_skills) .",".$this->db->escape($relevantinformation).
              ",".$this->db->escape($internshiprequirements) 
              .",".$this->db->escape($application_status).",".$this->db->escape($user_id).",".$this->db->escape($research_title).",".$this->db->escape($sponsor).","
              .$this->db->escape($sponsor_contact).",".$this->db->escape($applicant_coverletter).",".$this->db->escape($applicant_curriculumvitae).",".$this->db->escape($introductionletter).");";
            $this->db->query($sqll);

    }


   public function changeuseravatar() {
     $upload_data = $this->upload->data(); 
      $ppic =   $upload_data['file_name'];
        $this->load->helper('url');
        $pic = base_url("assets/img/users/".$ppic); 
      
        $this->load->library('session');
        $user =$this->session->userdata('username');
        
     $sql = "UPDATE user SET user_avatar = '".$pic ."' where user.username = '".$user ."'";
    
    
        $this->db->query($sql);
      }

    public function editdetails(){
        $this->load->library('session');
        $user =$this->session->userdata('username');
            $username = $this->input->post("username");
            $fullname = $this->input->post("name");
            $sex = $this->input->post("gender");
            $email = $this->input->post("email");
            $about = $this->input->post("about");
            $country = $this->input->post("country");
            $bday = $this->input->post("DOB");
            $institution =$this->input->post("institution");
            $phone_number =$this->input->post("phone_number");
            $userid = $this->get_userid($user);
         

     $sql = "UPDATE student_details ,user SET user.username = ". $this->db->escape($username) . ",
     student_biography = " . $this->db->escape($about) . ",student_email = " . $this->db->escape($email). ",useremail = " . $this->db->escape($email) .",student_gender = " . $this->db->escape($sex) . ",
     student_nationality = " . $this->db->escape($country) . ",
     student_dob = " . $this->db->escape($bday) ." ,student_phone = " . $this->db->escape($phone_number)  . ",student_institution = " . $this->db->escape($institution) . ",
     student_name = " . $this->db->escape($fullname) .", user_id = ". $this->db->escape($userid['0']) . " where user.username ='".$user ."'";
     
     if($this->check_student($username) != null){

      $this->db->query($sql);
 
     }
     else{

         $this->db->query("INSERT INTO student_details (user_id) VALUES (".$userid['0'].")");
  
         $this->db->query($sql);
      
     }

     
    }   
    



}