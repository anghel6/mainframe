<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
 /*USE login.sql for database which is in the parent folder*/

class Main extends CI_Controller{
	
	

	public function index(){
		$this->load->theme('demo');
		$this->login();
		
		
	
		}
	public function login(){
	    $this->load->theme('demo');
		$this->load->view('login');
		}
	//The page after the login
	public function members(){
		$this->load->theme('demo');
		/*checks if session value  is_logged_in is 1 to prevent opening members page without login*/
		if($this->session->userdata('is_logged_in')){ 
			$this->load->view('members');
				}else
				{
					echo "you haven't access in this page";
					redirect('main/login');
				}
			}
	public function signup_validation(){
		$this->load->theme('demo');	
		$this->load->library('form_validation');
		/*validate form data,checks is the email is already  in the database and if passwords match*/
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
		$this->form_validation->set_message('is_unique','e-mail address already exists');
		
		if($this->form_validation->run()){
				
			$this->load->model('model_users');
		
			if($this->model_users->add_user()){
			
				redirect('main/login_validation');
				}
				}
				else
				{
		            echo "incorrect password/email";
					$this->load->view('signup');
				}
	
	
			}

	public function login_validation(){
		$this->load->theme('demo');	
		$this->load->library('form_validation');
		/*calls validate_users function to check if the login data is true or false*/
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|callback_validate_users'); 
		$this->form_validation->set_rules('password','Password','required|trim');
		
		if($this->form_validation->run()){ //if the validation is TRUE
			
			$this->load->library('session');
			/* we create sessions values to prevent opening members page without login */
			$data=array(
			'email'=>$this->input->post('email'),
			'is_logged_in'=>1
			 );
			$this->session->set_userdata($data);
		    
			redirect('main/members');
			       }
		
				else
				{
					echo "incorrect password/email";
					$this->load->view('login');
				}
			}
	public function validate_users(){
		$this->load->theme('demo');
		$this->load->model('model_users');
			
			 
			 /*checks if the email/password are valid*/
			
			if($this->model_users->login_credentials()){
				return TRUE;
				}
				else
					{
					 $this->form_validation->set_message('validate_users','incorrect username/password');
					return FALSE;
					}
			}
	/*checks if the email exists for the validate_lost_password function*/
	
	public function validate_email(){
		$this->load->theme('demo');	
		$this->load->model('model_users');
			
			if($this->model_users->has_email()){
				return TRUE;
				}
				else
					{
					
					return FALSE;
					}
			}
	
	public function logout(){
		$this->load->theme('demo');
		$this->session->sess_destroy(); //destroy session
		
	    redirect('main/login');
		
		}
	
	public function signup(){
		$this->load->theme('demo');	
		$this->load->view('signup');
		
	}
	
	public function lost_password(){
	        
            $this->load->theme('demo');
	     	$this->load->view('lost_password');
			
	}
	
	public function validate_lost_password(){
        /*we call validate e-mail to check if email exists for the user to get recovery password*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules('e-mail','E-mail','required|trim|valid_email|callback_validate_email');
			
			if($this->form_validation->run()){ //if validation is true
					
				$key=uniqid(); //creates a random number for password and sends it to user's email
				$this->load->library('email',array('mailtype'=>'html'));
				$this->email->from('anghel6@hotmail.com','aggelos');
				$this->email->to($this->input->post('e-mail'));
				$this->email->subject('recover password');
				$message='your new password is:';
				$message.=$key;
					
					if($this->email->send()){ //if the email has been sent updates the old password
						echo $message;
						$this->load->database();
						$data = array(
               			'password' => md5($key),
               			);

           					$this->db->where('email',$this->input->post('e-mail'));
           					$this->db->update('users', $data); 
			
						}
					}
								else
								{
									echo 'Your email does not exists';
	        
								}
			
				}
}

?>