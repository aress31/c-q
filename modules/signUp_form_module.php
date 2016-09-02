<section class="container">
				<form method="POST" action="../treatments/registration.php">
					<section class="left">
						<label>Last Name*</label> 
						<input required type="text" name="lastname" placeholder = "Last Name">
						
						<label>First Name*</label> 
						<input required type="text" name="firstname" placeholder = "First Name">
						
						<label>Login*</label> 
						<input required type="text" name="login" placeholder = "Login">
						
						<label>Create a password*</label> 
						<label>At least 6 characters, case sensitive</label>
						<input required type="password" name="password" placeholder = "Password">
												
						<label>Confirm password*</label> 
						<input required type="password" name="confirmPassword" placeholder = "Password Confirmation">
						
						<label>Email*</label>
						<input required type="email" name="email" placeholder = "Email">
					</section>
				
			
					<aside>
						<label>Birth Date(Optional)</label>
						<input type="text" name="birthdate" id="datepicker">						
					   
						<label> Phone Number(Optional) </label>
						<input type="text" name="phone" placeholder = "Phone Number">
						
						<label>Security Question*</label>
						<br><br>
							<select name="securityQuestion" >
							   <option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
							   <option value="What is the middle name of your youngest child?"> What is the middle name of your youngest child?</option>
							   <option value="What street did you live on in third grade?">What street did you live on in third grade?</option>
							   <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
							   <option value="In what city did you meet your spouse/significant other?"> In what city did you meet your spouse/significant other?</option>
							   <option value="What was your childhood nickname?"> What was your childhood nickname?</option>
							    <option value="What was the last name of your third grade teacher?">  What was the last name of your third grade teacher?</option>
								<option value="What is the first name of the boy or girl that you first kissed?">What is the first name of the boy or girl that you first kissed?</option>
								<option value="In what city or town did your mother and father meet?">In what city or town did your mother and father meet?</option>
								<option value="What was the name of your first stuffed animal?">What was the name of your first stuffed animal?</option>
								<option value="What is your oldest cousin's first and last name?">What is your oldest cousin's first and last name?</option>
							</select>
						
						<input  required type="text" name="securityAnswer" placeholder = "Security Answer"><br/>
										
						<input type="submit" value="Sign Up"/>
					<aside>
				</form>
			</section>	
	