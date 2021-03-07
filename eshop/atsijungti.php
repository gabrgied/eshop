 <?php
include("config.php");
include ("loginFailas.php");
include ("vidus.php");

setcookie('ID', '', time()-100);
unset($_COOKIE['ID']);
session_unset();
 if(isset($_POST['uzsakymas'])){
    reset($_SESSION['cart_item']);
   }  
header("location:index.php");
?>

