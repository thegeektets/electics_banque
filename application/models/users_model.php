<?php
class users_model extends CI_Model {
    private $username;
 
 public function __construct(){
    $this->load->database();     }


  public function get_user($username){
    $query = $this->db->query("select * from user where user.username = '".$username."'");
    return $query->result_array();}

   public function get_emails(){
    $query = $this->db->query("select email from user");
    return $query->result_array();
  }

  public function get_email(){
    $user = $this->input->post("user"); 
    $query = $this->db->query("select useremail from user where username = '".$user."'");
    return $query->result_array();
  }

   public function registeruser() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $useremail = $this->input->post("email");

    
            $sql = "INSERT INTO user (username,useremail,password) " .
            "VALUES (" . $this->db->escape($username) . ",".$this->db->escape($useremail) .",".$this->db->escape(md5($password)) .")";
            $this->db->query($sql);

    }
  function logout($username){
     //     $sql = "UPDATE user SET online = "."0". " where username = '".$username ."'";
   //$this->db->query($sql);
  }
  function login($username){
   //       $sql = "UPDATE user SET online = "."1". " where username = '".$username ."'";
 //  $this->db->query($sql);
  }
  function online(){
      $query = $this->db->query('select username from user where online = 1');
    return $query->result_array();}

  

   public function changeuseravatar() {
     $upload_data = $this->upload->data(); 
      $ppic =   $upload_data['file_name'];
        $this->load->helper('url');
        $pic = base_url("assets/img/users/".$ppic); 
      
        $this->load->library('session');
        $user =$this->session->userdata('username');
        
     $sql = "UPDATE developer_details SET avatar = '".$pic ."' where developer_details.username = '".$user ."'";
    
    
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
            $fullname = $this->input->post("name");
            $sex = $this->input->post("gender");
            $email = $this->input->post("email");
            $about = $this->input->post("about");
            $company = $this->input->post("company");
            $city = $this->input->post("city");
            $country = $this->input->post("country");
            $bday = $this->input->post("DOB");
            $university =$this->input->post("university");
            $phone_number =$this->input->post("phone_number");
            //social media
            $facebook =$this->input->post("facebook");
            $twitter =$this->input->post("twitter");
            $google =$this->input->post("google");
            $website =$this->input->post("website");


     $sql = "UPDATE developer_details ,user SET user.username = ". $this->db->escape($username) . ",
     aboutme = " . $this->db->escape($about) . ",email = " . $this->db->escape($email) .",sex = " . $this->db->escape($sex) . ",
     company = " . $this->db->escape($company) . ",city = " . $this->db->escape($city) . ",country = " . $this->db->escape($country) . ",
     DOB = " . $this->db->escape($bday) ." ,phone_number = " . $this->db->escape($phone_number) ." ,facebook = " . $this->db->escape($facebook) ." ,twitter = " . $this->db->escape($twitter) ." ,google = " . $this->db->escape($google) ." ,website = " . $this->db->escape($website) . ",university = " . $this->db->escape($university) . ",
     full_names = " . $this->db->escape($fullname) .", developer_details.username = ". $this->db->escape($username) . " where user.username =developer_details.username and user.username = '".$user ."'";
     $this->db->query($sql);

    }   
    



}