<?php session_start();
if(isset($_SESSION['id']))
{
$id=$_GET['id'];
}
 if(isset($_SESSION['user']))
{
$user = $_SESSION['user'];
include('includes/dbconnect.php');?>

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
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="wrapper"> 
          
          <!-- Middle page -->
          <div class="middle">
            <div class="header-heading">
              <h1>Create Shipping</h1><p>Select Address</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="menu-new">
                <ul>
                  <li><a href="javascript:void(0);" class="shipping1">1. Shipping</a></li>
                  <!-- <li><a href="/order/payment" class="payment1">2. Payment</a></li> -->
                  <li><a href="javascript:void(0);" class="review1-active">2. Review & Place Order</a></li>
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
					         <form action="place_order.php" method="post" id="registrationform">
      <?php 
		  
			$sql="SELECT * from addresses where email='$user'";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
            {
?>
   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
   <div class="address_new1">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h4><?php echo $row['firstname']?> &nbsp; <?php echo $row['lastname']?></h4>
	<p ><?php echo $row['address1']?><?php echo $row['address2']?></p>
 	<br />
       </p>
   <div class="shipping_data shipping_data-1">
   
  <label>

  <input name="address" type="radio" value="<?php echo $row['id']?>" checked class="billing_address"></label>
   </div>
   </div>
   </div>
   </div>
   <?php }?>
   
   </div>
   <div>
   </br>
   </div>
   <center><a href="add_address1.php?url=shipping.php" class="edit_this" name="add">New Address</a></center>
   <div>
   </br>
   </div>
                    </div>
                    
                    <!-- Middle page end --> 
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-lft">
                  <div class="my-cart">
                    <h2>Order Summary</h2>
                    <!--<img src="/assets/images/my-cart-img.png" /> -->
                    
                    <div class="mycart-items">
                      <ul>
                        <li class="mycart-items-li-first mycart-items-li-header">&nbsp;&nbsp;Item</li>
                        <li class="mycart-items-li-second mycart-items-li-header">Qty</li>
                        <li class="mycart-items-li-third mycart-items-li-header">Price</li>
                      </ul>
					  <?php 
						$deliver_charge = 0;
						$total = 0;
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
                                            <ul id="li_cart_300">
                        <li class="mycart-items-li-first"><?php echo $row1['name']?></li>
                        <li class="mycart-items-li-second" ><?php echo $row1['quantity']?></li>
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
                        <!--<li></li>-->
                      </ul>
                      <?php }}?>
                      <ul>
                        <li class="mycart-items-li-first" style="border-bottom:none;">Delivery Charge</li>
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
              
              <div class="container">
              <div class="col-xs-12 col-12 col-md-8 col-lg-8">
              	<p><input name="ddddd" type="submit" value="Continue" class="input_submit margn-botm" /></p>
              </div>
			  </form>
              <div class="col-xs-12 col-12 col-md-4 col-lg-4"></div>
              </div>
              
            </div>
          </div>
          <!-- Middle page end --> 
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$( document ).ready(function() {
   grand_total();
   check_checkout();
   $('.shippingaddressnew').click(function(){
	   if($('#newaddress').is(':checked'))
	   {
		   $('#selectnewaddress').show();
		   //$('#').show();
	   }
	   else
	   {
		   $('#selectnewaddress').hide();
			$("#country1").val('');
			$("#ship_ad1").val('');
			$("#ship_ad2").val('');
			$("#ship_fname").val('');
			$("#ship_lname").val('');
			$("#ship_zipcode").val('');
			$("#ship_contact").val('');
			$("#email").val('');
	   }
   });
   $('.billingaddressnew').click(function(){
	   if($('#newaddress1').is(':checked'))
	   {
		   $('#selectnewbillingaddress').show();
		   $('#sameasshpping').show();
	   }
	   else
	   {
		   $('#selectnewbillingaddress').hide();
		   $('#sameasshpping').hide();
		   $("#country2").val('');
			$("#country2").selectpicker('refresh');
			$("#bil_ad1").val('');
			$("#bil_ad2").val('');
			$("#bil_fname").val('');
			$("#bil_lname").val('');
			$("#bil_zipcode").val('');
			$("#bil_contact").val('');
			$("#state2").html('<option value="">Select State</option>');			
			$("#city2").html('<option value="">Select City</option>');
			$("#city2").selectpicker('refresh');
			$("#state2").selectpicker('refresh');
			$("#email1").val('');
			$('#same_ship').removeAttr('checked');
	   }
   });
});
$('.product_qty').on('change', function() {
  var price=($(this).val()* $(this).attr("data-price")).toFixed(2);
  var class_val=($(this).attr("data-qid")).replace("qty_","");
  $("#qty_"+class_val).html($(this).val());
  $.ajax({
			 type: "POST",
			 url: "/"+ "order/setproduct_qty", 
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
				  $("#price_"+class_val).each(function() {
					  $(this).html("$ "+price);
					   $('#price_'+class_val).attr('data-pprice',price);
					  grand_total();
					});
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
			$("#tax").html(p_tax+'.00')
		});
		$.ajax({
			 type: "POST",
			 url: "/"+ "order/getdelivery_charge", 
			 cache:false,
			 success: function(data){
				$("#delivery_charge").html(data+'.00');
			$("#g_total").html("$" + (g_total).toFixed(2));
			$("#g_total1").html("$" + (g_total+parseInt($("#delivery_charge").html())+parseInt($("#tax").html())).toFixed(2));
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
		$("#cart_checkout").attr("href", "javascript:void(0)")
	}
	else 
	{	$("#cart_checkout").attr("href", "/order/checkout")
	}	
}

$(document).ready(function () {
$('#registrationform').validate({
rules: {
	    ship_fname  : {
            required: '#newaddress:checked'
		},
	bil_fname  : {
            required: '#newaddress1:checked'
		},
	    ship_lname   : {
            required: '#newaddress:checked'
		},
	   bil_lname  : {
            required: '#newaddress1:checked'
		},
		ship_ad1   : {
            required: '#newaddress:checked'
		},
	    bil_ad1  : {
            required: '#newaddress1:checked'
		},
	 ship_ad2:{
		 required: '#newaddress:checked'
		},
	  bil_ad2  : {
            required: '#newaddress1:checked'
		},
		country1:{
		  required: '#newaddress:checked',
		},
		country2:{
		 required :' #newaddress1:checked',
		},
		email: {
            required: '#newaddress:checked',
            email: true,
            },
		email1: {
            required: '#newaddress1:checked',
            email: true,
            },
			ship_zipcode:{
			  required: '#newaddress:checked',
			  //number:true,
			},
			bil_zipcode:{
			  required: '#newaddress1:checked',
			  //number:true,
			},
			ship_contact:{
			  required: '#newaddress:checked',
			  //number:true,
			},
			bil_contact:{
			  required: '#newaddress1:checked',
			  //number:true,
			}
		},
 messages: {
			ship_fname  : "Please Enter  Firstname",
			ship_lname    : "Please Enter  Lastname",
			ship_ad1   : "Please Enter Address1",
			ship_ad2   : "Please Enter Address2",
			bil_fname  : "Please Enter  Firstname",
			bil_lname    : "Please Enter  Lastname",
			bil_ad1   : "Please Enter Address1",
			bil_ad2   : "Please Enter Address2",
			country1  : "Please select country",
			country2  : "Please select country",

			email: {
            required: "Please Enter E-mail Address",
            email: "Please Enter valid E-mail address",
            },
			email1: {
            required: "Please Enter E-mail Address",
            email: "Please Enter valid E-mail address",
            },
			ship_zipcode:{
			  required: "Please  Enter Postcode",			  
			},
			ship_contact:{
			  required: "Please  Enter Telephone",
			},
			bil_zipcode:{
			  required: "Please  Enter Postcode",
			  
			},
			bil_contact:{
			  required: "Please  Enter Telephone",
			}
			},
 ignore: []
});


$("#same_ship").click(function(){
if($('#same_ship').is(':checked'))
{
		$("#country2").val($("#country1").val());
		$("#bil_ad1").val($("#ship_ad1").val());
		$("#bil_ad2").val($("#ship_ad2").val());
		$("#bil_fname").val($("#ship_fname").val());
		$("#bil_lname").val($("#ship_lname").val());
		$("#bil_zipcode").val($("#ship_zipcode").val());
		$("#bil_contact").val($("#ship_contact").val());
		$("#email1").val($("#email").val());
}
else
{
	$("#bil_ad1").val('');
		$("#bil_ad2").val('');
		$("#country2").val('');
		$("#bil_fname").val('');
		$("#bil_lname").val('');
		$("#bil_zipcode").val('');
		$("#bil_contact").val('');
		$("#email1").val('');
}

});
});
function delete_address(addressid)
{
	 $.ajax({
			 type: "POST",
			 url: "/"+ "home/delete_address", 
			 data: {addressid:addressid},
			 cache:false,
			 success: function(data){
					bootbox.alert("<b style='color:green;'>Deleted Successfully</b>", function() {
						location.reload();
					});
				 }			
  });
}
</script>
<?php include 'includes/footer.php'; 
}
else
{
header("Location:login.php?id=$id");		
}
?>