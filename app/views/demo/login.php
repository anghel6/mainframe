
	
	<p>Login</p>
	<a href='<?php echo base_url().'main/lost_password'; ?>'>Forgot your password?</a>
	<?php echo validation_errors();?>
	<form name="input" action="http://mainframe.d/main/login_validation" method="post">
	Email: <input type="email" name="email">
	Password: <input type="password" name="password">
	<input type="submit" value="Submit" name="Login">
    </form> 
	<a href='<?php echo base_url().'main/signup'; ?>'>Sign Up</a>
	
