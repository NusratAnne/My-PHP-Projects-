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
 <?php 

 if(isset($_GET['inbox'])){  
	echo "<form action='' method='GET'>

	      <input type='hidden' name='inbox'>
		
			<input type='text' name='inbox_query' placeholder='Search' 
			style='position: relative;
			top: 50px;
			left: 400px;
			height: 30px;
			width: 300px;
			border-style: solid;
			border-radius: 5px;
			border-color: #008080;
			text-align: center;
			'>
			<input type='submit' name='searchinbox' value='Search' style='position: relative;
			top: 50px;
			left: 400PX;
			height: 30px;
			width: 100px;
			border-style: solid;
			border-radius: 5px;
			border-color: #008080;
			text-align: center;
			cursor: pointer; 
			'>
		
	</form>

	
	</div>";
   }
	?>

	<?php 

  if(isset($_GET['sent'])){  
	echo "<form action='' method='GET'>

	      <input type='hidden' name='sent'>
		
			<input type='text' name='sent_query' placeholder='Search' 
			style='position: relative;
			top: 50px;
			left: 400px;
			height: 30px;
			width: 300px;
			border-style: solid;
			border-radius: 5px;
			border-color: #008080;
			text-align: center;
			'>
			<input type='submit' name='searchsent' value='Search' style='position: relative;
			top: 50px;
			left: 400PX;
			height: 30px;
			width: 100px;
			border-style: solid;
			border-radius: 5px;
			border-color: #008080;
			text-align: center;
			cursor: pointer; 
			'>
		
	</form>

	
	</div>";
}
	?>



	<?php

		if(isset($_GET['sent'])){
		echo "<center><h2>Sent Messages</h2></center>";
		include("sent.php");
		}
	?>


  
	<?php

		if(isset($_GET['inbox'])){
			echo "<center><h2>Received Messages</h2></center>";
		 ?>
		
		<table>
   <thead>
      <tr>
        <th>
          <center>Sender</center>
        </th>
        <th>
          <center>Subject</center>
        </th>
        <th><center>Date</center></th>
        <th><center>Reply</center></th>
      </tr>
    </thead>
		

	<?php

		if(isset($_GET['searchinbox'])){
			
        	$search_query = htmlentities($_GET['inbox_query']);

			$sel_msg = "SELECT * from messages where receiver= '$user_id' and msg_sub like '%$search_query%' or msg_topic like '%$search_query%' order by 1 desc
			";
	   	}

	    else{
		$sel_msg = "select * from messages where receiver= '$user_id' order by 1 desc
		";
		}


		$run_msg = mysqli_query($con, $sel_msg);
		$count_msg = mysqli_num_rows($run_msg);

		while($row_msg = mysqli_fetch_array($run_msg)){

			$msg_id = $row_msg['msg_id'];
			$msg_receiver= $row_msg['receiver'];
			$msg_sender = $row_msg['sender'];
			$msg_sub = $row_msg['msg_sub'];
			$msg_topic = $row_msg['msg_topic'];
			$msg_date = $row_msg['msg_date'];


			$get_sender = "select * from users where user_id='$msg_sender'";

			$run_sender = mysqli_query($con, $get_sender);
			$row = mysqli_fetch_array($run_sender);

			$sender_name = $row['user_name'];

		?>
     <tbody id="tb1">
		<tr>
			<td>
				<a href="user_profile.php?u_id=<?php echo $msg_sender ; ?> ">  <?php echo $sender_name; ?></a>
			</td>

			<td>
				<a href="my_messages.php?inbox&msg_id=<?php echo $msg_id ; ?> ">  <?php echo $msg_sub; ?></a>
			</td>

			<td>
				 <?php echo $msg_date; ?>
			</td>

			<td>
				<a href="my_messages.php?inbox&msg_id=<?php echo $msg_id;?>">Reply</a>
			</td>

        </tr>
    </tbody>

   </table>

    <?php 
       }
	?>

	</table>
	<?php

		if(isset($_GET['msg_id'])){
		   $get_id = $_GET['msg_id'];

		   $sel_message = "select * from messages where msg_id='$get_id'";

		   $run_messages = mysqli_query($con, $sel_message);
		   $row = mysqli_fetch_array($run_messages);

		   $msg_subject = $row['msg_sub'];
		   $msg_topic = $row['msg_topic'];
		   $reply_content = $row['reply'];

		   $update_unread = "update messages set status='read' where msg_id='$get_id'";

		   $run_unread = mysqli_query($con, $update_unread);

		   echo "
            <center>
            	<h2>$msg_subject</h2>
            	<p><b>Message: </b>$msg_topic</p>
            	<p><b>My Reply: </b>$reply_content</p>

            	<form action='' method='post'>
            	<textarea cols='30' rows='5' name='reply'></textarea>
            	<input type='submit' name='msg_reply' value='reply'>
            		
            	</form>
            </center>

		   ";

		   }
		   if(isset($_POST['msg_reply'])){

		      $user_reply = $_POST['msg_reply'];

		      if($reply_content != 'no_reply'){
		      		echo "<script>alert('message was already replied')</script>";
                     exit();
		      }

		      else{

		         $update_msg = "update messages set reply='$user_reply' where msg_id='$get_id'";

		         $run_update = mysqli_query($con, $update_msg);

		         echo "<script>alert('message was already replied')</script>";

		      }
		   }
}
		
	?>
	
	
</body>
</html>

<?php
}
?> 

   
 