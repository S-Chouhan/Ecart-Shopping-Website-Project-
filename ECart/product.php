<?php session_start();
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
if(isset($_GET['bc']))
{
$bc=$_GET['bc'];
print '<script type="text/javascript">'; 
print 'alert("'.$bc.'")'; 
//print 'window.location=product.php?id=$id';
print '</script>';
}
include('includes/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Include jQuery. -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

        <!-- Include Cloud Zoom CSS. -->
        <link rel="stylesheet" type="text/css" href="cloudzoom.css" />

        <!-- Include Cloud Zoom script. -->
        <script type="text/javascript" src="cloudzoom.js"></script>

        <!-- Call quick start function. -->
        <script type="text/javascript">
            CloudZoom.quickStart();
        </script>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | ECart</title>
   <?php include 'includes/header.php'; ?>
   <script type="text/javascript" src="assets/js/slideshow.js"></script>
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
<div class="middle">

<div class="header-heading">
 
</div>
		
<div class="modal-body">
       <div class="row">
		   
				<?php 
						$id=$_GET['id'];
						$pro="SELECT * from products where id='$id'";
						$prores=mysql_query($pro) or die(mysql_error());
						while($row=mysql_fetch_array($prores))
						{ ?>
						
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<img  width= "250px" height "150px" class = "cloudzoom" src = "cart/product/<?php echo $row['image_url']?>" data-cloudzoom = "zoomImage: 'cart/product/<?php echo $row['image_url']?>'" />
        <br/>
		<?php if($row['image_url'] != '')
		{?>
        <img class = 'cloudzoom-gallery' width= "100px" height "100px" src = "cart/product/<?php echo $row['image_url']?>" data-cloudzoom = "useZoom: '.cloudzoom', image: 'cart/product/<?php echo $row['image_url']?>', zoomImage: 'cart/product/<?php echo $row['image_url']?>' " >
        <?php }?>
		<?php if($row['image_url2'] != '')
		{?>
		<img class = 'cloudzoom-gallery' width= "100px" height "100px" src = "cart/product/<?php echo $row['image_url2']?>" data-cloudzoom = "useZoom: '.cloudzoom', image: 'cart/product/<?php echo $row['image_url2']?>', zoomImage: 'cart/product/<?php echo $row['image_url2']?>' " >
        <?php }?>
		<?php if($row['image_url3'] != '')
		{?>
		<img class = 'cloudzoom-gallery' width= "100px" height "100px" src = "cart/product/<?php echo $row['image_url3']?>" data-cloudzoom = "useZoom: '.cloudzoom', image: 'cart/product/<?php echo $row['image_url3']?>', zoomImage: 'cart/product/<?php echo $row['image_url3']?>' " >
        <?php }?>
		<?php if($row['image_url4'] != '')
		{?>
		<img class = 'cloudzoom-gallery' width= "100px" height "100px" src = "cart/product/<?php echo $row['image_url4']?>" data-cloudzoom = "useZoom: '.cloudzoom', image: 'cart/product/<?php echo $row['image_url4']?>', zoomImage: 'cart/product/<?php echo $row['image_url4']?>' " >
		<?php }?>
		<?php if($row['image_url5'] != '')
		{?>
		<img class = 'cloudzoom-gallery' width= "100px" height "100px" src = "cart/product/<?php echo $row['image_url5']?>" data-cloudzoom = "useZoom: '.cloudzoom', image: 'cart/product/<?php echo $row['image_url5']?>', zoomImage: 'cart/product/<?php echo $row['image_url5']?>' " >
		<?php }?>
		<?php if($row['image_url6'] != '')
		{?>
		<img class = 'cloudzoom-gallery' width= "100px" height "100px" src = "cart/product/<?php echo $row['image_url6']?>" data-cloudzoom = "useZoom: '.cloudzoom', image: 'cart/product/<?php echo $row['image_url6']?>', zoomImage: 'cart/product/<?php echo $row['image_url6']?>' " >
		<?php }?>
		</div> 			
		   <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<div class="description">
					<h1><?php echo $row['name']?></h1>
					<div class="cart_data">
						<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 <p><strong>Price:</strong> $<?php echo $row['price']?></p>
						 <p><strong>Availability:</strong> <?php if($row['quantity']>0) echo "In Stock";?></p>         
						</div>
						</div>
					</div>
					<div class="quick_data">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3"> 
							
							<a href="to_wishlist.php?id=<?php echo $row['id']?>&page=product.php" name="wishlist" class="addtocart">Add to Wishlist </a>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
							  <a  href="to_cart.php?id=<?php echo $row['id']?>&page=product.php" class="addtocart">Add to cart</a>
							</div>
							<!--<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
							  <a  href="order.php?id=<?php echo $id?>" name = "buynow" class="addtocart">Buy Now</a><br>
							</div>-->
						</div>
						<br>
					</div>
				</div>
		   		<h3>Specifications </h3>
				<?php echo $row['specifications']?>
				
			</div>
			<?php } ?>
	   </div>
</div>

 </div>
 <!-- Middle page end -->  
 </div>
 
 </div>
 
 </div>   
  
  </div>
  </div>
  </div>
  
  </section> 
   
    <section>
		<div class="container">
			<div class="row">
        
           <div class="category-tab1">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            </div> 
							</div>
							</div>
                </div>	
					<!--/recommended_items-->
            </div>
		</div>
	</section>
	

 
</body>
<?php include 'includes/footer.php'; 

?>