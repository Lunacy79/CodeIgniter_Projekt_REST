<!DOCTYPE html>

<html lang="en">
    
    <head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyCms</title>
	<link href="http://dev05.carolinivens.de/htdocs/css/bootstrap.min.css" rel="stylesheet">

    </head>
    
    <body style="background-color:#ccc;">
	<div class="modal show" role="dialog">
	    <div class="modal-dialog" role='document'>
		<div class='modal-content'>
	    <div class="modal-header">
		<h3>Login</h3>
	    </div>
	    <div class="modal-body">

                <?php if(isset($message)){echo $message;} ?>

		<?php echo validation_errors(); ?>
		<?php echo form_open('user/login');?>
		<table class="table">
		    <tr>
			<td style="border: none;">
			    E-Mail
			</td>
			<td  style="border: none;">
			    <?php echo form_input('email'); ?>
			    <!--<input type="text" name="email" size="50"/><br/>-->
			</td>
		    </tr>
		    <tr>
			<td style="border: none;">
			    Passwort
			    <!--<label for="password">Passwort</label>-->
			</td>
			<td style="border: none;">
			    <?php echo form_password('password'); ?>
			    <!--<input type="password" name="password" size="50"></input><br/>-->
			</td>
		    </tr>
		    <tr>
			<td style="border: none;"></td>
			<td style="border: none;">
			    <?php echo form_submit('submit', 'Login', 'class="btn btn-primary"'); ?>
			    <!--<input type="submit" name="submit" value="Login" />-->
			</td>
		    </tr>
		</table>
		<?php echo form_close(); ?>
	    </div>
	   </div>
	    </div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://dev05.carolinivens.de/htdocs/js/bootstrap.min.js"></script> 
	
    </body>
</html>
