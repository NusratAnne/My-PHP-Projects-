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
						if(isset($_GET['u_id'])){
							global $con; 

						$user_id = $_GET['u_id'];
						$get_user = "select * from users where user_id='$user_id'";
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

						if($user_gender == 'Male'){
							$msg ='send him a message';
						}
						else{
							$msg = 'send her a message';
						}

						
					}
                        ?>
                      

					<center><div style="position: relative; width: 50%;">
						<center>
							<img src="users/<?php echo $user_image ?>" style="width:400px; height: 400px; border-radius: 50%;" />
						</center>

						<center><table border="1" cellpadding="20" width="55%">
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
						

						<center><button style="background-color: #202932;
                                               color: #fff;
                                               border: 1px solid #202932;
                                               border-radius: 3px;
                                               position: relative;
                                               top: -30px;
                                               height: 40px;">
                                        <a href="messages.php?u_id=<?php echo $user_id?>" style="text-decoration: none; 
                                                                                                 display: block; 
                                                                                                 background-color: #202932;
                                                                                                 color: #fff;
                                                                                                 border: 1px solid #202932;">
                                             <?php echo $msg ?></a></button></center>

						</p>
						</div></center>

						
						

	
</body>
</html>

<?php  
}
?> 
