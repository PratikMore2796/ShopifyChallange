<?php include 'admin/Authentication.php';?>
<!Doctype HTML>
    <head> 
        <title>Shopify Challange</title>
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
        <div class="p-2" style="min-height:100%; margin-bottom: 10%; border-top:solid 10px #000000; ">
       <main>
            <div class="container" style="padding: 10px;">
                <h3 style="text-align: center;color: darkblue;">Add Image</h3>  
                <?php $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(strpos($fullUrl,"empty=title")==true)
                     {                
                         echo "<div class='alert alert-primary' role='alert'> Image Title is Empty</div>";
                     }
                     if(strpos($fullUrl,"empty=image")==true) 
                     {
                         echo "<div class='alert alert-primary' role='alert'>Please Select Image</div>";
                     }
                     if(strpos($fullUrl,"empty=description")==true)
                     {
                         echo "<div class='alert alert-primary' role='alert'>Please Enter Description</div>";
                     }              
                ?>
                                
                <form action="admin/Process_add_image.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">       
                        <label for="Name">Image Name</label>   
                        <input type="text" class="form-control" name="img_name" id="img_name" placeholder="Enter Image Name"> 
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="select_image" id="select_image">
                    <div class="form-group">                    
                        <label for="description">Description</label>                     
                        <input type="text" class="form-control" name="image_description" id="image_description" placeholder="Enter Image Description">                 
                    </div>                
                    <br>       
                    <input type="submit" name="submit" value="Add" class="btn btn-primary">                
                </form>            
            </div>        
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
          
    </body>
</html>