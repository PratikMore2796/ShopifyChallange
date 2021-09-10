<?php

$server = "localhost";
$username = "root";
$pass = "";

try{
    $con = new PDO("mysql:host = $server; dbname=Shopifychallange",$username, $pass);
    // Set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Printing Message if you want I am redirecting to Dashborad

}catch (PDOException $e)
{
    echo "Connection Failed !!! Please try again letter: ",$e->getMessage();
}
?>