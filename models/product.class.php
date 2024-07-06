<?php
class Product implements JsonSerializable{
	public $id;
	public $name;
	public $details;
	public $price;
	public $product_category_id;
	public $photo;

	public function __construct(){
	}
	public function set($id,$name,$details,$price,$product_category_id,$photo){
		$this->id=$id;
		$this->name=$name;
		$this->details=$details;
		$this->price=$price;
		$this->product_category_id=$product_category_id;
		$this->photo=$photo;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}products(name,details,price,product_category_id,photo)values('$this->name','$this->details','$this->price','$this->product_category_id','$this->photo')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}products set name='$this->name',details='$this->details',price='$this->price',product_category_id='$this->product_category_id',photo='$this->photo' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}products where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,details,price,product_category_id,photo from {$tx}products");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,details,price,product_category_id,photo from {$tx}products $criteria limit $top,$perpage");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,details,price,product_category_id,photo from {$tx}products where id='$id'");
		$product=$result->fetch_object();
			return $product;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}products");
		$product =$result->fetch_object();
		return $product->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Details:$this->details<br> 
		Price:$this->price<br> 
		Product Category Id:$this->product_category_id<br> 
		Photo:$this->photo<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduct"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}products $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;

		// $result=$db->query("select id,name,details,price,product_category_id,photo from {$tx}products $criteria limit $top,$perpage");
		$result=$db->query("SELECT p.id,p.name,p.details,p.price,pc.name product_categories,p.photo FROM {$tx}products p,{$tx}product_categories pc where pc.id=p.product_category_id limit $top,$perpage");

		$html="<div class='mb-3'><a class=\"btn btn-success\" href=\"create-product\">New Product</a></div>";
		$html.="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Details</th><th>Price</th><th>Product Categories</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Details</th><th>Price</th><th>Product Categories</th><th>Photo</th></tr>";
		}
		while($product=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-product"]);
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-product"]);
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"products"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$product->id</td><td>$product->name</td><td>$product->details</td><td>$product->price</td><td>$product->product_categories</td><td><img src='img/$product->photo' width='100' /></td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,details,price,product_category_id,photo from {$tx}products where id={$id}");
		$product=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Product Details</th></tr>";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Details</th><td>$product->details</td></tr>";
		$html.="<tr><th>Price</th><td>$product->price</td></tr>";
		$html.="<tr><th>Product Category Id</th><td>$product->product_category_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\'img/$product->photo\' width=\'100\' /></td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
