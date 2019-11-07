<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Logout extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	}
	public function index()
	{
		$this->session->unset_userdata('LoginAdminAuth');
	  	$this->session->sess_destroy();
	    redirect('welcome', 'refresh');
	}



}
?>