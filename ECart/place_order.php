<?php session_start();
include('includes/dbconnect.php');

$addressid = $_POST['address'];
 if(isset($_SESSION['user']))
{?>

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
<div class="middle">
<div class="header-heading">
<h1>Create Shipping</h1> 
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="menu-new">
<ul>
<li><a href="javascript:void(0);" class="shipping1-active">1. Shipping</a></li>
<!-- <li><a href="payment.html" class="payment1">2. Payment</a></li> -->
<li><a href="javascript:void(0);" class="review1">2. Review & Place Order</a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <!-- Modal content-->
    <div class="items_bg_shipping">
   <div id="wrapper">
 <!-- Middle page -->
      <div class="shipping_data">
     <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <h1>Review and Place Your Order</h1>
       <div class="select_address1">
       <h3>Shipping to : <span>kdajfh lkjhf</span></h3>
       <div class="name-sec">
       <div class="name-left">
         <label><span style="float:left;"><strong>Shipping Address:</strong></span>  <!-- <a href="#"><strong>Edit</strong></a> --></label>
             	<p>lkjhdf, ljhd, Hwanghae-namdo, North Korea, 767687, kldsjh@gkgj.com, 7676767676</p>
        </div>
        </div>
        <div class="name-sec">
       <div class="name-left">
         <label><span style="float:left;"><strong>Shipping Method:</strong></span>  <!-- <a href="#"><strong>Edit</strong></a> --></label>
        <p>Standard: Free</p>
        </div>
        </div>
       <p></p>
       </div>
					

         <div class="bottom_buttons">
  </div>    
    <div class="row">    
       
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p><a href="to_order.php?add=<?php echo $addressid;?>" class="input_submit" id="place-order3" >Place Order</a></p>
        </div>
       </div>
   </div>     
      </div>
    </div>
  <!-- Middle page end -->  
 </div>
      </div> 
 </div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="my-cart">
        	<h2>Order Summary</h2>
            <!--<img src="/assets/images/my-cart-img.png" /> -->
            <div class="mycart-items">
                	<ul>
                    	<li class="mycart-items-li-first mycart-items-li-header">&nbsp;&nbsp;Item</li>
                        <li class="mycart-items-li-second mycart-items-li-header">Qty.</li>
                        <li class="mycart-items-li-third mycart-items-li-header">Price</li>
                     </ul>
					 <ul id="li_cart_300">	
                    	<?php
						$deliver_charge = 0;
						$total = 0;
						$user = $_SESSION['user'];
						$resu=mysql_query("SELECT * from cart where email='$user'");
						$cou=mysql_num_rows($resu);
						if($cou>0)
						{
							while($row1=mysql_fetch_array($resu))
							{
							if($row1['quantity'] == 1)
							{
								$total = $total + $row1['price'];							
							}
							else
							{
								$total = $total + $row1['total_price'];							
							}							
							$deliver_charge = $deliver_charge + $row1['delivery_charge'];
							?>
                        <li class="mycart-items-li-first"><?php echo $row1['name']?></li>
                        <li class="mycart-items-li-second"><?php echo $row1['quantity']?></li>
                        <li class="mycart-items-li-third to_price">
						$<?php 
						if($row1['quantity'] == 1)
						{
						echo $row1['price'];
						}
						else
						{
						echo $row1['total_price'];
						}?>.00</li>		
							<?php }}?>
                      </ul>

                    <ul>
					
                        <li class="mycart-items-li-first" style="border-bottom:none;">Delivery Charge:</li>
                        <li class="mycart-items-li-second" style="border-bottom:none;">&nbsp;</li>
                        <li class="mycart-items-li-third" style="border-bottom:none;">$<span id="delivery_charge"><?php echo $deliver_charge?>.00</span></li>
                    </ul>
                    <ul class="total_pro">
                        <li class="mycart-items-li-first"><strong>Total:</strong></li>
                        <li class="mycart-items-li-second">&nbsp;</li>
                        <li class="mycart-items-li-third"><strong id="g_total1">
						$<?php $total = $total + $deliver_charge; echo $total;?>.00</strong></li>
                    </ul>
                   <!-- <div class="point-order">
                   <span style="float:left;margin-top:9px;">Points on Order</span>
                   <span class="order-text">2</span>
                   </div>  -->
                </div>
            </div>  
</div> 
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

 <script>
 var place_order=true;
$( document ).ready(function() {
   grand_total();
   check_checkout();
   $('#place-order3').click(function(){
	   if(place_order == true)
	   {
		 $('#submitbutton').trigger('click');  
	   }
	   //
   });
});
$('.product_qty').on('change', function() {
  var price=($(this).val()* $(this).attr("data-price")).toFixed(2);
  var class_val=($(this).attr("data-qid")).replace("qty_","");
  $("#qty_"+class_val).html($(this).val());
  $.ajax({
			 type: "POST",
			 url: "/order/setproduct_qty", 
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
				$('#price_'+class_val).html("$ "+price);
				$(".price_"+class_val).html("$ "+price);
				$('#price_'+class_val).attr('data-pprice',price);
			        grand_total();
				check_checkout();
			 }
  });
});
function grand_total()
{
		var g_total=0;
		var p_tax=0;
		$(".to_price").each(function() {
			var pid=$(this).attr("id");
			var g_price=$("#"+pid).attr("data-pprice");
			g_total += parseInt(g_price) ;		
			if($("#"+pid).attr("data-ptx") != "")
			{
				p_tax= parseInt(p_tax) +(parseInt(g_price) * ($("#"+pid).attr("data-ptx"))/100);
			}
			$("#tax").html(p_tax+'.00');
			$("#tx_total").val(p_tax+'.00');
		});
		$.ajax({
			 type: "POST",
			 url: "/order/getdelivery_charge", 
			 cache:false,
			 success: function(data){
				$("#delivery_charge").html(data+'.00');
				$("#delivery_total").val(data+'.00');
			$("#g_total").html("$" + (g_total).toFixed(2));
			$("#g_total1").html("$" + (g_total+parseInt($("#delivery_charge").html())+parseInt($("#tax").html())).toFixed(2));
			$('#g_total2').val((g_total+parseInt($("#delivery_charge").html())+parseInt($("#tax").html())).toFixed(2));
		}

	});
		
}
function check_checkout()
{
	var checkout=[];
	 $(".data_qty_check").each(function() {
			checkout.push($(this).attr("data-check"));
	});	
	if (checkout.indexOf('1') > -1) 
	{
		place_order = false;
	}
	else 
	{	place_order=true;
	}	
}
function delete_product(productid)
{
	 $.ajax({
			 type: "POST",
			 url: "/"+ "order/delete_product", 
			 data: {product_id:productid},
			 cache:false,
			 success: function(data){
				      showalert("<b style='color:green;'>Deleted Successfully</b>");
					$('#data_check_'+productid).remove();
					$('#li_cart_'+productid).remove();
					$("#item_count").html(data);
					grand_total();
					check_checkout();
				 }
  });
}
</script>
<?php include 'includes/footer.php'; }
else
{
header("Location:login.php?id=$id");		
}
?>