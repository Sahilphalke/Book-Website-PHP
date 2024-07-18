<?php include('CONNECT.PHP') ?>

<?php

if(isset($_POST['sign_in_user'])){

   $email = mysqli_real_escape_string($db,$_POST['email']);
   $password2 = mysqli_real_escape_string($db,$_POST['password2']);
   
    
   if (count($errors) == 0) {
    $password2 == ($password2);
   $select = " SELECT * FROM webuser WHERE email = '$email' AND password2 = '$password2' ";


   $result = mysqli_query($db, $select);

   // $results = 1 means that one user with the
   // entered username exists
   if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_array($result);

    if($row['usertype'] == 'admin'){

       $_SESSION['adminname'] = $row['username'];
       header('location:ADMIN.PHP');

    }elseif($row['usertype'] == 'user'){
        $_SESSION['email']      =   $row['email'];
        $_SESSION['address']    =   $row['address'];
        $_SESSION['username']   =   $row['username'];
        $_SESSION['id']         =   $row['id'];

       header('location:BOOK.PHP');

    }
   
 }else{
     $error[] = 'incorrect email or password!';
 }
}
}
?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIGN_IN-PAGE</title>

        <!-- css file link  -->
        <link rel="stylesheet" href="CSS/STYLE5.CSS">

    </head>

    <body>

        <div class="form-container">

            <form action="SIGN-IN.PHP" method="post">
                <?php include('errors.php'); ?>
                <h3>login now</h3>
                <?php
                 if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                ?>
                <input type="text" name="email" id="email" required placeholder="enter your email">
                <input type="password" name="password2" id="password" required placeholder="enter your password">
                <input type="submit" name="sign_in_user" value="login now" class="form-btn">
                <p>don't have an account? <a href="SIGN-UP.php"> SIGN UP</a></p>
            </form>

        </div>

    </body>

    </html>

    <script type='text/javascript'>
       function validate(){
    //form validation
    var email=document.getElementById('email');
     if (email.value == null || email.value==""){
       email.style.Color="red";
     }  
       }
    </script>