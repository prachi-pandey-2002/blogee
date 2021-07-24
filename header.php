<?php include "function.inc.php"; 
session_start();
?>

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Navbar</title>
  </head>
  <body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
   <a class="navbar-brand" href="home.php">Blogee</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
       </li>
       <?php if(isset( $_SESSION["loggedin"])){?>
          <li class="nav-item active">
            <a class="nav-link" href="blog.php">Blog</a>
            </li>
            
       
       <li class="nav-item active">
          <li class="nav-item active">
          <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
          <?php }?>
     </ul>
     <form class="form-inline my-2 my-lg-0">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <?php 
            if(isset( $_SESSION["loggedin"])){?>
        <a  class="btn btn-primary my-2 my-sm-0 ml-2" href="logout.php">Logout</a>
      <div style="color:white;margin-left:6px;">  <h6><b><?php echo  $_SESSION["username"]; ?></b></h6></div>
       <?php }
       else{?>

       <button class="btn btn-primary my-2 my-sm-0 ml-2" type="button" data-toggle="modal" data-target="#loginmodal">Login</button>
       <button class="btn btn-primary my-2 my-sm-0 ml-2" type="button" data-toggle="modal" data-target="#signupmodal">Signup</button>
       <button class="btn btn-primary my-2 my-sm-0 ml-2" type="button" data-toggle="modal" data-target="#forgetPasswordmodal">Forget Password</button>
     <?php  }?>
     </form>
   </div>
 </nav>
 
 
<!--login  Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginmodalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="handlelogin.php" method="post" name="login">
  <div class="form-group">
    <label for="exampleInputEmail1">User Email</label>
    <input type="email" name="useremail" class="form-control" id="exampleInputEmail1">
    <small id="emailHelp" class="form-text text-muted">We Will never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me in</label>
  </div>
  <button type="submit" class="btn btn-success">Login</button>
</form>
      </div>
    </div>
  </div>
</div>

<!--signup Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="post" action="handlesignup.php">
  <div class="form-group">
  <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username">

    <label for="exampleInputEmail2">Email address</label>
    <input type="email" name="useremail" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We Will never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="userpassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2"> Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="userconfirmpassword">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2"> Last Four digit of your number</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="securityquestion">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-success">Sign Up</button>
</form> 
  </div>
  </div>
  </div>
</div>

<!--Forget Password-->
<div class="modal fade" id="forgetPasswordmodal" tabindex="-1" aria-labelledby="forgetPasswordmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgetPasswordmodalLabel">Forget Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="forgetPassword.php" method="post" name="login">
  <div class="form-group">
    <label for="exampleInputEmail1">User Email</label>
    <input type="email" name="useremail" class="form-control" id="exampleInputEmail1">
    <small id="emailHelp" class="form-text text-muted">We Will never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="userpassword" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last 4 digit of your Phone Number</label>
    <input type="text" name="securityquestion" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me in</label>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>


    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>