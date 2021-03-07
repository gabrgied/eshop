<?php
session_start();
include "config.php";
include "db_struktura.php";
$_SESSION['ID']=$_COOKIE['ID'];
$vartotojo_id=$_SESSION['ID'];

$atsakymas1=$_SESSION['atsakymas1'];
$atsakymas2=$_SESSION['atsakymas2'];
$atsakymas3=$_SESSION['atsakymas3'];
$atsakymas4=$_SESSION['atsakymas4'];
$_SESSION['atsakymas5']=$_POST['atsakymas5'];
$atsakymas5=$_SESSION['atsakymas5'];


$vidurkis=($atsakymas1+$atsakymas2+$atsakymas3+$atsakymas4+$atsakymas5)/5;
$sqlvertinimas = "insert into vertinimas values ('$vartotojo_id','$vidurkis')";
    mysqli_query($con,$sqlvertinimas)
    or die(mysqli_connect_error());
?>
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Vertinimas</title>
    </head>
    <body>
<?php echo "<h3>Mūsų paslaugas vertinate balu ".$vidurkis." . Dėkojame už atsakymus.</h3>"?>
        <form action="vidus.php">
        <input type="submit" value="Grįžti į parduotuvę" />
        </form>
    </body>
</html>



