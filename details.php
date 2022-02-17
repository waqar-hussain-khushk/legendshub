<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<?php

$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";

}

$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);


?>



<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->





<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="row" id="productMain"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div id="mainImage"><!-- mainImage Starts -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">


<div class="carousel-inner"><!-- carousel-inner Starts -->

<div class="item active" style="background: #fff;">
<center>
<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
</center>
</div>

</div><!-- carousel-inner Ends -->





</div>

</div><!-- mainImage Ends -->

<?php echo $product_label; ?>

</div><!-- col-sm-6 Ends -->


<div class="col-sm-6" ><!-- col-sm-6 Starts -->

<div class="box" ><!-- box Starts -->

<h1 class="text-center" > <?php echo $pro_title; ?> </h1>

<?php


if(isset($_POST['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];

$product_size = $_POST['product_size'];


$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($con,$check_product);

if(mysqli_num_rows($run_check)>0){

echo "<script>alert('This Product is already added in cart')</script>";

echo "<script>window.open('$pro_id','_self')</script>";

}
else {

$get_price = "select * from products where product_id='$p_id'";

$run_price = mysqli_query($con,$get_price);

$row_price = mysqli_fetch_array($run_price);

$pro_price = $row_price['product_price'];

$product_price = $pro_price;

}

$query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

$run_query = mysqli_query($db,$query);

echo "<script>window.open('$pro_id','_self')</script>";

}


?>

<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-5 control-label" >Product Quantity </label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_qty" class="form-control" >

<option>Select quantity</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>


</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Product Size</label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_size" class="form-control" >

<option>Select a Size</option>
<option>Small</option>
<option>Medium</option>
<option>Large</option>


</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->



<p class="text-center buttons" ><!-- text-center buttons Starts -->

<button class="btn btn-primary" style="color: #000; background: #facc04; border: 1px solid #000;" type="submit" name="add_cart">

<i class="fa fa-shopping-cart" ></i> Add to Cart

</button>

<button class="btn btn-primary" style="color: #000; background: #facc04; border: 1px solid #000;" type="submit" name="add_wishlist">

<i class="fa fa-heart" ></i> Add to Wishlist

</button>


<?php

if(isset($_POST['add_wishlist'])){

if(!isset($_SESSION['customer_email'])){

echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}
else{

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

$run_wishlist = mysqli_query($con,$select_wishlist);

$check_wishlist = mysqli_num_rows($run_wishlist);

if($check_wishlist == 1){

echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

echo "<script>window.open('$pro_id','_self')</script>";

}
else{

$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

$run_wishlist = mysqli_query($con,$insert_wishlist);

if($run_wishlist){

echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

echo "<script>window.open('$pro_id','_self')</script>";

}

}

}

}

?>

</p><!-- text-center buttons Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- box Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

<div class="box" id="details"><!-- box Starts -->

<a class="btn btn-primary tab" style="margin-bottom:10px; color: #000; background: #facc04; border: 1px solid #000;" href="#description"><!-- btn btn-primary tab Starts -->

<?php
echo "Product Description";
?>

</a><!-- btn btn-primary tab Ends -->

<hr style="margin-top:0px;">

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" style="margin-top:7px;" ><!-- description tab-pane fade in active Starts -->

<?php echo $pro_desc; ?>

</div><!-- description tab-pane fade in active Ends -->

</div><!-- tab-content Ends -->

</div><!-- box Ends -->

<div id="row same-height-row"><!-- row same-height-row Starts -->


<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

<div style="color: height: 135px;" class="headline same-height"><!-- box same-height headline Starts -->

<h3 class="text-center"> You also may like these Products </h3>

</div><!-- box same-height headline Ends -->

</div><!-- col-md-3 col-sm-6 Ends -->

<?php

$get_products = "select * from products order by rand() LIMIT 0,3";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)) {

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_price = "Rs.$pro_price";

}

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";

echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > $product_price </p>

<p class='buttons' >

<a href='$pro_id' class='btn btn-default' >View details</a>

<a href='$pro_id' style='color: #000; background: #facc04; border: 1px solid #000;' class='btn btn-primary'>

<i class='fa fa-shopping-cart'></i> Add to cart

</a>


</p>

</div>

$product_label


</div>

</div>

";



?>


</div><!-- row same-height-row Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

