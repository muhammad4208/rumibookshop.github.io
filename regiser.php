


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Regiser</title>
</head>
<body>


 <div class="form">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="login-form">
        <h3>regiser to Your Account</h3>
        <div>
               <label for="">FirstName</label>
               <input type="text" name="firstname" required>
           </div>
           <div>
               <label for="">LastName</label>
               <input type="text" name="lastname" required>
           </div>
           <div>
               <label for="">UserName</label>
               <input type="text" name="username" required>
           </div>
           <div>
               <label for="">Email</label>
               <input type="email" name="email" required>
           </div>
           <div>
               <label for="">Password</label>
               <input type="password" name="password" required>
           </div>
           <div>
               
             <button name="regiser">Regiser</button>
             <span>If have accont ?<a href="login.php">Login</a></span>
           </div>
      </div></form>

 </div>
    
</body>
</html>


<?php
 

 if(isset($_POST['regiser'])){
      
    include "config.php";

       $firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
       $lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
       $username=mysqli_real_escape_string($conn,$_POST['username']);
       $email=mysqli_real_escape_string($conn,$_POST['email']);
       $password=mysqli_real_escape_string($conn,md5($_POST['password']));


          
         $checkUser="SELECT * FROM users WHERE username ='{$username}'";
        $checkUserResult=mysqli_query($conn,$checkUser) or die("query error");
        if(mysqli_num_rows($checkUserResult)>0){
          ?>
          <script>
            alert("User Already Regisered");
           </script>
          <?php
        }else{
            $inserQuery="INSERT INTO users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$password')";
            $result=mysqli_query($conn,$inserQuery) or die("Insert Query Failed");
            header("Location: http://localhost:8080/book/login.php");

        }

    


 }

 

?>