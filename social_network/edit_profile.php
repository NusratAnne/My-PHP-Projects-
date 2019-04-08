
<?php
	session_start();
	include('includes/connection.php');
	include('functions/function.php');
	if(!isset($_SESSION['user_email'])){
		header("location: index.php");
	}
	else{
?>
<!DOCTYPE html>
 <head>
	<title>welcome users!!</title>
	
	<link rel="stylesheet" href="styles/home.css" media=all>
	<link rel="stylesheet" href="styles/index.css" media=all>

	<script type="text/javascript">
    function showhide(id) {

       var divelement = document.getElementById(id);

       if(divelement.style.display == 'none')
          divelement.style.display = 'block';
       else
          divelement.style.display = 'none';
    }
</script>

</head>

<body>
	<div class="header">
	<ul>
		<li class="dis"><button onclick="showhide('sectiontohide');" 
		                        style="background: none; 
		                               border: none; 
		                               color: white; 
		                               font-size: 15px; 
		                               cursor: pointer;"> Profile
		                  </button> 
			                  <div id="sectiontohide"
			                       style="display: none;
			                              position: absolute;
			                              top: 52px;
			                          
			                              left: -45px;
			                              background: linear-gradient(to bottom, #663300 0%, #ff99cc 100%);
			                              height: 400px;
			                              width: 400px;
			                              border-style: groove;
										 border-width: 5px;
										 border-color: grey; 
										 z-index: 1">
					<?php
						$user = $_SESSION['user_email'];
						$get_user = "select * from users where user_email='$user'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);

						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
						$describe_user = $row['describe_user'];
						$user_image = $row['user_image'];
						$user_pass = $row['user_pass'];
						$user_email = $row['user_email'];
						$user_gender = $row['user_gender'];
						$user_country = $row['user_country'];
						$user_birthday = $row['user_birthday'];

						$user_posts = "select * from posts where user_id='$user_id'";
						$run_posts = mysqli_query($con, $user_posts);
						$posts = mysqli_num_rows($run_posts);

						$sel_msg = "SELECT * FROM messages WHERE receiver='user_id' AND status='unread' ORDER by 1 DESC";
						$run_msg = mysqli_query($con, $sel_msg);
						$count_msg= mysqli_num_rows($run_msg);


						echo "
						<center>
							<img src='users/$user_image' width='100' height='100' style='border-radius: 50%; position: relative; top: 10px;'/>
						</center>
						<center><div>
						<p><center><h2>$user_name</h2></center>
						<center><strong>$describe_user</strong></center></p>

						<p><a href='my_messages.php?inbox&u_id=$user_id'>Messages($count_msg)</a></p>

						<p><a href='my_post.php?u_id=$user_id'>My Posts($posts)</a></p>
						<p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>
						<p><a href='logout.php'>Logout</a></p>
						<hr>
						<p><center><a href='profile.php' style='margin: 2px; padding: 2px;'>View Profile</a></center></p>
						</div></center>	";

					?>
	 		</div>
     </li>
		<li><a href="home.php">Home</a></li>
		<li><a href="members.php">Find People</a></li>
		<li><a href="my_messages.php?inbox">Inbox</a></li>
		<li><a href="my_messages.php?sent">Sent Messages</a></li>
	</ul> 
	<form method="post" action="results.php">
		
			<input type="text" name="user_query" placeholder="Search" 
			style="position: relative;
			top: 50px;
			left: 400px;
			height: 30px;
			width: 300px;
			border-style: solid;
			border-radius: 5px;
			border-color: #008080;
			text-align: center;
			">
			<input type="submit" name="search" value="Search" style="position: relative;
			top: 50px;
			left: 400PX;
			height: 30px;
			width: 100px;
			border-style: solid;
			border-radius: 5px;
			border-color: #008080;
			text-align: center;
			cursor: pointer; 
			">
		
	</form>
	</div>

	
	<center>
		<div id="form">
			<form class="signup_form" method="post">
				<table>
					<tr>
						<td>
							<input type="text" name="u_name" required="required" placeholder="Full Name" value="<?php echo $user_name; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="u_pass" required="required" placeholder="Enter Your Password" value="<?php echo $user_pass; ?>">
							
						</td>
					</tr>
					<tr>
						<td>
							<input type="email" name="u_email" required="required" placeholder="Enter Your Email Please" value="<?php echo $user_email; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="describe_user" required="required" value="<?php echo $describe_user; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<select name="Relation">
								<option>Relationship Status</option>
								<option>Single</option>
								<option>married</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<select name="u_country">
								<option><?php echo "$user_country" ; ?></option>
								<option>Bangladesh</option>
								<option>Australia</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							<select name="u_gender">
								<option><?php echo "$user_gender" ; ?></option>
								<option>Male</option>
								<option>female</option>
								<option>others</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="date" name="u_birthday" required="required" value="<?php echo $user_birthday ; ?>">
						</td>
					</tr>

				</table>
			</div>
			<input class="buttonsignup" type="submit" name="update" value="Update">	
		</form>	
	</div>
	</center>

</body>
</html>
<?php
}
?>

<?php

if(isset($_POST['update']))
{

	$u_name= $_POST['u_name'];
	$u_email= $_POST['u_email'];
	$u_pass= $_POST['u_pass'];
	$describe_user= $_POST['describe_user'];
	$Relationship_status = $_POST['Relation'];
	$u_gender = $_POST['u_gender'];
	$u_country = $_POST['u_country'];
	$u_birthday = $_POST['u_birthday'];

	$update_user = "update users set user_name = '$u_name' , describe_user = '$describe_user' , Relationship = '$Relationship_status', user_email='$u_email', user_pass = '$u_pass', user_gender='$u_gender', user_birthday='$u_birthday', user_country= '$u_country' where user_id='$user_id' ";

	$run = mysqli_query($con, $update_user);
	if($run)
	{
    	echo "<script>alert('your profile updated')</script>" ;
        echo "<script>window.open('home.php', '_self')</script>" ;
    }
}

?> 
