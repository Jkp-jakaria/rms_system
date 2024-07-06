<?php
class OrderApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["orders"=>Order::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["orders"=>Order::pagination($page,$perpage),"total_records"=>Order::count()]);
	}
	function find($data){
		echo json_encode(["order"=>Order::find($data["id"])]);
	}
	function delete($data){
		Order::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data){
		
		$order_date=$data["order_date"]; 
    	$order_date=date("Y-m-d",strtotime($order_date));//convert date into mysql format
		$now=date("Y-m-d H:i:s");

		$products=$data["products"];

		$order=new Order();
		$order->table_id=$data["table_id"];
		$order->order_date=$order_date;
		$order->order_total=$data["order_total"];
		$order->remark=$data["remark"];
		$order->status_id=1;
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->created_at=$now;
		$order->updated_at=$now;

		$order_id=$order->save();

		foreach($products as $product){
		$orderdetails=new OrderDetail();
		
		$orderdetails->order_id=$order_id;
		$orderdetails->product_id=$product["item_id"];
		$orderdetails->qty=$product["qty"];
		$orderdetails->price=$product["price"];
		$orderdetails->vat=0;
		$orderdetails->discount=$product["discount"];
		$orderdetails->created_at=$now;
		$orderdetails->updated_at=$now;
		$orderdetails->save();
		
		// $stock=new Stocks();//1 for sales order      
		// $stock->product_id=$product["item_id"];
		// $stock->qty=-$product["qty"];
		// // $stock->transaction_type_id=1;//1 for sales, 2 
		// $stock->remark="Order";
		// $stock->save();
		}

   
    	echo json_encode(["status" => "success"]);
	}
	function checkout($data){
		$order=new Order();
		$order->id=$data["id"];
		$order->status_id=$data["status"];
		$order->chekedout=$data["checkout"];

		$order->checkout();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$order=new Order();
		$order->id=$data["id"];
		$order->table_id=$data["table_id"];
		$order->order_date=$data["order_date"];
		$order->order_total=$data["order_total"];
		$order->remark=$data["remark"];
		$order->status_id=$data["status_id"];
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];
		$order->created_at=$data["created_at"];
		$order->updated_at=$data["updated_at"];

		$order->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
