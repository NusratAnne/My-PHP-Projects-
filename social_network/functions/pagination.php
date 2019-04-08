<div style="position: relative; top: 60px; ">

<?php
	$query = "SELECT * FROM posts";

	$result = mysqli_query($con, $query);

	$total_posts = mysqli_num_rows($result);

	$total_pages = ceil($total_posts/ $per_page);

	echo "
		<center>
		<div style='position: relative; top: 250px;'>
		<button style= 'position: relative; background-color: #202932; color: #fff; border: 1px solid #202932; width: 100px; height: 30px; left: -50px; border-radius: 5px;'> <a href='home.php?page=1' style='text-decoration: none; color: white;  ' >First Page</a></button>
	";

	for($i = 2; $i<$total_pages; $i++){
		echo "<button style= 'position: relative; background-color: #202932; color: #fff; border: 1px solid #202932; left: -50px; border-radius: 5px;'> <a href='home.php?page=$i' style='text-decoration: none; color: white;  ' >$i</a></button>";
	}

	echo "
		
		<button style= 'position: relative; background-color: #202932; color: #fff; border: 1px solid #202932; width: 100px; height: 30px; left: -50px; border-radius: 5px;'> <a href='home.php?page=$total_pages' style='text-decoration: none; color: white;  ' >Last Page</a></button>
		<br><br><br>
		
	";

?>
</div>