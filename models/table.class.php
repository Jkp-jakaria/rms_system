<?php
class Table implements JsonSerializable{
	public $id;
	public $name;
	public $capacity;
	public $person_id;
	public $available_id;
	public $status_id;

	public function __construct(){
	}
	public function set($id,$name,$capacity,$person_id,$available_id,$status_id){
		$this->id=$id;
		$this->name=$name;
		$this->capacity=$capacity;
		$this->person_id=$person_id;
		$this->available_id=$available_id;
		$this->status_id=$status_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}tables(name,capacity,person_id,available_id,status_id)values('$this->name','$this->capacity','$this->person_id','$this->available_id','$this->status_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}tables set name='$this->name',capacity='$this->capacity',person_id='$this->person_id',available_id='$this->available_id',status_id='$this->status_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}tables where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,capacity,person_id,available_id,status_id from {$tx}tables");
		$data=[];
		while($table=$result->fetch_object()){
			$data[]=$table;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,capacity,person_id,available_id,status_id from {$tx}tables $criteria limit $top,$perpage");
		$data=[];
		while($table=$result->fetch_object()){
			$data[]=$table;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}tables $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,capacity,person_id,available_id,status_id from {$tx}tables where id='$id'");
		$table=$result->fetch_object();
			return $table;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}tables");
		$table =$result->fetch_object();
		return $table->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Capacity:$this->capacity<br> 
		Person Id:$this->person_id<br> 
		Available Id:$this->available_id<br> 
		Status Id:$this->status_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbTable"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}tables");
		while($table=$result->fetch_object()){
			$html.="<option value ='$table->id'>$table->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}tables $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;

		// $result=$db->query("select id,name,capacity,person_id,available_id,status_id from {$tx}tables $criteria limit $top,$perpage");

		$result=$db->query("SELECT t.id,t.name,t.capacity,p.name person,a.name availablity,s.name status FROM {$tx}tables t,{$tx}persons p,{$tx}availables a,{$tx}status s where p.id=t.person_id and a.id=t.available_id and s.id=t.status_id limit $top,$perpage");

		$html="<div class='mb-3'><a class=\"btn btn-success\" href=\"create-table\">New Table</a></div>";
		$html.="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Capacity</th><th>Person</th><th>Availablity</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Capacity</th><th>Person</th><th>Available</th></tr>";
		}
		while($table=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$table->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-table"]);
				$action_buttons.= action_button(["id"=>$table->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-table"]);
				$action_buttons.= action_button(["id"=>$table->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"tables"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$table->id</td><td>$table->name</td><td>$table->capacity</td><td>$table->person</td><td>$table->availablity</td>$action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,capacity,person_id,available_id,status_id from {$tx}tables where id={$id}");
		$table=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Table Details</th></tr>";
		$html.="<tr><th>Id</th><td>$table->id</td></tr>";
		$html.="<tr><th>Name</th><td>$table->name</td></tr>";
		$html.="<tr><th>Capacity</th><td>$table->capacity</td></tr>";
		$html.="<tr><th>Person Id</th><td>$table->person_id</td></tr>";
		$html.="<tr><th>Available Id</th><td>$table->available_id</td></tr>";
		$html.="<tr><th>Status Id</th><td>$table->status_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
