<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="products";
$title="Product";
$back="view_product.php";
$action="edit_product.php";

?>

<h4>Edit <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$file = '';
			$file2 = '';
			$file3 = '';
			$file4 = '';
			$file5 = '';
			$file6 = '';
			$tempid=$_REQUEST['id'];
			$pname=$_REQUEST['name'];
			$quantity=$_REQUEST['quantity'];
			$price=$_REQUEST['price'];
			$cat=$_REQUEST['category'];
			$date=$_REQUEST['date'];
			$spec=$_REQUEST['spec'];
			$charge=$_REQUEST['charge'];
			if(($spec!="")&&($quantity!="")&&($price!="")&&($cat!="")&&($date!="")&&($pname!="")&&($charge!=""))
			{
			$sql="UPDATE $table set name='$pname',specifications='$spec',quantity='$quantity',price='$price',category='$cat',delivery_time='$date',delivery_charge='$charge'";
			$logo=$_FILES['image1']['name'];
			if($logo!="")
				{
			$sql1="SELECT * from $table where id='$tempid'";
			$result1=mysql_query($sql1);
			while($row=mysql_fetch_array($result1))
            {
				$value= $row['image_url'];
				$value2= $row['image_url2'];
				$value3= $row['image_url3'];
				$value4= $row['image_url4'];
				$value5= $row['image_url5'];
				$value6= $row['image_url6'];
			}
			$file=$value;
			$file2=$value2;
			$file3=$value3;
			$file4=$value4;
			$file5=$value5;
			$file6=$value6;
			move_uploaded_file($_FILES['image1']['tmp_name'],'product/'.$file);
			move_uploaded_file($_FILES['image2']['tmp_name'],'product/'.$file2);
			move_uploaded_file($_FILES['image3']['tmp_name'],'product/'.$file3);
			move_uploaded_file($_FILES['image4']['tmp_name'],'product/'.$file4);
			move_uploaded_file($_FILES['image5']['tmp_name'],'product/'.$file5);
			move_uploaded_file($_FILES['image6']['tmp_name'],'product/'.$file6);
			$sql.=",image_url='$file',image_url2='$file2',image_url3='$file3',image_url4='$file4',image_url5='$file5',image_url6='$file6'";
				}
			$sql.="where id='$tempid'";
			$result=mysql_query($sql);
			if($result>0)
				{
				 ?><div class="welcome">
            	<h3>Product Successfully Edited..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Editing Product Failed</h3>
                
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
			<li><h5>Name</h5><input type="text" name="name" value="<?php echo $row['name']?>" style="width:290px;"></li>
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
			
			<li><h5>Image 1</h5><input type="file" name="image1" id="image" style="width:290px;"></li>
			<li><img src="product/<?php echo $row['image_url']?>" height="120px" width="120px">
			<li><h5>Image 2</h5><input type="file" name="image2" id="image" style="width:290px;"></li>
			<li><img src="product/<?php echo $row['image_url2']?>" height="120px" width="120px">
			<li><h5>Image 3</h5><input type="file" name="image3" id="image" style="width:290px;"></li>
			<li><img src="product/<?php echo $row['image_url3']?>" height="120px" width="120px">
			<li><h5>Image 4</h5><input type="file" name="image4" id="image" style="width:290px;"></li>			
			<li><img src="product/<?php echo $row['image_url4']?>" height="120px" width="120px">
			<li><h5>Image 5</h5><input type="file" name="image5" id="image" style="width:290px;"></li>
			<li><img src="product/<?php echo $row['image_url5']?>" height="120px" width="120px">
			<li><h5>Image 6</h5><input type="file" name="image6" id="image" style="width:290px;"></li>						
			<li><img src="product/<?php echo $row['image_url6']?>" height="120px" width="120px">
			<li><h5>Quantity</h5><input type="number" value=<?php echo $row['quantity']?> name="quantity" style="width:290px;"></li>
            <li><h5>Price</h5><input type="text" value="<?php echo $row['price']?>" name="price" style="width:290px;"></li>			
            <li><h5>Delivery Charge</h5><input type="text" value="<?php echo $row['delivery_charge']?>" name="charge" style="width:290px;"></li>						
			<li><h5>Days need to Deliver</h5><input type="number" value="<?php echo $row['delivery_time']?>" name="date" style="width:290px;"></li>
            <li><h5>Specifications</h5><textarea class="ckeditor" cols="50" id="spec" name="spec" rows="2" ><?php echo $row['specifications']?></textarea></li>
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
