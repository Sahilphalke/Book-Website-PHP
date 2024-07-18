<?php include('CONNECT.PHP') ?>
<?php

$db= mysqli_connect("localhost", "root", "", "webproject");


$blog_id=$_GET['blog_updateid'];
if(isset($_GET['blog_updateid'])){
    $sql="SELECT * FROM  blogs WHERE blog_id=$blog_id";
    $result= mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);
                    $blog_img       = $row['blog_img'];
                    $blog_title     = $row['blog_title'];
                    $blog_content   = $row['blog_content'];
                    
                    
                    

  }

if(isset($_POST['Update_blog'])){
    $blog_img       = $_POST['blog_img'];
    $blog_title     = $_POST['blog_title'];
    $blog_content   = $_POST['blog_content'];
   

    //update query
    //$sql = "UPDATE vansh set name='$name',email='$email',mobile='$mobile',password='$password' where id='$id'"
    $sql= "UPDATE blogs SET blog_img ='$blog_img',blog_title='$blog_title',blog_content='$blog_content' WHERE blog_id='$blog_id'";
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
            <input type="text" name="blog_title" required placeholder="Enter Blog Title" value="<?php echo $row['blog_title'];?>">
            <input type="file" name="blog_img" required placeholder="selct book img" value="<?php echo $row['blog_img']; ?>">
            <h5>Old image</h5>
            <img src="IMAGE/<?php echo $row['blog_img']; ?>" width="100px" height="100px">
            <input type="blog_content" name="blog_content" required placeholder="Enter About Blog" value="<?php echo $row['blog_content'];?>">
            <input type="submit"  name="Update_blog"  value="UPDATE-BLOG'S" class="form-btn">
            
            
            <!-- custom js file link  -->
                <script src="js/script.js"></script>
        
            </form>
    </div>
</body>

</html>