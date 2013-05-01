
	
		<?php echo validation_errors();?>
	<form name="input" action="http://mainframe.d/main/validate_lost_password" method="POST">
	Type you Email to send your new password: <input type="email" name="e-mail">
	<input type="submit" value="Recover" name="Recover Password">
    </form> 
		<a href='<?php echo base_url().'main/login'; ?>'>Back to login page</a>
	