<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Admin</title>
<link href="css/style.css" rel="stylesheet" media="screen" />
</head>

<body>
<div id="wraper">
    <div class="page">
        <div class="page-top"></div>
        <div class="page-mid">
        <div class="header-top">
        	<a href="#" class="logo"></a>
            <h1>E Cart Admin Panel</h1>
        </div>
        <form action="admin-logincheck.php" method="post" enctype="multipart/form-data" class="login-form">
        <ul>
        <li><h4>Admin Login</h4></li>
        <li><?php
                 if(isset($_GET['attempt'])){
                 echo "<font color='#f9172d' size='2'>Incorrect Username Or Password</font>";
                   }?></li>
        <li><p>Username:</p><input name="username" type="text" class="fields" /></li>
        <li><p>Password:</p><input name="password" type="password" class="fields" /></li>
        <li><input name="login" type="submit" value="" class="b-login" /></li>
        </ul>
        </form>
        <div class="footer">
        	<p>&copy; 2016, All rights reserved by Ecart</p>
        </div>
        </div> 
        <div class="page-bottom"></div>
   	</div>
</div>
</body>
</html>