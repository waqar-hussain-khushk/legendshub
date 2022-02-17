<style>

	
	
}
</style>
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div>
         <div class="aa-contact-area">
       
         <!-- login-page -->
			<div class="login-page">
			<div>  
			<div class="login-body">
				<form action="checkout.php" method="post">
					<input type="text" class="user" name="c_email" placeholder="Enter your email" required="">
					<input type="password" name="c_pass" class="lock" placeholder="Enter your password" required="">
					<input type="submit" name="login"value="Login">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="forgot.php">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div id='cancelbtn'>
					<br>
					<button type="button" class="cancelbtn" >Cancel</button>
					<h5> Not a Member? <a href="customer_register.php">Sign Up Now »</a> </h5>
					</div>
				</form>
			</div>  
		</div>
	</div>
	<!-- //login-page -->
         </div>
       </div>
     </div>
   </div>
 </section>
	

<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

} 


}

?>