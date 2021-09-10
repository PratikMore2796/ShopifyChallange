<?php
require_once ('connect.php');
if(isset($_POST['submit']))
{    
$username = $_POST['uname'];
$pass = $_POST['pass'];
    if(empty($username))
    {
        header("location:../Login.php?username-empty");
    
        exit();
    }
    elseif(empty($pass))
    {
        header("location:../Login.php?password-empty");
        exit();
    }
    else
    {
        $sql = "SELECT user_email FROM user_table WHERE user_email = :username";
        $stmt= $con->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
            $sql = "SELECT user_email FROM user_table WHERE user_password = :pass";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            if ($stmt->rowCount() > 0)
            {
                session_start();
                $_SESSION['login'] = $username;
                header('location:../Dashboard.php');
            }
            else
                {
                    header("location:../Login.php?invalid_password");
                }
        }
        else
            {
                header("location:../Login.php?un-authorize-user");
            }
    }
    
}
?>