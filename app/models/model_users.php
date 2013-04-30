<?php
class model_users extends CI_Model{
	
public function can_log_in(){
$this->db->where('email',$this->input->post('email'));
$this->db->where('password',md5($this->input->post('password')));
$query=$this->db->get('users');
if($query->num_rows==1){
	return true;
}else{
return false;
}
}
public function has_email(){
$this->db->where('email',$this->input->post('e-mail'));

$query=$this->db->get('users');
if($query->num_rows==1){
	return true;
}else{
return false;
}
}
public function add_user(){
	$data=array(
		'email'=>$this->input->post('email'),
		'password'=>$this->input->post('password')
		);
		$query=$this->db->insert('users',$data);
		if($query){
			return true;
		}else{
			return false;
		}
}
}
