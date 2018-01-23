<?php
    
    //set up the connection to localhost mysql database
    $link = mysqli_connect("localhost","root","","aiemr");
    
    //check if error exists, if so exit
    if (mysqli_connect_errno()){
      
        print_r(mysqli_connect_errno());
        exit();
    }
?>