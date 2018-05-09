<h2>User</h2><br><br>

<a href="<?php echo base_url(); ?>data" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left"> </i> Back</a><br><br><br><br>
<?php if(isset($error)){echo $error['error'];} ?>
<?php if(isset($message)){echo $message;} ?>
<?php echo validation_errors(); ?>
<div>
<?php echo form_open('user/edit/'.$daten->id); ?>
<input type="radio" name="user_type" value="0" <?php if ($daten->user_type == 0){echo "checked";} ?>> User 
<input type="radio" name="user_type" value="1" <?php if ($daten->user_type == 1){echo "checked";} ?>> Admin<br><br>
<input type="text" name="name" size="60" value="<?php echo $daten->name ?>"><br><br>
<input type="text" name="email" size="60" value="<?php echo $daten->email ?>"><br><br>
<input type="hidden" name="password" size="60" value="<?php if(isset($password)){echo $password;} ?>"><br><br>
<input type="checkbox" name="send_email"> Send Email with new login data to user/admin<br><br>
<input type="checkbox" name="change_password"> Reset Password<br><br>
<input type="submit" name="edit" value='edit' >
<?php echo form_close(); ?>
</div><br><br>

