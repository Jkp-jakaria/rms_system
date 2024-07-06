<style>

/* .login{
  border: 1px solid #fff;
  box-shadow: 0 4px 42px 0 rgba(0, 0, 0, 0.14), 0 3px 15px -2px rgb(255 251 250) !important;
} */
</style>


<?php session_start();  
  require_once("configs/db_config.php");
  $base_url="cpanel";
  //require_once("library/classes/system_log.class.php");
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
     $result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");

     if($db->affected_rows==1){
         
         list($uid,$_username,$role)=$result->fetch_row();
         $_SESSION["uid"]=$uid;
         $_SESSION["uname"]=$_username;
         $_SESSION["urole"]=$role;

        //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

         header("location:home");
        

     }else{
      
        $error="Password or Username incorrect";
       
     }  
  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CrimsonCup</title>
  <link rel="icon" href="asset/dist/img/logo.png" type="image/icon type">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset//dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/loggin.css">
</head>
<?php 
$bgimg=("img/4thbg.jpg")
?>
<body class="hold-transition login-page" style="background-image: url('<?php echo $bgimg ?>');background-repeat: no-repeat; width:auto ">
<!-- My Form Start-->
<div class="login">
      <!-- <div class="login-triangle"></div> -->
      <!-- <h2 class="login-header" style="background-color: #673818">Sign in to sip your Cup</h2> -->
      <form class="login-container" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >
        <p>
          <input type="text" name="txtUsername" id="txtUsername" placeholder="User name" style=" background: transparent; border-color: #673818; color: aliceblue;">
        </p>
        <p>
          <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" style="background: transparent; border-color: #673818; color: aliceblue;">
        </p>
        <p>
          <input type="submit" name="btnSignIn" value="Log in" style="background: transparent; border-color: #673818;">
        </p>
      </form>
    </div>
  <!-- My Form End-->

<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<script>
$(function () {

rememberStatus();

$('#txtUsername').on("input",function(){
  remember();
});

$('#txtPassword').on("input",function(){
  remember();
});

$('#chkRemember').click(function () {
  remember();
});

function remember(){
  if ($('#chkRemember').is(':checked')) {
        // save username and password
        localStorage.username = $('#txtUsername').val().trim();
        localStorage.pass = $('#txtPassword').val().trim();
        localStorage.chkbox = $('#chkRemember').val();
    } else {
        localStorage.username = '';
        localStorage.pass = '';
        localStorage.chkbox = '';
    }
}

function rememberStatus(){
    if (localStorage.chkbox && localStorage.chkbox != '') {
      $('#chkRemember').attr('checked', 'checked');
      $('#txtUsername').val(localStorage.username);
      $('#txtPassword').val(localStorage.pass);
    }else {
      $('#chkRemember').removeAttr('checked');
      $('#txtUsername').val('admin');
      $('#txtPassword').val('111111');
   }
}

});
  </script>
</body>
</html>
