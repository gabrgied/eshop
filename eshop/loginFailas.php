<?php

include("config.php");
if(isset($_REQUEST['submit']))
{
$a = $_REQUEST['ID'];
$b = $_REQUEST['pass'];

$res = mysqli_query($con,"SELECT * FROM vartotojai WHERE ID='$a' AND slaptazodis='$b'");
$result=mysqli_fetch_array($res);
if($result)
{
	if(isset($_REQUEST["remember"]) && $_REQUEST["remember"]==1)
	setcookie('ID', $a,time()+4*60);
else
	setcookie('ID', $a);
	header("location:vidus.php");
	
	
}
else
{
	header("location:prisijungimas.php?err=1");
}
}