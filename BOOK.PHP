<?php include('CONNECT.PHP') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book/LAS website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- <link rel="stylesheet" href="./bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css"> -->
   <!--<link rel="stylesheet" href="./bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css"> -->


    <!-- custom css file link  -->
    <link  rel="stylesheet" href="CSS/STYLE8.CSS">
    <link  rel="stylesheet" href="CSS/STYLE1.CSS">

    


    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
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

    <form action="https://www.google.com/search" method="get" target="_blank" id="search-form" class="search-form">
            <input name="q" type="search" name="" placeholder="search here..." id="search-box" autocomplete="off" autofocus>
           <!-- <label for="search-box" class="fas fa-search"></label> -->
            <p class="info"></p>
    </form>

       <!-- <form action="https://www.google.com/search" method="get" target="_blank" id="search-form">
    <input name="q" type="text" placeholder="Search Google..." autocomplete="off" autofocus >
  </form> -->
  <script>

const search = document.querySelector("#search-form");
const searchFormInput = search.querySelector("input"); // <=> document.querySelector("#search-form input");
const info = document.querySelector(".info");

// The speech recognition interface lives on the browser’s window object
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition; // if none exists -> undefined

if(SpeechRecognition) {
  console.log("Your Browser supports speech Recognition");
  
  const recognition = new SpeechRecognition();
  recognition.continuous = true;
  // recognition.lang = "en-US";

  search.insertAdjacentHTML("beforeend", '<button type="button" style="padding:2rem;"><i class="fas fa-microphone"></i></button>');
  searchFormInput.style.paddingRight = "50px";

  const micBtn = search.querySelector("button");
  const micIcon = micBtn.firstElementChild;

  micBtn.addEventListener("click", micBtnClick);
  function micBtnClick() {
    if(micIcon.classList.contains("fa-microphone")) { // Start Voice Recognition
      recognition.start(); // First time you have to allow access to mic!
    }
    else {
      recognition.stop();
    }
  }

  recognition.addEventListener("start", startSpeechRecognition); // <=> recognition.onstart = function() {...}
  function startSpeechRecognition() {
    micIcon.classList.remove("fa-microphone");
    micIcon.classList.add("fa-microphone-slash");
    searchFormInput.focus();
    console.log("Voice activated, SPEAK");
  }

  recognition.addEventListener("end", endSpeechRecognition); // <=> recognition.onend = function() {...}
  function endSpeechRecognition() {
    micIcon.classList.remove("fa-microphone-slash");
    micIcon.classList.add("fa-microphone");
    searchFormInput.focus();
    console.log("Speech recognition service disconnected");
  }

  recognition.addEventListener("result", resultOfSpeechRecognition); // <=> recognition.onresult = function(event) {...} - Fires when you stop talking
  function resultOfSpeechRecognition(event) {
    const current = event.resultIndex;
    const transcript = event.results[current][0].transcript;
    
    if(transcript.toLowerCase().trim()==="stop recording") {
      recognition.stop();
    }
    else if(!searchFormInput.value) {
      searchFormInput.value = transcript;
    }
    else {
      if(transcript.toLowerCase().trim()==="go") {
        search.submit();
      }
      else if(transcript.toLowerCase().trim()==="reset input") {
        searchFormInput.value = "";
      }
      else {
        searchFormInput.value = transcript;
      }
    }
    // searchFormInput.value = transcript;
    // searchFormInput.focus();
    // setTimeout(() => {
    //   searchForm.submit();
    // }, 500);
  }
  
  
  
}
else {
  console.log("Your Browser does not support speech Recognition");
  info.textContent = "Your Browser does not support Speech Recognition";
}
</script>
        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-blank"></div>
             
             <a href="SIGN-IN.PHP" class="fas fa-user"></a>
             <a><?php if(isset($_SESSION['username'])){  echo $_SESSION['username'];} ?></a> 
             <a href="LOG-OUT.PHP"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>

    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#featured">featured</a>
            <a href="#arrivals">arrivals</a>
            <a href="#blogs">blogs</a>
            <a href="#about">about</a>
            <a href="#contact-us">contact</a>
            <?php
            if(isset($_SESSION['username'])){

           echo "<a href='ADD-CART.PHP'><i class='fa fa-shopping-cart'></i>cart</a>";
            
            }
            else
            {
                
            }
            ?>
        </nav>
    </div>

</header>

<!-- header section ends -->

<div class="back-1">

</div>

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
</nav>



<!-- home section starts  -->

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>upto 75% off</h3>
            <p>let's order now!!!</p>

            <?php
            if(isset($_SESSION['username'])){
            echo "<a href='#featured' class='btn'>shop now</a>";
           }
            ?>
        </div>

        <div class="swiper books-slider">
            <div class="">
                <a href="#" class="swiper-slide"><img src="image/book-1.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-2.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-3.png" alt=""></a>
            </div>
        </div>

    </div>

