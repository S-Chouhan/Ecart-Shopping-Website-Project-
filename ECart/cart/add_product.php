<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('header.php');
include('includes/dbconnect.php');
$table="products";
$title="Products";
$back="add_product.php";
$action="add_product.php";

?>

<h4>Add <?php echo $title;?> :</h4>
        <?php
		
		if(isset($_REQUEST['add']))
		{
			$name = '';
			$name2 = '';
			$name3 = '';
			$name4 = '';
			$name5 = '';
			$name6 = '';
			$sql="SELECT max(id) from $table";
			$result=mysql_query($sql);
			$value=mysql_result($result,0,0);
			$sql1=mysql_query("SELECT * from $table");
			$count=mysql_num_rows($sql1);
			$value = ( 6 * $count ) + 1;
			if(!empty($_FILES['image1']['name']))
			{
			//image1
			$id=$value+1;
			$oname=$_FILES['image1']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image1']['tmp_name'];
			$name=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."product/";
			$target_path = $path . $name;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			}
			if(!empty($_FILES['image2']['name']))
			{
			//image2
			$id=$value+2;
			$oname=$_FILES['image2']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image2']['tmp_name'];
			$name2=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."product/";
			$target_path = $path . $name2;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			}
			if(!empty($_FILES['image3']['name']))
			{
			//image3
			$id=$value+3;
			$oname=$_FILES['image3']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image3']['tmp_name'];
			$name3=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."product/";
			$target_path = $path . $name3;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			}
			if(!empty($_FILES['image4']['name']))
			{
			//image4
			$id=$value+4;
			$oname=$_FILES['image4']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image4']['tmp_name'];
			$name4=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."product/";
			$target_path = $path . $name4;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			}
			if(!empty($_FILES['image5']['name']))
			{
			//image5
			$id=$value+5;
			$oname=$_FILES['image5']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image5']['tmp_name'];
			$name5=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."product/";
			$target_path = $path . $name5;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			}
			if(!empty($_FILES['image6']['name']))
			{
			//image6
			$id=$value+6;
			$oname=$_FILES['image6']['name'];
			$pos = strrpos($oname, ".");
                        $extension=substr($oname,$pos+1);
                        $tn = $_FILES['image6']['tmp_name'];
			$name6=$id.'.'.$extension;
			$path = getcwd().DIRECTORY_SEPARATOR."product/";
			$target_path = $path . $name6;
			if(@move_uploaded_file($tn,$target_path)) {
      			$imageupload = 1;
   				}
			}	
			$pname=$_REQUEST['name'];
			$quantity=$_REQUEST['quantity'];
			$price=$_REQUEST['price'];
			$cat=$_REQUEST['category'];
			$subcat=$_REQUEST['subcategory'];			
			$date=$_REQUEST['date'];
			$spec=$_REQUEST['spec'];
			$charge=$_REQUEST['charge'];
			if(($name!="")&&($spec!="")&&($quantity!="")&&($price!="")&&($cat!="")&&($date!="")&&($pname!="")&&($charge!=""))
			{
			$sql="INSERT INTO $table(name,category,subcategory,quantity,price,image_url,image_url2,image_url3,image_url4,image_url5,image_url6,specifications,delivery_time,delivery_charge) values('$pname','$cat','$subcat','$quantity','$price','$name','$name2','$name3','$name4','$name5','$name6','$spec','$date','$charge')";
			$result=mysql_query($sql);
		if($result>0)
		{ ?><div class="welcome">
            	<h3>Product Successfully added..</h3>
                <p>Click Here to go <a href="<?php echo $back; ?>">BACK</a></p>
            </div>
	<?php	}
		else
		{
			echo mysql_error();?>
        	<div class="welcome">
            	<h3>Adding Product Failed</h3>
                
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
            <li><h5>Name</h5><input type="text" name="name" style="width:290px;"></li>
			<li><h5>Category</h5>
			<select name="category" id="category" onChange="getSubcat(this.value);">
			<option value ="">Select Category</option>
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
			<li><h5>Sub Category</h5>
			<select name="subcategory" id="subcat">
			<option value ="">Select Subcategory</option>
			</select>
			</li>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcat").html(data);
	}
	});
}
</script>
			<li><h5>Image1</h5><input type="file" name="image1" id="image1" style="width:290px;"></li>
			<li><h5>Image2</h5><input type="file" name="image2" id="image2" style="width:290px;"></li>
			<li><h5>Image3</h5><input type="file" name="image3" id="image3" style="width:290px;"></li>
			<li><h5>Image4</h5><input type="file" name="image4" id="image4" style="width:290px;"></li>
			<li><h5>Image5</h5><input type="file" name="image5" id="image5" style="width:290px;"></li>
			<li><h5>Image6</h5><input type="file" name="image6" id="image6" style="width:290px;"></li>
			<li><h5>Quantity</h5><input type="number" name="quantity" style="width:290px;"></li>
            <li><h5>Price</h5><input type="text" name="price" style="width:290px;"></li>
			<li><h5>Delivery Charge</h5><input type="text" name="charge" style="width:290px;"></li>			
			<li><h5>Days need to Deliver</h5><input type="number" name="date" style="width:290px;"></li>
            <li><h5>Specifications</h5><textarea class="ckeditor" cols="50" id="spec" name="spec" rows="2" ></textarea></li>
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
