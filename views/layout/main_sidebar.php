  <!-- Main Sidebar Container -->
<style>
  aside.main-sidebar {
    margin:0;
    width: 220px;
    border-radius: 0;
    background: #673818 !important;
}

[class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus {
    background-image: linear-gradient(195deg, #d5bdaf 0%, #d5bdaf 100%) !important;
    color: #fff;
}

.user-panel .info a {
    color: #f5f5f5;
}

li.nav-item {
    list-style: none;
}
[class*=sidebar-dark] .user-panel {
    padding: 10px;
}
</style>

  <aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="asset/dist/img/logo.png" alt="Resturant Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">CrimsonCup</span>
    </a>

    <div>
    <li class="nav-item">
        <div class="user-panel d-flex">
            <!-- <div class="image">
                <?php
                global $db, $tx;
                $userName = $_SESSION["uname"];
                $query = "SELECT photo FROM {$tx}users WHERE username = '$userName'";
                $result = $db->query($query);
                
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $imagePath = 'img/' . $row['photo'];
                } else {
                    $imagePath = 'img/user.png';
                }
                ?>
                <img src="<?php echo $imagePath; ?>" class="img-circle elevation-1" alt="User Image">
            </div> -->
            <div class="image">
              <img src="asset/dist/img/userimg.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION["uname"], " - ", $_SESSION["urole"] ?></a>
            </div>
        </div>
    </li>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills w-100 nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->   

         
          
          <?php
              include("menus/menu.php");
          ?>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
