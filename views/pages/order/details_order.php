<?php
if(isset($_POST["btnDetails"])){
	$order=Order::find($_POST["txtId"]);
}
?>
<style>
  #cmbCustomer {
    padding: 5px;
  }

  .invoice {
    border-top: 4px solid #fff !important;
    border-bottom: 4px solid #fff !important;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Order</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Create Order</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12 text-left">
              <h4>
                <small>Date: <?php echo date('Y-m-d', strtotime($order->order_date)); ?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <table>
                <tr>
                <td><b>Table ID:</b></td>
                <td><b><input type="text" id="txtTableId" value="<?php  echo $order->table_id;?>" size="5" readonly /> </b></td>
                </tr>
                <tr>
                  <td><b>Order ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php  echo $order->id;?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Order Date:</b></td>
                  <td><input type="text" id="txtOrderDate" value=<?php echo $order->order_date; ?> /></td>
                </tr>
              </table>
            </div>

            <div class="col-sm-4 invoice-col">
              <img src="asset/dist/img/logo.png" alt="" style="margin-left: 7.8rem; margin-top: 10px; max-height: 95px; width: auto; border-radius: 50%;">
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col text-end">
             <strong style="color: #d56f27;">CrimsonCup</strong><br>
                House:12, Road:1<br>
                Gulshan-1, Dhaka<br>
                01642527454<br>
                jkp.jakaria@gmail.com
              </address>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $order_details= OrderDetail::all_by_order_id($order->id);
                  $i=1;
                  $sub_total=0;
                  foreach($order_details as $line){
                  $line_total=$line->price*$line->qty-$line->discount;
                  $sub_total+=$line_total;

                  echo "<tr>
                  <th>".$i++."</th>
                  <td>{$line->name}</td>
                  <td>{$line->price}</td>
                  <td>{$line->qty}</td>                     
                  <td>{$line->discount}</td>						   
                  <td>{$line_total}</td>
                  </tr>";
                  }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <strong>Remark</strong><br>
              <textarea id="txtRemark"><?php echo $order->remark;?></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal"><?php echo $sub_total;?></td></td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td id="net-total"><?php echo $sub_total;?></td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a style="background-color: #e73374; border-color: #e73374;" href="javascript:void(0)" onclick="window.print()" rel="noopener" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->