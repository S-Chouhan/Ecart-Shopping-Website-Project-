<?php session_start();
include('includes/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E Cart</title>
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
	background-color: #fff;
	border: 1px solid #CDCDCD;
	color: #555;
}
#fancybox-close {
	display: none;
}


</style>
<style type="text/css">

.nice-select ul li
{
margin:0px 0px !important;	
}
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

.privacy
{
width:auto !important;
padding:0px !important;
line-height:23px !important;
color:#e4b010;
margin-left:4px !important;
}

.privacy:hover
{
	color:#b50d0d !important;
}
.signup-page {
	width:100%;
	float:left;
	background-color: #FFF;
padding: 10px 5px 10px 5px;
box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.2);
position: relative;
width: 100%;
margin-top: 0px;
margin-bottom: 30px;
float: left;
}


.signup-page ul{
	width:100%;
	margin:0px;
	padding:0px;
	float:left;
	border:none;
}
.signup-page ul li{
	width:100% !important;
	margin:5px 0% ;
	padding:0px;
	float:left;
}
.dropdown-menu li
{
margin:1px 0% !important;	
}
.signup-page ul li span{
	margin:0px 0;
	padding:0px;
	float:left;
	line-height:18px;
	font-family:'OpenSans-Bold';
}
.signup-page ul li span b{
	width:auto;
	margin:0px 0 0 4px;
	padding:0px;
	font-weight:normal;
	font-size:12px;
	color:#f00;
}
.signup-page ul li .input-text{
	width:100%;

	margin:0px;
	padding:8px 4px;
	float:left;
	border:1px solid #cdcdcd;
	border-radius:0px;
	font-size:13px;
}

.signup-page ul li .input-text:hover,.signup-page ul li .input-text:focus{
	width:100%;
	margin:0px;
	padding:8px 4px;
	float:left;
	border:1px solid #E4B010;
	border-radius:0px;
	font-size:13px;
}



.submit
{
width:100%;
margin:0px;
padding:8px 4px;
float:left;
border-radius:2px;
font-size:14px;
font-weight:bold;	
}

.signup-page ul li input[type='checkbox']{
	width:auto;
	margin:5px 8px 0 0px;
	padding:0px;
	float:left;
}


.signup-page h4 {
	font-weight:bold;
	font-size:18px;
	color:#e4b010;
	width:100%;
	margin-top:20px;
	float:left;
	border-bottom:1px solid #e1e1e1;
	padding-bottom:4px;
}
.signup-page ul li a{
 width:100%;
 margin:0px;
 padding:4px 2%;
 margin:0px ;
 float:left;
 color:#a17a00 !important;
 text-decoration:underline;
}

.signup-page ul li a:hover,.signup-page ul li a:focus{
 width:100%;
 margin:0px;
 padding:4px 2%;
 margin:0px ;
 float:left;
 color:#fff ;
 text-decoration:underline;
}

.dropdown-menu ul li a:hover,.dropdown-menu ul li a:focus
{
color:#fff !important;	
}

