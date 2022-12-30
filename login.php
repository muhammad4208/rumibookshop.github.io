

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>


 <div class="form">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="login-form">
        <h3>Login to Your Account</h3>
           <div>
               <label for="">UserName</label>
               <input type="text" name="username" required>
           </div>
           <div>
               <label for="">Password</label>
               <input type="password" name="password" required>
           </div>
            <div>
             <button name="login">Login</button>
             
              <span style="color:white">if no accont? <a  style=" color:white; " href="regiser.php">Regiser here</a></span>
           
           </div>
          
      </div></form>

 </div>
    
</body>
</html>


<?php

session_start();

 
  if(isset($_POST['login'])){
    
    include "config.php";
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,md5($_POST['password']));
    
    $checkUser="SELECT * FROM users WHERE username ='{$username}' AND password='$password'";
   $res=mysqli_query($conn,$checkUser) or die("query failed");
    if(mysqli_num_rows($res)>0){
        $_SESSION['username']=$username;
        header("Location: http://localhost:8080/book/");

    }else{
    ?>
           <script>
            alert("Incorrect Username or Password");
           </script>
    <?php

    }



        

  }
 

?>
