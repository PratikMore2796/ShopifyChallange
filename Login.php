<!DOCTYPE html>
<html lang="en"><head>    
    <title>Shopify Challange</title>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>    
    <link rel="stylesheet" href="css/style.css" type="text/css">    
    
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
</head>
<style>  
  .jumbotron{       
       background-image: url("img/background.jpeg");      
         background-size: cover;     
            background-repeat: no-repeat; 
               
    }
</style>
<body>
    <div class="jumbotron text-center  " style="margin-top:0; height:100%;background-size: cover;">
    <h1 style="color: #3094FE; text-shadow: black; font-family: 'Patua One', cursive;">Shopify Challange</h1> 
    <div class="container col-sm-6" style="margin-top:30px;padding: 10px;z-index: 1;position: relative" >
    <div class="container" style=" margin-top: 5px;padding: 25px;width:50%;background-color: #EEF4F7;text-align: left;opacity: 0.9;">          
      <div class="continer" style="z-index: -1; position: relative; ">             
       <form action="admin/Processlogin.php" method="post">                 
       <h3 style="text-align: center;color: #3094FE;">Login</h3>                  
      <label for="UName">Email</label><br>                 
       <input type="email" name="uname" id="UName" class="form-control">
       <label for="pass">Password</label>                  
      <input type="password" name="pass" id="pass">                   
     <input type="submit" name="submit" value="Login" class="btn btn-primary form-control">              
  </form><br><a href="Registration.php"><input type="button" name="reg_btn" value="Register Here" class="btn btn-primary form-control"></a><br>   
               <?php       
             $fullUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";              
      if(strpos($fullUrl,"un-authorize-user")==true) {   
           echo "<br><div class='alert alert-primary' role='alert'> Unauthorize access</div>";          
          }              
      if(strpos($fullUrl,"username-empty")==true) {           
           echo "<br><div class='alert alert-primary' role='alert'>username is empty</div>";           
         }              
      if(strpos($fullUrl,"password-empty")==true) 
      {  
        echo "<br><div class='alert alert-primary' role='alert'> password is empty </div>";             
      }               
     if(strpos($fullUrl,"invalid_password")==true) 
    { 
      echo "<br><div class='alert alert-primary' role='alert'>Invalid Password</div>";                
    }                
    ?>            
    </div>        
    </div>        
    </div>   
    </div>
    
    
    
</body>
</html>