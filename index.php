<?php 
require "header.php";


?>
<main>
	<div class="wrapper-main" >
		
		
		<section class="section-default">
			<h2 style="color: blue; margin-left: 500px;">Sign up</h2>
					<form style="margin-left: 500px; " method="POST" action="includes/signup.inc.php">
						<input type="text" name="name" placeholder="Name"><br>
						<input type="text" name="email" placeholder="Email"><br>
						<input type="password" name="password" placeholder="Password"><br>
						<input type="password" name="passwordRep" placeholder="Confirm your Password"><br>
						<button type="submit" name="signup-submit" >Sign up</button>
					
					</form>;
			
					
				
		
</section>
</div>
</main>
<?php 
 require "footer.php";
?>