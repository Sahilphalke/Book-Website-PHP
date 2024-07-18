<?php include('CONNECT.PHP') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUYNOW-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
        <?php include('errors.php'); ?>
        <?php

            $db= mysqli_connect("localhost", "root","", "webproject");

        
        $bid=$_GET["b_productselect"];
        if(isset($_GET["b_productselect"])){
            $sql="SELECT * FROM  b_product WHERE bid=$bid ";
                 $result= mysqli_query($db,$sql);
                 $row=mysqli_fetch_assoc($result);
                            $bname  = $row['bname'];
                            $bimg   = $row['bimg'];
                            $bprice = $row['bprice'];
              }  
              
              if(isset($_POST['buy_now'])){
                $bname       = $_POST['bname'];
                $bimg        = $_POST['bimg'];
                $bprice      = $_POST['bprice'];
                $username    = $_POST['username'];
                $email       = $_POST['email'];
                $address     = $_POST['address'];
              
              // inset query
              $sql= "INSERT INTO b_order(bname,bimg,bprice,username,email,address)
                      VALUES ('$bname','$bimg','$bprice','$username','$email','$address')";
              
              // execute query
              $result = mysqli_query($db,$sql);
              // we will check
              if($result){
              
                  header('location:BOOK.php');
               // header('location:display.php');
              }
              else{
                die(mysqli_error($con));
              }
              }
            ?>
            <script>
                myfuuction()
                if(confirm("Some message")) {
    //Clicked ok
} else {
    //Clicked cancel
}
            </script>
            <h3>buy now</h3>
            <input type="text" name="bname"  required placeholder="Enter Name" value="<?php echo $row['bname']; ?>">
            <input type="hidden" name="bimg"  required placeholder="Enter Name" value="<?php echo $row['bimg']; ?>">
            <img src="IMAGE/<?php echo $row['bimg']; ?>" width="100px" height="100px">
            <input type="text" name="bprice" required placeholder="Enter  price" value="<?php echo $row['bprice']; ?>" >
            <input type="text" required placeholder="Cash On Delevery" disabled="disabled">
            <input type="text" name="username" required placeholder="Enter Author name" value="<?php echo $_SESSION['username']; ?>">
            <input type="email" name="email" required placeholder="Enter email" value="<?php echo $_SESSION['email']; ?>">
            <input type="address" name="address" required placeholder="Enter email" value="<?php echo $_SESSION['address']; ?>">
            <a href="BOOK.PHP"> <input type="submit" name="buy_now" value="BACK TO HOME"  class="form-btn1"></a>
            <input type="submit" name="buy_now" value="BUY NOW" onclick="confirm('Your Order Is Confirm')" class="form-btn1" class="fa-sharp fa-solid fa-bags-shopping>
            
            
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
  
            </form>
            
    </div>
</body>

</html>