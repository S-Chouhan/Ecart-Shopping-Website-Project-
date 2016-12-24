
<!DOCTYPE html>
<?php session_start();
include('includes/dbconnect.php');
if(isset($_GET['bc']))
{
$bc=$_GET['bc'];
print '<script type="text/javascript">'; 
print 'alert("'.$bc.'")'; 
//print 'window.location=product.php?id=$id';
print '</script>';
}
?>
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
	 <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/jquery.feedBackBox.css" rel="stylesheet" type="text/css">

    <link href="assets/css/owl.theme.css" rel="stylesheet">
<script src="assets/js/jquery.validate.min.js"></script>
 <script src="assets/js/jquery.feedBackBox.js"></script>
<style type="text/css">
.searchBox{
  background-image:url('assets/images/button.png');
  font-style: italic;
}
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
#please_wait_div
{
color:green;
}
</style>
<style type="text/css">
.item {
	float: left;
	position: relative;
}
.item-hover,  .item-hover .mask,  .item-img {
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
	font-size: 17px;
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
.msg
{
color:red;
}
</style>

<body class="fbits-home">
<section class="slider1"> 
 
  <div class="home">
  
           <div class="span12">
              <div id="owl-demo" class="owl-carousel">
			  <?php 
				$sql="SELECT * from home_slide";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
				{ ?>
                <div class="item1"> <img src="cart/slides/<?php echo $row['image_url']?>" alt="<?php echo $row['title']?>" title="" border="0" /></div>
				<?php } ?>
              </div>
            </div>
 </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="category-tab1">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <h1>Top Products</h1>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="sort_items pull-right">
                  <div class="row">
                   <!--<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                      
					  <h2>Sort By:</h2>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                     
					  
					  <div class="box">
                        <select name="category_list" id="category_list">
                          <option value="" selected>All Categories</option>
                                                    <option value="36">Traditional sweets</option>
                                                    <option value="57">Traditional Flavours</option>
                                                    <option value="58">Cashew Sweets</option>
                                                    <option value="20">Bengali Sweets</option>
                                                    <option value="39">Savouries</option>
                                                    <option value="40">Pickles</option>
                                                    <option value="41"> Powders (Karapodulu)</option>
                                                    <option value="43">Specials</option>
                                                    <option value="56">Kova Sweets</option>
                                                  </select>-->
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </ul>
		  <div id="feedback">
		  <div id="fpi_feedback">
		  <div id="fpi_title" class="rotate">
		  <h2>Feedback</h2>
		  </div>
		  <div id="fpi_content">
		  <div id="fpi_header_message">Please feel free to leave us feedback.</div>
		  <form id="sampleform" novalidate="novalidate">
		  <div id="fpi_submit_username">
		  <label for="email">Email</label> 
		  <input type="text" autocomplete="off" id="email" name="email"> 
		  <label for="mobileno">Mobileno</label> <input type="text" autocomplete="off" id="mno" name="mobileno"> 
		  <label for="username">Name</label><input type="text" id="name" autocomplete="off" name="username" undefined="" value="">
		  </div>
		  <div id="fpi_submit_message">
		  <label for="message">Message</label><textarea id="textid" autocomplete="off" name="message"></textarea>
		  <label for="captcha">captcha</label>
		  <div id="fpi_submit_username">
		  <input type="text" id="cap" name="captcha" value="" autocomplete="off">
		  </div>
		  <input type="hidden" id="someid" name="captcha_id" value="ef4cd3g">
		  <input type="text" id="someidd" class="searchBox" name="CCC" value="ef4cd3g" disabled="">
		  <img src="assets/images/view_refresh.png" onclick="refreshimage();"> 
		  </div>
		  <div id="fpi_submit_loading"></div>
		  <div id="fpi_submit_submit"><input type="submit" value="Submit">
		  </div>
		  </form>
		  <div id="fpi_ajax_message"><h2></h2>
		  </div></div></div></div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-right">
          <div class="features_items">
<!--features_items-->
            <div class="tab-content">
              <div class="tab-panesss fade in" id="traditional" category="traditional">
				<div class="row">
				<?php 
				$sql="SELECT * from products limit 15";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
				{ ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 tab-pane" id="296" category="<?php echo $row['category']?>" price="<?php echo $row['price']?>">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<div class="item item-type-double">
										<div class="item-hover">
											<div class="item-info">
												<div class="date"><i class="fa fa-heart"></i>
												<a href="to_wishlist.php?id=<?php echo $row['id']?>&page=index.php" class="wishlist_name">Wishlist</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
												<a href="product.php?id=<?php echo $row['id']?>">View</a>
												</div>
												<div class="line"></div>
												<div class="headline"><a href="to_cart.php?id=<?php echo $row['id']?>&page=index.php"> Add to cart</a></div>
												<div class="line"></div>
											</div> 
											<div class="mask"></div> 
										</div> 
										<div class="item-img"> <img src="cart/product/<?php echo $row['image_url']?>" alt="" class="img-responsive"></div> 
									</div>
								</div>
							</div>
						</div>
						<div class="choose"><h2><span><?php echo $row['name']?></span><p>$<?php echo $row['price']?></p></h2></div>
					</div>
					<?php } ?>      
      <!--/recommended_items--> 
    </div>
	
  </div>
  </div>
  
  </div>
 
</section>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row aligncenterall" id="quickview">
          
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<style> 
  #owl-demo .item1 img{
        display: block;
        width: 100%;
        height: auto;
    }
