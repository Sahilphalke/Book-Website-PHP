<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book/LAS website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link  rel="stylesheet" href="CSS/STYLE2.CSS">

    <!-- custom js file link  -->
    <script src="js/script.js"></script>


    <script>
        function addproduct()
        alert ("product selected succefully");
    </script>

</head>
<body>
    
<!-- header section starts  -->

<header class="header" id="myHeader">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> book/LAS </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="CART.PHP" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-blank"></div>
            <a href="SIGN-IN.PHP" class="fas fa-user"></a>
            
             <a><?php  echo $_SESSION['username']; ?></a> 
        </div>

    </div>


</header>
