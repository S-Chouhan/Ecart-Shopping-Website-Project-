<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="categories";
$title="Category";
$back="add_category.php";
$action="add_category.php";

?>

<h4>Add <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$news=$_REQUEST['news'];
			$description=$_REQUEST['description'];
			if(($news!="")&&($description!=""))
			{
			$sql="INSERT INTO $table(name,des) values('$news','$description')";
			$result=mysql_query($sql);
				if($result>0)
					{ ?><div class="welcome">
							<h3>Category added Successfully..</h3>
							<p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
						</div>
			<?php	}
				else
					{
						echo mysql_error();?>
						<div class="welcome">
							<h3>Adding Category Failed</h3>					
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
			<li><h5>Category</h5><input type="text" name="news" style="width:290px;"></li>
            <li><h5>Description</h5><input type="text" name="description" style="width:290px;"></li>
			<li><input name="add" type="submit" class="login-button" value="Add"  style="margin-right:0px;"/></li>
            </ul>
            </form>
  <?php }?>
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
