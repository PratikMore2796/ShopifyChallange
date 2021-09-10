<?php
require_once ('connect.php');
if(isset($_POST['submit']))
{    
    $username = $_POST['email'];
    $pass = $_POST['pass'];
    if(empty($username))
    {
        header("location:../Registration.php?email-empty");
    
        exit();
    }
    if(empty($pass))
    {
        header("location:../Registration.php?password-empty");
        exit();
    }else
    {
        $sql = "INSERT INTO user_table(user_email, user_password) VALUES(:email, :pass)";
        $stmt= $con->prepare($sql);
        $stmt->bindParam(':email',$username);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
                header('location:../Registration.php?registration=success');
            
        }
        else{
            header('location:../Registration.php?registration=fail');
        }           
}}
?>