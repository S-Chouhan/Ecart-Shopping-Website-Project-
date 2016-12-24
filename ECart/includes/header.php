   <link rel="stylesheet" href="assets/css/style.css"> 
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/css/font-awesome.min.css" rel="stylesheet">
<!--    <link href="assets/fonts.css" rel="stylesheet">
-->	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" media="all" href="assets/css/price-range.css" />
	<link rel="stylesheet" type="text/css" media="all" href="assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/liquid-slider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="assets/css/bootstrap-select.css" />
<link rel="stylesheet" type="text/css" media="all" href="assets/css/inr-stylesheet.css" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->  
   
    <script src="assets/js/jquery.js"></script>
    
	<script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-select.js"></script>
	<script type="text/javascript" src="assets/js/allscript.js"></script>
	<link href="assets/css/local.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="assets/js/jquery.liquid-slider.min.js"></script>
    
	<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    	
	<script src="assets/js/bootbox.min.js"></script>    	
    
</head><!--/head-->
<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
			<div class="container">
            <div class="bottom_border">
				<div class="row">					
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                            <div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<?php $sql="SELECT * from tagline";
										$result=mysql_query($sql);
										while($row=mysql_fetch_array($result))
										{ ?>
									<?php echo $row['tagline']?>
									<?php }
									 if(isset($_SESSION['user']))
									{?>
									<li>
        		 <div class="box3">
			
            <select name="Myaccount" id="myaccount">
                        <option  value="myaccount" data-display="My Account" >My Account</option>
			<option value="orders" data-display="My Account" >Orders</option> 
			<option value="changepass" data-display="My Account" >Change Password</option>			
            <option value="logout" data-display="My Account" >Logout</option>			
            </select>
			 <script>
			 $(document).ready(function(){
				 $('#myaccount').change(function(){
					 $option=$(this).val();
					 switch($option)
					 {
						 case 'logout':
						 {
							  window.location='signout.php';
							  break;
						 }
						 case 'myaccount':
						 {
							  window.location='myaccount.php';
							  break;
						 }
						 case 'orders':
						 {
							  window.location='myorders.php';
							  break;
						 }
						case 'changepass':
						{
						 window.location='changepassword.php';
						 break;
						}
						 default:
						 {
							 
						 }
					 }
					 /* if($option=='logout')
					 {
						 window.location='/home/logout';
					 }
					 else
					 {
						 window.location='/home/myaccount';
					 } */
				 });
			 });
			 </script>
            </div>
          </li><?php } 
		  else
		  { ?>
		  
		  						<li>
										<div class="login_box1">
										<a href="signup.php"><img src="assets/images/signup.png" width="20px" height="20px">Signup</a>
										</div>
										<div class="login_box">
											<a href="login.php"><img src="assets/images/login.png" width="20px" height="20px"> Login</a>
										</div>
									</li>
									
			<?php } ?>
			<li>
										<a href="wishlist.php"><img src="assets/images/wishlist.png" width="20px" height="20px">Wishlist</a>
									</li>
								</div>
                            </div>
							</ul>
						</div>
					</div>
				</div>
			</div>
            </div>
		</div>	
        		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<div class="logo pull-left">
							<a href="index.php"><img src="assets/images/home/logo.png" alt="" class="img-responsive" /></a>
						</div>
					</div>
                  
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 pull-right">
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="row">
                      <form action="products.php" method="post">
                      <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 select_all1">
                     <div class="select_all">
                      <div class="box">
                    
					<select name="category" id="category" >
							<option>All</option>
                    <?php 
						$sql="SELECT * from categories";
						$result=mysql_query($sql);
						while($row=mysql_fetch_array($result))
						{ ?>
							<option value="<?php echo $row['name']?>"><?php echo $row['name']?></option> 
						<?php } ?>
					</select>
                    
					</div>
                    </div>
                    
                     <div id="custom-search-input">
					        <div class="input-group col-md-12">
							    <input type="text" class="earch-query form-control"  name="search" id="search" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger btn-arrow" type="submit" id='search_val'>
                                     <img src="assets/images/Search-icon.png" width="20px" height="20px">
                                    </button>
                                </span>
						    </div>
						</div>
                        </div>
                        </form>
                        </div>
                    </div>
					</div>
                    </div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
                
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse cbp-hrmenu hide-menu" id="cbp-hrmenu">
							<?php 
								$cat="SELECT * from categories";
								$catres=mysql_query($cat) or die(mysql_error());
									while($row=mysql_fetch_array($catres))
										{ ?>
										<li><a href="products.php?cat=<?php echo $row['name']?>" id="<?php echo $row['id']?>"><?php echo $row['name']?></a></li>
										<?php 
										} 
								?>
							</ul>
							
                            <div class="view_cart">
                            
                            <a href="order.php"> <img src="assets/images/home/add.png" width="25" height="20"> Cart <span id="item_count"></span></a>
							
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->