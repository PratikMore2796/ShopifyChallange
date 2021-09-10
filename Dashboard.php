<?php require_once('admin/Authentication.php');
        require_once('admin/functions.php')?>
<!Doctype HTML>
<html>
    <head>
        <title>
            Shopify Challange
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body>
        <div class="d-flex flex-column" style="min-height:100%; backgorund-color:#ffffff">
        <div class="p-2" style=" border:solid 10px #000000">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 10px 10px 20px 20px">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" height="100px" width="150px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <?php
                                echo $_SESSION['login'];
                                ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Dashboard.php" ><div class="navbuttons">Home</div></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/logout.php">Logout</a>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <h1 style="color: darkblue">Shopify Image Repository</h1>
                        </span>
                    </div>
                </nav>
            </header>
        </div>
        <div class="p-2" style="min-height:100%; margin-bottom: 20%; border-top:solid 10px #000000; ">
        <main>
            <div class="d-flex fex-column" style="background-color:#FFFFFF">
                <div class="p-2"><h1>Store your images here and access anywhere</h1></div>
            </div>
            
            <table class="table" style="padding: 10px; min-height:100%; text-align: center">
                <tbody class="table-light" >
                    <?php if($_SESSION['login'] === "admin@gmail.com")
                        {
                            echo "<tr>
                            <td>Add Images or check all the images and modify images</td>
                            <td><button type='button' onclick='addimage()' class='btn btn-primary'>ADD IMAGE </button>
                            <button type='button' onclick='image()' class='btn btn-primary'>UPDATE OR DELETE IMAGE </button>
                            </td>
                        </tr>
                        ";
                        }
                    ?>
                    <tr>
                        <?php       
                            $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";              
                            if(strpos($fullUrl,"image=added")==true) {   
                                echo "<br><div class='alert alert-primary' role='alert'> Image Added Successfully</div>";          
                            }  
                                   
                     
                        ?>            
                    </tr>
                </tbody>
            </table>
            <table class="table" style="padding: 10px; min-height:100%; text-align: center">
                <thead class="table-dark">
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Description</th>
                </thead>
                <tbody class="table-light" >                
                    <?php
                        $product_id = "";
                        $product_name = "";
                        $product_image = "";
                        $product_description = "";
                        $stmt = fetch_product_table();
                        foreach($stmt as $data)
                        {
                            echo "
                      
                            <tr>
                              <td>".$data['ID']."</td>
                              <td>".$data['Product_Name']."</td>
                              <td> <img src='AdminImage/".$data['Product_image']."' style='max-height:100px'></td>
                              <td>".$data['Product_Description']."</td>
                              </tr>
                            
                            ";
                        }
            
                    ?>
                </tbody>
            </table>
         </main>
        </div>
        <div class="p-2" style="margin-top:auto;">
        <footer>
        <div class="container-fluid" style=";padding: 10px; text-align:center;  background-color: dimgray">                
                <h6>@Developed By Pratik More </h6>            
            </div>        
       
        </footer>
        
        </div>
        
        </div>
         
        <script>
            function image()
            {
                window.location.href ="image.php";
            }
            function addimage(){
                window.location.href = "Add_image.php";
            }
                        </script>
    </body>
</html>