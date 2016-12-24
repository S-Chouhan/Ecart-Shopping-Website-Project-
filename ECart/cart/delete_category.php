<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('includes/dbconnect.php');
$id=$_GET['id'];
$back="view_category.php";
$table="categories";
$title="category";
?>

<h4>Delete <?php echo $title; ?>:</h4>
        <?php
		$sql="DELETE FROM $table WHERE id='$id'";
		$result=mysql_query($sql);
		if($result>0)
		{ ?>
        <script>
		window.location="view_category.php";

			</script>
            <?php
		}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Failed to delete category </h3>
                
                <p>Click Here to go <a href="<?php echo $back;?>">BACK</a></p>
            </div>
	<?php	
		}
?><?php 
}
else
{
header('Location:index.php');		
}


?>
