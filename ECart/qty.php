<?php
session_start();
include('includes/dbconnect.php');
    // do any authentication first, then add POST variable to session
    unset($_SESSION['prod']);
	unset($_SESSION['price']);
	unset($_SESSION['qty']);
	$user = $_SESSION['user'];
    $prod = $_POST['product'];
	$upri = $_POST['uprice']; //unit price
	$pri = $_POST['price']; //total price
	$qty = $_POST['qtyval'];
	if($pri == NaN)
	{
		$sql = mysql_query("SELECT * from products where productid='$prod'");
		while($row=mysql_fetch_array($sql))
		{
			$pri = $row['price'];
			print '<script type="text/javascript">'; 
			print 'alert("'.$pri.'")'; 
			//print 'window.location=product.php?id=$id';
			print '</script>';
		}
	}
	$sql = mysql_query("UPDATE cart set quantity='$qty',total_price='$pri' where email='$user' AND productid='$prod'");
	
	if($sql<1)
	{
	echo mysql_error();
	}
?>
