<?php

require_once('connect.php');
global $con;

function fetch_product_table()
{
    global $con;
    $sql = "SELECT * FROM product_table";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return $stmt;
}
function fetch_img()
{
    global $con;
    $sql = "SELECT Product_image FROM product_table";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $image = $stmt->fetch();
    $image= $image['Product_image'];
    return $image;
}
function fetch_user($id)
{
    global $con;
    $sql = "SELECT Product_Name, Product_image, Product_Description FROM product_table WHERE ID = :product_id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':product_id', $id);
    $stmt->execute();
    return $stmt;
}


?>