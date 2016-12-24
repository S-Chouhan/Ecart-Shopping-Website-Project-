<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="orders";
$title="Orders";
$back="view_orders.php";
$action="view_orders.php";
$edit="";
?><head>
<script type="text/javascript">
function conf()
{
	
	var r=confirm("Delete Product...?");
	if(r==true)
		{
		return true;
		}
	else
		{
		return false;
		}
}
</script>
</head>



<h4>View <?php echo $title; ?> :</h4>
        <?php
		
	    $sql="select * from $table ORDER by id DESC";
		$result=mysql_query($sql);
		echo mysql_error();
		echo "<table width='900' border='1' cellspacing='0' cellpadding='5' class='edit-table'>
              <tr>
                <th width='163' bgcolor='#565656'>ID</th>
                <th width='312' bgcolor='#565656'>Email</th>
                <th width='312' bgcolor='#565656'>Address ID</th>
				<th width='312' bgcolor='#565656'>Product ID</th>
				<th width='312' bgcolor='#565656'>Quantity</th>
				<th width='312' bgcolor='#565656'>Status</th>
				<th width='312' bgcolor='#565656'>Placed on</th>
				<th width='312' bgcolor='#565656'>Est Del Date</th>				
                <!--<th width='200' bgcolor='#565656'><p> Action</p>
                <p style='float:left; margin:0px 0px 0px 20px;'>Edit</p> <p style='float:right; margin:0px 17px 0px 0px;'>Delete</p></th>-->
              </tr>";
		while($row=mysql_fetch_array($result))
		{ ?>
			<tr> 
          	<td align="center"><?php echo $row['orderid']; ?> </td>
               <td align="center"><?php echo $row['email']; ?> </td>
               <td align="center"><?php echo $row['addressid']; ?> </td>
               <td align="center"><?php echo $row['productid']; ?> </td>
               <td align="center"><?php echo $row['quantity']; ?> </td>	
			   <td align="center"><?php echo $row['status']; ?> </td>			   
			   <td align="center"><?php echo $row['created']; ?> </td>
			   
			   <td align="center"><?php echo $row['delivery_date']; ?> </td>
	       <!--<td><a href='edit_product.php?id=<?php  echo $row['id']; ?>'>
	       <img src='images/icon_edit.gif' border='0' class='edit' title="Edit"/></a><form  onclick="return conf();" > -->
	       </form></td>
			</tr>
	<?php	}
	echo "</table>";
	
include('footer.php');
?>
<?php 
}
else
{
header('Location:index.php');		
}


?>

