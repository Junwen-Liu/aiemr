<div class="container mainContainer">

    <div class="row">
  <div class="col-md-8">
      
        <?php if (isset($_GET['userid'])) { 
      
      displayTweets($_GET['userid']); 
      
     } else {  ?>
        
        <h2>Active Users</h2>
        
        <?php displayUsers();
      
      } ?>
      
        </div>
  <div class="col-md-4">
        
        <?php displaySearch(); ?>
      
      <hr>
      
      <?php displayTweetBox(); ?>
        
        </div>
</div>
    
</div>