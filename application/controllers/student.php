<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
 	
  private $vacancyid;

    public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('admin_model');
   
    $this->load->model('student_model');
    
    }

	public function index()
	{
	
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['student'] = $this->student_model->get_student($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/index' , $data);
    $this->load->view('includes/footer');
	

	}

//logs out the user and re initializes the session varibles
  function logout(){
        $this->load->library('session');
        $this->users_model->logout($this->session->userdata('username'));
        $newdata = array(
        'logged_in' => FALSE);

        $this->session->set_userdata($newdata);
        $data['success']=("") ;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'Username ', 'required'); 
        $this->form_validation->set_rules('pass', 'Password  ', 'required'); 
    
    if ($this->form_validation->run() == FALSE){
   // $this->load->view('includes/header');
    $this->load->view('login',$data);
    }else {
      $passw = $this->users_model->logindetails();
      if($this->input->post("pass") == $passw){
        $this->load->library('session');
        $newdata = array(
                   'username'  => $this->input->post("user"),
                   'logged_in' => TRUE );

       $this->session->set_userdata($newdata);
       $users = $this->session->all_userdata();
       $this->users_model->login($this->input->post("user") );
       $this->dashboard();
      }

      else{
     $data['success']= ("Login Failed !") ;
   //  $this->load->view('includes/header');
     $this->load->view('login' ,$data);
   
      }
        
    }
      
     
      }

  //allows you to edit the details of a user
 function editstudent(){
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Fullname ', 'required'); 
            $this->form_validation->set_rules('username', 'username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
            $this->form_validation->set_rules('gender', 'Gender  ', 'required'); 
            $this->form_validation->set_rules('about', 'about ', 'required'); 
            $this->form_validation->set_rules('phone_number', 'phone_number ', 'required|number'); 
            $this->form_validation->set_rules('institution', 'Institution  ', 'required'); 
            $this->form_validation->set_rules('country', 'Nationality', 'required'); 
            $this->form_validation->set_rules('DOB', 'Birthday  ', 'required'); 
                    
                       

    if ($this->form_validation->run() == FALSE){
        echo "0";
    }
    else {
     $this->load->library('session');
     $this->student_model->editdetails();
     echo "1" ;
    }
}


  function applyinternship($vacancyid){
  
   $this->load->library('session');
   $this->load->helper(array('form', 'url'));

  if($this->session->userdata('logged_in') == "TRUE") {
    $newdata = array(
          
                'vacancyid'  => $vacancyid
            
               );

    $this->session->set_userdata($newdata);
    $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
    $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    
      if(count($this->student_model->check_application($vacancyid))>0){

      $data['success']= ("You have already made this application edit application to change your submissions") ;
  
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_internship',$data);
    $this->load->view('includes/footer');
     }
     else
     {

     $this->load->library('form_validation');

            $this->form_validation->set_rules('student_name', "Applicants' Name", 'required'); 
            $this->form_validation->set_rules('student_gender', "Applicants' Gender", 'required'); 
            $this->form_validation->set_rules('student_dob', "Applicants' DOB", 'required'); 
            $this->form_validation->set_rules('student_email', "Applicants' Email", 'required|valid_email'); 
            $this->form_validation->set_rules('student_phone', "Applicants' Phone", 'required'); 
            $this->form_validation->set_rules('student_nationality', "Applicants' Nationality", 'required'); 
            $this->form_validation->set_rules('student_nextofkin', "Applicants' Next of Kin", 'required'); 
            $this->form_validation->set_rules('student_nextofkincontact', "Next of Kin Contacts", 'required'); 
            $this->form_validation->set_rules('student_institution', "Applicants' Institution", 'required'); 
            $this->form_validation->set_rules('student_fieldofstudy', "Applicants' Field of Study", 'required'); 
            $this->form_validation->set_rules('applicant_skills', "Applicants' Skills", 'required'); 
            $this->form_validation->set_rules('relevantinformation', "Relevant Information", 'required'); 
           

    if ($this->form_validation->run() == FALSE){

    $data['success']= ("") ;
 
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_internship',$data);
    $this->load->view('includes/footer');
    
    }
    else {
     $data['success']= ("Application has been sent to CDU for processing you will be notified on the progress") ;
     $this->student_model->apply_internship($this->session->userdata('vacancyid'));
    
  
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_internship',$data);
    $this->load->view('includes/footer');
    
    }

  }
  
  }
  else{

      $data['success']=("Login Required to Apply Internship") ;
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username ', 'required'); 
      $this->form_validation->set_rules('password', 'Password  ', 'required'); 
                      

    if ($this->form_validation->run() == FALSE){
 
       $this->load->view('includes/header');
       $this->load->view('login',$data);
       $this->load->view('includes/footer');   
     
    }
        
  }

  }

  function internshipvacancies(){
        
        $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
        $data['ivacancies'] = $this->admin_model->load_ivacancies();
        $this->load->view('includes/header');
        $this->load->view('includes/menu' ,$data);
        $this->load->view('student/internshipvacancies',$data);
        $this->load->view('includes/footer');
        $this->load->view('includes/datatables');
        

  }

  function fellowshipvacancies(){

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['fvacancies'] = $this->admin_model->load_fvacancies();
      $this->load->view('includes/header');
      $this->load->view('includes/menu' ,$data);
      $this->load->view('student/fellowshipvacancies',$data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
  }




}

