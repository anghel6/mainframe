<?php
class model_users extends CI_Model{
	/*checks the login data */
	public function login_credentials(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		
		$query=$this->db->get('users');
			
			if($query->num_rows==1){
				return TRUE;
				}
				else
				  {
					return FALSE;
					}
			}
	/*checks if the user has  a valid email in the database to recover his password */
	public function has_email(){
		$this->db->where('email',$this->input->post('e-mail'));

		$query=$this->db->get('users');
		if($query->num_rows==1){
				return TRUE;
				}
				else
				 {
				  return FALSE;	
				   }
		       }
	/* inserts user's email and password to the database when he/she signs up  */
	public function add_user(){
		$data=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password'))
		);
		
		$query=$this->db->insert('users',$data);
			
			if($query){
				return true;
			}
			else
			{
			return false;
			}
	}
}
