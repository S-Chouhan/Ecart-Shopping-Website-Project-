<?php session_start();

include('includes/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | ECart</title>
   <?php include 'includes/header.php'; ?>
	<style>
	.hide-menu
	{
		
/*display:none ;*/
	}
	ul#cbp-hrmenu, #cbp-hrmenu ul  {
list-style-type: none;
margin: 0;
padding: 0;
}

#cbp-hrmenu li {
/* float: left;   */
}
#cbp-hrmenu {
	/*width:80%;*/
	width:auto;
}
@media screen and (min-width:768px) and (max-width:1024px) {
#cbp-hrmenu {
	/*width:80%;*/
	width:auto;
}
}

#cbp-hrmenu a:visited {
}
#cbp-hrmenu a:link, div.horizontal a:visited {

}
#cbp-hrmenu a {
display: block;
    
}

#cbp-hrmenu a:hover {
}

#cbp-hrmenu li.hideshow ul{
position:absolute;
background: #f3f3f3;
display:none;
left:0px;
z-index:9999;

}

#cbp-hrmenu li.hideshow
{
position:relative;
}

@media(max-width:767px) {
	
#cbp-hrmenu li.hideshow ul{
position:relative;
float:left;	
}
}
	</style>
    <script>
	function alignMenu() {
		var w = 0;
		var mw = $("#cbp-hrmenu").width() - 150;
		var i = -1;
		var menuhtml = '';
		jQuery.each($("#cbp-hrmenu").children(), function() {
			i++;
			w += $(this).outerWidth(true);
			if (mw < w) {
				menuhtml += $('<span>').append($(this).clone()).html();
				$(this).remove();
			}
		});
		$("#cbp-hrmenu").append(
				'<li  style="position:relative;" href="#" class="hideshow">'
						+ '<a href="#">more '
						+ '<span style="font-size:14px">&#8595;</span>'
						+ '</a><ul>' + menuhtml + '</ul></li>');
		$("#cbp-hrmenu li.hideshow ul").css("top",
				$("#horizontal li.hideshow").outerHeight(true) + "px");
		$("#cbp-hrmenu li.hideshow").click(function() {
			$(this).children("ul").toggle();
		});
		if (menuhtml == '') {
			$("#cbp-hrmenu li.hideshow").hide();
		} else {
			$("#cbp-hrmenu li.hideshow").show();
		}
		//$("#cbp-hrmenu").removeClass('hide-menu');
	}
	$(function() {
    alignMenu();
	
    $(window).resize(function() {
      $("#cbp-hrmenu").append($("#cbp-hrmenu li.hideshow ul").html());
        $("#cbp-hrmenu li.hideshow").remove();
        alignMenu();
    });
	
	});
	
	</script>
	<style type="text/css">
.sort_items .bootstrap-select {
	background-color: #ffffff !important;
	-webkit-border-top-left-radius: 4px;
	-webkit-border-top-right-radius: 4px;
	-moz-border-radius-topleft: 4px;
	-moz-border-radius-topright: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	border: 1px solid #f3f3f3;
}
.sort_items .bootstrap-select .btn .caret {
	color: #646464;
}
.sort_items .bootstrap-select .btn {
	padding-top: 5px !important;
	padding-bottom: 5px !important;
}
.bootstrap-select {
	width: 100%;
	float: left;
	background-color: #f3f3f3;
	color: #555;
}
#fancybox-close {
	display: none;
}
.guest_this, .guest_this:hover, .guest_this:focus {
	width: 100% !important;
	float: left;
	text-align: center;
	padding: 8px 0;
	border-radius: 4px;
	background: #FFD553;
	font-weight: bold;
	font-size: 14px;
	color: #3c2d00;
}
.guest_this:hover {
	background: #e4b010;
}
.or_text {
	float: left;
	width: 100%;
	text-align: center;
	font-weight: bold;
}
</style>
<style type="text/css">
.item {
	float: left;
	position: relative;
}
.item-hover, .item-hover .mask, .item-img {
	position: absolute;
	left: 0;
	width: 100%
}
.item-type-double .item-hover {
	z-index: 1999;
	-webkit-transition: all 300ms ease-out;
	-moz-transition: all 300ms ease-out;
	-o-transition: all 300ms ease-out;
	transition: all 300ms ease-out;
	opacity: 0;
	cursor: pointer;
	display: block;
	text-decoration: none;
	text-align: center;
	width: 100%;
	float: left;
}
.item-type-double .item-info {
	z-index: 10;
	color: #ffffff;
	display: table-cell;
	vertical-align: middle;
	position: relative;
	z-index: 1999;
	width: 100%;
	float: left;
	margin-top: 60px;
}
.item-type-double .item-info .headline {
	font-size: 20px;
	width: 90%;
	margin: 0 auto;
}
.item-type-double .item-info .line {
	height: 2px;
	width: 0%;
	margin: 15px auto;
	background-color: #ffffff;
	-webkit-transition: all 300ms ease-out;
	-moz-transition: all 300ms ease-out;
	-o-transition: all 300ms ease-out;
	transition: all 300ms ease-out;
}
.item-type-double .item-info .date {
	font-size: 14px;
}
.item-type-double .item-hover .mask {
	background-color: #000;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
	filter: alpha(opacity=50);
	opacity: 0.6;
	z-index: 1998;
	-webkit-border-top-left-radius: 4px;
	-webkit-border-top-right-radius: 4px;
	-moz-border-radius-topleft: 4px;
	-moz-border-radius-topright: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}
