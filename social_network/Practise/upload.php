<?php

if(isset($_POST['submit'])){

	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileError = $_FILES['file']['error'];
	$fileSize = $_FILES['file']['size'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
    
    if (in_array($fileActualExt, $allowed)) {

    	if ($fileError===0) { 
    		if ($fileSize< 1000000000) {
    			$fileNameNew = uniqid('',true).".".$fileActualExt;
    			$fileDestination = 'uploads/' .$fileNameNew; 
    			move_uploaded_file($fileTmpName, $fileDestination) ;
    			
    		}
    		else{
    			echo "image is too long";
    		}
    	}
    	else{
    		echo "there is an error here";
    	}
    }
    else{
    	echo "your image can not be uploaded";
    }

 
}
?>