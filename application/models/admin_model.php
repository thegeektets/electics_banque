<?php
class admin_model extends CI_Model {
    private $username;
    private $request_id;

 
 public function __construct(){
    $this->load->database();     }


  public function get_admin($username){
    $query = $this->db->query("select * from user where user.username = '".$username."'");
    return $query->result_array();}

  public function get_supervisors(){
    $query = $this->db->query("select * from user where user.account_type = "."'supervisor'");
    return $query->result_array();}


  public function get_pendinginternrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'intern'"."and request_status = "."'pending'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

  public function get_pendingvacancyinternrequests(){
    $query = $this->db->query("select * from vacancy,vacancy_request,user where vacancy_request.request_type = "."'intern'"."and request_status = "."'pending'"
      ."and vacancy_request.request_user =  user.userid and vacancy.request_id != vacancy_request.request_id");
    return $query->result_array();}

  public function get_processedinternrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'intern'"."and request_status = "."'processed'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

  public function get_pendingvacancyfellowrequests(){
    $query = $this->db->query("select * from vacancy,vacancy_request,user where vacancy_request.request_type = "."'fellow'"."and request_status = "."'pending'"
      ."and vacancy_request.request_user =  user.userid and vacancy.request_id != vacancy_request.request_id");
    return $query->result_array();}


  public function get_pendingfellowrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'fellow'"."and request_status = "."'pending'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

  public function get_processedfellowrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'fellow'"."and request_status = "."'processed'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}


   public function registersupervisor() {
        $username = $this->input->post("username");
        $useremail = $this->input->post("email");

    
            $sql = "INSERT INTO user (username,useremail,account_type,password) " .
            "VALUES (" . $this->db->escape($username) . ",".$this->db->escape($useremail) .",".$this->db->escape('supervisor') .",".$this->db->escape(md5("password")) .")";
            $this->db->query($sql);

    }

  public function load_supervisors(){
    

    $query = $this->db->query('select * from user where account_type = '.'"supervisor"');
    return $query->result_array();
 

  }

  public function open_vacancy($request_id) {
        $vacancy_title = $this->input->post("vacancy_title");
        $vacancy_description = $this->input->post("vacancy_description");
        $application_deadline = $this->input->post("application_deadline");
        $position_startdate = $this->input->post("position_startdate");
        $position_enddate = $this->input->post("position_enddate");
        $vacancy_status="open";
            
    
            $sql = "INSERT INTO vacancy (request_id,vacancy_title,vacancy_status,vacancy_description,application_deadline,position_startdate,position_enddate) " .
            "VALUES (" . $this->db->escape($request_id) . ",".$this->db->escape($vacancy_title) .",".$this->db->escape($vacancy_status) .","
            .$this->db->escape($vacancy_description) .",".$this->db->escape($application_deadline) .",".$this->db->escape($position_startdate) .",".$this->db->escape($position_enddate) .")";
            $this->db->query($sql);

    }
  public function check_vacancy($request_id){
       $query = $this->db->query("select * from vacancy where vacancy.request_id = '".$request_id."'");
    return $query->result_array();
  }

  public function load_ivacancies(){

    $query = $this->db->query('select * from vacancy,vacancy_request where vacancy.request_id = vacancy_request.request_id and vacancy_request.request_type ='.'"intern"'.'and vacancy.vacancy_status='.'"open"');
    return $query->result_array();

  }

  public function load_fvacancies(){
      
    $query = $this->db->query('select * from vacancy,vacancy_request where vacancy.request_id = vacancy_request.request_id and vacancy_request.request_type ='.'"fellow"'.'and vacancy.vacancy_status='.'"open"');
    return $query->result_array();

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
public function changecoveravatar() {
        $upload_data = $this->upload->data(); 
        $ppic =   $upload_data['file_name'];
        $this->load->helper('url');
        $pic = base_url("assets/img/users/".$ppic); 
        $this->load->library('session');
        $user =$this->session->userdata('username');
        
     $sql = "UPDATE developer_details SET coverphoto = '".$pic ."' where developer_details.username = '".$user ."'";
    
    
        $this->db->query($sql);
      }
public function changefirstavatar($projectid){
       
       $upload_data = $this->upload->data();
       $ppic =   $upload_data['file_name'];
       $pic = base_url("assets/img/projects/".$ppic); 
        
     $sql = "UPDATE portfolio SET product_pic = '".$pic ."' where product_id = '".$projectid ."'";
    
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
    



}