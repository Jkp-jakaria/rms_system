<?php
if(isset($_POST["btnEdit"])){
	$table=Table::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCapacity"])){
		$errors["capacity"]="Invalid capacity";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbPersonId"])){
		$errors["person_id"]="Invalid person_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbAvailableId"])){
		$errors["available_id"]="Invalid available_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbStatusId"])){
		$errors["status_id"]="Invalid status_id";
	}

*/
	if(count($errors)==0){
		$table=new Table();
		$table->id=$_POST["txtId"];
		$table->name=$_POST["txtName"];
		$table->capacity=$_POST["cmbCapacity"];
		$table->person_id=$_POST["cmbPersonId"];
		$table->available_id=$_POST["cmbAvailableId"];
		$table->status_id=$_POST["cmbStatusId"];

		$table->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="tables">Manage Table</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-table' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$table->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$table->name"]);
	$html.=input_field(["label"=>"Capacity","type"=>"text","name"=>"cmbCapacity","value"=>"$table->capacity"]);
	$html.=select_field(["label"=>"Person","name"=>"cmbPersonId","table"=>"persons","value"=>"$table->person_id"]);
	$html.=select_field(["label"=>"Available","name"=>"cmbAvailableId","table"=>"availables","value"=>"$table->available_id"]);
	$html.=select_field(["label"=>"Status","name"=>"cmbStatusId","table"=>"status","value"=>"$table->status_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
