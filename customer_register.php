<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>




<section id="aa-contact">
   <div class="container">
     <div class="row">
       <div>
         <div class="aa-contact-area">

<!-- sign up-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Create your account</h3>  
			<div class="login-body">
				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<input type="text" class="user" name="c_name" placeholder="Enter your Name" required="">
					<input type="text" class="user" name="c_email" placeholder="Enter your email" required="">
					<input type="password" name="c_pass" class="lock" placeholder="Password" required="">
					<p> Choose Your Image (optional)</p>
					<input type="file" class="form-control" name="c_image">
					<input type="submit" name="register" value="Sign Up ">
					<div class="forgot-grid">
						
						<div class="forgot">
							<a href="forgot_pass.php">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6>Already have an account? <a href="checkout.php">Login Now »</a> </h6>  
		</div>
	</div>
	<!-- //sign up-page -->
	
	</div>
       </div>
     </div>
   </div>
 </section>



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function(){

$('.tick1').hide();
$('.cross1').hide();

$('.tick2').hide();
$('.cross2').hide();


$('.confirm').focusout(function(){

var password = $('#pass').val();

var confirmPassword = $('#con_pass').val();

if(password == confirmPassword){

$('.tick1').show();
$('.cross1').hide();

$('.tick2').show();
$('.cross2').hide();



}
else{

$('.tick1').hide();
$('.cross1').show();

$('.tick2').hide();
$('.cross2').show();


}


});


});

</script>

<script>

$(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}

</script>

</body>

</html>

<?php

if(isset($_POST['register'])){

$c_name = $_POST['c_name'];

$c_email = $_POST['c_email'];

$c_pass = $_POST['c_pass'];

$c_city = $_POST['c_city'];

$c_contact = $_POST['c_contact'];

$c_address = $_POST['c_address'];

$c_image = $_FILES['c_image']['name'];

$c_image_tmp = $_FILES['c_image']['tmp_name'];

$c_ip = getRealUserIp();

move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

$get_email = "select * from customers where customer_email='$c_email'";

$run_email = mysqli_query($con,$get_email);

$check_email = mysqli_num_rows($run_email);

if($check_email == 1){

echo "<script>alert('This email is already registered, try another one')</script>";

exit();

}

$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";

$run_customer = mysqli_query($con,$insert_customer);

$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}else{

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('index.php','_self')</script>";


}
}
?>
