<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="home_slide";
$title="Slideshow Images";
$back="view_slide.php";
$action="edit_slide.php";

?>

<h4>Edit <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
            $title=$_REQUEST['title'];
			$tempid=$_REQUEST['id'];
			if(($tempid!="")&&($title!=""))
			{
			$sql="UPDATE $table set title='$title'";
			$logo=$_FILES['image']['name'];
			if($logo!="")
				{
			$sql1="SELECT * from $table where id='$tempid'";
			$result1=mysql_query($sql1);
			while($row=mysql_fetch_array($result1))
            {
				$value= $row['image_url'];
			}
			$file=$value;
			move_uploaded_file($_FILES['image']['tmp_name'],'slides/'.$file);
			$sql.=",image_url='$file'";
				}
			$sql.="where id='$tempid'";
			$result=mysql_query($sql);
			if($result>0)
				{
				 ?><div class="welcome">
            	<h3>Slide Successfully Edited..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Editing Slide Failed</h3>
                
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
			<form name="frmCategory" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data"> 
        	<ul class="add-about">
            <li><h5>Title</h5><input type="text" value="<?php echo $row['title']?>" name="title" style="width:290px;"></li>
			<li><img src="slides/<?php echo $row['image_url']?>" height="120px" width="120px">
			<h5>Image</h5><input type="file" name="image"  style="width:290px;"> </li>
			<input type="text" value=<?php echo $row['id']?> name="id" style="visibility: hidden" />
			<li><input name="add" type="submit" class="login-button" value="Edit"  style="margin-right:0px;"/></li>
            </ul>
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
