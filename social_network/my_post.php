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
	
	
	<div>
		<?php
		user_posts();
		?>
	</div>

</body>
</html>
<?php
}
?> 
