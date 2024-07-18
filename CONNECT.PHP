
<?php

session_start();
  
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost','root','', 'webproject');

//PHPMailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/Exception.php');
require ('PHPMailer/PHPMailer.php');
require ('PHPMailer/SMTP.php');

$mail = new PHPMailer(true);

/*if(isset($_POST['sign_up_user']))
{

  try{  
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sahilphalke1980@gmail.com';                     //SMTP username
    $mail->Password   = 'cwtyxiffylwyedpu';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sahilphalke1980@gmail.com', 'BOOK/LAS');
    $mail->addAddress($_POST["email"]);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Hello $username";
    $mail->Body    = "'<b>Thanks For Rrgistration To Our Website BOOK/LAS</b>'
                       <b>Go To Page <a href='WEB-PROJECT/BOOK.PHP'>BOOK/LAS</a></b>";

    $mail->send();
    
   // echo "<script> alert('Message has been sent')</script>";
    } 
   catch(Exception $e)
    {
   // echo "<script> alert('Message could not be sent')</script>";
    }

}
*/

$number=$number1='';
// REGISTER USER
if (isset($_POST['sign_up_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $number =mysqli_real_escape_string($db, $_POST['number']);
  $number1='/^[0-9]{10,10}$/';
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);
  
  //$user_type = $_POST['user_type'];

  $errors = array();


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM webuser WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { $errors['u'] = "username required"; }
  else if(mysqli_num_rows($result) > 0){ $errors['u'] = "username allready exits";}

  if (empty($email)) { $errors['e'] = "email required"; }
  else if(mysqli_num_rows($result) > 0){ $errors['e'] = "Email allready exits";}

  if (empty($age)) { $errors['a'] = "age required"; }
  if (empty($number)) { $errors['n'] = "number required"; }
  if (empty($address)) { $errors['add'] = "address required"; }
  if (empty($password2)) { $errors['p'] = "password required"; }



  
  /* if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

    */ 
  
   
    

   // Finally, register user if there are no errors in the form
   //encrypt the password before saving in the database
    if(count($errors)==0)
    {

  	$query = "INSERT INTO webuser(username, email, age, number,address, password2) 
  			  VALUES('$username', '$email', '$age','$number','$address','$password2')";

      $result = mysqli_query($db, $query);
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";

      if($result)
      {
        echo "<script> alert('THANKS FOR REGISTRATION') </script>";
      }
      else
      {
        echo "<script> alert('PLEASE TRY AGAIN') </script>";
      }
  	 // header('location: SIGN-IN.PHP');

     try{  
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'sahilphalke1980@gmail.com';                     //SMTP username
      $mail->Password   = 'cwtyxiffylwyedpu';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('sahilphalke1980@gmail.com', 'BOOK/LAS');
      $mail->addAddress($_POST["email"]);     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');
  
      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = "Hello $username";
      $mail->Body    = "'<b>Thanks For Rrgistration To Our Website BOOK/LAS</b>'
                         <b>Go To Page <a href='WEB-PROJECT/BOOK.PHP'>BOOK/LAS</a></b>";
  
      $mail->send();
      
     // echo "<script> alert('Message has been sent')</script>";
      } 
     catch(Exception $e)
      {
     // echo "<script> alert('Message could not be sent')</script>";
      }
     
  }
 }
      
  



//delete query

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    


    //just write sql query
    $sql="DELETE FROM webuser WHERE id=$id";


    $result= mysqli_query($db,$sql);
    if($result){

        header('location:ADMIN.php');
    }else{
        die(mysqli_error($db));
    }
}



if(isset($_GET['b_deleteid'])){
  $bid=$_GET['b_deleteid'];
  
  

  //i had call that id and store here in $id

  //just write sql query
  $sql="DELETE FROM  b_product WHERE bid=$bid";

  //i will again paa con and query variable

  $result= mysqli_query($db,$sql);
  if($result){

      header('location:ADMIN.php');
  }else{
      die(mysqli_error($db));
  }
}

?>

<?php
/*
$con=new mysqli('localhost','root','','webproject');
if(isset($_POST['buy_now'])){
  $bname = $_POST['bname'];
  $bimg = $_POST['bimg'];
  $bprice = $_POST['bprice'];
  $username = $_POST['username'];
  $email    = $_POST['email'];
  $address    = $_POST['address'];

// inset query
$sql= "INSERT INTO b_order(bname,bimg,bprice,username,email,address)
        VALUES ('$bname','$bimg','$bprice','$username','$email','$address')";

// execute query
$result = mysqli_query($con,$sql);
// we will check
if($result){

    header('location:BOOK.php');
 // header('location:display.php');
}
else{
  die(mysqli_error($con));
}
}*/
?>

