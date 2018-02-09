<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Self defined CSS -->
    <link rel="stylesheet"
            href="http://localhost:81/AIEMR/views/css/styles.css">
    </script>
    <title>AIEMR</title>
  </head>
  <body>
      
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand font-weight-bold " href="http://localhost:81/AIEMR">CLife</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=dashboard">DashBoard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=timeline">Schedules</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Appointment/task
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?page=myschedules">Appointment</a>
          <a class="dropdown-item" href="?page=myoncologist">Task</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?page=mynotification">My Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=myprofile">My profile</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        
        <?php if($_SESSION){
        $query = "select * from users where id = '".$_SESSION['id']."' LIMIT 1";
            $result = mysqli_query($link, $query);
        if($result){
            $row = mysqli_fetch_assoc($result);
        ?>
        <span href="#" class="badge badge-pill badge-light" id = "username">
            <?php
                print_r('Log in as: '.$row['email']);
            ?>
        </span>
        <?php
        }
        ?>
        <a class="btn btn-outline-success my-2 my-sm-0" href="?function=logout">Logout</a>
        <?php }else{ ?>
      <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Login/Signup</button>
        <?php } ?>
    </div>
  </div>
</nav>