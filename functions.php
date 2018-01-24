<?php
    
    //start a session to tell if user is successfully login or signup
    session_start();
    
    //set up the connection to localhost mysql database
    $link = mysqli_connect("localhost","root","","aiemr");
    
    //check if error exists, if so exit
    if (mysqli_connect_errno()){
      
        print_r(mysqli_connect_errno());
        exit();
    }

    //check if $_GET['function']exists, otherwise will error undefined index
    $tologout = (isset($_GET['function']) ? $_GET['function'] : null);
    //to unset session if logout is valid
    if ($tologout){
        
        session_unset();
    }
?>