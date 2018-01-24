
<?php
    //in php, the . behave similar the th & in vbscript, which means append string to string
    //include functions.php to setup database link
    include("../functions.php");

    //check if textbox is empty and valid email
    if($_GET["action"] == "loginSignup"){
        
        $error = "";
        if(!$_POST['email']){
            $error =  'An email address is required';
        }else if(!$_POST['password']){
            $error = 'A password is required';
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error  = "Please enter a valid email address";
        }

        if ($error != ""){
            
         echo $error;
            exit();
        
        }
        
        //check if the email has already been taken
        if ($_POST['loginActive'] == "0"){
            //select adn check if email exists
            $query = "select * from users where email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0){
                $error = "that email has already been taken";
            }else{
                //keep in mind not to use '' in the first () of insert into sql
                $query = "INSERT INTO users (email,password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
                    
                    if(mysqli_query($link, $query)){
                        
                        //assign id into session id
                         $_SESSION['id'] = mysqli_insert_id($link);
                        //hash the password use update query. will md5 the md5ed version of id, then append it to the password
                        $query="update users set password = '".md5(md5($_SESSION['id']).$_POST['password'])."' where id= ".mysqli_insert_id($link)." LIMIT 1";
                        mysqli_query($link, $query);
                        
                        echo 1;//sign up successfully!
                        
                    }else{
                        $error = "Couldn't created user - please try again later";
                    }
            }
        } else {
            //remember to use '" where there's string to append
            $query = "select *from users where email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            
            if ($row["password"] == md5(md5($row["id"]).$_POST['password'])){
                echo 1; //login successfully
                
                $_SESSION['id']=$row['id'];
            }else{
                $error = "can not find that username/password combination, please try again.";
            }

            
            
        } 
        
        if ($error != ""){
            
         echo $error;
            exit();
        
        }
    }
?>