<?php 
 include 'db.php';
 include 'function.inc.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $useremail = get_safe_value($_POST['useremail']);
    $userpassword = get_safe_value($_POST['userpassword']);
    $securityquestion = get_safe_value($_POST['securityquestion']);
    $res=mysqli_query($conn,"select * from users where useremail='$useremail'");
    $numrows = mysqli_num_rows($res);
    if($numrows > 0){
        $res1=mysqli_fetch_assoc($res);
        $security=$res1['securityquestion'];
        if($securityquestion ==$security){
            $hash = password_hash($userpassword,PASSWORD_DEFAULT);
            $sql="update users set userpassword='$hash' where useremail='$useremail'";
            $result1 = mysqli_query($conn,$sql);
            if($result1){
                header("Location: home.php?changepassword=true ");
                exit();
            }
        }
        else
        {
            $showerr = "Enter Correct  last 4 digits of Your Phone Number "; 
            header("Location: home.php?changepassword=false&error=$showerr");
            exit();     
        }  
    }
    else{
    $showerr = "No Such Email Id Registered ";   
    header("Location: home.php?signupsuccess=false&error=$showerr");}
}
?>




    
