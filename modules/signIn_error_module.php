<hr>							
			
<section class = "container">
	<section class = "signIn">
		<h1> Sign In </h1>
		
		<div id="error_message"> 
			<img src = "../design/images/notification_error.png" alt = "notification_error" id = "notification_error">
			Wrong Identifiants, try again. 
		</div>
		
				
		<form id = "signIn" method="POST" action="../treatments/authentification.php">
			<input type = "text" name = "login" placeholder = "Login">
			<br>
			
			<label><a href = "../pages/forgotPassword.php" id = "link"> Forgot Password ? </a></label>
			<input type = "password" name = "password" placeholder = "Password"> 
			
			<br>
			<input type = "submit" name = "submit" value = "Sign In">
		</form>
		<br>
		<p> Don't have an account ? <a href = "../pages/forgot_password.php" id = "signUp"> Sign Up now </a> </p>
	</section>
	
	<aside class = "signIn">
		<img src = "../design/images/signIn_aside.png" alt = "signIn_aside" id = "signIn_aside">
	</aside>
</section>

<img src = "../design/images/signIn.jpg" alt = "signIn_logo" id = "signIn_logo">	