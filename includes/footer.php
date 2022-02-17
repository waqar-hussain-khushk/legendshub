<!-- footer -->  
<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Contact Us</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="index.php">Contact Us</a></li>
                    <li><a href="#">Work With Us</a></li>
					<li><a href="#">Developer Team</a></li>
					</br>
					<div>
                      <a href="#"><span><img src="resources/img/facebook.svg"></span></a>
                      <a href="#"><span><img src="resources/img/instagram.svg"></span></a>
                      <a href="#"><span><img src="resources/img/whatsapp.svg"></span></a>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Help</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">How to Order ?</a></li>
					  <li><a href="return&exchange_policy.php">Return & Exchange</a></li>
                      <li><a href="#">Shipping Details</a></li>
					  <li><a href="privacy_policy.php">Privacy Policy</a></li>
                      <li><a href="faqs_page.php">FAQs</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>User Info</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">
					  <?php
						if(!isset($_SESSION['customer_email'])){
							echo '<a class="dropdown__link" href="customer_register.php">Register</a>';
						}else {
                            echo '<a  href="my_account.php?my_orders" class="login__link">My Account</a>';
						}?></a></li>
					  <li><a href="#">
					  <?php
						if(!isset($_SESSION['customer_email'])){
							echo '<a class="dropdown__link" href="checkout.php">Sign In</a>';
						}else
                      { 
                          echo '<a href="../logout.php" class="login__link">Log out</a>';
                      }   
                    ?>  </a></li>
                    <li><a href="customer/my_account.php?my_orders">Forgot Password ?</a></li>
                    <li><a href="customer/my_account.php?my_orders">My Orders</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Mailing Address</h3>
                    <address>
                      <p><span class="fa fa-home"></span>Legendshub Super Store, Dadu Sindh</p>
					  <p><span class="fa fa-envelope"></span>support.legendshub@gmail.com</p>
                      <p><span class="fa fa-phone"></span>+92 0312-345-678</p>
					  <p>(10:00 AM to 5:00 PM <br> Monday to Saturday)</p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Copyright &copy; Legendshub.com 2022 All Rights Reserved</p>
            <div class="aa-footer-payment">
              <span><a href="http://www.linkedin/waqarhussainkhushk">Made With <i class="fa fa-heart"></i> By SUCD Students</a></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <script src="resources/js/jquery.min.js"></script>

<script src="resources/js/bootstrap.min.js"></script>

  
  </body>
</html>