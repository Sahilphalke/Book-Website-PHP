<?php include('CONNECT.PHP') ?>
<?php

$db= mysqli_connect("localhost", "root", "", "webproject");


$bid=$_GET['display-img'];
if(isset($_GET['display-img'])){
    $sql="SELECT * FROM  b_product WHERE bid=$bid";
    $result= mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
                    $bname= $row['bname'];
                    $bimg= $row['bimg'];
                    $bprice= $row['bprice'];
                    $bdate= $row['bdate'];
                    $bdescription	= $row['bdescription'];
                    

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
    <link rel="stylesheet" href="CSS/STYLE4.CSS">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

</head>

<body>
  <style>
    .form-container form .close-btn:hover {
    background: #17172a;
    color: #fff;
}
    </style>
    <div class="form-container" >
        <form action="BOOK.PHP" method="POST">
            <h4 style="margin-right: 22rem;font-style:oblique;">Description About <?php echo $row['bname']; ?> </h4> 
            <p style="margin-left:12rem;margin-right:2rem;font-size:1rem;font-style:oblique;"><b><?php echo $row['bdescription']; ?></b></p>
            <img style="width:17%;margin-right:70rem;margin-top:-8rem;" src="IMAGE/<?php echo $row['bimg']; ?>">
            <h1 style="margin-right:50rem;font-size:medium;margin-top:-1rem;font-style:oblique;">NAME : <?php echo $row['bname']; ?></h1>
            <h2 style="margin-right:50.5rem;font-size:medium;font-style:oblique;">PRICE : <?php echo $row['bprice']; ?></h2>
            <input style="background: #fbd0d9;color: crimson;text-transform: capitalize;font-size: 20px;cursor: pointer;width: 150px;margin-left:45rem;margin-top:-10rem;" type="submit"  name="submit" value="CLOSE" class="close-btn">  
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>

