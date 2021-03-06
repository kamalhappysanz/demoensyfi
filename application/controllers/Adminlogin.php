<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	function __construct() {
		 parent::__construct();
		 $this->load->model('login');
		 $this->load->model('dashboard');
		 $this->load->helper('url');
		 $this->load->library('session');
 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function valid_code()
	{
			$inst_code = $this->input->post('inst_code');
			$result = $this->login->valid_code($inst_code);

			if($result['status']=='Active'){
					redirect('adminlogin/login');
			} else {
				$this->session->set_flashdata('msg', 'Invalid Institute Code!');
				 redirect('/');
			}
	}

	public function login()
	{
		$user_id=$this->session->userdata('user_id');
		$institute_code=$this->session->userdata('institute_code');

		if($user_id){
				redirect('adminlogin/dashboard');
		}else{
				 $this->load->view('login');
		}		
	}
	
	public function home()
	{
      //$schoolid=$this->input->post('school_id');

	  $email=$this->input->post('email');
	  $password= md5($this->input->post('password'));
	  
	  $semail = $this->db->escape_str($email);
	  $spassword = $this->db->escape_str($password);
	  
	  $result = $this->login->login($semail,$spassword);
	  $msg = $result['msg'];

			if($result['status']=='Deactive'){
				//$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
				$this->session->set_flashdata('msg', 'Your account has been deactivated!');
				 redirect('/');
			}
			
			if($result['status']=='notRegistered'){
				//$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
				$this->session->set_flashdata('msg', 'Invalid credentials!');
				redirect('/');
			}
			
			//$user_type=$this->session->userdata('user_type');
			$user_type=$result['user_type'];
			
					if($result['status']=='Active'){
						switch($user_type){
							case '1':
								$user_name=$result['user_name'];
								//$msg=$result['msg'];
								$name=$result['name'];
								$user_type=$result['user_type'];
								$status=$result['status'];
								$user_id=$result['user_id'];
								$user_pic=$result['user_pic'];
								$school_id=$result['school_id'];
								$datas= array("user_name"=>$user_name,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic,"school_id"=>$school_id);
								$session_data = $this->session->set_userdata($datas);
								
								$datas['res']=$this->dashboard->get_user_count_student();
								$datas['parents']=$this->dashboard->get_user_count_parents();
								$datas['teacher']=$this->dashboard->dash_teacher_users();
								$datas['pending_leave']=$this->dashboard->pending_leave();

								$datas['das_events']=$this->dashboard->dash_events();
								$datas['das_users']=$this->dashboard->dash_users();
								$datas['dash_comm']=$this->dashboard->dash_comm();

								$datas['dash_reminder']=$this->dashboard->dash_reminder($user_id);
								$datas['class']=$this->dashboard->get_all_class_sec();
								$datas['count_notification']=$this->dashboard->count_notification();
								$this->load->view('header',$datas);
								$this->load->view('home',$datas);
								$this->load->view('footer');
								break;
							case '2':
								$user_name=$result['user_name'];
								//$msg=$result['msg'];
								$name=$result['name'];
								$user_type=$result['user_type'];
								$status=$result['status'];
								$user_id=$result['user_id'];
								$user_pic=$result['user_pic'];
								$datas= array("user_name"=>$user_name, "name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
								$session_data=$this->session->set_userdata($datas);
								
								$datas['das_events']=$this->dashboard->dash_events();
								$datas['user_details']=$this->dashboard->dash_teacher($user_id);
								
								$this->load->view('adminteacher/teacher_header',$datas);
								$this->load->view('adminteacher/home',$datas);
								$this->load->view('adminteacher/teacher_footer');
								break;
							case '3':
								$user_name=$result['user_name'];
								//$msg=$result['msg'];
								$name=$result['name'];
								$user_type=$result['user_type'];
								$status=$result['status'];
								$user_id=$result['user_id'];
								$user_pic=$result['user_pic'];
								$datas= array("user_name"=>$user_name,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
								$session_data=$this->session->set_userdata($datas);
								
								$datas['user_details']=$this->dashboard->dash_students($user_id);
								$datas['stud_details']=$this->dashboard->get_students($user_id);
								$datas['stud_circular']=$this->dashboard->get_students_circular($user_id);
								$datas['stud_cls_id']=$this->dashboard->get_students_cls_id($user_id);
								
								$this->load->view('adminstudent/student_header',$datas);
								$this->load->view('adminstudent/home',$datas);
								$this->load->view('adminstudent/student_footer');
								break;
							case '4':
								$user_name=$result['user_name'];
								//$msg=$result['msg'];
								$name=$result['name'];
								$user_type=$result['user_type'];
								$status=$result['status'];
								$user_id=$result['user_id'];
								$user_pic=$result['user_pic'];
								$datas= array("user_name"=>$user_name, "name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
								$session_data=$this->session->set_userdata($datas);
								
								$datas['user_details']=$this->dashboard->dash_parents($user_id);
								$datas['stud_details']=$this->dashboard->get_students($user_id);
								$datas['parents_circular']=$this->dashboard->get_parents_circular($user_id);
								$datas['res']=$this->dashboard->stud_details($user_id);
								
								$this->load->view('adminparent/parent_header',$datas);
								$this->load->view('adminparent/home');
								$this->load->view('adminparent/parent_footer');
								break;
						}
	 			}
				elseif($msg=="Password Wrong"){
					//$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
					$this->session->set_flashdata('msg', 'Password invalid');
					redirect('/');
				}
				else{
					//$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
					$this->session->set_flashdata('msg', 'Username and Password invalid');
					 redirect('/');
				}


}

	public function profile(){
		 $datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');
		 $datas['result'] = $this->login->getuser($user_id);
		 $user_type=$this->session->userdata('user_type');
		 if($user_type==1){
			$this->load->view('header',$datas);
			$this->load->view('resetpassword',$datas);
			$this->load->view('footer');
			}
			else{
				 redirect('/');
			}
}

	public function forgotpassword()
	{
		$username=$this->input->post('username');
		$datas=$this->dashboard->forgotpassword($username);
	}

	public function dashboard(){
		 $datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');
		 $datas['result'] = $this->login->getuser($user_id);
		 $user_type=$this->session->userdata('user_type');
		 if($user_type==1){
			 $datas['res']=$this->dashboard->get_user_count_student();
			 $datas['parents']=$this->dashboard->get_user_count_parents();
			 $datas['teacher']=$this->dashboard->dash_teacher_users();
			 $datas['das_events']=$this->dashboard->dash_events();
			 $datas['das_users']=$this->dashboard->dash_users();
			 $datas['dash_comm']=$this->dashboard->dash_comm();
			// print_r($datas['dash_comm']);exit;
			 $datas['dash_reminder']=$this->dashboard->dash_reminder($user_id);

			 $datas['pending_leave']=$this->dashboard->pending_leave();
			 $datas['class']=$this->dashboard->get_all_class_sec();
			 //echo'<pre>'; print_r($datas['class']);exit;

			$datas['count_notification']=$this->dashboard->count_notification();



			$this->load->view('header',$datas);
			$this->load->view('home',$datas);
			$this->load->view('footer');
		}else if($user_type==2){
			$datas['user_details']=$this->dashboard->dash_teacher($user_id);
			$datas['das_events']=$this->dashboard->dash_events();
			$this->load->view('adminteacher/teacher_header',$datas);
			$this->load->view('adminteacher/home',$datas);
			$this->load->view('adminteacher/teacher_footer');
		}else if($user_type==3){
			$datas['user_details']=$this->dashboard->dash_students($user_id);
			$datas['stud_details']=$this->dashboard->get_students($user_id);
			$datas['stud_circular']=$this->dashboard->get_students_circular($user_id);
			$datas['stud_cls_id']=$this->dashboard->get_students_cls_id($user_id);

			//print_r($datas['stud_circular']);exit;

			$this->load->view('adminstudent/student_header',$datas);
			$this->load->view('adminstudent/home',$datas);
			$this->load->view('adminstudent/student_footer');
		}else if($user_type==4){
			$datas['user_details']=$this->dashboard->dash_parents($user_id);
			$datas['stud_details']=$this->dashboard->get_students($user_id);
			$datas['parents_circular']=$this->dashboard->get_parents_circular($user_id);
			$datas['res']=$this->dashboard->stud_details($user_id);
				//echo '<pre>'; print_r($datas['stud_details']);exit;
            //echo '<pre>'; print_r($datas['user_details']);exit;
			//echo '<pre>'; print_r($datas['user_details']);exit;
			$this->load->view('adminparent/parent_header',$datas);
			$this->load->view('adminparent/home',$datas);
			$this->load->view('adminparent/parent_footer');
		}
		else{
				 redirect('/');
			}
}


	public function updateprofile(){

		$datas=$this->session->userdata();
		$user_name=$this->session->userdata('user_name');
		$user_type=$this->session->userdata('user_type');
	 	if($user_type==1 || $user_type==2 || $user_type==3 ||$user_type==4 ){
		 		$user_id=$this->input->post('user_id');
				$name=$this->input->post('name');
				
				$oldpassword=md5($this->input->post('oldpassword'));
				$newpassword=md5($this->input->post('newpassword'));

				// $user_password_old=$this->input->post('user_password_old');

				$res=$this->login->updateprofile($user_id,$oldpassword,$newpassword);

				if($res['status']=="success"){
				 $this->session->set_flashdata('msg', 'Password has been reset');
					redirect('adminlogin/profile');
			 }else{
				 $this->session->set_flashdata('msg', 'Current password is invalid!');
						redirect('adminlogin/profile');
			 }


	 }
	 else{
			redirect('/');
	 }
	}

	public function profilepic(){
		 $datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');
		 $user_type=$this->session->userdata('user_type');
		 $datas['result'] = $this->login->getuser($user_id);
		if($user_type==1 || $user_type==2 || $user_type==3 ||$user_type==4 ){
		$this->load->view('header',$datas);
		$this->load->view('profile_update',$datas);
		$this->load->view('footer');
		}
		else{
			 redirect('/');
		}
}

	public function profileupdate(){
			$datas=$this->session->userdata();
			$user_name=$this->session->userdata('user_name');
			$user_type=$this->session->userdata('user_type');
			
		 	if($user_type==1 || $user_type==2 || $user_type==3 ||$user_type==4 ){
				$user_id=$this->input->post('user_id');
				$name=$this->input->post('sname');

			  /* $user_pic_old=$this->input->post('user_pic_old');
			  $profile = $_FILES["profile"]["name"];
				$userFileName = time().'-'.$profile;
				$uploaddir = 'assets/admin/profile/';
				$profilepic = $uploaddir.$userFileName;
				move_uploaded_file($_FILES['profile']['tmp_name'], $profilepic);
				if(empty($profile)){
				  	$userFileName=$user_pic_old;
				} */
				$res=$this->login->profileupdate($user_id,$name);
				if($res['status']=="success"){
				 $this->session->set_flashdata('msg', 'Changes made are saved');
				 redirect('adminlogin/profilepic');
			 }else{
				 $this->session->set_flashdata('msg', 'Something went wrong! Please try again later.');
				  redirect('adminlogin/profilepic');
			 }


		 }
	}

	// Admin Students
	public function special_leave_student(){
		$datas['res']=$this->dashboard->get_special();
		// print_r($datas['res']);
		echo json_encode($datas['res']);
	}

	public function search(){
		$ser_txt=$this->input->post('ser');
		$user_type=$this->input->post('user_type');
		$class_sec=$this->input->post('cls_sec');
          //echo $class_sec;
		$datas['res']=$this->dashboard->search_data($ser_txt,$user_type,$class_sec);
		// print_r($datas['res']);
		echo $datas['res'];
	}

	public function logout(){
		$datas=$this->session->userdata();
		$this->session->unset_userdata($datas);
		$this->session->sess_destroy();
		redirect('/');
	}

	public function notification_status(){
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $datas['result'] = $this->login->getuser($user_id);		 
			 $user_type=$this->session->userdata('user_type');
			 if($user_type==1){
				$datas['notification_status']=$this->dashboard->check_notification($user_id);
				$this->load->view('header',$datas);
				$this->load->view('update_notification',$datas);
				$this->load->view('footer');
			}
			else{
					 redirect('/');
			}
	}
	
	
	public function update_notification()
	{
		$datas=$this->session->userdata();
		$user_name=$this->session->userdata('user_name');
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
	 	if($user_type==1){

			$Sms = $this->input->post('Sms');
			$Mail = $this->input->post('Mail');
			$Push = $this->input->post('Push');
			
			$res=$this->dashboard->update_notification($Sms,$Mail,$Push,$user_id);

			if($res['status']=="success"){
				 $this->session->set_flashdata('msg', 'Update Successfully');
					redirect('adminlogin/notification_status');
			 }else{
				 $this->session->set_flashdata('msg', 'Failed to update');
						redirect('adminlogin/notification_status');
			 }
		}
		else{
			redirect('/');
		}
	}
	
	public function post_img()
		{
		 $datas=$this->session->userdata();
		 $user_id=$this->session->userdata('user_id');
		 $user_type=$this->session->userdata('user_type');
		 if($user_type==1)
		 {
				$data=$_POST["image"];
				$image_array_1 = explode(";", $data);
				$image_array_2 = explode(",", $image_array_1[1]);
				$data = base64_decode($image_array_2[1]);
				$imageName = time() . '.png';
				file_put_contents('assets/admin/profile/'.$imageName, $data);
				$datas=$this->login->update_pic($user_id,$imageName);
				if($datas['status']=="success"){
					echo "success";
				}else{
					echo "failed";
				}
			}else{
					redirect('/');
			}

		}

		public function remove_img(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
			if($user_type==1)
			{
				$datas=$this->login->remove_img($user_id);
				if($datas['status']=="success"){
					echo "success";
				}else{
					echo "failed";
				}
			}else{
			redirect('/');
			}
		}

}
