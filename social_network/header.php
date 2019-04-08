
<head>
	<title>welcome users!!</title>
	
	<link rel="stylesheet" href="styles/home.css" media=all>
	<link rel="stylesheet" href="styles/profile.css" media=all>
	<link rel="stylesheet" href="styles/messages.css" media=all>
	

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