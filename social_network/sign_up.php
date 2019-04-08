<?php
session_start();
include("includes/connection.php");

	if(isset($_POST['sign_up'])){

		$name  = mysqli_real_escape_string($con, $_POST['u_name']);
		$pass  = mysqli_real_escape_string($con, $_POST['u_pass']);
		$email = mysqli_real_escape_string($con, $_POST['u_email']);
		$country = mysqli_real_escape_string($con, $_POST['u_country']);
		$gender = mysqli_real_escape_string($con, $_POST['u_gender']);
		$birthday = mysqli_real_escape_string($con, $_POST['u_birthday']);
		$status = "verified"; //what?
		$posts = "no"; //what??
		$ver_code = mt_rand();

		if(strlen($pass)<8){
			echo "<script>alert('password should be minimum 8 characters!')</script>";
			exit();
		}

		$check_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($con, $check_email); //?? query ready kore sql e
		$check =  mysqli_num_rows($run_email); //?? row number count korse

		if($check==1){
			echo "<script>alert('email already has been taken')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			exit();
		}
        $insert = "insert into users(user_name, describe_user, Relationship, user_pass, user_email, user_country, user_gender, user_birthday, user_image, user_reg_date, status, ver_code, posts) values('$name', 'Hello! this is my default status','......', '$pass', '$email', '$country', '$gender', '$birthday', 'images/user.png', NOW(),'$status', '$ver_code', '$posts' )";

        $query = mysqli_query($con, $insert);
        if($query){
        	    $_SESSION['user_email']=$email;
                echo "<script>window.open('home.php','_self')</script>";        	//header("location:home.php");

			}
		else
		{
			echo "<script>alert('registration failed')</script>";
		}
       } 
 ?>