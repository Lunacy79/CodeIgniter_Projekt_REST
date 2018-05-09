

<h2>Add Data</h2><br><br>
<a href="<?php echo base_url(); ?>data" class="btn btn-success"><i class="glyphicon glyphicon-arrow-left"> </i> Back</a><br><br><br><br>

<?php if(isset($error)){echo $error['error'];} ?>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('data/do_upload'); ?>
<label>Name</label><br>
<input type="text" name="name" size="60"><br><br>
<label>Datei</label><br>
<input type="file" name="userfile" size="60"><br><br>
<input type="submit" name="upload" value='upload' >
</form>
