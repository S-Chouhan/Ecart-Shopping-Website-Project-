<?php session_start();
include('includes/dbconnect.php');
if(isset($_SESSION['id']))
{
$id=$_GET['id'];
}
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
.items_bg {
	margin-top: 10px !important;
}
.my-cart {
	margin-top: 10px !important;
}
.wishlist_name_wish {
	background-color: #086EC4;
	color: #fff;
}
.sort_items .bootstrap-select {
	background-color: #f3f3f3 !important;
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
.btn-arrow {
}

.nice-select .list {
	background-color: #fff;
	width:100%;
	min-width:180px;
	float:left;
	border-radius: 0px;
	box-shadow: 0 0 0 1px rgba(68, 88, 112, 0.11);
	box-sizing: border-box;
	margin-top: 1px;
	opacity: 0;
	height:200px;
	overflow: hidden;
	overflow-y:scroll;
	padding: 0;
	pointer-events: none;
	position: absolute;
	top: 100%;
	left: 0;
	-webkit-transform-origin: 50% 0;
	transform-origin: 50% 0;
	-webkit-transform: scale(0.75) translateY(-21px);
	transform: scale(0.75) translateY(-21px);
	transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
	/*z-index: 9000;*/
	z-index: 99;
}

</style>

<!--/head-->

<body>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="wrapper"> 
          
          <!-- Middle page -->
		<div class="middle">
            <div class="header-heading">
              <h1>Items in your cart <a href="index.php">Continue Shopping</a></h1>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <!-- Modal content-->
					<div class="row">
						<?php 
						$deliver_charge = 0;
						//$id=$_GET['id'];
						$user = $_SESSION['user'];
						//$prodid=mysql_query("SELECT productid from cart where email='$user'");
						//$res=mysql_query("SELECT * from product where id='$user'");
						$res=mysql_query("SELECT c.*,p.* from products p,cart c where p.id=c.productid and c.email='$user'");
						$count=mysql_num_rows($res);
						if($count>0)
						{
							while($row=mysql_fetch_array($res))
							{
							
							?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="no_items">
								<div class="items_bg data_qty_check" id="data_check_300" data-check="0">
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<div class="img-width"> 
											<img src="cart/product/<?php echo $row['image_url']?>" class="img-responsive" /> 
										</div>
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
										<div class="item-heading">
											<h1><a href="#"><?php echo $row['name']?></a></h1>
											<p>In Stock</p>
											<!--<a href="">more like this</a>-->
											<p> <a href="delete_product_cart.php?id=<?php echo $row['productid']?>" onclick="return conf();" class="remove_this">Remove</a>
											  <a href="to_wishlist.php?id=<?php echo $row['id']?>&page=order.php" class="wish_this">Wishlist</a>
											</p>
										</div>
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
										<div class="qty">
											<h2><strong>Quantity</strong> <span></span></h2>
												<div class="box1">
													<div class="qty2">
														  <select id="qty<?php echo $row['productid']?>" prod="<?php echo $row['productid']?>">
														  <option value="1">1</option>
														  <option value="2">2</option>
														  <option>3</option>
														  <option>4</option>
														  <option>5</option>
														  <option>6</option>
														  <option>7</option>
														  <option>8</option>
														  <option>9</option>
														  <option>10</option>
														</select>
													</div>
												</div>
										</div>
									</div>
<script>
$("#qty<?php echo $row['productid']?>").change(function () {
    var prod = $('#qty<?php echo $row['productid']?>').attr("prod");
	var str = $('#qty<?php echo $row['productid']?>').val();
    var upri = $("#produ"+prod).attr("unit_price");
    var pri = upri * str;
	var price = '$'+pri+'.00';
    $('div.produ'+prod).text(price);
	$('div.produi'+prod).text(str);
	$.post("qty.php", {product:prod,price:pri,uprice:upri,qtyval:$(this).val()});
  })
  .change();
</script>


							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
										<div class="price">
											<h3><strong>Price</strong></h3>
											<div id="produ<?php echo $row['productid']?>" class="produ<?php echo $row['productid']?>" unit_price="<?php echo $row['price']?>">$<?php echo $row['price']?>.00</div>
										</div>
									</div>
									<p id="qtyerr_300" style="color:red; text-align:center;width:100%;float:left;margin-bottom:0px;padding-bottom:0px;"></p>
								</div>
							</div>
							<?php } 
						}
						else
						{?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="no_items">
							<div class="items_bg data_qty_check" id="data_check_300" data-check="0">
						<?php 
						echo "No items in the cart";
						?>
							</div>
						</div>
						<?php
						}?>
							
					</div>
				</div>
				
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="my-cart">
                    <h2>Order Summary</h2>
                    <!--<img src="/assets/images/my-cart-img.png" /> -->
                    
                    <div class="mycart-items">
                      <ul>
                        <li class="mycart-items-li-first mycart-items-li-header">&nbsp;&nbsp;Item</li>
                        <li class="mycart-items-li-second mycart-items-li-header">Qty</li>
                        <li class="mycart-items-li-third mycart-items-li-header">Price</li>
                      </ul>
                      <ul id="li_cart_300">	
					  <?php 
						$resu=mysql_query("SELECT c.*,p.* from products p,cart c where p.id=c.productid and c.email='$user'");
						$cou=mysql_num_rows($resu);
						if($cou>0)
						{
							while($row1=mysql_fetch_array($resu))
							{
							$deliver_charge = 0;
							$deliver_charge = $deliver_charge + $row1['delivery_charge'];
							?>
                        <li class="mycart-items-li-first"><?php echo $row1['name']?></li>
                        <li class="mycart-items-li-second" id="produ<?php echo $row1['productid']?>">
							<div id="produi<?php echo $row1['productid']?>" class="produi<?php echo $row1['productid']?>" unit_price="<?php echo $row1['price']?>">
							1
							</div>
						</li>
                        <li class="mycart-items-li-third to_price " id="price_<?php echo $row1['productid']?>"  data-pprice="10.00"  data-ptx="">
						<div id="produ<?php echo $row1['productid']?>" class="produ<?php echo $row1['productid']?>" unit_price="<?php echo $row1['price']?>">
						$<?php echo $row1['price']?>.00
						</div>
						</li>							
							<?php }}?>
                        <!--<li></li>-->
                      </ul>
					  
                      <ul>
                        <li class="mycart-items-li-first" style="border-bottom:none;">Delivery Charge:</li>
                        <li class="mycart-items-li-second" style="border-bottom:none;">&nbsp;</li>
                        <li class="mycart-items-li-third" style="border-bottom:none;"><strong>$<span id="delivery_charge"><?php echo $deliver_charge;?>.00</span></strong></li>
                      </ul>
                      <!--<ul class="total_pro">
                        <li class="mycart-items-li-first"><strong>Total:</strong></li>
                        <li class="mycart-items-li-second">&nbsp;</li>
                        <li class="mycart-items-li-third"><strong id="g_total1">$0.00</strong></li>
                      </ul>
                       <div class="point-order">
                   <span style="float:left;margin-top:9px;">Points on Order</span>
                   <span class="order-text">2</span>
                   </div>  --> 
                      
                    </div>
                    <a href="shipping.php" class="checkout" >CHECK OUT</a> </div>
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
<!--<script>
$("#qty").change(function () {
    var prod = $('#qty').attr("prod");
	var str = $('#qty').val();
    var pri = $("#produ"+prod).attr("unit_price");
    var str = pri * str;
	var str = '$'+str;
    $('div.produ'+prod).text(str);
  })
  .change();
document.getElementById("product").style.visibility = "visible";
  </script>-->
<script>  

$( document ).ready(function() {
if(typeof markwishlistproducts=='function')
{
    markwishlistproducts();
}
   grand_total();
   check_checkout();
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
					$("#qtyerr_"+class_val).html('There is only '+data+ ' quantity for this product');
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

function check_checkout()
{
	var checkout=[];
	 $(".data_qty_check").each(function() {
			checkout.push($(this).attr("data-check"));
	});	
	//alert(checkout.indexOf('1'));
	if (checkout.indexOf('1') >-1) 
	{
		$("#cart_checkout").attr("href", "javascript:void(0)");
	}
	else 
	{
		$("#cart_checkout").attr("href", "/order/checkout");
	}
	if($(".data_qty_check").length==0)
	{
		$("#cart_checkout").attr("href", "javascript:void(0)");
	}
}

</script>
<script type="text/javascript">
function conf()
{
	
	var r=confirm("Remove Product from the cart...?");
	if(r==true)
		{
		return true;
		}
	else
		{
		return false;
		}
}
</script>
<?php include 'includes/footer.php'; 
}
else
{
header("Location:login.php?id=$id");		
}
?>