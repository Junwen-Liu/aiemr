<footer class="footer">
    <p>&copy; AIMER Oncology</p>
</footer>   

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginmodaltitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email address">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <a href="#" id="togglelogin">Sign Up</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginsignupbutton" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

<script>

    $("#togglelogin").click(function(){
        if($("#loginActive").val() == "1"){
            
            $("#loginActive").val("0");
            $("#loginmodaltitle").html("Sign Up");
            $("#loginsignupbutton").html("Sign Up");
            $("#togglelogin").html("Login")
            
        }else{
            
            $("#loginActive").val("1");
            $("#loginmodaltitle").html("Login");
            $("#loginsignupbutton").html("Login");
            $("#togglelogin").html("Sign Up")
        
        }
    })
    
    $("#loginsignupbutton").click(function(){
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=loginSignup",
            data: "email="+$("#email").val()+"&password="+$("#password").val()+"&loginActive="+$("#loginActive").val(),
            success: function(result){
                alert(result);
            }
        })
    })

</script>

  </body>
</html>