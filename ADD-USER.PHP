<?php include('CONNECT.PHP') ?>


<?php

$number=$number1='';
if(isset($_POST['add_user'])){
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $number = mysqli_real_escape_string($db, $_POST['number']);
  $number1='/^[0-9]{10,10}$/';
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  $errors = array();


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM webuser WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { $errors['u'] = "username required"; }
  else if(mysqli_num_rows($result) > 0){ $errors['u'] = "username allready exits";}

  if (empty($email)) { $errors['e'] = "email required"; }
  else if(mysqli_num_rows($result) > 0){ $errors['e'] = "Email allready exits";}

  if (empty($age)) { $errors['a'] = "age required"; }
  if (empty($number)) { $errors['n'] = "number required"; }
  if (empty($address)) { $errors['add'] = "address required"; }
  if (empty($password2)) { $errors['p'] = "password required"; }
  
 /* if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
*/
  if(count($errors)==0)
      {
         $query = "INSERT INTO webuser(username, email, age, number,address, password2) 
  			            VALUES('$username', '$email', '$age','$number','$address','$password2')";
  	     $result = mysqli_query($db,$query);
  	     $_SESSION['email'] = $email;
  	     $_SESSION['success'] = "You are now logged in";
  	    // header('location: ADMIN.PHP');

         if($result)
         {
           echo "<script> alert('USER REGISTRATION SUCCESSFULLY') </script>";
         }
         else
         {
           echo "<script> alert('PLEASE TRY AGAIN') </script>";
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
    <title>ADD USER-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
</head>

<body>
    <div class="form-container">
        <form action="ADD-USER.PHP" method="POST">
        <?php include('errors.php'); ?>
            <h3>ADD-USER</h3>
            <input type="text" name="username" required placeholder="Enter Your Name">
            <input type="email" name="email" required placeholder="Enter Your Email">
            <input  type="date" name="age" required placeholder="Enter Your Age">
            <input type="number" name="number" minlength="10" maxlength="10" required placeholder="Enter Your Contact Number">
            <input type="text" name="address" required placeholder="Enter Your Home Address"
            <textarea rows="2" cols="20"></textarea>
            <input type="password" name="password2" minlength="5" maxlength="8" required placeholder="Enter Your Password">
            <input type="submit"  name="add_user" name="updateid" value="ADD USER" class="form-btn">
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>