.selectpicker ul li a:hover
{
 margin-right:0px !important;
}
label.error
{
width:100%;
float:left;	
color: #F00;
font-family:'OpenSans-Bold';
height:20px;
}
</style>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.js"></script>
<script src="assets/js/allscript.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('#registrationform').validate({
rules: {
	    firstname: {
		 required : true,
		maxlength: 32
	      },
		lastname: {
		 required : true,
		maxlength: 32
	      },
	    address1: {
		 required : true,
		maxlength: 32
	      },
		address2: {
		 required : false,
		maxlength: 32
	      },
		state: {
		 required : true,
		 maxlength: 32
	      },
		city: {
		 required : true,
		maxlength: 32
	      },
		email: {
            required: true,
            email: true,
	   maxlength: 96,
            },
	  terms: {
         required : true
      },
			postcode:{
			  required: true,
			  number:true,
			maxlength: 10
			},
			telephone:{
			  required: true,
			  number:true,
			},
			password :{
			     required: true,
			    maxlength:40
				
			},
			confirmpassword : {
			        required: true,
				 maxlength:40,
                    equalTo : "#password",
                },
		},
 messages: {
			  firstname: {
			 required :  "Please Enter  Firstname",
			maxlength: "Firstname should not exceed 32 characters"
		      },
		     lastname: {
			 required :  "Please Enter  Lastname",
			maxlength: "Lastname should not exceed  32 characters"
		      },
			 address1 : {
			 required :  "Please Enter Address1",
			maxlength: "Address1 should not exceed  32 characters"
		      },
		 address2 : {
			 required :  "",
			maxlength: "Address2 should not exceed  32 characters"
		      },
			state      : "Please Enter State",
			city       : "Please Enters City",
			
			email: {
            required: "Please Enter E-mail Address",
            email: "Please Enter valid E-mail address",
		maxlength: "E-mail Address should not exceed  96 characters"
            },
			postcode:{
			required: "Please  Enter Postcode",
			 number:"Please Enter only Numbers",
			maxlength: "Postcode should not exceed  10 characters"
			},
			telephone:{
			  required: "Please  Enter Telephone",
			 number:"Please Enter only Numbers"
			},
			password :{
			     required: "Please enter  Password",
			     minlength:'Password must have at least 6 characters',
			     maxlength: "Password should not exceed  40 characters"
			},
			 
			terms: {
        required : "Agree the terms"
      },
		   confirmpassword : {
	            required:"Please enter  Confirm password",
                equalTo : "Mismatch Confirm Password",
		 maxlength:"Confirm Password should not exceed  40 characters"
            },
			},
 ignore: []
});

