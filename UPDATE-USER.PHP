<?php include('CONNECT.PHP') ?>
<?php

$db= mysqli_connect("localhost", "root", "", "webproject");


$id=$_GET['updateid'];
if(isset($_GET['updateid'])){
    $sql="SELECT * FROM webuser WHERE id=$id";
    $result= mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
                    $username= $row['username'];
                    $email= $row['email'];
                    $age= $row['age'];
                    $number= $row['number'];
                    $address= $row['address'];
                    $password2= $row['password2'];
                    

  }

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $number=$_POST['number'];
    $address= $_POST['address'];
    $password2=$_POST['password2'];

    //update query
    //$sql = "UPDATE vansh set name='$name',email='$email',mobile='$mobile',password='$password' where id='$id'"
    $sql= "UPDATE webuser SET username='$username',email='$email',age='$age', number='$number',address='$address', 
    password2='$password2' WHERE id='$id'";
    //execute this query
    $results= mysqli_query($db,$sql);
    if($results){
        header("location:admin.php");
        echo '<script>alert("record updated succefully")</script>';
    }
    else{
       die("record can't update");
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
function myFunction() {
  alert("record updated succefully");
}
</script>
</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
        <?php include('errors.php'); ?>
            <h3>UPDATE</h3>
            <input type="text" name="username"  required placeholder="Enter Your Name" value="<?php echo $row['username']; ?>">
            <input type="email" name="email" required placeholder="Enter Your Email" value="<?php echo $row['email']; ?>">
            <input type="age" name="age" required placeholder="Enter Your Age" value="<?php echo $row['age']; ?>">
            <input type="number" name="number" required placeholder="Enter Your Contact Number" value="<?php echo $row['number']; ?>">
            <input type="text" name="address" required placeholder="Enter Your Contact Number" value="<?php echo $row['address']; ?>"
            <textarea rows="2" cols="20"></textarea>
            <input type="password" onclick="myFunction()" name="password2" required placeholder="Enter Your Confirm Password" value="<?php echo $row['password2']; ?>">
            <input type="submit"  name="submit" value="UPDATE ID" class="form-btn">  
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>