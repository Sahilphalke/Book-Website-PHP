    <?php include('CONNECT.PHP') ?>
<?php

$db= mysqli_connect("localhost", "root", "", "webproject");


$bid=$_GET['b_updateid'];
if(isset($_GET['b_updateid'])){
    $sql="SELECT * FROM  b_product WHERE bid=$bid";
    $result= mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
                    $bname= $row['bname'];
                    $bimg= $row['bimg'];
                    $bprice= $row['bprice'];
                    $bdate= $row['bdate'];
                    
                    

  }

if(isset($_POST['submit'])){
    $bname=$_POST['bname'];
    $bdescription=$_POST['bdescription'];
    $bimg=$_POST['bimg'];
    $bprice=$_POST['bprice'];
    $bdate=$_POST['bdate'];
   

    //update query
    //$sql = "UPDATE vansh set name='$name',email='$email',mobile='$mobile',password='$password' where id='$id'"
    $sql= "UPDATE  b_product SET bname='$bname',bdescription='$bdescription',bimg='$bimg',bprice='$bprice', bdate='$bdate' WHERE bid='$bid'";
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
    <title>UPDATE-PAGE</title>

    <!-- css file link-->
    <link rel="stylesheet" href="CSS/STYLE5.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
        <?php include('errors.php'); ?>
            <h3>UPDATE</h3>
            <input type="text" name="bname"  required placeholder="Ente`r Your Name" value="<?php echo $row['bname']; ?>">
            <input type="text" name="bdescription"  required placeholder="Ente`r Your Name" value="<?php echo $row['bdescription']; ?>">
            <input type="file" name="bimg" required placeholder="select Your Img"  value="<?php echo $row['bimg']; ?>">
            <h5>Old image</h5>
            <img src="IMAGE/<?php echo $row['bimg']; ?>" width="100px" height="100px">
            <input type="text" name="bprice" required placeholder="Enter Your price" value="<?php echo $row['bprice']; ?>">
            <input type="date" name="bdate" required placeholder="select date" value="<?php echo $row['bdate']; ?>">
            <input type="submit"  name="submit" value="UPDATE BOOK'S" class="form-btn">  
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>

