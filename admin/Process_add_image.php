<?php
        require('Authentication.php');
        require('connect.php');
   

    if(isset($_POST['submit'])){
        
        $img_title = $_POST['img_name'];
        $img_des = $_POST['image_description'];
        $img_selected = $_FILES['select_image']['name'];
        $picture_size = $_FILES['select_image']['size'];
        $temp_dir = $_FILES['select_image']['tmp_name'];
        $picture_error = $_FILES['select_image']['error'];
        $upload_dir = '../AdminImage/';
        $img_ext = strtolower(pathinfo($img_selected,PATHINFO_EXTENSION));
        $valid_ext = array('jpg', 'jpeg', 'png');
        $random_id = rand(1000, 1000000).".".$img_ext;
        move_uploaded_file($temp_dir, $upload_dir.$random_id);
        if(empty($img_title))
        {
            header('location: ../Add_image.php?empty=title');
            exit();
        }
        elseif(empty($img_selected))
        {
            header('location: ../Add_image.php?empty=image');
            exit();
        }
        elseif(empty($img_des))
        {
            header('location: ../Add_image.php?empty=description');
            exit();
        }
        else
        {
            $sql = "INSERT INTO product_table(Product_Name, Product_image, Product_Description)
            VALUES(:product_title, :product_img, :product_desc)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':product_title', $img_title);
            $stmt->bindParam(':product_img', $random_id);
            $stmt->bindParam(':product_desc', $img_des);
            $stmt->execute();
            $stmt->closeCursor();
            header('location: ../Dashboard.php?image=added');
        }
    }
        

?>