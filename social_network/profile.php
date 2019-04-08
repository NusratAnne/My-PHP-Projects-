<!DOCTYPE html>
<?php
	session_start();
	include('includes/connection.php');
	include('functions/function.php');
	if(!isset($_SESSION['user_email'])){
		header("location: index.php");
	}
	else{
?>

  <?php
	include("header.php");
  ?>
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
	
			<?php
						$user = $_SESSION['user_email'];
						$get_user = "select * from users where user_email='$user'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);

						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
						$user_pass = $row['user_pass'];
						$user_email = $row['user_email'];
						$describe_user = $row['describe_user'];
						$user_image = $row['user_image'];
						$user_country = $row['user_country'];
						$user_gender= $row['user_gender'];
						$user_birthday = $row['user_birthday'];

						$user_posts = "select * from posts where user_id='$user_id'";
						$run_posts = mysqli_query($con, $user_posts);
						$posts = mysqli_num_rows($run_posts);

						$sel_msg = "SELECT * FROM messages WHERE receiver='user_id' AND status='unread' ORDER by 1 DESC";
						$run_msg = mysqli_query($con, $sel_msg);
						$count_msg= mysqli_num_rows($run_msg);
                        ?>


						
						<div>
						<center>
							<img src="users/<?php echo $user_image ?>" style="width:400px; height: 400px; border-radius: 50%;" />
						</center>

						<form action="profile.php" method="POST"  enctype="multipart/form-data">

						<input type="file" name="file" style="position: relative; left: 900px; top: -200px; ">
						<button type="submit" name="submit" style="position: relative;left: 680px; top: -150px;">UPLOAD IMAGE</button>
	
						</form>

						<center><table border="1" cellpadding="1" style= "width: 50%;">
							<thead>
								<th>Name</th>
								<td><?php echo $user_name ?></td>
							</thead>
							<thead>
								<th>Status</th>
								<td><?php echo $describe_user ?></td>
							</thead>
							<thead>
								<th>Email</th>
								<td><?php echo $user_email ?></td>
							</thead>
							<thead>
								<th>Gender</th>
								<td><?php echo $user_gender ?></td>
							</thead>
							<thead>
								<th>Birthday</th>
								<td><?php echo $user_birthday ?></td>
							</thead>
							<thead>
								<th>Country</th>
								<td><?php echo $user_country ?></td>
							</thead>
						</table><br><br><br><br>
						</center>
						

					
					<?php

                        if(isset($_POST['submit'])){

	                    $fileName = $_FILES['file']['name'];
	                    $fileTmpName = $_FILES['file']['tmp_name'];
	
 
                        $fileDestination = 'users/' .$fileName; 
                        move_uploaded_file($fileTmpName, $fileDestination) ;
                    
                    
    	

                        $update = "update users set user_image = '$fileName' where user_id = '$user_id' ";

                        $run = mysqli_query($con, $update);

                        if($run){
	                             echo "<script>alert('your image uploaded successfully')</script>";
	                             //echo "<script>window.open('profile.php', '_self')</script>";
	                             //header('location: home.php');
                                 exit();

                        }
                        }



                     ?>
	
</body>
</html>

<?php  
}
?> 
