<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="categories";
$title="Category";
$back="view_category.php";
$action="view_category.php";
$edit="";
?><head>
<script type="text/javascript">
function conf()
{
	
	var r=confirm("Delete Category...?");
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
		echo "<table width='820' border='1' cellspacing='0' cellpadding='5' class='edit-table'>
              <tr>
                <th width='163' bgcolor='#565656'>ID</th>
                <th width='312' bgcolor='#565656'>Category</th>
				<th width='312' bgcolor='#565656'>Description</th>
                <th width='308' bgcolor='#565656'><p> Action</p>
                <p style='float:left; margin:0px 0px 0px 20px;'>Edit</p> <p style='float:right; margin:0px 17px 0px 0px;'>Delete</p></th>
              </tr>";
		while($row=mysql_fetch_array($result))
		{ ?>
			<tr> 
          	<td align="center"><?php echo $row['id']; ?> </td>
            <td align="center"><?php echo $row['name']; ?> </td>
            <td align="center"><?php echo $row['des']; ?> </td>
			<td><a href='edit_category.php?id=<?php  echo $row['id']; ?>'><img src='images/icon_edit.gif' border='0' class='edit' /></a>
			<form  onclick="return conf();" > 
			<a href='delete_category.php?id=<?php echo $row['id']; ?>'><img src='images/icon_delete.gif' border='0' class='delete' /></a></form></td>
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

