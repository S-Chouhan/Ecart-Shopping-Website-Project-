<?php session_start();
include('includes/dbconnect.php');
 if(isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
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
<body>
 <section>
<div class="container">
 <div class="row">            
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div id="wrapper">
 <!-- Middle page -->
<section>
								<?php if(isset($_REQUEST['changepss']))
								{
									include('includes/dbconnect.php');
									$cpass=$_POST['curr_pass'];
									$npass=$_POST['new_pass'];
									$cnpass=$_POST['conf_pass'];
									echo $cnpass;
									if($npass==$cnpass)
									{
										$sql="SELECT password FROM users where email='$user' and password='$cpass'";
										$result=mysql_query($sql);
										if($row=mysql_fetch_array($result));
											{
												$cpass1=$row[0];
											}
										if($cpass1==$cpass)
										  {
											$sql1="UPDATE users set password='$npass' where email='$user'";
											$result1=mysql_query($sql1);
												?><script>
													window.location="changepassword.php?attempt=Password Changed successfully";
												</script><?php 	
										   }
										else
										   {
												?><script>
												window.location="changepassword.php?attempt=Invalid current password";
												</script><?php 		
												
											}
									 }
									else
									 {
												?><script>
												window.location="changepassword.php?attempt=Passwords Didnt Match";
												</script><?php
									 }
								}?>									
      <div class="container">
        <div class="login-page">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <h2>Changepassword</h2>
	       <div style='color:red;' align='center'></div>
	       <form id="chnage_from" action="" method="post">
		<ul>
		<li id="error1" style="color:#f00"><?php
                 if(isset($_REQUEST['attempt'])){
                 echo "<font color='#f9172d' size='2'>".$_REQUEST['attempt']."</font>";
                   }?>
				   <?php if(isset($cpass))
				   {echo $cpass;}?></li>
                <li><span>Current Password</span><input name="curr_pass" type="password" placeholder="Enter Current Password" class="input-text" />
                <label id="curr_pass-error" class="error" for="curr_pass" style="visibility: visible; color: red;">&nbsp;</label></li>
                <li><span>New Password</span><input name="new_pass" id="new_pass" type="password" placeholder="Enter Password" class="input-text" />
                <label id="new_pass-error" class="error" for="new_pass" style="visibility: visible; color: red;">&nbsp;</label></li>
                <li><span>Confirm New Password</span><input name="conf_pass" type="password" placeholder="Enter Password" class="input-text" />
                <label id="conf_pass-error" class="error" for="conf_pass" style="visibility: visible; color: red;">&nbsp;</label></li>
                <li><input type="submit" class="btn btn-success submit" name="changepss" value="Changepassword" /></li>
                </ul>
                </form>
                </div>
        </div>
      </div>
    </section>
    
 
 </div>   
  
  </div>
  </div>
  </div>
   </section> 
  </body>
<script>
$( document ).ready(function() {
   grand_total();
   check_checkout();
$('#chnage_from').validate({
            rules:    {
                        curr_pass: {
                              required: true,
                              } ,
                        new_pass: {
                              required: true,
                              } ,
                        conf_pass: {
                              required: true,
                              equalTo : "#new_pass",
                              } ,
                      },
            messages: {
                        curr_pass: {
                              required: "Current Password Is Required",
                              remote  : "Please Enter Correct Current Password",
                              } ,
                        new_pass: {
                              required: "New Password Is Required",
                              } ,
                        conf_pass: {
                              required: "Confirm Password Is Required",
                              equalTo:"Mismatch Confirm Password"
                              } ,
                      },
});
$('.product_qty').on('change', function() {
  var price=($(this).val()* $(this).attr("data-price")).toFixed(2);
  var class_val=($(this).attr("data-qid")).replace("qty_","");
  $("#qty_"+class_val).html($(this).val());
              $.ajax({
			 type: "POST",
			 url: "/"+ "index.php/order/setproduct_qty", 
			 data: {product_id:class_val,qtyval:$(this).val()},
			 cache:false,
			 success: function(data){
				 if(data == 'yes')
				 {
					$("#qtyerr_"+class_val).html('');
					$('#data_check_'+class_val).attr('data-check','0');
 
				 }
				 else
				 {
					$("#qtyerr_"+class_val).html('There is only '+data+ 'quantity for this product');
					$('#data_check_'+class_val).attr('data-check','1');

				 }
				  $(".price_"+class_val).each(function() {
					  $(this).html("$ "+price);
					  grand_total();
					});
				check_checkout();
			 }
              });
});
});
function grand_total()
{
		var g_total=0;
		$(".to_price").each(function() {
			var g_price=$(this).html().replace("$","");
			g_total += parseInt(g_price) ;
		});
		$("#g_total").html("$" + (g_total).toFixed(2));
	
}
function check_checkout()
{
	var checkout=[];
	 $(".data_qty_check").each(function() {
			checkout.push($(this).attr("data-check"));
	});	
	if (checkout.indexOf('1') > -1) 
	{
		$("#cart_checkout").attr("href", "javascript:void(0)")
	}
	else 
	{	$("#cart_checkout").attr("href", "/order/checkout")
	}	
}
function show_wishlist()
{
            $.ajax({
			type: "POST",
			url: "/wishlist/count_wishlist",
			data: {},
			success: function(result)
			{ 
			$("#wish_count").html(result);
			},
			error: function() {
			},
			fail: function() {
			}
		   });
}
</script>
</html>
<?php include 'includes/footer.php'; }
else
{
header("Location:index.php");
}
?>