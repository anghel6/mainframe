<!DOCTYPE html>
<html>
	
	<body>
		
		 <p style="font-size:30px;"><b>Members</b></p>
		 <?php print_r($this->session->all_userdata()); ?>
		 <br>
		 <br>
		 <br>
		 <a href='<?php echo base_url().'main/logout' ?>'>Logout</a>
	</body>
</html>