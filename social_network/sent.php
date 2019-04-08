	<table>
   <thead>
      <tr>
        <th>
          <center>Receiver</center>
        </th>
        <th>
          <center>Subject</center>
        </th>
        <th><center>Date</center></th>
        <th><center>Reply</center></th>
      </tr>
    </thead>

		<?php

			if(isset($_GET['searchsent'])){
				
            $search_query = htmlentities($_GET['sent_query']);

		    $sel_msg = "SELECT * from messages where sender= '$user_id' and msg_sub like '%$search_query%' or msg_topic like '%$search_query%' order by 1 desc
		";
	
}
	 else{
		$sel_msg = "select * from messages where sender= '$user_id' order by 1 desc
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


			$get_receiver = "select * from users where user_id='$msg_receiver'";

			$run_receiver = mysqli_query($con, $get_receiver);
			$row = mysqli_fetch_array($run_receiver);

			$receiver_name = $row['user_name'];

		?>
      <tbody id="tb1">
		<tr>
			<td>
				<a href="user_profile.php?u_id=<?php echo $msg_receiver ; ?> ">  <?php echo $receiver_name; ?></a>
			</td>

			<td>
				<a href="my_messages.php?sent&msg_id=<?php echo $msg_id ; ?> ">  <?php echo $msg_sub; ?></a>
			</td>

			<td>
				 <?php echo $msg_date; ?>
			</td>

			<td>
				<a href="my_messages.php?sent&msg_id=<?php echo $msg_id ; ?> ">View reply </a>
			</td>

        </tr>
        </tbody>

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

		   //$update_unread = "update messages set status='read' where msg_id='$get_id'";

		   //$run_unread = mysqli_query($con, $update_unread);

		   echo "
            <center>
                
            	<h2>$msg_subject</h2>
            	<p><b> My Message: </b>$msg_topic</p>
            	<p><b>their Reply: </b>$reply_content</p>";


		   }
 