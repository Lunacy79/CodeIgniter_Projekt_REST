<h2>Add New User</h2><br><br>
<a href="<?php echo base_url(); ?>user" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left"> </i> Back</a><br><br><br><br>
<?php if(isset($error)){echo $error['error'];} ?>
<?php if(isset($message)){echo $message;} ?>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('user/newuser'); ?>
<label>Name</label><br>
<input type="text" name="name" size="60"><br><br>
<label>E-Mail</label><br>
<?php echo form_input('email'); ?><br><br>
<input type="radio" name="user_type" value="1"> Administrator<br><br>
<input type="radio" name="user_type" value="2"> User<br><br>
<input type="checkbox" name="send_email"> Send E-Mail with login data<br><br>
<?php echo form_submit('add', 'add', 'class="btn btn-primary"'); ?>

