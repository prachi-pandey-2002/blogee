<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Blog</title>
  </head>
  <body>
  <?php include 'header.php';?>
  <?php
  
  $topic = $Description="";
  $connection=false;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';
    $topic =  get_safe_value($_POST["title"]);
    $description =  get_safe_value($_POST["description"]);
    $blog_by=  get_safe_value($_SESSION['username']);
    $sql="insert into blog(blogtitle,blogdescription,blog_by) values('$topic','$description','$blog_by')";
    $res=mysqli_query($conn,$sql);
 if($res){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!!</strong> Your Blog is added SuccessFully , Thankyou for your contribution.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  ';}
  else{
    echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> connection not established
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  ';
  }}
  ?>
   <div class="container text-center mb-2 mt-2">
   <div class="jumbotron">
  <div class="container ">
    <h1 class="display-4">Contribute Here.</h1>
    <p class="lead">Write something about the topic of your interest</p>
  </div>
</div>
</div>
<div class="container mb-4 mt-2">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Topic</label><h5> <span class="badge badge-secondary badge-danger"></span></h5>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title"placeholder="Write Your Blog Topic"aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label><h5> <span class="badge badge-secondary badge-danger"></span></h5>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"rows="3" placeholder=" Write Description" required></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


  <?php include 'footer.php';?>


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