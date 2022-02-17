<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <h4>Popular Products</h4>
				<?php
					$conn = mysqli_connect("localhost", "root", "", "refference_db") or die("connection failed!");
					$sql = "SELECT * FROM products";
					$result = mysqli_query($conn,$sql) or die("Query Unsuccessful!!");
						if (mysqli_num_rows($result)>0)
				{?>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
				<?php 
							while($row = mysqli_fetch_assoc($result)){
						?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"></a>
					<img src="product-images/<?php echo $row['product_img1']; ?>" alt="polo shirt img">
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To jkjCart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row['product_title'] ?></a></h4>
                      <span class="aa-product-price"><?php echo $row['product_price'] ?></span><span class="aa-product-price"><del>$65.50</del></span>
                      <p class="aa-product-descrip"><?php echo $row['product_desc'] ?></p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">New</span>
                </li>
				<?php } ?>
				 <?php } ?>
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
  
   <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
			<?php
					$conn = mysqli_connect("localhost", "root", "", "refference_db") or die("connection failed!");
					$sql = "SELECT * FROM products";
					$result = mysqli_query($conn,$sql) or die("Query Unsuccessful!!");
						if (mysqli_num_rows($result)>0)
				{?>
              <div class="aa-product-inner">
			  <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
				<?php 
							while($row = mysqli_fetch_assoc($result)){
						?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"></a>
					<img src="product-images/<?php echo $row['product_img1']; ?>" alt="polo shirt img">
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $row['product_title'] ?></a></h4>
                      <span class="aa-product-price"><?php echo $row['product_price'] ?></span><span class="aa-product-price"><del>$65.50</del></span>
                      <p class="aa-product-descrip"><?php echo $row['product_desc'] ?></p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">New</span>
                </li>
				<?php } ?>
				 <?php } ?>
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- / Products section -->
  <?php
  include("includes/header.php");
  ?>