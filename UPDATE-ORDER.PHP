<?php include('CONNECT.PHP') ?>
<?php

$db= mysqli_connect("localhost", "root","", "webproject");


$oid=$_GET['o_updateid'];
if(isset($_GET['o_updateid'])){
    $sql="SELECT * FROM  b_order WHERE oid=$oid";
    $result= mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
                    $bname= $row['bname'];
                    $bimg= $row['bimg'];
                    $bprice= $row['bprice'];
                    $username= $row['username'];
                    $email= $row['email'];
                    $address= $row['address'];
                    
                    

  }

if(isset($_POST['orderupdate'])){
    $bname= $_POST['bname'];
    $bimg= $_POST['bimg'];
    $bprice= $_POST['bprice'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $address= $_POST['address'];
   

    //update query
    //$sql = "UPDATE vansh set name='$name',email='$email',mobile='$mobile',password='$password' where id='$id'"
    $sql= "UPDATE  b_order SET bname='$bname',bimg='$bimg',bprice='$bprice',username='$username', email='$email', address='$address' WHERE oid='$oid'";
    //execute this query
    $results= mysqli_query($db,$sql);
    if($results){
        header("location:ADMIN.PHP");
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
    <title>ORDER _UPDATE-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
        <?php include('errors.php'); ?>
            <h3>ORDER UPDATE</h3>
            <input type="text" name="bname"  required placeholder="Enter Name" value="<?php echo $row['bname']; ?>">
            <input type="file" name="bimg" required placeholder="select Img"  value="<?php echo $row['bimg']; ?>">
            <h5>Old image</h5>
            <img src="IMAGE/<?php echo $row['bimg']; ?>" width="100px" height="100px">
            <input type="text" name="bprice" required placeholder="Enter  price" value="<?php echo $row['bprice']; ?>">
            <input type="text" name="username" required placeholder="Enter Author name" value="<?php echo $row['username']; ?>">
            <input type="email" name="email" required placeholder="Enter email" value="<?php echo $row['email']; ?>">
            <input type="address" name="address" required placeholder="Enter email" value="<?php echo $row['address']; ?>">
            <input type="submit" name="orderupdate" value="ORDER UPDATE" onClick="confirm( 'YOUR ORDER IS UPDATED!!!!' )" class="form-btn">
            
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>