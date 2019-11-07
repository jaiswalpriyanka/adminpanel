<?php
ob_start();
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
    {
       parent::__construct();
    }

	/*public function index()
	{
		$this->load->view('welcome_message');
	}
	*/

	//****************Login **************//
	public function index()
	{
		$this->load->view('login');
	}

	public function authentication()
	{
		// echo "<pre>"; print_r($_POST); die();
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()==TRUE)
		{
			$username = $this->input->post('email');
			$password = md5($this->input->post('password'));

		   	$result = $this->admin->adminauth('user', $username, $password);
			// echo $this->db->last_query(); echo "<pre>"; print_r($result); die();
		   	if($result)
		   	{
		   		$session_array = array();
				foreach($result as $row)
				{
				   	$session_array = array(
					 	'id' => $row->id,
					 	'name' => $row->name,
					 	'mobile'=>$row->contact_no,
					 	'email' =>$row->email,
				   	);
				     $this->session->set_userdata('LoginAdminAuth', $session_array);
				    //echo"<pre>";print_r($_SESSION[]); die();
				   $status=$row->status;
				 }
			 	if($status==1)
			 	{
			 		redirect('Home/dashboard');
			 	}
			 	else
			 	{
			 		$this->session->set_flashdata('errorsmsg',"Account Suspended!");
			 		redirect('welcome');
			  		
			 	}
		   }
		   else
		   {
		   	$this->session->set_flashdata('errorsmsg',"Invalid Email or password");
		   	redirect('welcome');
		   }
		}
		else
		{
			$this->load->view('login');
		}

	}


//*************End login**********************//

}
