<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Contact Us</title>
  </head>
  <body>
  <?php if(!isset($_SESSION['loggedin'])){
   header("Location: home.php");
   exit();
}
?>
  <?php include 'header.php';?>
  <?php include 'db.php';?>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$firstname =get_safe_value($_POST["firstname"]);
$lastname =get_safe_value($_POST["lastname"]);
$email = get_safe_value($_POST["useremail"]);
$message = get_safe_value($_POST["usermessage"]);
$sql = "INSERT INTO `contactus` (`firstname`,`lastname`,`useremail`,`usermessage`)
VALUES ('$firstname', '$lastname', '$email','$message')";
$result = mysqli_query($conn,$sql);
if ($result) {
   echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!!</strong> Admin will contact you very Soon.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  ';
} else {
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> connection not established
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  ';
  
}
mysqli_close($conn);
}
//action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
?>

  <div class="container text-center mb-2 mt-2">
    <div class="jumbotron">
      <div class="container ">
         <h1 class="display-4">Contact Us</h1>
      </div>
    </div>
  </div>
<div class="container mt-4 mb-4">
  <form method="post" >
  <div class="row">
    <div class="col">
       <label for="exampleFormControlInput1">First name</label>
       <input type="text" class="form-control" placeholder="First name" name="firstname" id="exampleFormControlInput1" required><br>
    </div>
    <div class="col">
      <label for="exampleFormControlInput2">Last name</label> 
      <input type="text" class="form-control" placeholder="Last name" name="lastname" id="exampleFormControlInput2" required><br>  
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com" name="useremail" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" placeholder="Message" id="exampleFormControlTextarea1" rows="3" name="usermessage" required></textarea>
  </div>
     <div> <button type="submit" class="btn btn-primary">Submit</button></div>
  </form>
</div>
  
<?php include 'footer.php';?>
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