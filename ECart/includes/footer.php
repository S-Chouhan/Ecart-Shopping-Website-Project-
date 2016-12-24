<footer id="footer"><!--Footer-->
				
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="single-widget">
							<h2>CONTACT US</h2>
							<ul class="nav nav-pills nav-stacked">
								<li style="margin-top:5px;">
                                
                                <i class="fa fa-map-marker"></i>
<span class="footer_address">D.No: 1-2-3, Opposite ABC,
wall street
Chicago</span></li>
<li>&nbsp;</li>
								<li>
                                <i class="fa fa-envelope"></i>
<span class="footer_email"><a href="mailto:support@ecart.com">support@ecart.com</a></span></li>
                                <li>&nbsp;</li>
								<li><i class="fa fa-phone"></i>
<span class="footer_email1">(+100) 01010101  	</span></li>
								
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="single-widget">
							<h2>INFORMATION</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Cancellation & Refund Policy</a></li>
								<li><a href="#">Shipping & Delivery Policy</a></li>
                                <li><a href="#">Disclaimer Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="single-widget">
							<h2>CATEGORIES</h2>
							<ul class="nav nav-pills nav-stacked">
							<?php 
								$cat="SELECT * from categories limit 8";
								$catres=mysql_query($cat) or die(mysql_error());
									while($row=mysql_fetch_array($catres))
										{ ?>
										<li><a href="products.php?cat=<?php echo $row['name']?>" id="<?php echo $row['id']?>"><?php echo $row['name']?></a></li>
										<?php 
										} 
								?>
																
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<div class="single-widget">
							<h2>STORE</h2>
							<ul class="nav nav-pills nav-stacked">
        <li><a href="/home">Home</a></li>
        <li><a href="#">Special Offers</a></li>
                <li><a href="/home/login">Log In</a></li>
                 <li><a href="/order">Basket</a></li>
                                <li><a href="#">Checkout</a></li>
       </ul>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="pull-left">
© 2016 E cart , All Rights Reserved.</p>
					<span class="pull-right footer-content"><a href="#"><img src="assets/images/home/mastercard.png" width="49" height="31"></a>
                   <a href="#"><img src="assets/images/home/visa.png" width="48" height="31"></a>
                    <a href="#"><img src="assets/images/home/paypal.png" width="48" height="31"></a></span>
				</div>
                </div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<script src="assets/js/jquery.nice-select.min.js"></script>  

  
<script>
    $(document).ready(function() {
		
      $('select[rel!=notselect]').niceSelect();
	  $('select[rel=notselect]').selectpicker();
		if(typeof FastClick!='undefined')
		{
      FastClick.attach(document.body);
		}
    });
  </script>
  </body>
  </html>