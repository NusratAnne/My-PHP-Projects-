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
		
			<input type="text" name="message_query" placeholder="Search" 
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
			<input type="submit" name="searchmessage" value="Search" style="position: relative;
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

						$u_id = $_GET['u_id'];
						$get_user = "select * from users where user_id='$user_id'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);
                        $user_name = $row['user_name'];
			            $user_image = $row['user_image'];
						}
						
                        echo"
                        <center><div style='position: relative; top: 50px; background-color: #202932; color: #fff; border: 1px solid #202932; width: 700px;  height:400px;'>
                        <center><h2>Send a message to <span> $user_name </span></h2>

                        <form action='#' method= 'post' >
                          <p>Subject</p>
                        <span><input type='text' name='msg_title'></span>
                        <p>Message</p>
                        <span><textarea name='msg' cols='50' rows='50' style='height: 100px; width: 500px; position: relative; left: 0px;'></textarea></span>

                        <button type='submit' name='message' 

                                 style='position: relative;
			                            top: 20px;
			                            left: 0PX;
			                            height: 30px;
			                            width: 300px;
										border-style: solid;
										border-radius: 5px;
										border-color: #008080;
										text-align: center;
										cursor: pointer;'>
						                SEND MESSAGE </button>
                        	
                        </form></center></div></center>";

                        
                        if(isset($_POST['message'])){

                        	$msg_title = $_POST['msg_title'];
                        	$msg = $_POST['msg'];

                        	$insert = "insert into messages(sender, receiver, msg_sub, msg_topic, reply, status, msg_date) values('$user_id', '$u_id', '$msg_title', '$msg', 'no_reply', 'unread', NOW())";

                        	$run = mysqli_query($con, $insert);

                        	if($run){

                        	  echo "<script>alert('message has been sent')</script>" ;
                        	}

                        	else{

                        	 echo "<script>alert('message was not sent')</script>";

                        	}

                        } 

                    ?>

	
	
	
</body>
</html>
<?php
}
?> 
