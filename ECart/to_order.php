<?php
session_start();

$addid=$_GET['add'];

if(!isset($_SESSION['user']))
	{
		header("Location:login.php");		
	}
else
	{
		include('includes/dbconnect.php');
		$user=$_SESSION['user'];
		$sql= mysql_query("SELECT max(id) FROM orders");
		$id=mysql_result($sql,0,0);
		$sql1= mysql_query("SELECT * FROM cart WHERE email='$user'");
		$count=mysql_num_rows($sql1);
		if($count>0)
		{	
			while($row=mysql_fetch_array($sql1))
			{	
			$productid		= 	$row['productid'];
			$image			= 	$row['image'];
			$email			=	$row['email'];
			$name			=	$row['name'];
			$quantity		=	$row['quantity'];
			$delivery_time	=	$row['delivery_time'];
			if($row['quantity'] == 1)
			{
			$total			=	$row['price'] + $row['delivery_charge'];
			}
			else
			{
			$total			=	$row['total_price'] + $row['delivery_charge'];
			}
			$price			=	$row['price'];
			$orderid		=	$id;
			$addressid		=	$addid;
			$status			=	'In Process';
			$delivery_time	=	date('d-m-Y', mktime(0, 0, 0, date('m'), date('d') + $delivery_time, date('Y')));
			$ins = mysql_query("INSERT into orders (orderid,email,addressid,productid,name,price,quantity,status,created,total_price,delivery_date,image) values ('$orderid','$email','$addressid','$productid','$name','$price','$quantity','$status',NOW(),'$total','$delivery_time','$image')");
			$del = mysql_query("DELETE FROM cart WHERE email = '$user' AND productid = '$productid'");
			}
		}
		if($ins>0)
		{							
									$mailprod = '';
									$mailer=mysql_query("SELECT * from orders where orderid='$orderid'");
									
									while($row1=mysql_fetch_array($mailer))
									{
									$temprod = $row1['name']  . "&nbsp;&nbsp;" .   $row1['quantity']  . "&nbsp;&nbsp;" .   $row1['total_price'] ;
									$mailprod = $mailprod . "<br>" . $temprod;
									}
									$to = $user;
									$subject = "Order Confirmation";
									$message = "
									<html>
									<head>
									<title>Order Confirmation</title>
									</head>
									<body>
									<p>Your order has been successfully placed. Please find the details below</p>
									<p>Order Details. - <Strong>$orderid</strong></p>
									<table border = '1'>
									<tr><td> Product </td><td> Quantity </td><td> Amount </td></tr>
									</table>";
									$message .=	$mailprod;
									$message .= "<h3>Happy Shopping</h3>
									<h4> This is an automated mail. Please donot Reply</h4>
									</body>
									</html>
									";
									// Always set content-type when sending HTML email
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

									// More headers
									$headers .= 'From: <support@ecart.com>' . "\r\n";

									mail($to,$subject,$message,$headers);
		?>
		<script>
			window.location='confirm_order.php?id=<?php echo $orderid ?>';
		</script>
		<?php
		}
		else
		{
			echo mysql_error();
		}
	}
?>