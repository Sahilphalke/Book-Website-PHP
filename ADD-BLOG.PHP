<?php include('CONNECT.PHP') ?>

<?php

$con=new mysqli('localhost','root','','webproject');
if(isset($_POST['add_blogs'])){
  $blog_title = $_POST['blog_title'];
  $blog_img = $_POST['blog_img'];
  $blog_content = $_POST['blog_content'];
  

// inset query
$sql= "INSERT INTO `blogs`(`blog_img`, `blog_title`, `blog_content`) 
        VALUES ('$blog_img','$blog_title','$blog_content')";

// execute query
$result = mysqli_query($con,$sql);
// we will check
if($result){

    header('location:ADMIN.php');
 // header('location:display.php');
}
else{
  die(mysqli_error($con));
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK-PRODUCT-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
        <?php include('errors.php'); ?>
            <h3>ADD-BLOG</h3>
            <input type="text" name="blog_title" required placeholder="Enter Blog Title">
            <input type="file" name="blog_img" required placeholder="selct book img">
            <input type="blog_content" name="blog_content" required placeholder="Enter About Blog">
            <input type="submit"  name="add_blogs"  value="ADD-BLOG'S" class="form-btn">
            
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>