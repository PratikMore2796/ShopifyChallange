<?php

require_once('Authentication.php');
require_once('functions.php');
require_once('connect.php');

if(isset($_POST['delete']))
{
    $product_id = $_POST['product_id'];
    $sql2 = "SELECT Product_image FROM product_table WHERE ID = :product_id";
    $stmt2 = $con->prepare($sql2);
    $stmt2->bindParam(':product_id', $product_id);
    $stmt2->execute();
    $delete_image = $stmt2->fetch();
    unlink("../AdminImage/".$delete_image['Product_image']);
    $sql = "DELETE FROM product_table WHERE ID = :product_id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    header('location:../image.php');
}
if(isset($_POST['edit']))
{
    $product_id = $_POST['product_id'];
    session_start();
    $_SESSION['product_id'] = $product_id;
    header('location:../UpdateData.php');
}

if(isset($_POST['update']))
{
    $image_id = $_POST['product_id'];
    $image_name = $_POST['img_name'];
    $image_description = $_POST['image_description'];
    $img_selected = $_FILES['select_image']['name'];
    if(!empty($img_selected))
    {
        $sql = "SELECT Product_image FROM product_table WHERE ID = $image_id";
        $detete_current_image = $con->prepare($sql);
        $detete_current_image->execute();
        $deleted_image = $detete_current_image->fetch();
        unlink("../AdminImage/".$deleted_image['Product_image']);
        $picture_size = $_FILES['select_image']['size'];
        $temp_dir = $_FILES['select_image']['tmp_name'];
        $picture_error = $_FILES['select_image']['error'];
        $upload_dir = '../AdminImage/';
            $img_ext = strtolower(pathinfo($img_selected,PATHINFO_EXTENSION));
            $valid_ext = array('jpg', 'jpeg', 'png');
            $random_id = rand(1000, 1000000).".".$img_ext;
            move_uploaded_file($temp_dir, $upload_dir.$random_id);
            $sql = "UPDATE product_table 
            SET Product_Name = :image_name, Product_image = :random_id, Product_Description = :product_description 
            WHERE ID = :product_ID";
            $stmt= $con->prepare($sql);
            $stmt->bindParam(':image_name', $image_name);
            $stmt->bindParam(':random_id', $random_id);
            $stmt->bindParam(':product_description', $image_description);
            $stmt->bindParam(':product_ID', $image_id);
            $stmt->execute();
            $stmt->closeCursor();
            header('location: ../image.php');
        
    }
    else{
            $sql = "UPDATE product_table 
            SET Product_Name = :image_name, Product_Description = :product_description 
            WHERE ID = :product_ID";
            $stmt= $con->prepare($sql);
            $stmt->bindParam(':image_name', $image_name);
            $stmt->bindParam(':random_id', $random_id);
            $stmt->bindParam(':product_description', $image_description);
            $stmt->bindParam(':product_ID', $image_id);
            $stmt->execute();
            $stmt->closeCursor();
            header('location: ../image.php');
    }
    

}
?>