</style>
  <script src="assets/js/owl.carousel.js"></script>
  
<script>
		$(document).ready(function(){
                  $('#feedback').feedBackBox();
		$('#category_list').change(function(){
				 var value=$(this).val();
				 
				 if(value=='')
                  {
                	gettopproducts("All");  

					 }

					 else

					 {

					gettopproducts(value);      

					 }
				 });
			    $('.tab-pane[category=traditional]').show();
		});
		
function add_wishlist(proid)
{
  if(proid!='')
  {
           $.ajax({
			type: "POST",
			url: "/home/add_wishlist",
			data: {proid:proid},
			success: function(result)
			{ 
			showalert(result);
			if(!$('#wish_product_'+proid).hasClass('wishlist_name_wish'))
			{
				$('#wish_product_'+proid).addClass('wishlist_name_wish')
			}
			show_wishlist();
			},
			error: function() {
			},
			fail: function() {
			}
		   });
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
function add_quick(proid)
{
  if(proid!='')
  {
   $('#quickview').html('<img src="assets/images/refresh.gif">');
           $.ajax({
			type: "POST",
			url: "/home/get_quickview",
			data: {proid:proid},
			success: function(result)
			{ 
			 $('#quickview').html(result).removeClass('aligncenterall');
			},
			error: function() {
			},
			fail: function() {
			}
		   });
  }
}
		</script> 
<script type="text/javascript">
     
        $(document).ready(function () {
			$('.example_select').selectpicker('refresh');
			gettopproducts('All');
        });
        var tipoZoom = "1";
		
function gettopproducts(catid)

 {

  $.ajax({

      type: "POST",

      url: "/home/gethome_topproducts", 

      data: {catid: catid},

      cache:false,

      success: 

           function(data){

      $("#traditional").html(data).removeClass('aligncenterall');
	  if(typeof markwishlistproducts=='function')
	  {
         markwishlistproducts();
		 }
           }

       });

         return false;
 }
    </script>
	
  <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
      autoPlay: 3000,
      navigation : false,
      slideSpeed : 300,
      //paginationSpeed : 400,
      singleItem : true
     });
    });
	function refreshimage()
	{
	var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 7; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));
         $("#cap").val('');
	 $("#someid").val(text);
	 $("#someidd").val(text);
	 
	}
    </script>
<script type="text/javascript">
$(document).ready(function(){

 $('#sampleform').validate({
		   rules:{
                   email:{
                                  required: true,
				   email :true
				         },
				  mobileno: {
					  required: true,
					  number:true,
					  minlength: 10,
					  maxlength:10
					 
						},
                                 captcha:{
				   required :true,
				   equalTo : "#someid"
				         },
                  
					},
		    messages: {
			
			email: 
				{
                               required: "Please enter your email address."
				},
		      mobileno: 
				{
			         required: "Please correct mobile number."
				},
                       captcha: 
				{
			       required: "Enter correct captcha."
				}
			   },
		   });
		   });
</script>
<?php include 'includes/footer.php'; ?>