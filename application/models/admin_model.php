<?php
class admin_model extends CI_Model {
    private $username;
    private $request_id;
    private $customer_id;


 
 public function __construct(){
    $this->load->database();     }

 
  public function get_admin($username){
    $query = $this->db->query("select * from user where user.username = '".$username."'");
    return $query->result_array();}

  public function get_customers(){
    $query = $this->db->query("select * from account,customer where account.customer_id = customer.customer_id");
    return $query->result_array();}
 

public function get_customer($customer_id){
    $query = $this->db->query("select * from account,customer where account.customer_id = customer.customer_id and customer.customer_id = ".$customer_id);
    return $query->result_array();}
  
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

public function logindetails() {
        $username = $this->input->post("username");
        $query = $this->db->query("select * from user where username = '".$username ."'");
                foreach ($query->result() as $row)
            {
            return $row->password;
            }
    }
    function editdetails(){
        $this->load->library('session');
        $user =$this->session->userdata('username');
            $username = $this->input->post("username");
            $email = $this->input->post("email");
           
     $sql = "UPDATE user SET user.username = ". $this->db->escape($username) . ",
   useremail = " . $this->db->escape($email)  . " where user.username = '".$user ."'";
     $this->db->query($sql);

    }   
  
    public function addaccountdetails() {

      $this->load->library('session');
      $this->load->helper('url');
      
      $customer_id = $this->input->post("customer_id");
      $occupation = $this->input->post("customer_occupation");
      $total_income = $this->input->post("customer_income");
      $deposit = $this->input->post("customer_deposit");
      $account = $this->input->post("account_type");
      
    $this->db->query("INSERT INTO account (customer_id ,occupation , account_type , income , deposit ) VALUES ('".$customer_id."','".$occupation.
      "','".$account."','".$total_income."','".$deposit."')");

    }

    

    public function editcustomerdetails(){

        $this->load->library('session');
        $this->load->helper('url');
        $application_status ="pending";
        $username = $this->session->userdata('username');
        
        $user_id =$this->get_userid($this->session->userdata('username'));

        $customer_name = $this->input->post("customer_name");
        $customer_gender = $this->input->post("customer_gender");
        $customer_dob = $this->input->post("customer_dob");
        $customer_email = $this->input->post("customer_email");
        $customer_phone = $this->input->post("customer_phone");
        
        $sql = "UPDATE customer_details set customer_name ='$customer_name',
        customer_gender ='$customer_gender' ,customer_dob ='$customer_dob',
        customer_email='$customer_email',customer_phone='$customer_phone' WHERE customer_id =".$customer_id."";

          $this->db->query($sql);
    
      }
      
      

    public function addcustomerdetails(){

        $this->load->library('session');
        $this->load->helper('url');
     
        $customer_id = $this->input->post("customer_id");
        $customer_name = $this->input->post("customer_name");
        $customer_gender = $this->input->post("customer_gender");
        $customer_dob = $this->input->post("customer_dob");
        $customer_email = $this->input->post("customer_email");
        $customer_phone = $this->input->post("customer_phone");
        
         $this->db->query("INSERT INTO customer (customer_name , customer_gender , customer_dob ,customer_email ,customer_phone , customer_id) VALUES ('".$customer_name."','"
          .$customer_gender."','".$customer_dob."','".$customer_email."','".$customer_phone."','".$customer_id."')");
  
            
     }      






}
