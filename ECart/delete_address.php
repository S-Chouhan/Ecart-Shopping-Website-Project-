<?php session_start();

 if(isset($_SESSION['user']))
{
include('includes/dbconnect.php');
$id=$_GET['id'];
$back="myaccount.php";
$table="addresses";
$title="Address";
?>

        <?php
		$sql="DELETE FROM $table WHERE id='$id'";
		$result=mysql_query($sql);
		if($result>0)
		{ ?>
        <script>
		window.location="myaccount.php";

			</script>
            <?php
		}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Failed to delete address </h3>
                
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
