<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="subcategories";
$title="Subcategory";
$back="add_subcategory.php";
$action="add_subcategory.php";

?>

<h4>Add <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$news=$_REQUEST['category'];
			$description=$_REQUEST['subcat'];
			if(($news!="")&&($description!=""))
			{
			$sql="INSERT INTO $table(category,subcategory) values('$news','$description')";
			$result=mysql_query($sql);
				if($result>0)
					{ ?><div class="welcome">
							<h3>Subcategory added Successfully..</h3>
							<p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
						</div>
			<?php	}
				else
					{
						echo mysql_error();?>
						<div class="welcome">
							<h3>Adding Subcategory Failed</h3>					
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
			<li><h5>Category</h5>
			<select name="category">
			<?php
			$sql="SELECT * from categories";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
            {
			?>
			<option value ="<?php echo $row['name']?>"><?php echo $row['name']?></option>
			<?php } ?>
			</select>
			</li>
			<li><h5>Subcategory</h5><input type="text" name="subcat" style="width:290px;"></li>
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
