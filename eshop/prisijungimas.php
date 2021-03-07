<?php
session_start();
include("config.php");
include ("loginFailas.php");
include ("db_struktura.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <form action="loginFailas.php" method="POST">
            Vartotojo ID: <input type="number" name="ID" value=""><br>
            Slaptažodis: <input type="password" name="pass" value=""><br>
          <input class="button" type="submit" name="submit" value="Pateikti">
          <?php 
if(isset($_REQUEST["err"]))
	$msg="Neteisingas vartotojo vardas arba slaptažodis";
?>
<p style="color:red;">
<?php if(isset($msg))
{	
echo $msg;
}


?>
</p>
        </form>
        </div>
    </body>
</html>