<?php
if(isset($_POST["btnDetails"])){
	$table=Table::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="tables">Manage Table</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Table Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$table->id</td></tr>";
		$html.="<tr><th>Name</th><td>$table->name</td></tr>";
		$html.="<tr><th>Capacity</th><td>$table->capacity</td></tr>";
		$html.="<tr><th>Person Id</th><td>$table->person_id</td></tr>";
		$html.="<tr><th>Available Id</th><td>$table->available_id</td></tr>";
		$html.="<tr><th>Status Id</th><td>$table->status_id</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
