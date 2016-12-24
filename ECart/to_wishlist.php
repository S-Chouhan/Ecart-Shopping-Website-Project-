<?php
session_start();
$id=$_GET['id'];
if(!isset($_SESSION['user']))
	{
		header("Location:login.php");		
	}
else
	{
		include('includes/dbconnect.php');
		$tbl_name="wishlist"; // Table name

		
		$user=$_SESSION['user'];
		$sql1= mysql_query("SELECT * FROM $tbl_name WHERE email='$user' and productid='$id'");
		$count=mysql_num_rows($sql1);

		if($count==0)
		{
			$sql="INSERT INTO $tbl_name (email,productid) values ('$user','$id')";
			$result=mysql_query($sql);

			if($result>0)
				{
					$msg = "Product added to your wishlist";
					$page=$_GET['page'];
					header("location:$page?id=$id&bc=$msg");
				}
		}
		else 
			{ 
				$msg = "Product is already present in your wishlist";
				$page=$_GET['page'];
				header("location:$page?id=$id&bc=$msg");
			}

	}
?>