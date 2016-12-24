<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="subcategories";
$title="Subcategory";
$back="view_subcategory.php";
$action="edit_subcategory.php";

?>

<h4>Edit <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$news=$_REQUEST['category'];
			$description=$_REQUEST['subcategory'];
			$tempid=$_REQUEST['id'];
			if(($news!="")&&($description!=""))
			{
			$sql="UPDATE $table set category='$news',subcategory='$description' where id='$tempid'";
			$result=mysql_query($sql);
			if($result>0)
				{
				 ?><div class="welcome">
            	<h3>Subcategory Editing Successfull..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Editing Subcategory Failed</h3>
                
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	
		}
			}
			else
			{
				?>
        	<div class="welcome">
            	<h3>Please Enter all the fields </h3>
                
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	
			}
		
	}
	else
	{
			?>
        	<!--Add Page Starts-->
        	<form name="frmCategory" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data"> 
        	<ul class="add-about">
            <?php
			$id=$_GET['id'];
			$sql="SELECT * from $table where id='$id'";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
            {
			?>
			<li><h5>Category</h5>
			<select name="category">
			<option value="<?php echo $row['category']?>"><?php echo $row['category']?></option>
			<?php
			$sql1="SELECT * from categories";
			$result1=mysql_query($sql1);
			while($row1=mysql_fetch_array($result1))
            {
			?>
			<option value ="<?php echo $row1['name']?>"><?php echo $row1['name']?></option>
			<?php } ?>
			</select>
			</li>
            <li><h5>Subcategory</h5><input type="text" name="subcategory" value="<?php echo $row['subcategory']?>" style="width:290px;"></li>
            <input type="text" value=<?php echo $row['id']?> name="id" style="visibility: hidden" />
			<li><input name="add" type="submit" class="login-button" value="Edit"  style="margin-right:0px;"/></li>
            </ul>
            </form>
            <?php }}?>
            <!--Add Page Ends-->

<?php
include('footer.php');
?><?php 
}
else
{
header('Location:index.php');		
}


?>
