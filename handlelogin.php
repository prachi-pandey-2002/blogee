<?php include "function.inc.php"; ?>
<?php
//This script will handle login
session_start();
// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: home.php");
    exit;
}
require_once "db.php";

$useremail = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $useremail = get_safe_value($_POST['useremail']);
    $password = get_safe_value($_POST['userpassword']);
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $res = mysqli_query($conn,"select user_id,username,userpassword from users where useremail='$useremail'");
        if(mysqli_num_rows($res) == 1){
                 $res1=mysqli_fetch_assoc($res);
                 $hashed_password=$res1['userpassword'];
                  if(password_verify($password,$hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            $_SESSION["username"] = $res1['username'];
                            $_SESSION["id"] =  $res1['user_id'];
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: home.php?loginsuccess=true");
                            exit();
                        }
                        else{
                          $showerr = "Passwords does not match"; 
                          header("Location: home.php?loginsuccess=false&error=$showerr");
                          exit(); 
                        }
                    }
                    else{
                      $showerr = "Email Not Registered"; 
                      header("Location: home.php?signupsuccess=false&error=$showerr");
                      exit(); 
                    }

                }   
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
