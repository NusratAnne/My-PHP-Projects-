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

	<form action="">
		
			<input type="text" name="post_query" placeholder="Search" 
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
			<input type="submit" name="searchpost" value="Search" style="position: relative;
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
	
	
	<div class="post">
		<form method="post">
			<textarea cols="83" rows="4" name="content" placeholder="what's in your mind?"></textarea><br>
			<input type="submit" name="sub" value="post">
		</form>
		<?php insertPost(); ?>
		
		<?php get_posts(); ?>
		
	</div>

</body>
</html>
<?php
}
?> 
