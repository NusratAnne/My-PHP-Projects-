<?php
$con = mysqli_connect("localhost", "root", "", "social_media") or die("connection was not established"); 

	function insertPost(){
		if(isset($_POST['sub'])){
			global $con;
			global $user_id;

			$content= addslashes($_POST['content']); //return string instead of character

			if($content==''){
				echo "<h2>Please Enter Your Post</h2>";
				exit();
			}
			else{
				$insert = "INSERT INTO posts(user_id, post_content, post_date) VALUES( '$user_id', '$content', NOW())";
				$run = mysqli_query($con, $insert);
					if($run){
						

						$update = "UPDATE users SET posts ='yes' WHERE user_id ='$user_id'";

						$run_update = mysqli_query($con, $update);

                        //to prevent resubmission
                        header('location: home.php');
                        exit;

					} 
			}
		}

	}

    function get_posts(){

         global $con;

    	$per_page = 4;

    	if(isset($_GET['page'])) {
    		$page =$_GET['page'];
    	}

    	else {

    		$page = 1;
    	}

        if(isset($_GET['searchpost'])){
    
        $search_query = htmlentities($_GET['post_query']);

        $start_from = ($page-1) * $per_page;

    	$get_posts = "SELECT * FROM posts where post_content like '%$search_query%' or user_id like '%$search_query%' ORDER by 1 DESC LIMIT $start_from, $per_page";
    }
    else{

        $start_from = ($page-1) * $per_page;
        $get_posts = "SELECT * FROM posts ORDER by 1 DESC LIMIT $start_from, $per_page";
     }

    	$run_posts = mysqli_query($con, $get_posts);

    	while($row_posts = mysqli_fetch_array($run_posts)){

    		$post_id = $row_posts['post_id'];
    		$user_id =$row_posts['user_id'];
    		//$content = substr($row_posts['post_content'],0,70); //?? 
            $content = $row_posts['post_content'];
    		$post_date = $row_posts['post_date'];

    		$user = "SELECT * FROM users WHERE user_id='$user_id' AND posts='yes'";

    		$run_user = mysqli_query($con, $user);

    		$row_user = mysqli_fetch_array($run_user);

    		$user_name = $row_user['user_name'];
    		$user_image = $row_user['user_image'];

    		echo"
    			<div style='position: relative; top: 300px;
                            background: buttonface; border: 1px; border-color: black; border-radius: 5px; border-style: solid;'>
                

                   <img src='users/$user_image' width='80' height='80' style='border-radius: 50%; position: relative; left: 20px; top: 20px;'/>
                        
    			   <a href='user_profile.php?u_id=$user_id' style='text-decoration: none; position: relative; left: 25px; top:-15px; font-size: 20px; '>$user_name</a>

                   <p style='position: relative; left: 100px; top: -30px;'><small> <i>$post_date</i></small></p>

    			<center><p style= 'color:black; word-wrap: break-word; '>$content</p></center><br><br><br>

    			

    			</div><br>
                ";
}
    	
    	 include("pagination.php");
    }

    function find_people()
    {
        global $con;

        $user = "select * from users";
        $run_user = mysqli_query($con, $user);

        while($row=mysqli_fetch_array($run_user)){

            $user_name = $row['user_name'];
            $user_image = $row['user_image'];
            $user_id = $row['user_id'];


            echo "
                    <span>

                    <p style='position: relative; left: 550px;'><img style = 'border-radius: 50%;' src= 'users/$user_image' width='80' height='80'/></p>
                    <center><ul style='position: relative; top:-80px; left:-20px;'><a href= 'user_profile.php?u_id=$user_id' style='text-decoration: none;'>$user_name </a></ul></center></span><hr>
                    
            " ;

        }
    }


    function user_posts(){
        global $con;

        if(isset($_GET['u_id']))
        {
            $u_id = $_GET['u_id'];
        
        }
        $get_posts = "select * from posts where user_id = '$u_id'  ORDER by 1 DESC";

        $run = mysqli_query($con, $get_posts);
        while($row = mysqli_fetch_array($run)){

            $post_id = $row['post_id'];
            $user_id = $row['user_id'];
            $content = $row['post_content'];
            $post_date = $row['post_date'];


            $user = "SELECT * FROM users WHERE user_id = '$user_id' AND posts='yes' ";

            $run_user = mysqli_query($con, $user);
            $row_user = mysqli_fetch_array($run_user);

            $user_name = $row_user['user_name'];
            $user_image = $row_user['user_image'];

            echo"
                <center><div id='posts' style='position: relative;
                                    border-style: solid;
                                    border-radius: 5px;
                                    background: buttonface;
                                    width:50%;
                                    top: 50px; 
                                    left: 0px; 
                                     >

                <p><img src= 'users/$user_image' width='80' height='80'</p>
                <a href='user_profile.php?u_id=$user_id' style='text-decoration: none;'>$user_name</a> &nbsp <small style='color:black;'>updated a post on <i>$post_date</i></small>

                <p style= 'color:black; word-wrap: break-word; '>$content</p>

                
                <a href='edit_post.php?post_id=$post_id' style ='float:right;'><button style='background: black; color: white; margin: 2px; border: none; cursor: pointer; top: -15px; position: relative;'>Edit</button></a>
                <a href='functions/delete_post.php?post_id=$post_id' style ='float:right;'><button style='background: black; color: white;  margin: 2px; border: none; cursor: pointer; top: -15px; position: relative;'>Delete</button></a>

                </div><br></center>

            ";

            include("delete_post.php");

}
}

function search_user(){
    global $con;



    if(isset($_GET['search'])){
        //echo "dff";
        //header('location: members.php');
        $search_query = htmlentities($_GET['user_query']);

  $get_user = "SELECT * FROM users WHERE user_name LIKE '%$search_query%'";

    
    }
    else{
        $get_user = "select * from users";
    }

    $run_user = mysqli_query($con, $get_user);
    while ($row_user = mysqli_fetch_array($run_user)) {
       
       $user_id = $row_user['user_id'];
       $user_name = $row_user['user_name'];
       $user_image = $row_user['user_image'];

       echo "
                    <span>

                    <p style='position: relative; left: 550px;'><img style = 'border-radius: 50%;' src= 'users/$user_image' width='80' height='80'/></p>
                    <center><ul style='position: relative; top:-80px; left:-20px;'><a href= 'user_profile.php?u_id=$user_id' style='text-decoration: none; font-size: 20px;'>$user_name </a></ul></center></span><hr>
                    
            " ;



    }
}
        
    


    


?>