<?php
if(isset($_GET['o_deleteid'])){
    $oid=$_GET['o_deleteid'];
    
    

    //i had call that id and store here in $id

    //just write sql query
    $sql="DELETE FROM b_order WHERE oid=$oid";

    //i will again paa con and query variable

    $result= mysqli_query($db,$sql);
    if($result){

        header('location:ADMIN.php');
    }else{
        die(mysqli_error($db));
    }
}



// Adding books to cart "ADD TO CART"

if (isset($_POST['addtocart']))
{
  $bid = mysqli_real_escape_string($db, $_POST['bid']);
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $bimg = mysqli_real_escape_string($db, $_POST['bimg']);
  $bname = mysqli_real_escape_string($db, $_POST['bname']);
  $bprice = mysqli_real_escape_string($db, $_POST['bprice']);

  /*$query = "INSERT INTO add_cart(bid,username,bimg,bname,bprice) 
  			  VALUES('$bid',$username','$bimg','$bname','$bprice')";*/
  if(isset($_SESSION['username'])){
  $query = "INSERT INTO `add_cart`(`bid`,`id`, `username`, `bimg`, `bname`, `bprice`) VALUES ('$bid','$id','$username','$bimg','$bname','$bprice')";
  $result = mysqli_query($db,$query);
  
  }
  else{
    header('location:SIGN-IN.PHP');
  }

     /* if($result)
      {
        echo "<script> alert('Added Successfullly Into Cart') </script>";
      }
      else
      {
        echo "<script> alert('Try Again Please') </script>";
      }
      */

}


  // DELETE CART PRODUCT
  
if(isset($_GET['a_deleteid'])){
  $aid=$_GET['a_deleteid'];
  
  

  $db = mysqli_connect('localhost','root','', 'webproject');


  //just write sql query
  $sql="DELETE FROM add_cart WHERE aid=$aid";

  //i will again paa con and query variable

  $result= mysqli_query($db,$sql);
  if($result){

      header('location:ADD-CART.php');
  }else{
      die(mysqli_error($db));
  }
}

if(isset($_GET['blog_deleteid'])){
  $blog_id=$_GET['blog_deleteid'];
  
  

  $db = mysqli_connect('localhost','root','', 'webproject');


  //just write sql query
  $sql="DELETE FROM blogs WHERE blog_id=$blog_id";

  //i will again paa con and query variable

  $result= mysqli_query($db,$sql);
  if($result){

      header('location:ADMIN.PHP');
  }else{
      die(mysqli_error($db));
  }
}


//INSERT CONTACT US INTO DATABASE

if(isset($_POST['contact-submit']))
{

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
  
  $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";

  $result= mysqli_query($db,$sql);
  if($result){

      header('location:BOOK.PHP');
  }else{
      die(mysqli_error($db));
  }

}



if(isset($_POST['order-submit']))
{

    $name         = mysqli_real_escape_string($db, $_POST['name']);
    $email        = mysqli_real_escape_string($db, $_POST['email']);
    $address      = mysqli_real_escape_string($db, $_POST['address']);
    $city         = mysqli_real_escape_string($db, $_POST['city']);
    $state        = mysqli_real_escape_string($db, $_POST['state']);
    $pincode      = mysqli_real_escape_string($db, $_POST['pincode']);
    $bid          = mysqli_real_escape_string($db, $_POST['bid']);
    $bname        = mysqli_real_escape_string($db, $_POST['bname']);
    $bimg         = mysqli_real_escape_string($db, $_POST['bimg']);
    $bprice       = mysqli_real_escape_string($db, $_POST['bprice']);
    $paymentmode  = mysqli_real_escape_string($db, $_POST['paymentmode']);
    $totalprice   = mysqli_real_escape_string($db, $_POST['totalprice']);


    if (empty($username)) { $errors['u'] = "username required"; }
    if (empty($email)) { $errors['e'] = "email required"; }
    if (empty($address)) { $errors['u'] = "address required"; }
    if (empty($city)) { $errors['u'] = "city required"; }
    if (empty($state)) { $errors['u'] = "state required"; }
    if (empty($pincode)) { $errors['u'] = "pincode required"; }

    if($name !="" && $email !="" && $address !="" && $city !="" && $state !="" && $pincode !="" && $bid !="" && $bname !="" && $bimg !="" && $bprice !="" && $paymentmode !="" && $totalprice !="")
    {
    $sql = "INSERT INTO bookorder(name, email, address, city, state, pincode, bid, bname, bimg, bprice, paymentmode, totalprice) VALUES
          ('$name','$email','$address','$city','$state','$pincode','$bid','$bname','$bimg','$bprice','$paymentmode','$totalprice')";

   $result= mysqli_query($db,$sql); 
        if($result)
        {
            echo "<script> alert('Your orderd is confirmed successfully')</script>";
        }
        else{
            die(mysqli_error($db));
        }
    }
}


?>