</section>

<!-- home section ense  -->
<div class="back-1">

</div>

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>free shipping</h3>
            <p>order over ₹100</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100 secure payment</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>easy returns</h3>
            <p>10 days returns</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>

</section>

<!-- icons section ends -->

<div class="back-1">

</div>

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>featured books</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

          <!--  <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class=""></a>
                </div>
                <div class="image">
                    <img src="image/book-10.png" alt="">
                </div>
                <div class="content">
                    <h3>WEB-DESIGNING</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <a href="#" class="btn" >Buy NoW</a>
                </div>
            </div>
-->
            <?php

             $con=new mysqli('localhost','root','','webproject');
                $sql= "SELECT * FROM b_product";
                $result=mysqli_query($con,$sql);
 
                if($result)
            {
                while($row=mysqli_fetch_assoc($result))
                
               
            {   
            ?>
           
        <div class="swiper-slide box">

            <form method="POST" action="BOOK.PHP">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <?php
        echo     '<a href="GET-PRODUCT.PHP?display-img='.$row['bid'].'" id="my-content-link"><img class="product-btn"  alt="" src="IMAGE/'.$row['bimg'].'"></a>';
                ?>   
             </div>
                <div class="content">
                    <h3><?php echo $row['bname']  ?></h3>
                    <div class="price">₹<?php echo $row['bprice']  ?> <span>₹30.45</span></div>
                        <input type="hidden" name="bid" value="<?php echo $row['bid']  ?>">
                        <input type="hidden" name="bid" value="<?php echo $row['bimg']  ?>">
                        <input type="hidden" name="bname" value="<?php echo $row['bname']  ?>">
                        <input type="hidden" name="bprice" value="<?php echo $row['bprice']  ?>">
                        <input type="hidden" name="address" value="<?php if(isset($_SESSION['address'])){  echo $_SESSION['address'];} ?>">
                        <input type="hidden" name="id" value="<?php if(isset($_SESSION['id'])){  echo $_SESSION['id'];} ?>">
                        <input type="hidden" name="username" value="<?php if(isset($_SESSION['username'])){  echo $_SESSION['username'];}  ?>">
                        <input type="hidden" name="email" value="<?php if(isset($_SESSION['email'])){  echo $_SESSION['email'];}  ?>">
                        <!-- <a class="btn" type="submit" name="addtocart" href="BOOK.PHP?b_productselect=<?php /*if(isset($_SESSION['username'])){ echo $row['bid']; } else{
                            header("location: SIGN-IN.PHP");
                        } */?>">ADD To Cart</a> -->
                        <input type="hidden" name="bimg" value="<?php echo $row['bimg'];?>">
                        <input type="submit"  class="btn" onclick="insertintocart()" name="addtocart" href="<?php  if(isset($_SESSION['username'])){  } ?>" value="Add To Cart">
                       <!-- <input type="submit"  name="buy_now" value="Buy Now" class="btn" onclick="confirm('Your Order Is Confirm')" ></a> -->
                    </div>
            </form>
        </div>

        
<?php

if(isset($_SESSION['username'])){
            ?>
        <script>
    function insertintocart() {
    //create an AJAX request object
    var xhr = new XMLHttpRequest();

    //set the callback function to handle the response
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //display the message as a pop-up using the alert function
            alert('The Product Added Into your Cart | please check');
        }
    };

    //send the AJAX request to the server
    xhr.open("GET", "CONNECT.PHP", true);
    xhr.send();
}
</script>
<?php
        }
        ?>
            <?php                  

 }
}
?>
    </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>


<!--<script>
var noti = document.querySelector('h1');
	var select = document.querySelector('.select');
	var button = document.getElementsByTagName('button');
	for(var but of button){
		but.addEventListener('click', (e)=>{
			var add = Number(noti.getAttribute('data-count') || 0);
			noti.setAttribute('data-count', add +1);
			noti.classList.add('zero')

			// image --animation to cart ---//
			var image = e.target.parentNode.querySelector('img');
			var span = e.target.parentNode.querySelector('span');
			var s_image = image.cloneNode(false);
			span.appendChild(s_image);
			span.classList.add("active");
			setTimeout(()=>{
				span.classList.remove("active");
				span.removeChild(s_image);
			}, 500); 
			

			// copy and paste //
			var parent = e.target.parentNode;
			var clone = parent.cloneNode(true);
			select.appendChild(clone);
			clone.lastElementChild.innerText = "Buy-now";
			
			if (clone) {
				noti.onclick = ()=>{
					select.classList.toggle('display');
				}	
			}
		})
	}
   
    </script>
-->

<!-- featured section ends -->

<div class="back-1">

</div>

<!-- arrivals section starts  -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>new arrivals</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-1.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-2.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-3.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-4.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-5.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-6.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-7.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-8.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-9.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-10.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">₹15.99 <span>₹20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

</section>