$('#email').blur(function() {
var email=$(this).val();
if(email!='')
{
            $.ajax({
			type: "POST",
			url: "/home/checkemail",
			data: {email:email},
			success: function(result)
			{
			 $('#email_msg').html(result);
			},
			error: function() {
			},
			fail: function() {
			}
		   });
}
});
  
}); 
</script>
<body class="fbits-home">
						<?php if(isset($_REQUEST['signup']))
						{
                            include('includes/dbconnect.php');
							$fname=$_POST['firstname'];
                            $lname=$_POST['lastname'];
                            $email=$_POST['email'];
							$telephone=$_POST['telephone'];
							$company=$_POST['company'];
                            $add1=$_POST['address1'];
                            $add2=$_POST['address2'];
							$state=$_POST['state'];
							$city=$_POST['city'];
                            $postcode=$_POST['postcode'];
                            $password=$_POST['password'];
							
							$result=mysql_query("SELECT email from users where email='$email'");
							
							$row=mysql_fetch_assoc($result);
							
							$useremail=$row['email'];
							
							if($useremail!=$email AND $email!='')
							{
								$users=mysql_query("INSERT into users (email,password,firstname,lastname,telephone) values ('$email','$password','$fname','$lname','$telephone')");
								$address=mysql_query("INSERT into addresses (email,firstname,lastname,telephone,address1,address2,pincode,state,city) values ('$email','$fname','$lname','$telephone','$add1','$add2','$postcode','$state','$city')");
								if($users>0 && $address>0);
								{
									$error="Successfully Registered. <br>";
									$to = $email;
									$subject = "Registration Confirmation";
									$message = "
									<html>
									<head>
									<title>Welcome To ECart</title>
									</head>
									<body>
									<p>Thank You for Registering in Ecart</p>
									<p>Registration Details</p
									<p><b>Firstname</b> : $fname</p>
									<p><b>Lastname</b> : $lname</p>									
									<p><b>Email</b> : $email</p>
									<p><b>Password</b>: $password</p>
									<h3>Happy Shopping</h3>
									<h4> This is an automated mail. Please donot Reply</h4>
									</body>
									</html>
									";
									// Always set content-type when sending HTML email
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

									// More headers
									$headers .= 'From: <registrations@ecart.com>' . "\r\n";

									mail($to,$subject,$message,$headers);
									$name='';
									$userid='';
									$pass='';
									$email='';
								}
							}
							else 
							{
								$error="Username already Exists. Please choose another.";
							}
                        echo mysql_error();
                        } ?>
	<section>
		<div class="container">
		
			<div class="category-tab2">
				<form action="" id="registrationform" method="POST">
				<div class="signup-page">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h2>Signup</h2>
							<h4>Your Personal Details</h4>
						</div>
						<div style='color:red;'>
						</div>				  
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">				 
								<ul>
									<li>
										<span>First Name<b>*</b></span>
										<input name="firstname" type="text" placeholder="Enter First Name" class="input-text" tabindex="1"/>
										<label id="firstname-error" class="error" for="firstname" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
									<li>
										<span>Email<b>*</b></span>
										<input name="email" id="email" type="text" placeholder="Enter Email"  class="input-text" tabindex="3"/>
										<label id="email-error" class="error" for="email" style="visibility: visible; color: red;">&nbsp;</label>
										<span id="email_msg"></span>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<ul>
									<li>
										<span>Last Name<b>*</b></span>
										<input name="lastname" type="text" placeholder="Enter Last Name"  class="input-text" tabindex="2"/>
										<label id="lastname-error" class="error" for="lastname" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
									<li>
										<span>Telephone<b>*</b></span>
										<input name="telephone" type="text" placeholder="Enter Telephone Number"  class="input-text" tabindex="4"/>
										<label id="telephone-error" class="error" for="telephone" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
								</ul>
							</div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    <h4>Your Address</h4>
				</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
								<ul>
									<li>
										<span>Company</span>
										<input name="company" type="text" placeholder="Enter Company Name"  class="input-text" />
										<label class="error">&nbsp;</label>
									</li>                       
									<li>
										<span>Address1<b>*</b></span>
										<input name="address1" type="text" placeholder="Enter Address1"  class="input-text" />
										<label id="address1-error" class="error" for="address1" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
									<li>
										<span>Address2</span>
										<input name="address2" type="text" placeholder="Enter Address2"  class="input-text" />
										<label class="error">&nbsp;</label>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">                  
								 <ul>
									<li><span>State<b>*</b></span>
										<input name="state" id="state" type="text" placeholder="Enter State"  class="input-text" />
										<label id="state-error" class="error" for="state" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
									<li><span>City<b>*</b></span>
										<input name="city" id="city" type="text" placeholder="Enter City"  class="input-text" />
										<label id="city-error" class="error" for="city" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
									<li>
										<span>Post Code<b>*</b></span>
										<input name="postcode" type="text" placeholder="Enter Post Code"  class="input-text" />
										<label id="postcode-error" class="error" for="postcode" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
								 </ul>
							 </div>
						</div>
					</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <h4>Your Password</h4>
				</div>   
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<ul>
									<li>
									<span>Password<b>*</b></span>
									<input name="password" id="password" type="password" placeholder="Enter Password"  class="input-text" />
									<label id="password-error" class="error" for="password" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<ul>
									<li>
									<span>Password Confirm<b>*</b></span>
									<input name="confirmpassword" type="password" placeholder="Enter Password Confirm"  class="input-text" />
									<label id="confirmpassword-error" class="error" for="confirmpassword" style="visibility: visible; color: red;">&nbsp;</label>
									</li>
								</ul>
							</div>
						</div> 
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<ul> 
									<li style="line-height:32px;">
										<input name="terms" type="checkbox" value=""><span style="float:left;">I have read and agree to the,</span> 
										<a href="#" class="privacy">Privacy Policy</a>
										<label id="terms-error" class="error" for="terms" style="visibility: hidden; color: red;">&amp;nbsp;</label>
									</li>
									<li>
									<?php if (isset($error)){?>
									<p style="color:#698B69; text-align:center" id="error1"><?php echo $error;?></p>
									<?php } ?>
									</li>
									<li>
										<input type="submit" class="btn btn-success submit"  name="signup" value="SIGNUP" />
									</li>    
								</ul>
							</div>
						</div>   
					</div>
				</div>
             </form>
          </div>
		  
          <!--/recommended_items--> 
      </div>
    </section>	
<?php include 'includes/footer.php'; ?>