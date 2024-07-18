<?php include('CONNECT.PHP') ?>
<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
	<link href="CSS/STYLE6.CSS" rel="stylesheet">
	
</head>
<body>

<style>

.my-custom-scrollbar {

height: 600px;
width: 700px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
    </style>



    <div class="wrapper">
	<h1> <a><?php if(isset($_SESSION['username'])){  echo $_SESSION['username'];} ?> </a><i class="fa fa-shopping-cart"></i> Cart</h1>
	<a href="BOOK.PHP">	<p class="btn-area1">Back to page</p></a>
		<div class="table-wrapper-scroll-y my-custom-scrollbar">



		<?php



		if(isset($_POST['update_update_btn'])){
			$update_value = $_POST['update_quantity'];
			$update_id	  =	$_POST['update_quantity_id'];
			$update_quantity_query = mysqli_query($db, "UPDATE `add_cart` SET qty = '$update_value' WHERE aid = '$update_id' ");
			if('update_quantity_query'){
				header('location:ADD-CART.PHP');
			}

		}
				
		?>
			<?php

				$con=new mysqli('localhost','root','','webproject');
                $sql= "SELECT * FROM add_cart ORDER BY aid DESC";
				$result=mysqli_query($con,$sql);
				if($result)
            	{
					$subtotal=0;
					$tax=0;
					$shipping=0;
					$total=0;
					$qty=0;
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

					$bprice=$qty*$bprice;
					$totalqty=$qty+$qty;
					$subtotal=$subtotal+$bprice;
					$tax=($subtotal*6.25/100);
					$shipping=150;
					$total=$subtotal+$tax+$shipping;
		
	echo	'<div class="project">
				<div class="shop">
					<div class="box" >
						<img src=IMAGE/'.$bimg.'?>
						<div class="content">
							<h3>'.$bname.'</h3>
							<h4>₹'.$bprice.'<input type="hidden" class="bprice" value='.$bprice.'></h4>
							<!--<p class="unit">Quantity: <input type="number" class="iquentity" onchange="subTotal()" value='.$qty.' min="1" max="10" ></p>-->
								<form action="" method="POST">
									<input type="hidden" name="update_quantity_id" value='.$aid.'>
									<p class="unit">Quantity : <input type="number" class="iquentity" min="1" max="10" name="update_quantity" value='.$qty.'></p>
									<input type="submit" style="position: absolute;
									bottom: 20px;
									right: 20px;
									padding: 10px 25px;
									background-color: #3a71a9;
									margin-right:150px;
									font-size:15px;
									color: white;
									cursor: pointer;
									border-radius: 5px;" value="update"  name="update_update_btn">	
								</form>	
								<td class="itotal"></td>
								<a href="ADD-CART.PHP?a_deleteid='.$aid.'"><p class="btn-area" style="padding-left:-8px;"><i aria-hidden="true" class="fa fa-trash"></i> <span class="btn2">Remove</span></p></a>				
						</div>
					</div>
				</div>
			</div>';

			}
		}
		?>
		
				<!--
				<div class="box">
					<img src="IMAGE/book-3.png">
					<div class="content">
						<h3>Samsung Mobile</h3> 
						<h4>Price: $250</h4>
						<p class="unit">Quantity: <input name="" value="0"></p>
						<p class="btn-area"><i aria-hidden="true" class="fa fa-trash"></i> <span class="btn2">Remove</span></p>
					</div>
				</div>
				<a name="update_cart" href="ADD-CART.PHP?a_updateid='.$aid.'"><p class="btn-area1" style="margin-left: 370px;margin-top:-80px;padding-left:50px;"><span class="btn2">Update</span></p></a>

				-->
			
		
		
		</div>
			<div class="right-bar">
				<p><span>Subtotal</span> <span>₹<?php echo "$subtotal";?></span></p>
				<hr>
				<p><span>Tax (6.25%)</span> <span>₹<?php echo "$tax";?></span></p>
				<hr>
				<p><span>Shipping</span> <span>₹<?php echo "$shipping";?></span></p>
				<hr>
				<p><span>Total</span> <span>₹<?php echo "$total";?></span></p>

				<?php 
					if($total > 1)
					{
						echo "<a href='CHECKOUT.PHP'><i class='fa fa-shopping-cart'></i>Checkout</a>";
					}
					else
					{
						echo "<a href=''><i class='fa fa-shopping-cart'></i>Checkout</a>";
					}
				?>
			</div>
		</div>
	</div>

	<script>
	
		var bprice=document.getElementsByClassName('bprice');
		var iquentity=document.getElementsByClassName('iquentity');
		var itotal=document.getElementsByClassName('itotal');

			function subTotal()
			{
				for(i=0;i<bprice.length;i++)
				{
					itotal=bprice*iquentity;
				}
			}

			subTotal();

	</script>
</body>
</html>