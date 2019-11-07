<?php
ob_start();
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
    {
    	$session_id="";
		parent::__construct();
		if(!$this->session->has_userdata('LoginAdminAuth'))
        {
			redirect('welcome');
		}
		$session_id = $_SESSION['LoginAdminAuth']['id'];

       
   }
	
//*************End login**********************//
	public function dashboard()
	{
		$this->load->view('admin/dashboard');
		
	}
/***********User Section *******************/
	public function user()
	{
			$config = array();
	        $config["base_url"] = base_url() . "Home/user";
	        $config["total_rows"] = $this->admin->get_count('user');
	       	$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$config['full_tag_open'] = '<div class="col-md-3"></div><div class="paginationd col-md-6"><ul>';
	  		$config['full_tag_close'] = '</ul></div>';

			$config['next_link'] = 'Next →';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '← Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) :0;

	        $data['userlist'] = $this->admin->get_pagination_details('user',$config["per_page"], $page,array('status'=>'1','deleted!='=>'1','type!='=>'admin'),'id','Desc');
	        // echo $this->db->last_query(); die();
			$this->load->view('admin/user/userlist',$data);
		
	}

	public function adduser()
	{
		
		if(!empty($_POST)){

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile','required');
			if ($this->form_validation->run() == true)
		        {
					// echo"<pre>"; print_r($_POST); print_r($_FILES);die();
					$data=array(
						'type' =>$this->input->post('type'),
						'name' =>$this->input->post('fname'),
		        		'email' =>$this->input->post('email'),
		        		'contact_no' =>$this->input->post('mobile'),
		        		'password' =>md5($this->input->post('password')),
		        		'status' =>'1', 
		        		'created_on' =>date('Y-m-d h:i:s') 
		        	 );
		        if($_FILES['image']['name']!="")
          		{
	              $image_name1 = upload_image('image','./uploads/profiles/');
	              if($image_name1!="")
	              {
	                 $data['profile_image'] = $image_name1;
	              }
	              else
	              {
	                $this->session->set_flashdata('errormsg', 'Some problem in uploading your file');
	                redirect('Home/adduser');
	              }
          }
		        	$lastid=$this->admin->add('user',$data);
					if($lastid)
					{
						$this->session->set_flashdata('successmsg', 'Successfully Submitted!');
						redirect("Home/user");
					
					}else{
						$this->session->set_flashdata('errorsmsg', 'There is some issue!');
						redirect("Home/user");

						}
		        }else {
		        	$this->session->set_flashdata('errorsmsg', 'validation Error!');
					redirect("Home/user");

					}
	       }else
	        {
	           $this->load->view('admin/user/useradd');
	        }
	       
	}

	public function showuser($id)
  {
      	
		      $qid = decode_id($id,"id");
		      $data['user']= $this->admin->get_record('user',array('id'=>$qid));
			  $this->form_validation->set_rules('email', 'Email', 'required');
		      if($this->form_validation->run()==FALSE)
		      {
		        $this->load->view('admin/user/showuser',$data);
		      }
	      
  }


	public function edituser($id)
  {
      
	      $qid = decode_id($id,"id");
	      $data['user']= $this->admin->get_record('user',array('id'=>$qid));
	    
	      $this->form_validation->set_rules('email', 'Email', 'required');
	      if($this->form_validation->run()==FALSE)
	      {
	        $this->load->view('admin/user/updateuser',$data);
	      }
	      else
	      {
	        $dob= $this->input->post('dob');
			 $data=array(
	        		'type' =>$this->input->post('type'),
					'name' =>$this->input->post('fname'),
	        		'email' =>$this->input->post('email'),
	        		'contact_no' =>$this->input->post('mobile'),
	        		'status' =>'1', 
	        		'modified_on' =>date('Y-m-d h:i:s') 
	        		 );
				if($_FILES['image']['name']!="")
	          {
	              $image_name1 = upload_image('image','./uploads/profiles/');
	             if($image_name1!="")
	             {
	              $data['profile_image'] = $image_name1;
	             }
	             else
	             {
	              $this->session->set_flashdata('errormsg', 'Some problem in uploading your file');
	              redirect('Home/user');
	             }
	          }
	           $lastid=$this->admin->update('user',array('id'=>$qid),$data);
	          if($lastid)
	          {
	            $this->session->set_flashdata('successmsg','Update Successfully');
	            redirect("Home/user",'refresh');
	          }
	          else
	          {
	            $this->session->set_flashdata('errorsmsg','Something wrong try again');
	             redirect("Home/user",'refresh');
	          }
	      } 	   
  }
  

	public function deluser($id)
	{
		
		 $qid = decode_id($id,"id");
		 $data=array('deleted' => '1','deleted_on'=>date('Y-m-d h:i:s'));
		 $lastid=$this->admin->update('user',array('id'=>$qid),$data);
           // echo $this->db->last_query(); die();
	          if($lastid)
	          {
	            $this->session->set_flashdata('successmsg','Successfully deleted');
	            redirect("Home/user",'refresh');
	          }
	          else
	          {
	            $this->session->set_flashdata('errorsmsg','Something wrong try again');
	             redirect("Home/user",'refresh');
	          }
          
	}
/********************End user Section ******************/
	public function changepwd()
	{
		$this->load->view('admin/changepassword');
	}


		public function changepassword()
		{

	$this->form_validation->set_rules('oldpwd','Password','trim|required');
    $this->form_validation->set_rules('password','New Password','required|matches[cpassword]');
    $this->form_validation->set_rules('cpassword', 'confirm Password', 'required');
	    if($this->form_validation->run() == FALSE)
	    {
	    	$this->session->set_flashdata('errorsmsg','confirm Password not matched!');
	    	$this->load->view('admin/changepassword');

	    }else{
	    	$sess_id = $_SESSION['LoginAdminAuth']['id'];
    		$oldpassword =md5($this->input->post('oldpwd'));
    		// $password =$this->input->post('password');
    		$where=array('id'=>$sess_id,'password'=>$oldpassword );
			$res=$this->admin->checkOldPass('user',$where);
			if($res){
				$data=array('password'=>md5($this->input->post('password')));
				$lastid=$this->admin->update('user',array('id'=>$sess_id),$data);
	          if($lastid)
	          {
	           $this->session->set_flashdata('successmsg','Password Update Successfully');
	           redirect("Home/changepwd",'refresh');
	          }
	          else
	          {
	            $this->session->set_flashdata('errorsmsg','Something wrong try again');
	             redirect("Home/changepwd",'refresh');
	          }


			}else{
				$this->session->set_flashdata('errorsmsg','Old password Not matched!');
				redirect("Home/changepwd",'refresh');

			}

    }
  

		}

//*********************************************//

		public function Agent(){
			$this->load->view('agent/agentlist');
		}
		
		public function blog()
		{
			$this->load->view('admin/blog');
		}


}
