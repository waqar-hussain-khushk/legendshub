<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->
<div class="col-md-12" >
  <!-- Cover -->
    <div class="wrapper">
            <h1>Kids Collection<h1>   
      </div>
    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

    getKid();

    ?>

    </div><!-- row Ends -->
    </div><!-- container Ends -->
	</div>
	</div>
	</div>
   <?php
	include "includes/promo.php";
	include "includes/newsletter.php";
     include "includes/footer.php";
   ?>
</body>

</html>





