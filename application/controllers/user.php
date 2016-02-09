<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
private $username;

    public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    
    }

  public function index()
  {
       
      $this->load->library('session');
    if($this->session->userdata('logged_in') == "TRUE") {
      $this->dashboard();
 
    }
    else{
      $data['success']=("") ;
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username ', 'required'); 
      $this->form_validation->set_rules('password', 'Password  ', 'required'); 
                      

    if ($this->form_validation->run() == FALSE){
 
       $this->load->view('includes/header');
       $this->load->view('login',$data);
       $this->load->view('includes/footer');   
     
    }
    else {
       $passw = $this->users_model->logindetails();
       $usertype = $this->users_model-> usertype();
       if(md5($this->input->post("password")) == $passw['0']['password']){
          $this->load->library('session');
          $newdata = array(
                'username'  => $this->input->post("username"),
                'logged_in' => TRUE,
                'usertype' => $usertype
               );

        $this->session->set_userdata($newdata);
        $users = $this->session->all_userdata();
        $this->dashboard();
        }

    else{
       $data['success']= ("Login Failed !") ;
       $this->load->view('includes/header');
       $this->load->view('login' ,$data);
     $this->load->view('includes/footer');   
      }
        
      }
    }   
  }

  public function resetpassword(){
       
      $this->load->library('session');

      $data['success']=("") ;
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username ', 'required'); 
                      

    if ($this->form_validation->run() == FALSE){
 
       $this->load->view('includes/header');
       $this->load->view('reset',$data);
       $this->load->view('includes/footer');   
     
    }
    else {
       $user = $this->users_model->logindetails();
         if(($this->input->post("username")) == $user['0']['username']){
          $this->load->library('session');
            if(($this->resetmail($user['0']['username']))==1){

                $data['success']= ("A password reset email has been send to your email address!") ;
                 $this->users_model->resetpassword();
                 $this->load->view('includes/header');
                 $this->load->view('reset' ,$data);
                 $this->load->view('includes/footer');   
             
            }
            else{
              $data['success']= ("Failed to send emails!") ;
               $this->load->view('includes/header');
               $this->load->view('reset' ,$data);
               $this->load->view('includes/footer');   
           
            }
        }

    else{
       $data['success']= ("Username is none existent !") ;
       $this->load->view('includes/header');
       $this->load->view('reset' ,$data);
       $this->load->view('includes/footer');   
      }
        
      }
    } 


  //emails
  public function initializemail(){
    $this->load->library('email');
    $config['protocol'] = "smtp"; 
    $config['smtp_host'] = "ssl://smtp.googlemail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "icrafcdu@gmail.com"; 
    $config['smtp_pass'] = "icraf@cdu";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";

    $this->email->initialize($config);
  } 

  public function resetmail($user){
     $this->initializemail();
     $email = $this->users_model->get_useremail($user);
     $this->load->helper('url');
     $this->load->library('email');
     $this->email->from('icrafcdu@gmail.com', 'Narok County Bursary Allocation');
     $this->email->to($email['0']['useremail']); 
     $this->email->subject('Password Reset');
     $this->email->message('Your User password has been reset, Please login with your username and "password" as the new password' ); 
     if($this->email->send()){
      return 1;
    }
    else{
      $this->email->print_debugger();
      return 0;
    }
     
  }

   function dashboard(){
    $this->load->library('session');
    
    $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      header('Location:'.base_url('index.php/admin'));
   }

    public function logout(){
      $this->load->library('session');
        $newdata = array(
        'logged_in' => FALSE);

        $this->session->set_userdata($newdata);
      
      $this->index();
      
    }


  public function register()
  {
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password  ', 'required'); 
      $this->form_validation->set_rules('cpassword', 'C Password  ', 'required'); 
                            

    if ($this->form_validation->run() == FALSE){
     $data['success']=("") ;
 
    $this->load->view('includes/header');
    $this->load->view('register' , $data);
    $this->load->view('includes/footer');
  
    }
    else {
      if(set_value('password') === set_value('cpassword')){

          $data['success']= ("Registration success") ;
     $this->users_model->registeruser();
     $this->load->view('includes/header');
     $this->load->view('login' ,$data);
     $this->load->view('includes/footer');
    
      }
      else{

        $data['success'] =('Password and Confirmation password do not match ');

          $this->load->view('includes/header');
          $this->load->view('register' , $data);
          $this->load->view('includes/footer');
      

      }
      
    }
  
}

  
  public function changepassword()
  {
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password  ', 'required'); 
      $this->form_validation->set_rules('cpassword', 'C Password  ', 'required'); 
                            

    if ($this->form_validation->run() == FALSE){
     $data['success']=("") ;
 
          echo "3";  
    }
    else {
      if(set_value('password') === set_value('cpassword')){

           $this->users_model->changepassword();
              echo "1";          
      }
      else{
            
            echo "0";      

      }
      
    }
  
}

}

