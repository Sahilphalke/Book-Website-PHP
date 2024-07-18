<?php include('CONNECT.PHP') ?>

<?php

$con=new mysqli('localhost','root','','webproject');
if(isset($_POST['add_books'])){
  $bname = $_POST['bname'];
  $bdescription	= $_POST['bdescription'];
  $bimg = $_POST['bimg'];
  $bprice = $_POST['bprice'];
  $bdate = $_POST['bdate'];

// inset query
$sql= "INSERT INTO b_product(bname,bdescription,bimg,bprice,bdate)
        VALUES ('$bname','$bdescription','$bimg','$bprice','$bdate')";

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
            <h3>ADD-BOOK</h3>
            <input type="text" name="bname" required placeholder="Enter Book Name">
            <input type="text" name="bdescription" required placeholder="Enter Book description">
            <input type="file" name="bimg" required placeholder="selct book img">
            <input type="text" name="bprice" required placeholder="Enter Price">
            <input type="date" name="bdate" required placeholder="Enter book-publish date">
            <input type="submit"  name="add_books"  value="ADD-BOOK" class="form-btn">
            
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>