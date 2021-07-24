<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Blogee</title>
  </head>
  <body>
  
<?php include 'header.php';?>
<?php
 include 'db.php';

 $id= $_GET['userid'];
 $sql = "select * from blog where user_id='$id'";
 $result = mysqli_query($conn,$sql);
 while($row=mysqli_fetch_assoc($result)){
   $id=$row['user_id'];
   $title=$row['blogtitle'];
   $description=$row['blogdescription'];
   $blog_by=$row['blog_by'];
   $timestamp=$row['timestamp'];

        echo'
        <div class="jumbotron text-center">
  <h1 class="display-4">'.$title.'</h1>
  <hr class="my-4">
  <p class="lead">'.$description.'</p><br>
  <h5>by <b> '.$blog_by.'</b></h5>
</div>';

 }
 
?>

<?php if(isset($_SESSION['loggedin'])){
  //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
<div class="container mt-4 mb-4">
  <?php echo '<form method="post" action="threadlist.php?userid='.$id.'">';?>
  <div class="row">
    <div class="col">
       <label for="exampleFormControlInput1">Comment</label>
       <input type="text" class="form-control" placeholder="comment" name="comment" id="exampleFormControlInput1" required><br>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Comment</button>
</form>
  </div>
  <?php } ?>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id =  $_GET["userid"] ;
  $comment = get_safe_value($_POST['comment']);
  $comment_by=$_SESSION['username'];
  $sqlexist="insert into comment(user_id,comment,comment_by) values('$id','$comment','$comment_by')";
  $result = mysqli_query($conn,$sqlexist);
 }
  ?>
<?php  /*<img src="https://source.unsplash.com/1400x400/?code,technology,coding" id="img" class="mr-3" alt="image">*/ ?>
  <?php
 $id =  $_GET["userid"] ;
 $sql = "select * from comment where user_id='$id'order by timestamp desc limit 5";
 $result = mysqli_query($conn,$sql);
 $num_rows=mysqli_num_rows($result);
 if($num_rows>0){
 while($row=mysqli_fetch_assoc($result)){
   $comment=$row['comment'];
   $comment_by=$row['comment_by'];
   $timestamp = $row['timestamp'];
  if(!empty($comment) && !empty($comment_by) && !empty($timestamp)){
    echo '<div class="media">
    
    <img src="images/login.jpg" id="img" class="mr-3" alt="image">
   
    <div class="media-body">
      <h5 class="mt-0"><b>'.$comment_by.'</b></h5><span> at '.$timestamp.'</span><br>
    '.$comment.'
    </div>
  </div>';
 
}}}
?> 
<?php include 'footer.php';?>
<style>
#img{
  padding:8px;
  width:80px;
  height:80px;
  border-radius:50%;
}
</style>

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