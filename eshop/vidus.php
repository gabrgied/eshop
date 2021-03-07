<?<?php
session_start();
include "config.php";
include "db_struktura.php";
include "loginFailas.php";
$_SESSION['ID']=$_COOKIE['ID'];

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["kiekis"])) {
			$pid=$_GET["pid"];
			$result=mysqli_query($con,"SELECT * FROM produktai WHERE id='$pid'");
                       
	          while($productByCode=mysqli_fetch_array($result)){
			$itemArray = array($productByCode["kodas"]=>array('aprasymas'=>$productByCode["aprasymas"], 'kategorija'=>$productByCode["kategorija"], 'kodas'=>$productByCode["kodas"], 'kiekis'=>$_POST["kiekis"], 'kaina'=>$productByCode["kaina"], 'nuotrauka'=>$productByCode["nuotrauka"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["kodas"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["kodas"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["kiekis"])) {
									$_SESSION["cart_item"][$k]["kiekis"] = 0;
								}
								$_SESSION["cart_item"][$k]["kiekis"] += $_POST["kiekis"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	}
	break;

	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["kodas"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	

        case "finished":
         if(isset($_REQUEST['submit'])){
    $user_id =$_SESSION['ID'];
    $json = json_encode($_SESSION['cart_item']);
    $sqlUser = "insert into cart_userid (user_id, date, cartinfo) values ('$user_id', NOW(),'{$json}')"; // i db patalpinam vartotojo ir jo uzsakymo (masyvo pavidalu) info
    mysqli_query($con,$sqlUser) or die(mysqli_connect_error());
         }  
    header("location:vidus.php?action=empty");
            break;
            
        case "atsijungti":
            if (isset($_REQUEST['atsijungti'])){  
        $del = "DELETE FROM cart_userid ORDER BY uzsakymo_id DESC LIMIT 1"; //istrinam duomenis is db
        $sqlDel = (mysqli_query($con, $del));
        if (!$del){
            echo "Error MySQLI QUERY: ".mysqli_error($con);
            die();
        }
        else
        {
            setcookie('ID', '', time()-100);
unset($_COOKIE['ID']);
session_unset();
 if(isset($_POST['uzsakymas'])){
    reset($_SESSION['cart_item']);
 }
            header("location:index.php");    
        break;
        }
        }
}
}

?>
<HTML>
<HEAD>
<TITLE>Parduotuvė</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<div class="txt-heading">
<form action="vidus.php?action=atsijungti" method="POST">
<input type="hidden" name="atsijungti" value="">
<input type="hidden" name="uzsakymas" value="<?php echo $_SESSION['cart_item'] ?>" />
<input type="submit" class="btnAddAction" style="color: red; font-size: 18px;" name="submit" value="Atsijungti">
</form>
</div> 

<div id="shopping-cart">
<div class="txt-heading">Prekių krepšelis</div>

<a id="btnEmpty" href="vidus.php?action=empty">Išvalyti krepšelį</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Aprašymas</th>
<th style="text-align:left;">Kodas</th>
<th style="text-align:left;">Kategorija</th>
<th style="text-align:right;" width="5%">Kiekis</th>
<th style="text-align:right;" width="10%">Vieneto kaina</th>
<th style="text-align:right;" width="10%">Kaina</th>
<th style="text-align:center;" width="5%">Pašalinti</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["kiekis"]*$item["kaina"];
		?>
				<tr>
				<td><img src="<?php echo $item["nuotrauka"]; ?>" class="cart-item-image" /><?php echo $item["aprasymas"]; ?></td>
				<td><?php echo $item["kodas"]; ?></td>
                                <td><?php echo $item["kategorija"]; ?></td>
				<td style="text-align:right;"><?php echo $item["kiekis"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["kaina"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                            	<td style="text-align:center;"><a href="vidus.php?action=remove&kodas=<?php echo $item["kodas"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Pašalinti prekę" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["kiekis"];
				$total_price += ($item["kaina"]*$item["kiekis"]);
		}
		?>

<tr>
<td colspan="2" align="right">Iš viso:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="3"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td>
<?php if(isset($_SESSION["cart_item"])){ ?>
<div class="txt-heading">
<form method="post" action="vidus.php?action=finished"> 
<input type="hidden" name="baigti" value="1" />
<input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>" />
<input type="hidden" name="uzsakymas" value="<?php echo $_SESSION['cart_item'] ?>" />
<p><input class="btnAddAction" style="color: blue" name="submit" type="submit" value="Baigti" /></p>
</form>
</div> 
<?php } ?></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>

<div class="no-records">Krepšelis tuščias</div>
<?php 
}
?>
</div> 

<div id="product-grid">
	<div class="txt-heading">Prekės</div>
	<?php
	$product= mysqli_query($con,"SELECT * FROM produktai ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>
		<div class="product-item">
<form method="post" action="vidus.php?action=add&pid=<?php echo $row["id"]; ?>">
<div class="product-image"><img src="<?php echo $row["nuotrauka"]; ?>"></div>
<div class="product-tile-footer">
<div class="product-title"><?php echo $row["aprasymas"]; ?></div>
<div class="product-title"><?php echo $row["kategorija"]; ?></div>
<div class="product-price"><?php echo "$".$row["kaina"]; ?></div>
<div class="cart-action"><input type="text" class="product-quantity" name="kiekis" value="1" size="2" /><input type="submit" value="Pridėti į krepšelį" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "Nėra įrašų.";
	}
	?>
</div>
    <div>
        <h2>Atsakykite į kelis klausimus ir padėkite mums tobulėti</h2>
        <form action="klausimas1.php">
        <input type="submit" value="Atlikti" />
        </form>
        </div>
</div>
</BODY>
</HTML>
