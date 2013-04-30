<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
 /*USE login.sql for database which is in the parent folder*/

class Main extends CI_Controller{
	
	

public function index(){
	$this->login();
	
}
public function login(){
	
	$this->load->view('login');
}
public function members(){
	if($this->session->userdata('is_logged_in')){
	$this->load->view('members');
}else{
	redirect('main/login_validation');
}
}
public function signup_validation(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
	$this->form_validation->set_rules('password','Password','required|trim|md5');
	$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]|md5');
	$this->form_validation->set_message('is_unique','e-mail address already exists');
	if($this->form_validation->run()){
		$this->load->model('model_users');
		if($this->model_users->add_user()){
			
		redirect('main/login_validation');
		}
	}else{
		
		$this->load->view('signup');
	}
	
	
}

public function login_validation(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|callback_validate_users');
	$this->form_validation->set_rules('password','Password','required|md5|trim');
	if($this->form_validation->run()){
		$this->load->library('session');
		$data=array(
			'email'=>$this->input->post('email'),
			'is_logged_in'=>1
		);
		$this->session->set_userdata($data);
		 
		redirect('main/members');
	}else{
		$this->load->view('login');
	}
	}
public function validate_users(){
	$this->load->model('model_users');
	if($this->model_users->can_log_in()){
		return TRUE;
		}else{
			$this->form_validation->set_message('validate_users','incorrect username/password');
			return FALSE;
		}
}
public function validate_email(){
	$this->load->model('model_users');
	if($this->model_users->has_email()){
		return TRUE;
		}else{
			$this->form_validation->set_message('validate_users','incorrect email');
			return FALSE;
		}
}
public function logout(){
	$this->session->sess_destroy();
	redirect('main/login');
}
public function signup(){
	$this->load->view('signup');
}
	public function lost_password(){
	
	     	$this->load->view('lost_password');
	}
public function validate_lost_password(){

	$this->load->library('form_validation');
	$this->form_validation->set_rules('e-mail','E-mail','required|trim|valid_email|callback_validate_email');
	if($this->form_validation->run()){
		$key=uniqid();
		$this->load->library('email',array('mailtype'=>'html'));
		$this->email->from('anghel6@hotmail.com','aggelos');
		$this->email->to($this->input->post('e-mail'));
		$this->email->subject('recover password');
		$message='your new password is:';
		$message.=$key;
		if($this->email->send()){
			echo $message;
			$this->load->database();
			$data = array(
               'password' => md5($key),
               
            );

           $this->db->where('email',$this->input->post('e-mail'));
           $this->db->update('users', $data); 
			
			}
	}
			else{
			echo 'Your email does not exists';
	        
			}
			
}
}

?>