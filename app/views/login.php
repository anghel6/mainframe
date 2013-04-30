<!DOCTYPE html>
<html>
<body>
	
	<p>LOGIN</p>
	<a href='<?php echo base_url().'main/lost_password'; ?>'>Forgot your password?</a>
	<?php
	echo validation_errors();
	echo form_open('main/login_validation');
	echo "<p>email";
	echo form_input('email');
	echo "</p>";
	echo "<p>password";
	echo form_password('password');
	echo "</p>";
	echo "<p>";
	echo  form_submit('login_submit','Login');
	echo "</p>";
	echo form_close();
	?>
	<a href='<?php echo base_url().'main/signup'; ?>'>Sign Up</a>
	
</body>
	
	
	
</html>