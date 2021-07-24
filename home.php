<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Blogee</title>
  </head>
  <body>
  <?php include 'header.php';?>
  <?php include 'db.php';?>
  <?php
 
if(isset($_GET['signupsuccess'])){
    $signupsuccess = get_safe_value($_GET['signupsuccess']);
    if(isset($_GET['error']))
       {$error=get_safe_value($_GET['error']);}
if ($signupsuccess){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!!</strong> signup successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Alert!!</strong>'.$error.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}
?>
<?php
if(isset($_GET['loginsuccess'])){
  $loginsuccess = get_safe_value($_GET['loginsuccess']);
  if(isset($_GET['error']))
     {$error=get_safe_value($_GET['error']);}
if ($loginsuccess){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!!</strong> Login successfully.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
else{
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Alert!!</strong>  '.$error.'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
}
?>
<?php
if(isset($_GET['changepassword'])){
  $changepassword = get_safe_value($_GET['changepassword']);
  if(isset($_GET['error']))
     {$error=get_safe_value($_GET['error']);}
if ($changepassword){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Congratulations!!</strong> Password Changed Successfully
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
else{
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Alert!!</strong>  '.$error.'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
}
?>

  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/image1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Database Management System</b></h5>
        <p>Database management system is a software which is used to manage the database. For example: MySQL, Oracle, etc are a very popular commercial database which is used in different applications.
DBMS provides an interface to perform various operations like database creation, storing data in it, updating data, creating a table in the database and a lot more.
It provides protection and security to the database. In the case of multiple users, it also maintains data consistency.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/image3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Web Development</b></h5>
        <p>Web development is the work involved in developing a Web site for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex Web-based Internet applications (Web apps), electronic businesses, and social network services. A more comprehensive list of tasks to which Web development commonly refers, may include Web engineering, Web design, Web content development,
         client liaison, client-side/server-side scripting, Web server and network security configuration, and e-commerce development.
Among Web professionals, "Web development" usually refers to the main non-design aspects of building Web sites: writing markup and coding.
 Web development may use content management systems (CMS) to make content changes easier and available with basic technical skills.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/image4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Operating System</></b></h5>
        <p>An operating system (OS) is system software that manages computer hardware, software resources, and provides common services for computer programs.

Time-sharing operating systems schedule tasks for efficient use of
 the system and may also include accounting software for cost allocation of processor time, mass storage, printing, and other resources.
For hardware functions such as input and output and memory allocation, the operating system acts as an intermediary between programs and the 
computer hardware,[1][2] although the application code is usually executed directly by the hardware and frequently makes system calls to an OS
 function or is interrupted by it. Operating systems are found on many devices that contain a computer – from cellular phones and video game 
 consoles to web servers and supercomputers.

</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="row mt-4 ml-4 container">

<?php
//"https://source.unsplash.com/400x300/?'.$title.'"
 $sql = "SELECT * FROM  `blog` ";
 $result = mysqli_query($conn,$sql);
 while($row=mysqli_fetch_assoc($result)){
   $id=$row['user_id'];
   $title=$row['blogtitle'];
   $description=$row['blogdescription'];
   $timestamp=$row['timestamp'];
  if(!empty($id) && !empty($title) && !empty($description) && !empty($timestamp)){
  echo'
    <div class="col-md-4 my-2 ">
    <div class="card" style="width: 18rem;">
    <img src="https://source.unsplash.com/1400x400/?code,technology,coding"  class="card-img-top" alt="image">
 
               <div class="card-body">
                   <h5 class="card-title">'.$title.'</h5>
    <p class="card-text">'.substr($description, 0, 80).'</p>
    <a href="threadlist.php?userid='.$id.'" class="btn btn-primary">Read More</a>
  </div>
</div>
    </div>';
 }
    
}
?>

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