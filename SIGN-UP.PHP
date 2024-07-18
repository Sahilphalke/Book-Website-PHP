<?php include('CONNECT.PHP') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN_UP-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
</head>

<body>

    <div class="form-container">
        <form name="myForm"  onsubmit="return validateForm()" method="POST">
        <?php include('errors.php'); ?>
            <h3>SIGN-UP</h3>
            <input type="text" name="username" required placeholder="Enter Your Name">
           <!-- <p class="text-danger"><?php // if(isset($errors['u'])) echo $errors['u']; ?></p> -->

            <input type="email" name="email" required placeholder="Enter Your Email">
            <!-- <p class="text-danger"><?php // if(isset($errors['e'])) echo $errors['e']; ?></p> -->

            <input  type="date" name="age" required placeholder="Enter Your Age">
            <p class="text-danger"><?php if(isset($errors['a'])) echo $errors['a']; ?></p>

            <input type="tel"  name="number" minlength="10" maxlength="10" required placeholder="Enter Your valid Phone Number">
            <p class="text-danger"><?php if(isset($errors['n'])) echo $errors['n']; ?></p>

            <input type="text" name="address" required placeholder="Enter Your Home Address"
            <textarea rows="2" cols="20"></textarea>
            <p class="text-danger"><?php if(isset($errors['add'])) echo $errors['add']; ?></p>

            <input type="password" name="password2" minlength="5" maxlength="10" required placeholder="Enter Your Password">
            <p class="text-danger"><?php if(isset($errors['p'])) echo $errors['p']; ?></p>

            <input type="submit"  name="sign_up_user" name="updateid" value="SIGN UP" class="form-btn">
            <p>already have a account? <a href="SIGN-IN.php">SIGN IN</a></p>
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>

    <script></script>
</body>

</html>