<?php
session_start();
if(($_POST['username']=='')||($_POST['password']=='')){echo "<script language='javascript'>alert('Please Enter Details')</script><script>window.location='index.php'</script>";
}else{
	include('includes/dbconnect.php');
$tbl_name="admin"; // Table name
// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

$row=mysql_fetch_array($result);
if($count>=1){
//session_register("myusername");
//session_register("mypassword");
$_SESSION['login_user'] = $myusername;
$url='main.php';
header("location:$url");
}
else { 
header("location:index.php?attempt=1");

//echo "Wrong Username or Password";
}}
?>