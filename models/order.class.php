<?php
class Order implements JsonSerializable{
	public $id;
	public $table_id;
	public $order_date;
	public $order_total;
	public $remark;
	public $status_id;
	public $discount;
	public $vat;
	public $created_at;
	public $updated_at;
	public $chekedout;

	public function __construct(){
	}
	public function set($id,$table_id,$order_date,$order_total,$remark,$status_id,$discount,$vat,$created_at,$updated_at,$chekedout){
		$this->id=$id;
		$this->table_id=$table_id;
		$this->order_date=$order_date;
		$this->order_total=$order_total;
		$this->remark=$remark;
		$this->status_id=$status_id;
		$this->discount=$discount;
		$this->vat=$vat;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->chekedout=$chekedout;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders(table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at)values('$this->table_id','$this->order_date','$this->order_total','$this->remark','$this->status_id','$this->discount','$this->vat','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}orders set table_id='$this->table_id',order_date='$this->order_date',order_total='$this->order_total',remark='$this->remark',status_id='$this->status_id',discount='$this->discount',vat='$this->vat',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public function checkout(){
		global $db,$tx;
		$db->query("update {$tx}orders set status_id='$this->status_id',chekedout='$this->chekedout' where id='$this->id'");
	}
	public static function getTotalOrderAmount() {
		global $db,$tx;
        $query = "SELECT SUM(order_total) as total FROM {$tx}orders";
        $result = $db->query($query);
        	$totalData = $result->fetch_object();
        	return $totalData->total;
    }
	public static function getTodayTotalAmount() {
		global $db, $tx;
		$todayDate = date("Y-m-d");
		$query = "SELECT IFNULL(SUM(order_total), 0) as total FROM {$tx}orders WHERE order_date = '$todayDate'";
		$result = $db->query($query);
		if ($result && $result->num_rows > 0) {
			$todayTotalData = $result->fetch_object();
			return $todayTotalData->total;
		} else {
			return 0;
		}
	}	
	public static function countTodayOrders(){
		global $db, $tx;
		$today = date("Y-m-d");
		$criteria = "WHERE DATE(order_date) = '$today'";
		$result = $db->query("SELECT COUNT(*) FROM {$tx}orders $criteria");
		if ($result && $result->num_rows > 0) {
			list($count) = $result->fetch_row();
			return $count;
		} else {
			return 0;
		}
	}

	public static function getSalesDataLast7Days() {
		global $db, $tx;
		$salesData = [];
		for ($i = 6; $i >= 0; $i--) {
			$date = date("Y-m-d", strtotime("-$i days"));
			$result = $db->query("SELECT SUM(order_total) AS total_sales FROM {$tx}orders WHERE DATE(order_date) = '$date'");
			$sales = $result->fetch_object();
			$salesData[] = isset($sales->total_sales) ? $sales->total_sales : 0;
		}
	
		return $salesData;
	}
	
	public static function getMonthlySalesData() {
        global $db, $tx;

        // store monthly sales data
        $monthlySalesData = [];

        // fetch monthly sales data
        $query = "SELECT MONTH(order_date) AS month, SUM(order_total) AS total_sales FROM {$tx}orders GROUP BY MONTH(order_date)";

        // Execute query
        $result = $db->query($query);

        // Check results
        if ($result && $result->num_rows > 0) {
            // Fetch and store monthly sales data
            while ($row = $result->fetch_assoc()) {
                $monthlySalesData[$row['month']] = $row['total_sales'];
            }
        }

        return $monthlySalesData;
    }

	
	public static function getMonthlyOrderData() {
		global $db, $tx;

		// store monthly order data
		$monthlyOrderData = [];

		// fetch monthly order data
		$query = "SELECT MONTH(order_date) AS month, COUNT(id) AS total_orders FROM {$tx}orders GROUP BY MONTH(order_date)";

		// Execute query
		$result = $db->query($query);

		// Check results
		if ($result && $result->num_rows > 0) {
			// Fetch and store monthly order data
			while ($row = $result->fetch_assoc()) {
				$monthlyOrderData[$row['month']] = $row['total_orders'];
			}
		}

		return $monthlyOrderData;
	}

	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders $criteria limit $top,$perpage");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where id='$id'");
		$order=$result->fetch_object();
			return $order;
	}
	public static function findTable($id){
		global $db,$tx;
		$result =$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where table_id='$id'");
		$order=$result->fetch_object();
			return $order;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}orders");
		$order =$result->fetch_object();
		return $order->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Table Id:$this->table_id<br> 
		Order Date:$this->order_date<br> 
		Order Total:$this->order_total<br> 
		Remark:$this->remark<br> 
		Status Id:$this->status_id<br> 
		Discount:$this->discount<br> 
		Vat:$this->vat<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}orders");
		while($order=$result->fetch_object()){
			$html.="<option value ='$order->id'>$order->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;

		// $result=$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders $criteria limit $top,$perpage");

		$result=$db->query("select o.id,t.name table_name,o.order_date,o.order_total,o.remark,s.name status,o.discount,o.vat,o.created_at,o.updated_at from {$tx}orders o,{$tx}tables t,{$tx}status s where t.id=o.table_id and s.id=o.status_id $criteria limit $top,$perpage");

		$html="<div class='mb-3'><a class=\"btn btn-success\" href=\"table_view\">New Order</a></div>";
		$html.="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Table</th><th>Order Date</th><th>Order Total</th><th>Status</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Table</th><th>Order Date</th><th>Order Total</th><th>Status</th></tr>";
		}
		while($order=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$order->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-order"]);
				$action_buttons.= action_button(["id"=>$order->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-order"]);
				$action_buttons.= action_button(["id"=>$order->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"orders"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$order->id</td><td>$order->table_name</td><td>$order->order_date</td><td>$order->order_total</td><td>$order->status</td>$action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_orderbytable($page = 1,$perpage = 10,$criteria="",$action=true,$table_id){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;

		// $result=$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where table_id='$table_id' $criteria limit $top,$perpage");

		$result=$db->query("select o.id,o.table_id,t.name table_name,o.order_date,o.order_total,o.remark,s.name status,o.discount,o.vat,o.created_at,o.updated_at from {$tx}orders o,{$tx}tables t,{$tx}status s where t.id=o.table_id and s.id=o.status_id and o.table_id='$table_id' $criteria limit $top,$perpage");

		// $order=$db->query("SELECT chekedout FROM {$tx}orders");

		// $count = $order->fetch_assoc();
  
		// $result=$db->query("select o.id,t.name tablename,o.order_date,o.order_total,o.remark,s.name statusname,o.discount,o.vat,o.created_at,o.updated_at from {$tx}orders o,{$tx}tables t,{$tx}status s where t.id=o.table_id and s.id=o.status_id $criteria limit $top,$perpage");

		$html="<div class='mb-3'><a class=\"btn btn-success\" href=\"table_view\">New Order</a></div>";
		$html.="<table class='table'>";
		if($action){
			$html.="<tr><th>Id</th><th>Table</th><th>Order Date</th><th>Order Total</th><th>Status</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Table</th><th>Order Date</th><th>Order Total</th><th>Status</th></tr>";
		}
		while($order=$result->fetch_object()){
			$action_buttons = "";
			if($action){

				$checkedout_result = $db->query("SELECT chekedout FROM {$tx}orders WHERE id = '$order->id'");
				$checkedout = $checkedout_result->fetch_assoc();
				
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				if($checkedout['chekedout'] == 0){
					$action_buttons.= action_button(["id"=>$order->id, "name"=>"Details", "value"=>"Checkout", "class"=>"success", "url"=>"checkout"]);
				}
				$action_buttons.= action_button(["id"=>$order->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-order"]);
				$action_buttons.= action_button(["id"=>$order->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-order"]);
				$action_buttons.= action_button(["id"=>$order->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"orders"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$order->id</td><td>$order->table_name</td><td>$order->order_date</td><td>$order->order_total</td><td>$order->status</td>$action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,table_id,order_date,order_total,remark,status_id,discount,vat,created_at,updated_at from {$tx}orders where id={$id}");
		$order=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Order Details</th></tr>";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Table Id</th><td>$order->table_id</td></tr>";
		$html.="<tr><th>Order Date</th><td>$order->order_date</td></tr>";
		$html.="<tr><th>Order Total</th><td>$order->order_total</td></tr>";
		$html.="<tr><th>Remark</th><td>$order->remark</td></tr>";
		$html.="<tr><th>Status Id</th><td>$order->status_id</td></tr>";
		$html.="<tr><th>Discount</th><td>$order->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$order->vat</td></tr>";
		$html.="<tr><th>Created At</th><td>$order->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$order->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}

	static function order_report($date){
		global $db, $tx;
		$result = $db->query("SELECT o.id,t.name table_name,p.name AS product,od.qty,o.order_total,od.discount FROM {$tx}order_details od JOIN {$tx}orders o ON o.id=od.order_id JOIN {$tx}products p ON od.product_id=p.id JOIN {$tx}tables t ON o.table_id=t.id WHERE DATE_FORMAT(o.order_date,'%Y-%m-%d')='$date'");
		$html = "<div style='background-color:#fff;padding:15px;border:1px solid #dee2e6;margin-top:10px'>";
		$html .= "<table class='table table-hover'>";
		$html .= "<tr class='thead-light'><th>#SL</th><th>Table</th><th>Product</th><th>QTY</th><th>Order Total</th><th>Discount</th></tr>";
		
		//initialize variable
		$discount = 0;
		$Total = 0;
		$i=1;
		while($item = $result->fetch_object()){
			$html .= "<tr><td>$i</td><td>$item->table_name</td><td>$item->product</td><td>$item->qty</td><td>$item->order_total</td><td>$item->discount</td></tr>";

			$discount += $item->discount;
			$Total += $item->order_total;
			$i++;
		}
	
		$html .= "<tr style='border-top:2px solid #dee2e6;'><td></td><td></td><td></td><td></td><td><strong>Discount:</strong></td><td>$discount</td></tr>";
		$html .= "<tr><td></td><td></td><td></td><td></td><td><strong>Total:</strong></td><td>$Total</td></tr>";
		$html .= "</table>";
		$html .= "<div class='no-print clearfix'><a href='javascript:void(0)' onclick='window.print()' rel='noopener' target='_blank' class='btn btn-outline-secondary float-right'><i class='fas fa-print'></i> Print</a></div>";
		$html.="</div>";
		return $html;
	}
}
?>
