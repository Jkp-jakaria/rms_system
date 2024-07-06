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
                <small>Date: <?php echo date("d M Y") ?></small>
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
                <td><b><input type="text" id="txtTableId" value="<?php echo $_GET["table"]?>" size="5" readonly /> </b></td>
                </tr>
                <tr>
                  <td><b>Order ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php echo Order::get_last_id() + 1; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Order Date:</b></td>
                  <td><input type="text" id="txtOrderDate" value=<?php echo date("d-m-Y"); ?> /></td>
                </tr>
              </table>
            </div>
      
            <div class="col-sm-4 invoice-col">
              <img src="asset/dist/img/logo.png" alt="" style="margin-left: 7.8rem; margin-top: 10px; max-height: 95px; width: auto; border-radius: 50%;">
            </div>
            <!-- /.col -->

            <div class="col-sm-4 invoice-col text-end">
              <address>
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
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <?php
                      echo Product::html_select("cmbProduct");
                      ?>
                    </th>
                    <th><input type="text" id="txtPrice" /></th>
                    <th><input type="text" id="txtQty" /></th>
                    <th><input type="text" id="txtDiscount" /></th>
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
                  </tr>
                </thead>
                <tbody id="items">

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
              <textarea id="txtRemark"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">

              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal">0</td>
                    </tr>


                    <tr>
                      <th>Total:</th>
                      <td id="net-total">0</td>
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
              <a href="javascript:void(0)" onclick="window.print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<script>
  $(function() {

    const cart = new Cart("order");


    printCart();

//Show calander in textbox
$("#txtOrderDate").datepicker({
  dateFormat: 'dd-mm-yy'
});
$("#txtDueDate").datepicker({
  dateFormat: 'dd-mm-yy'
});
  

    $("#cmbProduct").on("change", function() {

       console.log("Ok");

       $.ajax({
          url: 'api/product/find',
          type: 'POST',
          data: {
            "id": $(this).val()
          },
          success: function(res) {
            let data = JSON.parse(res);
            let product=data.product;

            console.log(product);

            $("#txtPrice").val(product.price);
            $("#txtQty").val(1);
          }
        });



    }); //    



    $("#btnAddToCart").on("click", function() {

    let item_id = $("#cmbProduct").val();
    let name = $("#cmbProduct option:selected").text();

    let price = $("#txtPrice").val();
    let qty = $("#txtQty").val();
    let discount = $("#txtDiscount").val();

    let total_discount = discount * qty;
    let subtotal = price * qty - total_discount;

    let item = {
      "name": name,
      "item_id": item_id,
      "price": price,
      "qty": parseFloat(qty),
      "discount": discount,
      'total_discount': total_discount,
      "subtotal": subtotal
    };

    cart.save(item);

    printCart();

});

$("body").on("click", ".delete", function() {
  let id = $(this).data("id");
  cart.delItem(id)
  printCart();
});

$("#clearAll").on("click", function() {
  cart.clearCart();
  printCart();
});


  function printCart() {

        let orders = cart.getCart();
        let sn = 1;
        let $bill = "";
        let subtotal = 0;

        if (orders != null) {

          orders.forEach(function(item, i) {
            //console.log(item.name);
            subtotal += item.price * item.qty - item.discount;
            
            let $html = "<tr>";
            $html += "<td>";
            $html += sn;
            $html += "</td>";
            $html += "<td>";
            $html += item.name;
            $html += "</td>";
            $html += "<td data-field='price'>";
            $html += item.price;
            $html += "</td>";
            $html += "<td data-field='qty'>";
            $html += item.qty;
            $html += "</td>";
            $html += "<td data-field='discount'>";
            $html += item.discount;
            $html += "</td>";
            $html += "<td data-field='subtotal'>";
            $html += item.subtotal;
            $html += "</td>";
            $html += "<td>";
            $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
            $html += "</td>";
            $html += "</tr>";
            $bill += $html;
            sn++;
          });
        }

        $("#items").html($bill);

        //Order Summary
        $("#subtotal").html(subtotal);
        let tax = (subtotal * 0.05).toFixed(2);
        $("#tax").html(tax);
        $("#net-total").html(parseFloat(subtotal) + parseFloat(tax));
}



//Save into database table
$("#btnProcessOrder").on("click", function() {

  let table_id=$("#txtTableId").val();
  let order_date = $("#txtOrderDate").val();
  let discount = 0;
  let vat = 0;
  let remark = $("#txtRemark").val();
  let order_total = $("#net-total").text();

  let products = cart.getCart();

  $.ajax({
    url: 'api/order/save',
    type: 'POST',
    data: {
      "table_id":table_id,
      "order_date": order_date,
      "discount": discount,
      "vat": vat,
      "remark": remark,
      "order_total": order_total,
      "products": products
    },
    success: function(res) {
      console.log(res);
      cart.clearCart();
      $("#items").html("");
    }
  });//end ajax

});//end event



}); //end
</script>
<script src="js/cart.js"></script>