<!-- Start header section -->
  <header id="aa-header">
  <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+92-312-3456-789</p>
                </div>
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-envelope"></span>support.legendshub@gmail.com</p>
                </div>
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-map-marker"></span>Dadu, Sindh</p>
                </div>  
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li class="hidden-xs"><a href="help.php">Help</a></li>
                  <li class="hidden-xs"><a href="return&exchange_policy.php">Return & Exchange</a></li>
                  <li class="hidden-xs"><a href="customer/my_account.php?my_orders">
                <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "Welcome :Guest"; 
                    }
                  else
                      { 
                echo "Welcome : " . $_SESSION['customer_email'] . "";
                  }
                ?>
              </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->
   <!-- start header bottom  -->
   <div class="aa-header-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- img based logo -->
                 <a href="index.php"><img src="resources/img/logo.png" alt="logo img"></a>
				</div>
				<!-- / logo  -->
				 <!-- myaccount -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="cart.php">
                   <span><img src='resources/img/shopp.png'></span>
				   <br>
                  <span style="font-weight: bold; letter-spacing:1px;" class="aa-cart-title">MY CART</span>
                  <span class="aa-cart-notify"><?php items(); ?></span>
                </a>
                </div>
				<!-- myaccount -->
				<div class="aa-cartbox">
                <ul>
                    <span><img style="width:45px;" src='resources/img/man1.png'></span>
					<br>
					<li style="float: right; margin-top: 5px; ">
                      <?php
						if(!isset($_SESSION['customer_email'])){
							echo '<a style="color:#facc04; font-weight:bold;letter-spacing:1px;" href="customer_register.php">SIGN UP</a>';
						}else{ 
							echo '<a  href="customer/my_account.php?my_orders" style="color:#facc04;font-weight:bold;letter-spacing:1px;">My Account</a>';
						}?> 
                    </li>
                    <li style="float: left;	margin-top: 5px;">
                      <?php
						if(!isset($_SESSION['customer_email'])){
							echo '<a style="color:#facc04;font-weight:bold;margin-right: 5px; letter-spacing:1px;" href="checkout.php">LOGIN</a><a style="color:#facc04;font-weight:bold;margin-right: 5px; letter-spacing:1px;">/</a>';
							}?>  
                    </li>
                </ul>
				</div>
				<!-- search box -->
				<div class="aa-search-box">
					<form action="#" method="GET">
						<input style="letter-spacing: 2px;"type="text" class="form-control" name="search" placeholder="What are you looking for ...">
						<button type="submit" class="form-control"><span class="fa fa-search"></span></button>
					</form>
				</div>
				<!-- / search box -->
            </div>
        </div>
      </div>
    </div>
  </div>
 <!-- /end header bottom -->
 <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">           
             <li><a href="index.php">Home</a></li> 
			  <li><a href="women.php">Women</a></li>
				<li><a href="kids.php">Kids</a></li> 
				<li><a href="men.php">Men</a></li>
				<li><a href="new_arrivals.php">New Arrivals</a></li>
              <li><a href="special_deals.php">Special Deals</a></li>				
             <li><a href="contact.php">Contact Us</a></li> 
			<li><a href="#">About Us</a></li> 			 
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>