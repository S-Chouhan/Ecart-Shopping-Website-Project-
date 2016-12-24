<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="categories";
$title="category";
$back="view_category.php";
$action="edit_category.php";

?>

<h4>Edit <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$news=$_REQUEST['news'];
			$description=$_REQUEST['description'];
			$tempid=$_REQUEST['id'];
			if(($news!="")&&($description!=""))
			{
			$sql="UPDATE $table set name='$news',des='$description' where id='$tempid'";
			$result=mysql_query($sql);
			if($result>0)
				{
				 ?><div class="welcome">
            	<h3>Category Editing Successfull..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Editing Category Failed</h3>
                
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
			<li><h5>Category</h5><input type="text" name="news" value="<?php echo $row['name']?>" style="width:290px;"></li>
            <li><h5>Descriptions</h5><input type="text" name="description" value="<?php echo $row['des']?>" style="width:290px;"></li>
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
