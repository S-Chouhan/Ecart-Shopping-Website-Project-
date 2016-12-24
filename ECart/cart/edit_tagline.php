<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="tagline";
$title="Tagline";
$back="edit_tagline.php";
$action="edit_tagline.php";
?>

<h4>Edit <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$newsletter=$_REQUEST['newsletter'];
			$title=$_REQUEST['title'];
			if(($newsletter!="")&&($title))
			{
			$sql="UPDATE $table set title='$title', tagline='$newsletter' where id='1'";
			$result=mysql_query($sql);
			if($result>0)
				{
				 ?><div class="welcome">
            	<h3>Tagline Editing Successfull..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Editing tagline Failed</h3>
                
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
			$sql="SELECT * from $table";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
            {
			?>
			<li><h5>Title</h5><input type="text" name="title" value="<?php echo $row['title']?>" style="width:290px;"></li>
			<li><h5></h5><textarea class="ckeditor" cols="80" id="newsletter" name="newsletter" rows="6" ><?php echo $row['tagline']?></textarea></li>
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
