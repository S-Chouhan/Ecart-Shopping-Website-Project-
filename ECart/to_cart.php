<?php
session_start();

if(!isset($_SESSION['user']))
	{
		header("Location:login.php?id=$id");		
	}
else
	{
		include('includes/dbconnect.php');
		$tbl_name="cart"; // Table name

		$id=$_GET['id'];
		$user=$_SESSION['user'];
		$sql1= mysql_query("SELECT * FROM cart WHERE email='$user' and productid='$id'");
		$count=mysql_num_rows($sql1);

		if($count==0)
		{	
			$pname= mysql_query("SELECT * FROM products WHERE id='$id'");
			while($row=mysql_fetch_array($pname))
			{	
			$name			=	$row['name'];
			$image			=	$row['image_url'];
			$delivery_time	=	$row['delivery_time'];
			$delivery_charge=	$row['delivery_charge'];
			$price			=	$row['price'];
			$quantity		=	'1';
			}
			$sql="INSERT INTO cart (email,productid,name,quantity,delivery_charge,price,delivery_time,total_price,image) values ('$user','$id','$name','$quantity','$delivery_charge','$price','$delivery_time','$price','$image')";
			$result=mysql_query($sql);
			if($result>0)
			{
				$del = mysql_query("DELETE FROM wishlist WHERE email = '$user' AND productid = '$id'");
				$msg = "Product added to your cart";
				$page=$_GET['page'];
				header("location:$page?id=$id&bc=$msg");
			}
		}
		else 
			{ 
				$msg = "Product is already present in your cart";
				$page=$_GET['page'];
				header("location:$page?id=$id&bc=$msg");
			}

	}
?>