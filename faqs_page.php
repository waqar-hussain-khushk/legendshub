<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>
<!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
<!-- FAQs -->
<article style="padding: 100px; background: #fff;">
    <h1>FAQs</h1>
    <h3> How will you deliver my order?</h3>
    <p>Your order will be delivered to you through a Registered Courier Service at the address you have mentioned as
        ship to address in your order. In case of Cash On Delivery order, the courier will collect the money in cash
        from you when he delivers the order.
    <p>
    <h3> How long my order will take to arrive?</h3>
    <p>Your order will usually reach your doorstep between 2 to 5 working days from the date of order. However the
        delivery can take up to 10 working days during busy holiday season or our mega sales events.</p>
    <h3>Why I can’t order more than two items per product? </h3>
    <p>We have set the product purchase limit of 2 on select items to restrict wholesalers and resellers from
        buying. We really want all of Dadu to enjoy our products.</p>
    <h3>How much do you charge for shipping?</h3>
    <p>Orders above Rs.1,499 ship free of charge.
        For orders below Rs.1,499 we charge a fix rate of Rs.199 per order.
        Our system automatically calculates the correct shipping charge when you place your order.</p>
    <h3>What if our helplines are not working?</h3>
    <p>When all our customer service lines are busy or not working we have an extra line just in case of emergency
        please dial +92 111-11-1-11</p>
</article>
		</div>
      </div>
    </div>
	<section>
<!-- /FAQs -->
<?php 
    include "includes/promo.php";
    include "includes/newsletter.php";
    include "includes/footer.php";
?>