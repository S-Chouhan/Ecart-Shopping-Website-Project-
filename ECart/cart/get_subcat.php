<?php
include('includes/dbconnect.php');
$cat = $_POST["cat_id"];

	$sql="SELECT * from subcategories where category = '$cat'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
        { ?>
	<option value="<?php echo $row["subcategory"]; ?>"><?php echo $row["subcategory"]; ?></option>
<?php	}
?>