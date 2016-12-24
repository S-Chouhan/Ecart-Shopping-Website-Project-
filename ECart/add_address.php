<?php session_start();
include('includes/dbconnect.php');
 if(isset($_SESSION['user']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Ecart</title>
   <?php include 'includes/header.php'; ?>
        
</head><!--/head-->
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
padding: 10px 5px 10px 5pz;
box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.2);
position: relative;
width: 100%;
margin-top: 0px;
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
	margin:10px 0% ;
	padding:0px;
	float:left;
}
.dropdown-menu li
{
margin:1px 0% !important;	
}
.signup-page ul li span{
	margin:0px 5px 0px 0px;
	padding:0px;
	float:left;
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
	border-radius:2px;
	font-size:13px;
}

.signup-page ul li .input-text:hover,.signup-page ul li .input-text:focus{
	width:100%;
	margin:0px;
	padding:8px 4px;
	float:left;
	border:1px solid #E4B010;
	border-radius:2px;
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
	color:#424242;
	width:100%;
	margin-top:20px;
	float:left;
	padding-bottom:0px;
	margin-bottom:3px;
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
.header-heading {
    width: 100%;
    float: left;
    margin: 10px 0%;
}

.address_new1
{
width:100% !important;
float:left;
background-color:#f3f3f3;
margin-bottom:15px;	
padding-bottom:5px;
}
 
.address_new1 p
{
margin-top:3px;
margin-bottom:3px;
float:left;
width:100%;
line-height:22px;
}

.shipping_data
{
width:100%;
float:left;	
padding-top:6px;
padding-bottom:5px;
border-top:1px solid #b9b9b9;
margin-top:5px;
}
.shipping_data label
{
width:50%;
float:left;

}

.address_new2
{
margin-left:15px;
margin-right:15px;
border-bottom: 1px solid #F3F3F3;
margin-bottom:10px;	
}
input.shipping_address
{
	width:auto;
	float:none;
}
.btn-default,
.btn-default:hover,
.btn-default:focus {
    border-color: #cbcccc !important;
}
.save_bottom-1 {
float:left;
width:100%;
margin-top:10px;
margin-bottom:20px;
}
.signup-page {
margin-bottom:30px;
}
</style>
<!--/head-->
<body>
				<?php if(isset($_REQUEST['save']))
// following cod eis executed to update the address
// Start of addition of address code
						{
							$url = $_GET['url'];
                            $user = $_SESSION['user'];
							$fname=$_POST['firstname'];
                            $lname=$_POST['lastname'];
                            $email=$user;
							$telephone=$_POST['telephone'];
                            $add1=$_POST['address1'];
                            $add2=$_POST['address2'];
							$state=$_POST['state'];
							$city=$_POST['city'];
                            $postcode=$_POST['postcode'];
							if(($fname!="")&&($lname!="")&&($email!="")&&($telephone!="")&&($add1!="")&&($add2!="")&&($state!="")&&($city!="")&&($postcode!=""))
							{
								$result=mysql_query("INSERT into addresses (email,firstname,lastname,telephone,address1,address2,pincode,state,city) values ('$email','$fname','$lname','$telephone','$add1','$add2','$postcode','$state','$city')");					
								if($result>0);
								{
									$error="Address added successfully. <br>";
									if(isset($url))
									{?>
									<script>
									window.location='shipping.php';
									</script>
									<?php
									}
								}
								echo mysql_error();
							}
// End of addition of address code
print '<script type="text/javascript">'; 
print 'alert("'.$error.'")'; 
print '</script>';
							}

							?>
 <section>
	<div class="container">
          	<div class="category-tab2">
                       <div class="signup-page"> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="header-heading"> 
					<h1>Add New Address <a href="myaccount.php">Back</a></h1>
					</div>
      					<div class="row">
<!-- below form for address input fields-->
<!-- Start of form-->
				<form action="" method="post" id="registrationform">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	    
	   <div id="selectnewaddress">
	   <?php if (isset($error)){?>
									<p style="color:#698B69; text-align:center" id="error1"><?php echo $error;?></p>
									<?php } ?>
       <div class="name-sec">
       <div class="name-left">
        <label>First Name <span class="star">*</span></label>
        <p><input name="firstname" type="text" class="input_email" value=""/></p></div>
        <div class="name-right">
        <label>Last Name <span class="star">*</span></label>
        <p><input name="lastname" type="text" class="input_email" value=""/></p>
        </div>
        </div>
        <label>Address 1<span class="star">*</span></label>
        <p>
          <textarea name="address1" class="shipping_data_textarea" maxlength="300" ></textarea>
        </p>
		<label>Address 2<span class="star">*</span></label>
        <p>
          <textarea name="address2" class="shipping_data_textarea" maxlength="300"></textarea>
        </p>
		<div class="name-sec">
       <div class="name-left">
          <label>City <span class="star">*</span></label>
        <p>
		<input name="city" type="text" class="input_email" value=""/></p>
	<input type="text" name="new_city"   class="input_email" placeholder="New City Name" id="new_city" style="display:none" >
        </div>
		 <div class="name-right">
          <label>Zip Code <span class="star">*</span></label>
        <p><input name="postcode" type="text" class="input_email" value=""/></p>
        </div>
       
        </div>
         <div class="name-sec">
       <div class="name-left">
          <label>State <span class="star">*</span></label>
        <p><input name="state" type="text" class="input_email" id="state" value=""/>
		</p>
		<span id="email_msg"></span>
        </div>
        <div class="name-right">
          <label>Contact Number <span class="star">*</span> </label>
        <p><input name="telephone" type="text" class="input_email" value=""/></p>
	<input type="hidden" value="" name="address_id">
        </div>
        </div>
		</div>
        <p class="save_bottom-1"><input name="save" type="submit" value="Save" class="input_submit" /></p>
       </div>
 
         </form>
<!-- End of form-->
		 </div></div>
 			</div>
		</div>
	</div>
</section>
<!-- Following script to validate the input fields-->
<script>

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
		maxlength: 128
	      },
	 address2: {
		 required : true,
		maxlength: 128
	      },
		  state: {
		 required : true,
		maxlength: 128
	      },
		  city: {
		 required : true,
		maxlength: 128
	      },

		email: {
            required: true,
            email: true,
	   maxlength: 96,
            },
			telephone:{
			  required: true,
			  number:true,
			},
		postcode:{
			  required: true,
			  number:true,
			maxlength: 10
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
			maxlength: "Address1 should not exceed  128 characters"
		      },
		 address2 : {
			 required :  "Please Enter Address2",
			maxlength: "Address2 should not exceed  128 characters"
		      },
			state      : "Please Enter State",
			city    : "Please Enter City",
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
			},
 ignore: []
});

});
</script>
<?php include 'includes/footer.php'; 
}
else
{
header("Location:index.php");		
}?>