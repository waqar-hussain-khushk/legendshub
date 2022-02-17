<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

 <section id="aa-contact">
   <div style="background: #fff;" class="container">
     <div class="row">
       <div>
         <div class="aa-contact-area">
 <!-- contact-page -->
	<div class="contact">
		<div class="container"> 
				<h3 class="w3ls-title w3ls-title1">Leave Us A Message We Will Get You Soon.</h3>  
				<div class="col-md-12 contact-left">
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Name" required="">
						<input class="email" type="text" name="Email" placeholder="Email" required="">
						<textarea style="padding: 100px; border: 1px solid #000;" class="col-md-12" placeholder="Message" name="Message" required=""></textarea>
						<input style="margin-top: 10px; width: 70px; border: 1px solid #000; border-radius:2px; font-width: bold; padding: 5px; color: #000; background: #facc04; type="submit" value="SUBMIT">
					</form>
				</div> 
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact-page --> 
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

</body>
</html>
