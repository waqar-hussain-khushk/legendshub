<!--
  Project Name: Design & Development of E-Business Solution For LegendsHub Store
  Author : Waqar Hussain Khushk
  Author URL: https://www.linkedin.com/waqarhussainkhushk
  Version: 1.0
-->

<?php

$db = mysqli_connect("localhost","root","","refference_db");

/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////


// items function Starts ///

function items(){

global $db;

$ip_add = getRealUserIp();

$get_items = "select * from cart where ip_add='$ip_add'";

$run_items = mysqli_query($db,$get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}


// items function Ends ///

// total_price function Starts //

function total_price(){

global $db;

$ip_add = getRealUserIp();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];

$pro_qty = $record['qty'];


$sub_total = $record['p_price']*$pro_qty;

$total += $sub_total;






}

echo "Rs" . $total;



}



// total_price function Ends //

// getPro function Starts //

function getPro(){

global $db;

$get_products = "select * from products order by 1 DESC LIMIT 0,8";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";




echo "

<div class='col-md-4 col-sm-6 single' id='single'>

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > Rs.$pro_price </p>

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

}



// getPro function Ends //


/// getProducts Function Starts ///

function getProducts(){

/// getProducts function Code Starts ///

global $db;

$aWhere = array();



/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

}

}

}

/// Categories Code Ends ///

$per_page=6;

if(isset($_GET['page'])){

$page = $_GET['page'];

}else {

$page=1;

}

$start_from = ($page-1) * $per_page ;

$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;

$get_products = "select * from products  ".$sWhere;

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";

}


echo "
<div class='row'>
<div class='col-lg-6 col-sm-12 center-responsive' >

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >


<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > $product_price</p>

<p class='buttons' >

<a href='$pro_id' class='btn btn-default' >View details</a>

<a href='$pro_id' class='btn btn-primary'>

<i class='fa fa-shopping-cart' data-price=$pro_price></i> Add to cart

</a>


</p>

</div>
</div>

$product_label


</div>

</div>

";

}
/// getProducts function Code Ends ///






/// getProducts Function Ends ///


/// getPaginator Function Starts ///

function getPaginator(){

/// getPaginator Function Code Starts ///

$per_page = 6;

global $db;

$aWhere = array();

$aPath = '';



/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Categories Code Ends ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');

$query = "select * from products ".$sWhere;

$result = mysqli_query($db,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li><a href='shop.php?page=1";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'First Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";

};

echo "<li><a href='shop.php?page=$total_pages";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Last Page'."</a></li>";

/// getPaginator Function Code Ends ///

}

/// getPaginator Function Ends ///

}



// getSpl function Starts //

function getSpl(){

global $db;

$get_products = "select * from products where cat_id=7";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";




echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > Rs.$pro_price </p>

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

}
}


// getSpl function Ends //

// getMen function Starts //

function getMen(){

global $db;

$get_products = "select * from products where cat_id=5";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";




echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > Rs.$pro_price </p>

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

}
}


// getMen function Ends //

// getkid function Starts //

function getKid(){

global $db;

$get_products = "select * from products where cat_id=3";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";




echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > Rs.$pro_price </p>

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

}
}


// getKid function Ends //

// getWomen function Starts //

function getWomen(){

global $db;

$get_products = "select * from products where cat_id=2";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>New</div>

<div class='label-background'> </div>

</a>

";




echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<hr>

<h3><a href='$pro_id' >$pro_title</a></h3>

<p class='price' > Rs.$pro_price </p>

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

}
}


// getWomen function Ends //


?>
