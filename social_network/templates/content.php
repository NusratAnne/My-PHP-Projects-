
<div class="body_section">
	<p style="font-family: verdana; font-weight: bold; color: black; position: relative; top: 35px; left: 155px;">
		join the largest community of Humayun Ahmed's fan. <br>
		
	</p>

	<div class="img">
		<img src="images/humayun.jpg" height="300px;" width="600px;">
	</div>
	
	<div class="usersignup">
		<p style="font-size: 32px; color: black; font-weight: bold;"> Create and account here!
		</p>
		<p style="color: black;"><strong>its free and always will be!</strong>
		</p>
		<div id="form">
			<form class="signup_form" method="post">
				<table>
					<tr>
						<td>
							<input type="text" name="u_name" required="required" placeholder="Full Name">
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="u_pass" required="required" placeholder="Enter Your Password">
						</td>
					</tr>
					<tr>
						<td>
							<input type="email" name="u_email" required="required" placeholder="Enter Your Email Please">
						</td>
					</tr>
					<tr>
						<td>
							<select name="u_country">
								<option>Select a country</option>
								<option>Bangladesh</option>
								<option>Australia</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							<select name="u_gender">
								<option>Select a gender</option>
								<option>Male</option>
								<option>female</option>
								<option>others</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="date" name="u_birthday" required="required">
						</td>
					</tr>

				</table>
			</div>
			<input class="buttonsignup" type="submit" name="sign_up" value="Creat an account">	
			<div>
				<?php include("sign_up.php"); ?>
			</div>
			</form>
	</div>
</div>