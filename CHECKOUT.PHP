<?php include('CONNECT.PHP') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="CSS/STYLE7.CSS">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

</head>
<body>

<div class="container">

    <form name="myForm" onsubmit="return validateForm()" method="POST">
        <div class="row">
            <div class="col">
                <h3 class="title">billing address</h3>
                <?php include('errors.php'); ?>
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" name="name" placeholder="john deo" value="<?php echo $_SESSION['username']; ?>" required>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" name="email" placeholder="example@example.com" value="<?php echo $_SESSION['email']; ?>" required>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="room - street - locality" required>
                </div>
                <div class="inputBox">
                    <span>city :</span> 
                    <input type="text" name="city" placeholder="mumbai" required>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" name="state" READONLY value="INDIA" placeholder="india" required>
                        <p1></p1>
                    </div>
                    <div class="inputBox">
                        <span>Pin code :</span>
                        <input type="tel" name="pincode" maxlength="6" minlength="6" placeholder="123 456" required>
                    </div>
                </div>
            </div>
            <?php
				$con=new mysqli('localhost','root','','webproject');
                $sql= "SELECT * FROM add_cart";
				$result=mysqli_query($con,$sql);
				if($result)
            	{
					    $subtotal=0;
                        $tax=0;
					    $shipping=0;
					    $total=0;
                            while($row=mysqli_fetch_assoc($result))
            	        {   
					        $aid		= 	$row['aid'];
					        $id			= 	$row['id'];
					        $bid		= 	$row['bid'];
					        $username	= 	$row['username'];
					        $bimg		= 	$row['bimg'];
					        $bname		=	$row['bname'];
					        $bprice		= 	$row['bprice'];
					        $qty		=	$row['qty'];

                            $totalqty=$qty+$qty;
					        $bprice=$qty*$bprice;
					        $subtotal=$subtotal+$bprice;
					        $tax=($subtotal*6.25/100);
					        $shipping=150;
					        $total=$subtotal+$tax+$shipping;
                        }
                    }    
              ?>
            <div class="col">
                <h3 class="title">payment</h3>
                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="IMAGE/card_img.png" alt="">
                </div>

            <!--    <div class="inputBox">
                   <span>name on card :</span> 
                    <input type="hidden" placeholder="mr. john deo" value="<?php echo $totalqty ?>">
                 <b > Total Quantity :</b> <p><b> <?php echo $totalqty ?></b></p>
                </div>
                -->
                
                <div class="inputBox">
                 <!--   <span>name on card :</span> -->

                   <input type="hidden" name="totalprice"   placeholder="mr. john deo" value="<?php echo $total ?>" required>
                   <input type="hidden" name="bid"          placeholder="mr. john deo" value="<?php echo $bid ?>" required>
                   <input type="hidden" name="bname"        placeholder="mr. john deo" value="<?php echo $bname ?>" required>
                   <input type="hidden" name="bimg"         placeholder="mr. john deo" value="<?php echo $bimg ?>" required>
                   <input type="hidden" name="bprice"       placeholder="mr. john deo" value="<?php echo $bprice ?>" required>
                    Total Price : <p><b> <?php echo $total ?></b></p>
                </div>
                <div class="inputBox">
                 <!--   <span>name on card :</span> -->
                    <input type="hidden" name="paymentmode" READONLY placeholder="mr. john deo"  value="Cash On Delivery" required>
                  Payment Mode : <p><b> Cash On Delivery<i class="fa-solid fa-sack-dollar"></i></b></p>
                </div>
                <img class="img1" src="IMAGE/book5.png" >
            
             <!--   <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234">
                    </div>
                </div>
                -->
            </div>    
        </div>
        <input type="submit" onclick="insertData()" name="order-submit" value="Confirm and Place Order | COD" class="submit-btn">
        <script src="js/script.js"></script>
    </form>
</div>        
</body>
</html>