.item-type-double .item-hover:hover .line {
	width: 90%;
}
.item-type-double .item-hover:hover {
	opacity: 1;
}
.item-img {
	z-index: 0;
}
</style>
<style>
.login-page ul {
	width: 100%;
	margin: 0px;
	padding: 0px;
	float: left;
	border: none;
}
.login-page ul li {
	width: 100%;
	margin: 15px 0;
	padding: 0px;
	float: left;
}
.login-page ul li span {
	width: 100%;
	margin: 2px 0;
	padding: 0px;
	float: left;
}
.login-page ul li .input-text {
	width: 100%;
	height: 34px;
	margin: 0px;
	padding: 4px;
	float: left;
	border: 1px solid #cdcdcd;
	border-radius: 2px;
	font-size: 13px;
}
.login-page ul li .input-text:hover, .login-page ul li .input-text:focus {
	width: 100%;
	height: 34px;
	margin: 0px;
	padding: 4px;
	float: left;
	border: 1px solid #E4B010;
	border-radius: 2px;
	font-size: 13px;
}
.submit {
	width: 100%;
	margin: 0px;
	padding: 8px 4px;
	float: left;
	border-radius: 2px;
	font-size: 14px;
	font-weight: bold;
}
</style>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('#loginform').validate({
rules: {
	    pass  : "required",
		email: {
            required: true,
            email: true
            },
		},
 messages: {
			pass  : "Please Enter  Password",
			email: {
            required: "Please Enter  Email",
            },
			},
});
});
</script>
<body class="fbits-home">
<?php   				$success = '';
						$fail = '';
						if(isset($_REQUEST['login']))
                        {
                            include('includes/dbconnect.php');
							$tbl_name="users"; // Table name
							$myusername=$_POST['username'];

							// To protect MySQL injection (more detail about MySQL injection)
							$myusername = stripslashes($myusername);
							$myusername = mysql_real_escape_string($myusername);

							$sql="SELECT * FROM $tbl_name WHERE email='$myusername'";
							$result=mysql_query($sql);

							// Mysql_num_row is counting table row
							$count=mysql_num_rows($result);

							if($count>=1)
							{  
								$_SESSION['user'] = $myusername;							
									$to = $myusername;
									$cap = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
									$small = "abcdefghijklmnopqrstuvwxyz";
									$num = "0123456789";
									$ran = "!@#$%^&*(){}[],.";
									$pass = $cap.$small.$num.$ran;
									$shuffled = str_shuffle($pass);
									$shuffled = substr($shuffled,1,6);
									$sql1="UPDATE users set password='$shuffled' where email='$myusername'";
									$result2=mysql_query($sql1);
										if($result2>0);
										{
											$success="Password is sent to registered mail id.";
										}
									$subject = "Password Notification";
									$message = "
									<html>
									<head>
									<title>Forgot Password </title>
									</head>
									<body>
									<p>Request for forgot password has been processed. Please find your password below</p>
									<p>Account Details.</p
									<p><b>Email</b> : $myusername</p>
									<p><b>Password</b>: $shuffled</p>
									<h3>Happy Shopping</h3>
									<h4> This is an automated mail. Please donot Reply</h4>
									</body>
									</html>
									";
									// Always set content-type when sending HTML email
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

									// More headers
									$headers .= 'From: <support@ecart.com>' . "\r\n";

									mail($to,$subject,$message,$headers);
							}
							else 
							{
									$fail="Email Id is not valid";?>
									<?php
							}
						}
                        ?>
<section>
  <div class="container">
  
    <div class="login-page">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2>Forgot Password</h2>
        <div style='color:red;'>
                  </div>
        <form id="loginform" action="" method="post">
          <input type="hidden" name="pro" value=""/>
          <input type="hidden" name="cat" value=""/>
          <ul>
			   
            <li><span>Email</span>
              <input name="username" type="text" placeholder="Enter Email" class="input-text" />
            </li>
            
			<li><p style="color:#698B69; text-align:center"><?php echo $success;?></p>
			<p style="color:#FF0000; text-align:center"><?php echo $fail;?></p></li>	
            <li>
              <input type="submit" class="btn btn-success submit" name="login" value="Submit" />
            </li>
                      </ul>

        </form>
      </div>
      
      <!--/recommended_items--> 
      
    </div>
  </div>
</section>
<!--<script src="assets/js/ResourceHandler_002.ashx" type="text/javascript"></script> -->
<?php include 'includes/footer.php'; ?>