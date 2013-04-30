<!DOCTYPE html>
<html>
	<body>
		<?php
		echo validation_errors();
		echo form_open('main/signup_validation');
		echo '<p>Email';
		echo form_input('email');
		echo '</p>';
		echo '<p>password';
		echo form_password('password');
		echo '</p>';
		echo '<p>Confirm Password';
		echo form_password('cpassword');
		echo '</p>';
		echo '<p>';
		echo form_submit('Signup_submit','Signup');
		echo '</p>';
		echo form_close();
		
		?>
	</body>
</html>