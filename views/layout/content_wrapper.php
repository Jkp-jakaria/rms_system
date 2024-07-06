  <!-- Content Wrapper. Contains page content -->
<style>
  .wrapper {
    background: #673818;
}

.content-wrapper {
    background-color: antiquewhite !important;
}

.content-header {
    background-color: antiquewhite;
}

.content-wrapper>.content {
    background-color: antiquewhite;
}

.bg-green-custom {
    background: #766a59;
}


.page-item .page-link {
  color: #673818;
  
}
.page-item.active .page-link {
    background-color: #673818;
    border-color: #673818;
}

ul.pagination input {
  display: none;
}
</style>
  
  <div class="content-wrapper">   
     
    <?php
      include("routes/route.php");
    ?>

  </div>
  <!-- /.content-wrapper -->