<h2>Data</h2><br><br>
<a href="<?php echo base_url(); ?>data" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left"> </i> Back</a><br><br><br><br>

<?php if(isset($error)){echo $error['error'];} ?>
<?php if(isset($message)){echo $message;} ?>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<input type="text" name="name" size="60" value="<?php echo $daten->basename ?>"><br><br>
<?php echo form_submit('edit', 'edit', 'class="btn btn-primary"'); ?>
</form>


