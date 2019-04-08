<?php
$con = mysqli_connect("localhost", "root", "", "social_media") or die("connection was not established"); 


		if(isset($_GET['post_id'])){
			
			$post_id = $_GET['post_id'];
			

			$delete_post = "DELETE from posts where post_id='$post_id'";

			$run_del = mysqli_query($con, $delete_post);

			if($run_del){
				echo "<script>alert('a post has been deleted successfully')</script>"; 


				echo "<script>window.open('../home.php', '_self')</script>";
			}
			


		}


?>