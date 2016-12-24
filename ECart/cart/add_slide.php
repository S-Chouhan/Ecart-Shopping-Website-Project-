<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="home_slide";
$title="Slideshow";
$back="add_slide.php";
$action="add_slide.php";

?>

<h4>Add <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$sql="SELECT max(id) from $table";
			$result=mysql_query($sql);
			$value=mysql_result($result,0,0);
			$id=$value+1;
			$oname=$_FILES['image']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image']['tmp_name'];
			$name=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."slides/";
			$target_path = $path . $name;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			
			$title=$_REQUEST['title'];
			if($title!="")
			{
			$sql="INSERT INTO $table(title,image_url) values('$title','$name')";
			$result=mysql_query($sql);
		if($result>0)
		{ ?><div class="welcome">
            	<h3>Slide Successfully added..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Adding Slide Failed</h3>
                
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
			<li><h5>Title</h5><input type="text" name="title" style="width:290px;"></li>
			<li><h5>Image</h5><input type="file" name="image" id="image" style="width:290px;"></li>
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
