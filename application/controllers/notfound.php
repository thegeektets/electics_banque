<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notfound extends CI_Controller {
 	  public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    
    }

	public function index()
	{
	
    
	    $this->load->view('includes/header');

		$this->load->view('pages-404');
		
		$this->load->view('includes/footer');
	
	}


}

