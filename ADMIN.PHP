<?php include('CONNECT.PHP') ?>
<?php
$con= mysqli_connect("localhost", "root", "", "webproject");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Pannel</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

     <!-- css file link  -->
     <link rel="stylesheet" href="CSS/STYLE5.CSS">
     

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    
</head>
<body>
    <style>

.my-custom-scrollbar {

height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
    </style>


<!-- Side navigation -->
<div class="sidenav">

    <h1>!!ADMIN PANNEL!!</h1>
  <a href="#home">HOME</a>
  <a href="#customer">CUSTOMER</a>
  <a href="#product">PRODUCT</a>
  <a href="#blogs">BLOGS</a>
  <a href="#order">ORDER</a>
</div>

<!-- Page content -->
<div class="main">

<header class="header">

    <div class="header-1">

        <a  class="logo"> <i class="fas fa-book"></i> book/LAS </a>

    </div>
   

</header>


<!-- header section ends -->
<div class="back-1">

</div>

<div id="home" class="container-1">

   <div class="content">
      <h3>hi, <span><?php  echo $_SESSION['adminname'] ?></span></h3>
      <h1>welcome <span></span></h1>
      <p>this is an admin page of</p>
      <a href="BOOK.PHP" class="btn">BOOK/LAS</a>
      <div>
        <h1></h1>
      </div>
   </div>

</div>

<div class="back-2">

</div>

<!-- add-user section start -->
<div class="container-2" id="customer">
    <h2>Add User's</h2>
       <h3><span><?php  echo $_SESSION['adminname'] ?></span> , you can add</h3><h1>User's</h1>
        <a href="ADD-USER.PHP" class="btn">ADD-USER</a>
</div>

<div class="back-2">
</div>

<div class="container-3">
    <h2>Current User's</h2>
       
</div>
<!-- add-user section end-->

<div  class="table-wrapper-scroll-y my-custom-scrollbar">
<div class="container-4">
<table class="table table-dark" >
<thead>
<tr>
<th scope="col">Sr. No</th>
<th scope="col">Name</th>
<th scope="col">Email</th>
<th scope="col">age</th>
<th scope="col">Mobile-number</th>
<th scope="col">Address</th>
<th scope="col">password</th>
<th scope="col">Operations</th>
</tr>
</thead>
<tbody>

<?php


$sql= "Select * from webuser";
$result= mysqli_query($con,$sql);
if($result){
//step 1
/*$row=mysqli_fetch_assoc($result);
echo $row['name'];*/
//step 2 paste this in while loop for auto incre
while($row=mysqli_fetch_assoc($result))
{
$id= $row['id'];
$username= $row['username'];
$email= $row['email'];
$age= $row['age'];
$number= $row['number'];
$address= $row['address'];
$password2= $row['password2'];
//copy the table row
//we will string concatenation .())
echo '<tr>
<th scope="row">'.$id.'</th>
<td>'.$username.'</td>
<td>'.$email.'</td>
<td>'.$age.'</td>
<td>'.$number.'</td>
<td>'.$address.'</td>
<td>'.$password2.'</td>
<td>
<button type="button" class="btn btn-warning"><a href="UPDATE-USER.PHP?updateid='.$id.'">update</a></button>

<button type="button" class="btn btn-danger"><a href="ADMIN.PHP?deleteid='.$id.'">Delete</a></button>
</td>
</tr>
<tr>';
}
}
?>
</tbody>
</table>
</div>
</div>


    <!-- display section ends -->


  



<!-- header section starts  -->
<div class="back-2">
</div>

<!-- add-BOOK section start -->
<div class="container-5" id="product">
    <h2>Add BOOK's</h2>
       <h3><span><?php  echo $_SESSION['adminname'] ?></span> , you can add</h3><h1>BOOK's</h1>
        <a href="ADD-BOOKS.PHP" class="btn">ADD-BOOK</a>
</div>

<div class="back-2">
</div>

<div class="container-6">
    <h2>Current Book's</h2>
       
</div>

</div>
<!-- BOOK section end-->
<div  class="table-wrapper-scroll-y my-custom-scrollbar">
<div class="container-8">

<table class="table table-dark" class="scrolldown" >
<thead>
<tr>
<th scope="col">B_id</th>
<th scope="col">Book Name</th>
<th scope="col">Book Img</th>
<th scope="col">Book Price</th>
<th scope="col">Book Date</th>
<th scope="col">Operations</th>
</tr>
</thead>
<tbody>

<?php


$sql= "Select * from  b_product";
$result=mysqli_query($con,$sql);
if($result){
//step 1
/*$row=mysqli_fetch_assoc($result);
echo $row['name'];*/
//step 2 paste this in while loop for auto incre
while($row=mysqli_fetch_assoc($result))
{
$bid= $row['bid'];
$bname= $row['bname'];
$bimg= $row['bimg'];
$bprice= $row['bprice'];
$bdate= $row['bdate'];

//copy the table row
//we will string concatenation .())
echo '<tr>
<th scope="row">'.$bid.'</th>
<td>'.$bname.'</td>
<td><img src="IMAGE/'.$bimg.'"width="100px;" height="100px;" alt="IMAGE"></td>
<td>'.$bprice.'</td>  
<td>'.$bdate.'</td>
<td>
<button type="button" class="btn btn-warning"><a href="UPDATE-BOOK.PHP?b_updateid='.$bid.'">update</a></button>

<button type="button" class="btn btn-danger"><a href="ADMIN.PHP?b_deleteid='.$bid.'">Delete</a></button>
</td>
</tr>
<tr>';
}
}
?>
</tbody>
</table>    
</div>
</div>


<div class="back-2">
</div>

<div class="container-5 " id="blogs">
    <h2 style="margin-left:21.5rem;">Add BLOG's</h2>
       <h3 style="margin-left:15rem;" ><span><?php  echo $_SESSION['adminname'] ?></span> , you can add</h3><h1 style="margin-left:29.5rem;">BLOG's</h1>
        <a style="margin-left:23rem;" href="ADD-BLOG.PHP" class="btn">ADD-BLOG</a>
</div>

<div class="back-2">
</div>


<div class="container-5">
    <h2 style="margin-left: 21.5rem;">Current Blog's</h2>
       
</div>

</div>
<!-- BOOK section end-->
<div  class="table-wrapper-scroll-y my-custom-scrollbar">
<div class="container-8">

<table class="table table-dark" class="scrolldown" >
<thead>
<tr>
<th scope="col">Blog id</th>
<th scope="col">Blog title</th>
<th scope="col">Blog Img</th>
<th scope="col">Blog content</th>
<th scope="col" style="padding-left: -50rem;">Operations</th>
</tr>
</thead>
<tbody>

<?php


$sql= "Select * from  blogs";
$result=mysqli_query($con,$sql);
if($result){
//step 1
/*$row=mysqli_fetch_assoc($result);
echo $row['name'];*/
//step 2 paste this in while loop for auto incre
while($row=mysqli_fetch_assoc($result))
{
$blog_id= $row['blog_id'];
$blog_img= $row['blog_img'];
$blog_title= $row['blog_title'];
$blog_content= $row['blog_content'];

//copy the table row
//we will string concatenation .())
echo '<tr>
<th scope="row">'.$blog_id.'</th>
<td>'.$blog_title.'</td>
<td><img src="IMAGE/'.$blog_img.'"width="100px;" height="100px;" alt="IMAGE"></td>
<td>'.$blog_content.'</td>  
<td style="padding-right: 100px;">
<button type="button" class="btn btn-warning"><a href="UPDATE-BLOG.PHP?blog_updateid='.$blog_id.'">update</a></button>
<button type="button" class="btn btn-danger" style="margin-left:90px;margin-top:-65px"><a href="ADMIN.PHP?blog_deleteid='.$blog_id.'">Delete</a></button>
</td>
</tr>
<tr>';
}
}
?>
</tbody>
</table>    
</div>
</div>


<div class="container6" id="order">
    <h2>Current Order's</h2>
       
</div>

</div>
<!-- add-user section end-->
<div  class="table-wrapper-scroll-y my-custom-scrollbar">
<div class="container-8" style="margin:5;">

<table class="table table-dark" class="scrolldown" >
<thead>
<tr>
<th scope="col">O_id</th>
<th scope="col">Book Name</th>
<th scope="col">Book Img</th>
<th scope="col">Book Price</th>
<th scope="col">u_Name</th>
<th scope="col">U_Email</th>
<th scope="col">U_Address</th>
<th scope="col">Operations</th>
</tr>
</thead>
<tbody>

<?php


$sql= "Select * from  b_order";
$result=mysqli_query($con,$sql);
if($result){
//step 1
/*$row=mysqli_fetch_assoc($result);
echo $row['name'];*/
//step 2 paste this in while loop for auto incre
while($row=mysqli_fetch_assoc($result))
{
$oid= $row['oid'];
$bname= $row['bname'];
$bimg= $row['bimg'];
$bprice= $row['bprice'];
$username= $row['username'];
$email= $row['email'];
$address= $row['address'];

//copy the table row
//we will string concatenation .())
echo '<tr>
<th scope="row">'.$oid.'</th>
<td>'.$bname.'</td>
<td><img src="IMAGE/'.$bimg.'"width="100px;" height="100px;" alt="IMAGE"></td>
<td>'.$bprice.'</td>  
<td>'.$username.'</td>
<td>'.$email.'</td>
<td>'.$address.'</td>
<td>
<button type="button" class="btn btn-warning"><a href="UPDATE-ORDER.PHP?o_updateid='.$oid.'">update</a></button>

<button type="button" class="btn btn-danger"><a href="ADMIN.PHP?o_deleteid='.$oid.'">Delete</a></button>
</td>
</tr>
<tr>';
}
}
?>
</tbody>
</table>    
</div>
</div>

</body>
</html>