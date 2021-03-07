<?php
$con= mysqli_connect("localhost", "root", "", "eshop");

if (mysqli_connect_errno()) {
    printf("Nesukurtas ryšys: %s\n", mysqli_connect_error());
    exit ();
} else  {
    echo "";
}
?>

