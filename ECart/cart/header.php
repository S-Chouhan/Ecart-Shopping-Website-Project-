<?php
//include('includes/dbconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E Cart Admin</title>
<link href="css/style.css" rel="stylesheet" media="screen" />
<!--================	MENU		=================================================-->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<!--================	//MENU		=================================================-->
<!--================	WYSIWYG PRO JS EDITOR		=================================================-->
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!--================	WYSIWYG PRO JS EDITOR		=================================================-->
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
        <div class="links">
            <a href="logout.php">Logout</a>
            <a href="change_password.php">ChangePassword</a>
            <a href="main.php">Home</a>
        </div>
		<div id="menu">
		<?php include('menu.php');?>
		</div>
        <div class="content">
        	