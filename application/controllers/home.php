<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 	  public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');

    $this->load->model('admin_model');
    
    }

	public function index()
	{

	      $this->load->library('session');
    
      if($this->session->userdata('logged_in') == "TRUE") {

        $data['ivacancies'] = $this->admin_model->load_ivacancies();
        $data['fvacancies'] = $this->admin_model->load_fvacancies();
        $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
  
	    $this->load->view('includes/header');

	    $this->load->view('includes/menu' ,$data);

		$this->load->view('about' ,$data);
		
		$this->load->view('includes/footer');
	}
	else{

		$data['profile'] = "";

        $data['ivacancies'] = $this->admin_model->load_ivacancies();
        $data['fvacancies'] = $this->admin_model->load_fvacancies();
  
	    $this->load->view('includes/header');

	    $this->load->view('includes/menu' ,$data);

		$this->load->view('about',$data);
		
		$this->load->view('includes/footer');
	}

	}


}

