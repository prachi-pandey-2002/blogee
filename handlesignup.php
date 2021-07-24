<?php 
 include 'db.php';
 include 'function.inc.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $username =get_safe_value($_POST['username']);
    $useremail = get_safe_value($_POST['useremail']);
    $userpassword = get_safe_value($_POST['userpassword']);
    $userconfirmpassword = get_safe_value($_POST['userconfirmpassword']);
    $securityquestion = get_safe_value($_POST['securityquestion']);
    $res=mysqli_query($conn,"select * from users where useremail='$useremail'");
    $numrows = mysqli_num_rows($res);
    if($numrows > 0){
        $showerr = "Email already in use";
    }
    else{
        if($userpassword == $userconfirmpassword){
            $hash = password_hash($userpassword,PASSWORD_DEFAULT);
            $sql="insert into users(username,userpassword,useremail,securityquestion) values('$username','$hash','$useremail''$securityquestion')";
            $result1 = mysqli_query($conn,$sql);
            if($result1){
                header("Location: home.php?signupsuccess=true ");
                exit();
            }
        }
        else
        {
            $showerr = "passwords do not match"; 
            header("Location: home.php?signupsuccess=false& error=$showerr");
            exit();     
        }  
    }
    header("Location: home.php?signupsuccess=false&error=$showerr");
}




?>




    
