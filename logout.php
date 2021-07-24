<?php if(!isset($_SESSION['loggedin'])){
   header("Location: home.php");
   exit();
}
?>
<?php 
include("function.inc.php") ;
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
unset($_SESSION["username"]);
redirect('home.php');
?>