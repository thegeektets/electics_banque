<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 	  private $request_id;

    public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    
    $this->load->model('admin_model');
    
    }

    

//function loads the user page on admin dashboard

	public function index()
	{
	
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/index' , $data);
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

  
   function customer_reports(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['customers'] = $this->admin_model->get_customers();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/customer_report' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
  
   


 function editadmin(){
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
                    
                       

    if ($this->form_validation->run() == FALSE){
        echo "0";
    }
    else {
     $this->load->library('session');
     $this->admin_model->editdetails();
     echo "1" ;
    }
}



      function customer_details($customer_id){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['customer'] = $this->admin_model->get_customer($customer_id);
     
        $this->load->view('includes/header');
            $this->load->view('includes/menu' , $data);
            $this->load->view('admin/customer_details',$data);
            $this->load->view('includes/footer');
             $this->load->view('includes/datatables');
            $this->load->view('includes/wizard');
   }

  
        function editcustomerdetails(){
            $this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('customer_id', "customers' Id", 'required'); 
         
            $this->form_validation->set_rules('customer_name', "customers' Name", 'required'); 
            $this->form_validation->set_rules('customer_gender', "customers' Gender", 'required'); 
            $this->form_validation->set_rules('customer_dob', "customers' DOB", 'required'); 
            $this->form_validation->set_rules('customer_email', "customers' Email", 'required|valid_email'); 
            $this->form_validation->set_rules('customer_phone', "customers' Phone", 'required'); 
          

             if ($this->form_validation->run() == FALSE){

                  echo 0 ;
                  }
              
              else {

                 $this->admin_model->addcustomerdetails();
                 echo 1;
                }
         }

          function accounts_opening(){
          
           $this->load->library('session');
           $this->load->helper(array('form', 'url'));

          if($this->session->userdata('logged_in') == "TRUE") {
           
            $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
            
           
            $data['success']= ("") ;
         
            $this->load->view('includes/header');
            $this->load->view('includes/menu' , $data);
            $this->load->view('admin/accounts_opening',$data);
            $this->load->view('includes/footer');
             $this->load->view('includes/datatables');
            $this->load->view('includes/wizard');
            
          
          }
          else{

              $data['success']=("Login Required") ;
              $this->load->helper(array('form', 'url'));
              $this->load->library('form_validation');
              $this->form_validation->set_rules('username', 'Username ', 'required'); 
              $this->form_validation->set_rules('password', 'Password  ', 'required'); 
                              

         
               $this->load->view('includes/header');
               $this->load->view('login',$data);
               $this->load->view('includes/footer');   
             
            }
                
          

          }


            function accountdetails(){

               $this->load->library('session');
               $this->load->helper(array('form', 'url'));
               $this->load->library('form_validation');

               $this->form_validation->set_rules('customer_occupation', "Occupation", 'required'); 
               $this->form_validation->set_rules('customer_income', "Total Income", 'required'); 
               $this->form_validation->set_rules('customer_deposit', "Deposit", 'required'); 
               $this->form_validation->set_rules('account_type', "Account Type", 'required'); 


               if ($this->form_validation->run() == FALSE){

                        echo "0"  ;
              
                }
              else {
               $this->admin_model->addaccountdetails();
               echo "1" ;
              }           

            }


}
