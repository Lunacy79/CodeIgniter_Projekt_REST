<h2>Data</h2><br><br>
<a href="<?php echo base_url(); ?>data/upload" class="btn btn-success"><i class="glyphicon glyphicon-plus"> </i> Add</a><br><br><br><br>
<?php if(isset($message)){echo $message;} ?>
<table class="table table-hover table-striped" data-children-open="<?php base_url().'/edit' ?>">
    <thead>
	<tr>
	    <th>ID</th>
            <th>Type</th>
            <th>Name</th>
	    <th>File</th>
	    <th>Size</th>
            <th>Edit</th>
            <th>Delete</th>
	</tr>
    </thead>
    <tbody>
	<?php for($i=0;$i<count($daten);$i++){ ?>
	  <tr>
            <td><?php echo $daten[$i]->id; ?></td>
	    <td><?php echo $daten[$i]->type; ?></td>
            <td><?php echo $daten[$i]->basename; ?></td>
	    <td><?php echo $daten[$i]->filepath; ?></td>
	    <td><?php echo $daten[$i]->size; ?></td>
            <td><a href="<?php echo base_url().'data/edit/'.$daten[$i]->id; ?>"><i class="glyphicon glyphicon-edit"> </i></a></td>
            <td><a href="<?php echo base_url().'data/delete/'.$daten[$i]->id; ?>"><i class="glyphicon glyphicon-remove"> </i></a></td>
          </tr> 
	<?php } ?>
    </tbody>
</table>


