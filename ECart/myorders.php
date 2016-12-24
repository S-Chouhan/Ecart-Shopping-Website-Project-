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
    <title>Home | Ecart</title>
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
.shipping_data-1 label {
    width: 38%;
    float: left;
}
.edit_this {
float:left;
}
.remove_this {
float:right;
}

.msg{
    color:green;
}
</style>
<!--/head-->
<body>
<?php 
	
			$sql="SELECT * from users where email='$user'";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
            {
?>
 <section>
	<div class="container">
		<div class="category-tab2">
			<div class="signup-page"> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="header-heading"> 
						<h1>My Orders </h1>
					</div>
					
          
   <div class="row">
   </div>
   <?php } ?>
   <div class="row">
      <?php 
		  
			$sql="SELECT * from orders where email='$user'";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
            {
?>
   <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
   <div class="address_new1">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  <img src="cart/product/<?php echo $row['image']?>" alt="<?php echo $row['name']?>" class="img-responsive" width="150px" height="150px">
   <h4> Order ID - <?php echo $row['orderid']?> &nbsp; Estimated Delivery -- <?php echo $row['delivery_date']?> </h4>
	<p >Product - <?php echo $row['name']?>, Quantity - <?php echo $row['quantity']?>, Price - $<?php echo $row['total_price']?>.00</p>
 	<br />
       </p>
   <div class="shipping_data shipping_data-1">
	
	<a class="remove_this"  href="delete_orders.php?id=<?php echo $row['orderid']?>" onclick="return conf();" >Cancel</a>
   </div>
   </div>
   
   </div>
   </div>
   <?php }?>
   
   
	     
   </div>   
    </div>       
            </div>
          </div>
          
          <!--/recommended_items--> 
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
<script type="text/javascript">
function conf()
{
	
	var r=confirm("Do you wish to cancel the Order...?");
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
	</section>

 
</body>

</html>
<?php include 'includes/footer.php'; 
}
else
{
header("Location:index.php");
}
?>