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

		if(isset($_GET['post_id'])){

			$get_id = $_GET['post_id'];

			$get_post = "select * from posts where post_id='$get_id'";

			$run_post = mysqli_query($con, $get_post);
			$row = mysqli_fetch_array($run_post);

			$post_con = $row['post_content'];
		}		

	?>
	
	
	<div class="post">
		<form method="post">
			<textarea cols="83" rows="4" name="content" placeholder="what's in your mind?"><?php echo $post_con; ?></textarea><br>
			<input type="submit" name="update" value="update">
		</form>
		
	</div>

	<?php 
		if(isset($_POST['update'])){
			$content = $_POST['content'];

			$update_post = "update posts set post_content='$content' where post_id='$get_id'";

			$run_update = mysqli_query($con, $update_post);

			if($run_update){

				echo "<script>alert('post successfully updated')</script>";
				
			    echo "<script>window.open('home.php', '_self')</script>";

			}
		}

	?>

</body>
</html>
<?php
}
?> 
