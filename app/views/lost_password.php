<!DOCTYPE html>
<html>
	
	<body>
		<?php
		echo validation_errors();
		echo form_open('main/validate_lost_password');
		echo '<p>Enter your email Address to send you a recovery password:';
		echo form_input('e-mail');
		echo '</p>';
		echo "<p>";
	    echo  form_submit('lost_password','submit');
	    echo "</p>";
		echo form_close();
		?>
		<a href='<?php echo base_url().'main/login'; ?>'>Back to login page</a>
	</body>
</html>