<!-- arrivals section ends -->
<div class="back-1">

</div>

<!-- newsletter section starts -->

<section class="newsletter" id="newsletter">

<div class="newsletter-1">
    <img src="image/book-2.png" alt="">
    <img src="image/book-3.png" alt="">
    <img src="image/book-1.png" alt="">
</div>   
    <form action="">
        <h3>subscribe for latest updates</h3>
        <input type="email" name="" placeholder="enter your email" id="" class="box">
        <input type="submit" onclick="confirm('THANK YOU FOR SUBSCRIBE')" value="subscribe" class="btn">
    </form>

</section>

<!-- newsletter section ends -->
<div class="back-1">

</div>

<!-- blogs section starts  -->



<section class="blogs" id="blogs">

    <h1 class="heading"> <span>our blogs</span> </h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

        <?php

             $con=new mysqli('localhost','root','','webproject');
                $sql= "SELECT * FROM blogs ORDER BY blog_id DESC";
                $result=mysqli_query($con,$sql);
 
                if($result)
            {
                while($row=mysqli_fetch_assoc($result))
                
               
            {  
                ?>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="IMAGE/<?php echo $row['blog_img']  ?>" alt="">
                </div>
                <div class="content">
                    <h3><?php echo $row['blog_title']; ?></h3>
                    <p><?php echo $row['blog_content']; ?></p>
                    
                </div>
            </div>
            <?php

            }
        }
        ?>
        </div>
    </div>
</section>
            

        <!--    <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The Book Reader</h3>
                    <p>Using a book reader can have several benefits, such as being able to carry multiple books with you at all times, having access to a wider range of books (including those that are out of print or hard to find), and being able to adjust font size and lighting to suit your needs.</p>
                   
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Hungry For Books</h3>
                    <p>A person who is hungry for books may always be on the lookout for new reading material, whether it's browsing in bookstores, checking out books from the library, or downloading e-books.</p>
                    
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-5.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Creative Book Flow</h3>
                    <p>Characters are a key element of any book, and their development can contribute to the book's flow. If characters are well-developed and evolve over the course of the story, readers will feel invested in their journeys and want to continue reading to see how their stories unfold.</p>
                    
                </div>
            </div>

        </div>
    -->

    
    




<!-- blogs section ends -->
<div class="back-1">

</div>


<section class="about" id="about">

   <div class="flex">

      <div class="image">
         <img src="IMAGE/book-7.png" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>It is very important for the customer to pay attention to the adipiscing process. It will happen to the pleasures or here the troubles, by rejecting the birth of the flight, as soon as we receive the pardon by reason of right. Should he avoid the task of doing just that at the time of taking on the duties?</p>
         <p>The pain itself, let it be pursued by the adipiscing elitists. For those who are often prevented from obtaining the smallest of the so-called responsibilities of the body?</p>
      </div>

   </div>

</section>

<div class="back-1">

</div>



<!-- contact form  -->
<h3 class="contact" id="contact-us">Contact us</h3>
<p class="par1">whether you have a question about our product and services, need help with an order, or just want to say hello we're here to help</p>
<p class="par1">you can rech us using the contact form below, or by using the contact information provided. we'll do our best to get back to you as soon as possible, we look forward to hearing from you!</p>

<form id="contact-form" method="post" action="#">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" required>
  </div>
  <div class="form-group">
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
  </div>
  <button type="submit"  name="contact-submit" class="btn-submit">Send Message</button>
</form>

<div class="back-1">

</div>

<script>
// Get the form element
/* const form = document.getElementById("contact-form");

// Add an event listener to handle form submission
form.addEventListener("submit", function(event) {
  event.preventDefault(); // prevent default form submission behavior

  // Get form data
  const formData = new FormData(form);

  // Send form data using fetch API
  fetch(form.action, {
    method: form.method,
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    alert("Thank you for your message! We will get back to you soon.");
    form.reset();
  })
  .catch(error => {
    alert("Oops! Something went wrong. Please try again later.");
    console.error("Error:", error);
  });
});

*/
</script>

<!-- footer section starts  -->

<section class="footer" id="contact">

    <div class="box-container">

        <div class="box">
            <h3>our locations</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> PUNE </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> VAPI </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> SURAT </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> MUMBAI </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> THANE </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> NASHIK </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#featured"> <i class="fas fa-arrow-right"></i> featured </a>
            <a href="#arrivals"> <i class="fas fa-arrow-right"></i> arrivals </a>
            <a href="#newsletter"> <i class="fas fa-arrow-right"></i> subscribe </a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +91 8141779482 </a>
            <a href="#"> <i class="fas fa-phone"></i> +91 8141716205 </a>
            <a href="#"> <i class="fas fa-envelope"></i> sahilphalke2003@gmail.com </a>
            <img src="image/worldmap.png" class="map" alt="">
        </div>

      <!--  <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>
-->
    </div>

</section>

<!-- footer section ends -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>