<!DOCTYPE html>
<html>
<head>
	<title>Login and Signup</title>
	<link rel="stylesheet" href="styles/index.css" media=all>
	
</head>

<body>
	<div class = "main_container">
		<div class = "header">
			<div class="logo">
				Humayun Ahmed's Work
			</div>
			<div class="login_form">

			<form method="post">
					<table>
						<tbody>
							<tr>
								<td><strong>Email</strong></td><td><strong>Password</strong></td>
							</tr>
							<tr>
								<td>
									<input class="useremail" type="Email" name="email" placeholder="Enter Your email please" required>
								</td>
								<td>
									<input class="userpass" type="Password" name="pass" placeholder="Enter Your password please" required>
								</td>
								<td>
									<button class="userlogin" name="login">Login</button>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox"><span style="text-decoration: none; color: #ffffff;">Keep me logged in</span>
								</td>
								<td>
									<a href="#" class="fpass">Forgot Password?</a>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				
			</div>		
	</div>
