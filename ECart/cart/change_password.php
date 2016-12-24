<?php session_start();

 if(isset($_SESSION['login_user']))
{
include('includes/dbconnect.php');
include('header.php');
$uname=$_SESSION['login_user'];
if(isset($_REQUEST['change']))
{
	$cpass=$_POST['cpassword'];
	$npass=$_POST['npassword'];
	$cnpass=$_POST['cnpassword'];
	if($npass==$cnpass)
	{
		$sql="SELECT * FROM  admin where username='admin' and password='$cpass'";
		$result=mysql_query($sql);
		if($row=mysql_fetch_array($result));
			{
				$cpass1=$row['password'];
			}
		if($cpass1==$cpass)
		  {
		    $sql1="UPDATE admin set password='$npass' where username='admin'";
	 		$result1=mysql_query($sql1);
				?><script>
        			window.location="change_password.php?attempt=Password Changed successfully";
		        </script><?php 	
		   }
		else
		   {
				?><script>
        		window.location="change_password.php?attempt=Invalid current password";
        		</script><?php 	
			}
	 }
	else
	 {
	 			?><script>
        		window.location="change_password.php?attempt=Passwords Didnt Match";
        		</script><?php
	 }
}
else
{
?>
<script>
function validate()
{
	var error="";
	document.getElementById("error1").innerHTML="";
	
	if((document.getElementById("npass").value=="")||(document.getElementById("cnpass").value=="")||(document.getElementById("cpass").value==""))
	{
		error="Please Fill All the Details";
	}
	else if(document.getElementById("npass").value!=document.getElementById("cnpass").value)
	{
		error="New Password and Current New Password didn't match";
	}
	if(error!="")
	{
		document.getElementById("error1").innerHTML=error;
		return false;
		
	}
	else
	{
		return true;
	}

	
}
</script>
<div class="content">
    <form action="change_password.php" method="post" enctype="multipart/form-data" class="login-form" onSubmit="return validate()">
        <ul>
        <li style="width:400px; margin:20px 0px 0px -30px;"><h4>Change Password</h4></li>
        <li id="error1" style="color:#f00"><?php
                 if(isset($_REQUEST['attempt'])){
                 echo "<font color='#f9172d' size='2'>".$_REQUEST['attempt']."</font>";
                   }?></li>
        <li style="width:400px; margin:15px 0px 0px -30px;"><p style="width:110px;">Current Password:</p><input name="cpassword" type="password" class="fields" id="cpass"/></li>
        <li style="width:400px; margin:15px 0px 0px -30px;"><p style="width:110px;">New Password:</p><input name="npassword" type="password" class="fields" id="npass"/></li>
        <li style="width:400px; margin:15px 0px 0px -30px;"><p style="width:110px;">Confirm Password:</p><input name="cnpassword" type="password" class="fields" id="cnpass"/></li>
        <li style="width:360px; margin:15px 0px 0px 0px;"><input name="change" type="submit" value="Change" class="login-button" /></li>
        </ul>
        </form>
</div>
<?php
}
include('footer.php');
?><?php 
}
else
{
header('Location:index.php');		
}


?>
