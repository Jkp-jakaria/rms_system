<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tables</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<?php
global $db, $tx;
$result = $db->query("select t.id,t.name,t.capacity,p.name person,a.name availables,s.name status from {$tx}tables t,{$tx}persons p,{$tx}availables a,{$tx}status s where p.id=t.person_id and a.id=t.available_id and s.id=t.status_id");
?>
<!-- Main content -->
<section class="content p-3">
  <!-- Default box -->
  <div class="card p-4">
    <?php
    $html = "<div class='row'>";
    while ($table = $result->fetch_object()) {
      //$cardColor = $table->availables == 'Available' ? 'bg-success' : 'bg-danger';
      $cardColor = $table->availables;

      $order=$db->query("SELECT count(*) FROM {$tx}orders where table_id='$table->id' and chekedout=0");

      $count=$order->fetch_row();
      
      $tableImage = '';
      if ($table->capacity == 4) {
        $tableImage = 'img/table-small.png';
      } elseif ($table->capacity == 6) {
        $tableImage = 'img/table-big.png';
      } elseif ($table->capacity == 8) {
        $tableImage = 'img/table-big.png';
      } else {
        $tableImage = 'img/table-big.png';
      }
    
      if($count[0]>0){
        $cardColor="bg-green-custom";
      }else{
        $cardColor="bg-info-custom";
      }

 
      $html .= "<div class='col-sm-6 col-md-6 col-lg-4'>";
        $html .= "<div class='card text-white $cardColor mb-3' style=''>";
          $html .= "<div class='small-box-header table-name'>$table->name</div>";
          $html .= "<div class='card-body small-box'>";
            $html .= "<div class='row align-items-center'>";

              $html .= "<div class='order-2 order-sm-1 col-sm-7 col-lg-12 col-xl-7'>";
                $html .= "<div class='inner-text'>";
                  $html .= "<h5 class='card-title float-none'><strong>Table Status:</strong> $table->availables </h5>";
                  $html .= "<p class='card-text my-2'><strong>Food Status:</strong> $table->status</p>";
                  $html .= "<p class='card-text'><strong>On Duty:</strong> $table->person</p>";
                $html .= "</div>";
              $html .= "</div>";

              $html .= "<div class='order-1 order-sm-2 col-sm-5 d-lg-none d-xl-block col-xl-5'>";
                $html .= "<div class='inner-img'>";
                  $html .= "<img class='img-fluid' src='img/table.png' alt=''/>";
                $html .= "</div>";
              $html .= "</div>";

            $html .= "</div>";
          $html .= "</div>";
          $html .= "<div class='small-box-footer'>";
            $html .= "<a href='create-order?table=$table->id' class=''>Create Order<i class='fas fa-arrow-circle-right'></i></a>";
            $html .= "<a href='ordersbytable?table=$table->id' class=''>View Order ($count[0])<i class='fas fa-arrow-circle-right'></i></a>";
          $html .= "</div>";
        $html .= "</div>";
      $html .= "</div>";
    }
    $html .= "</div>";
    echo $html;
    ?>

  </div>

</section>
<!-- /.content -->