<!DOCTYPE html>
<html lang="en">

<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
   // Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
   </script>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>FarmTech</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">




   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- fontawesome -->
   <link rel="stylesheet" href="assets/css/all.min.css">
   <!-- bootstrap -->
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <!-- owl carousel -->
   <link rel="stylesheet" href="assets/css/owl.carousel.css">
   <!-- magnific popup -->
   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <!-- animate css -->
   <link rel="stylesheet" href="assets/css/animate.css">
   <!-- mean menu css -->
   <link rel="stylesheet" href="assets/css/meanmenu.min.css">
   <!-- main style -->
   <!-- responsive -->
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap123.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style123.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">

   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">

   <link rel="icon" type="image/jpg" href="images/123.jpg">
   <style>
      html {
         scroll-behavior: smooth;
      }

      .team {
         background-color: var(--light-gray);
      }

      .team .box-container .box .image {
         height: 30rem;
         overflow: hidden;
         margin-bottom: 2rem;
      }

      .team .box-container .box .image img {
         width: 100%;
         height: 100%;
         object-fit: cover;
      }

      .team .box-container {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
         gap: 2rem;
      }

      .team .box-container .box {
         background-color: var(--white);
         box-shadow: var(--box-shadow);
      }

      .team .box-container .box .info {
         text-align: center;
      }

      .team .box-container .box .info h3 {
         font-size: 2rem;
         margin-bottom: 1rem;
      }

      .team .box-container .box .info p {
         font-size: 1.5rem;
         padding: 1.5rem;
         line-height: 2;
         margin-bottom: 1.5rem;
         letter-spacing: 0.1rem;
         color: var(--gray);
         transform: none;
      }

      .team .box-container .box .image img:hover {
         transform: scale(1.1);
      }

      @keyframes page-load {
         from {
            background-color: #ffc422;
         }

         to {
            background-color: #c0392b;
         }
      }

      .page-loading::before {
         content: " ";
         display: block;
         position: fixed;
         z-index: 10;
         height: 2px;
         width: 100%;
         top: 0;
         left: 0;
         background-color: #06D;
         animation: page-load infinite ease-out 2s;
         box-shadow: 0 2px 2px rgba(0, 0, 0, .2);
      }


      .hero-bg {
         background-image: url(images/hero-bg.jpg);
         background-size: cover;
         background-position: center;
         background-attachment: fixed;
      }

      .hero-area {
         height: 100%;
         position: relative;
         z-index: 1;
      }

      .hero-area:after {
         position: absolute;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         content: "";
         background-color: #07212e;
         z-index: -1;
         opacity: 0.6;
      }

      .loader {
         bottom: 0;
         height: 100%;
         left: 0;
         position: fixed;
         right: 0;
         top: 0;
         width: 100%;
         z-index: 1111;
         background: #fff;
         overflow-x: hidden;
      }

      .loader-inner {
         position: absolute;
         left: 50%;
         top: 50%;
         -webkit-transform: translate(-50%, -50%);
         -ms-transform: translate(-50%, -50%);
         -o-transform: translate(-50%, -50%);
         transform: translate(-50%, -50%);
         height: 50px;
         width: 50px;
      }

      .circle {
         width: 8vmax;
         height: 8vmax;
         border-right: 4px solid green;
         border-radius: 50%;
         -webkit-animation: spinRight 800ms linear infinite;
         animation: spinRight 800ms linear infinite;
      }

      .circle:before {
         content: '';
         width: 6vmax;
         height: 6vmax;
         display: block;
         position: absolute;
         top: calc(50% - 3vmax);
         left: calc(50% - 3vmax);
         border-left: 3px solid black;
         border-radius: 100%;
         -webkit-animation: spinLeft 800ms linear infinite;
         animation: spinLeft 800ms linear infinite;
      }

      .circle:after {
         content: '';
         width: 6vmax;
         height: 6vmax;
         display: block;
         position: absolute;
         top: calc(50% - 3vmax);
         left: calc(50% - 3vmax);
         border-left: 3px solid green;
         border-radius: 100%;
         -webkit-animation: spinLeft 800ms linear infinite;
         animation: spinLeft 800ms linear infinite;
         width: 4vmax;
         height: 4vmax;
         top: calc(50% - 2vmax);
         left: calc(50% - 2vmax);
         border: 0;
         border-right: 2px solid #000;
         -webkit-animation: none;
         animation: none;
      }

      @-webkit-keyframes spinLeft {
         from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
         }

         to {
            -webkit-transform: rotate(720deg);
            transform: rotate(720deg);
         }
      }

      @keyframes spinLeft {
         from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
         }

         to {
            -webkit-transform: rotate(720deg);
            transform: rotate(720deg);
         }
      }

      @-webkit-keyframes spinRight {
         from {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
         }

         to {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
         }
      }

      @keyframes spinRight {
         from {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
         }

         to {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
         }
      }




      .client-avater {
         margin-bottom: 20px;
      }

      .client-meta h3 {
         color: white;
         font-size: 20px;
         font-weight: 600;
      }

      .client-meta h3 span {
         display: block;
         font-size: 70%;
         margin-top: 10px;
         color: white;
         font-weight: 600;
         opacity: 0.5;
      }

      .testimonial_section {
         width: 100%;
         float: left;
         background-color: rgba(3, 28, 33, 255);
         padding-bottom: 90px;
      }

      p.testimonial-body {
         font-size: 17px;
         font-style: italic;
         width: 700px;
         margin: 0 auto;
         line-height: 1.8;
         color: white;
         font-weight: bold;
         margin-top: 20px;
      }

      .last-icon {
         margin-top: 20px;
         font-size: 25px;
         opacity: 0.3;
      }

      .client-avater img {
         max-width: 100px;
         border-radius: 50%;
         margin: 0 auto;
      }
   </style>
</head>

<body>
   <div class="loader">
      <div class="loader-inner">
         <div class="circle"></div>
      </div>
   </div>
   <!-- header section start -->
   <div class="back">

      <div class="header_section hero-area hero-bg">

         <script>
            window.embeddedChatbotConfig = {
               chatbotId: "s6whAAHeCY4WwH2TGj_xJ",
               domain: "www.chatbase.co"
            }
         </script>
         <script src="https://www.chatbase.co/embed.min.js" chatbotId="s6whAAHeCY4WwH2TGj_xJ" domain="www.chatbase.co"
            defer>
            </script>

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo" data-aos="fade-down-right" class="div" data-aos-duration="2000"><a href="index.php"><img
                     src="images/agro.jpg" style="   background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  height:120px;
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
  display: flex;
  font-size: 21px;
  font-weight: 500;
  padding: 16px 15px;
  align-items: center;
  border-bottom: 1px solid #ccc;"></a></div>
            
<!DOCTYPE html>

<head>

	<style>
		html {
			scroll-behavior: smooth;
			width: 500 px;
		}

		.menu-bar {
			border-radius: 60px;
			height: 70px;
			display: inline-flex;
			background-color: rgba(0, 0, 0, .4);
			-webkit-backdrop-filter: blur(10px);
			backdrop-filter: blur(10px);
			align-items: center;
			padding: 0 10px;
			margin: 50px 0 0 0;
			margin-right: 100px;
		}

		.menu-bar li:hover a {
			color: black;
			font-size: large;
		}

		.menu-bar li {
			list-style: none;
			color: white;
			font-family: sans-serif;
			font-weight: bold;
			padding: 12px 16px;
			margin: 0 15px;
			position: relative;
			cursor: pointer;
			white-space: nowrap;
		}

		.menu-bar li::before {
			content: " ";
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			z-index: -1;
			transition: 0.2s;
			border-radius: 25px;
		}

		.menu-bar li:hover {
			color: black;
		}

		.menu-bar li:hover::before {
			background: linear-gradient(to bottom, #e8edec, #d2d1d3);
			box-shadow: 0px 3px 20px 0px black;
			transform: scale(1.2);
		}
		
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

	</style>
</head>

<body>
	<ul class="menu-bar" data-aos="fade-down-left" id="navbar" class="div" data-aos-duration="1000">
		<li><a href="test.php">Login & register</a></li>
			<li><a href="indexchat.php">Chatpage</a></li>

	</ul>
	</nav>
	<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("nevbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
	<script>
		document.addEventListener('DOMContentLoaded', () => {

			var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
			if (disclaimer) {
				disclaimer.remove();
			}
		});
	</script>
</body>

</html>
            <!-- banner section end -->

            <div class="banner_section layout_padding" data-aos="fade-down" class="div"
               data-aos-anchor-placement="center-bottom" data-aos-duration="2000" id="section1">
               <div id="main_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-6">
                                 <h1 class="banner_taital">Dedicated<br> <span style="color: #fff;">To Help the
                                       Farmers</span></h1>
                                 <p class="banner_text">The website is based on the aim of helping farmers in their
                                    farming sessions.</p>
                              </div>
                           </div>
                           <div class="custum_menu">
                              <ul>
                                 <li class="active"><a href="#section1">Home</a></li>
                                 <li><a href="#section3">About</a></li>
                                 <li><a href="#section2">Services</a></li>
                                 <li><a href="#section4">Why choose us</a></li>
                                 <li><a href="#section5">blogs</a></li>
                                 <li><a href="#section9">Contact us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-6">
                                 <h1 class="banner_taital">Dedicated<br> <span style="color: #fff;">To Building
                                       Relation
                                       between Farmers and Buyers.</span></h1>
                                 <p class="banner_text">The website provides the live chat feature to help farmers
                                    and
                                    buyers to communicate and build relations between them .</p>
                              </div>
                           </div>
                           <div class="custum_menu">
                              <ul>
                                 <li class="active"><a href="#section1">Home</a></li>
                                 <li><a href="#section3">About</a></li>
                                 <li><a href="#section2">Services</a></li>
                                 <li><a href="#section4">Why choose us</a></li>
                                 <li><a href="#section5">blogs</a></li>
                                 <li><a href="#section9">Contact us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-6">
                                 <h1 class="banner_taital">Dedicated<br> <span style="color: #fff;">With aim to
                                       mordernize the farming sectior with the latest Technology.</span></h1>
                                 <p class="banner_text">The website provides the latest information to Farmers about
                                    the
                                    Soil moisture,Air quality,temperature etc...</p>
                              </div>
                           </div>
                           <div class="custum_menu">
                              <ul>
                                 <li class="active"><a href="#section1">Home</a></li>
                                 <li><a href="#section3">About</a></li>
                                 <li><a href="#section2">Services</a></li>
                                 <li><a href="#section4">Why choose us</a></li>
                                <li><a href="#section5">Blogs</a></li>
                                 <li><a href="#section9">Contact us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-6">
                                 <h1 class="banner_taital">Dedicated<br> <span style="color: #fff;">To benefit Farmers as well as Other Users.
                                       </span></h1>
                                 <p class="banner_text">The website has Crop-disease-detection as well as Crop-Recommendation system which is been made using latest Technology.
                              </p>
                              </div>
                           </div>
                           <div class="custum_menu">
                              <ul>
                                 <li class="active"><a href="#section1">Home</a></li>
                                 <li><a href="#section3">About</a></li>
                                 <li><a href="#section2">Services</a></li>
                                 <li><a href="#section4">Why choose us</a></li>
                                <li><a href="#section5">Blogs</a></li>
                                 <li><a href="#section9">Contact us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
               </a>
            </div>
      </div>
      <!-- banner section end -->
   </div>
   <!-- header section end -->
   <!-- services section start -->
   <div class="services_section layout_padding" id="section2" data-aos="zoom-in-down" class="div"
      data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
      <br>
      <br>
      <div class="container">
         <h1 class="services_taital">Services</h1>
         <div class="services_section_2 layout_padding">
            <div class="row">
               <div class="col-md-4">
                  <div class="image_main">
                     <img src="images/img-2.png" class="image_2" data-aos="fade-right" class="div"
                        style="border-radius:30px;" data-aos-duration="2000">
                     <h2 class="vegetable_text">Vegetable</h2>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="image_main">
                     <img src="images/img-3.png" class="image_2" data-aos="fade-down" class="div"
                        style="border-radius:30px;" data-aos-duration="2000">
                     <h2 class="vegetable_text">Fruit</h2>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="image_main">
                     <img src="images/green-salad.jpg" class="image_2" data-aos="fade-left"
                        style="border-radius:30px;height:178px;" class="div" data-aos-duration="2000">
                     <h2 class="vegetable_text">Salad</h2>
                  </div>
               </div>

            </div>
         </div>
         <div class="services_section_3 layout_padding">
            <div class="row">
               <div class="col-md-6">
                  <div class="image_main">
                     <img src="images/img-5.png" class="image_2" style="border-radius:30px;" data-aos="fade-right"
                        class="div" data-aos-duration="2000">
                     <h2 class="vegetable_text">Berries</h2>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="image_main">
                     <img src="images/img-6.png" class="image_2" style="border-radius:30px;" data-aos="fade-left"
                        class="div" data-aos-duration="2000">
                     <h2 class="vegetable_text">Milk</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class="read_bt_1"><a href="#">Read More</a></div>
      </div>
   </div>
   <!-- services section end -->
   <!-- about section start -->
   <div class="about_section layout_padding" id="section3" data-aos="zoom-in-up" class="div"
      data-aos-anchor-placement="center-bottom" data-aos-duration="1000">

      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <br>
               <br>
               <br>
               <br>
               <div class="about_main">
                  <h1 class="about_taital">About Our Farm</h1>
                  <p class="about_text">The farmtech website has aim to provide letest information to farmer about
                     there
                     farm,soil and atmosphere.
                     It also provide the recommendation system which will predict and detect the suitable crop for soil according to reading.
                     The Website also provides live communication between farmers and buyers to maintain the healthy
                     relationship between farmers and buyers.
                  </p>
                  <div class="readmore_bt"><a href="aboutus2.php">Read More</a></div>
               </div>
            </div>
            <div class="col-md-6 padding_0">
               <br>
               <br>
               <br>
               <br>
               <div class="image_7" data-aos="zoom-in" class="div" data-aos-duration="3000"><img src="images/img-7.png"
                     style="border-radius:50px;">
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
   <!-- about section end -->
   <!-- resources section start -->
   <div class="resources_section" id="section8" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
      class="div">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <br>
               <br>
               <br>
               <br>
               <div class="resources_main">
                  <h1 class="resources_taital">Resources for Farming</h1>
                  <h6 class="resources_taital_1">Go green, go natural....we love to help you!</h6>
                  <p class="resources_text">Use of organic fertilizer by farmer make the fruits and vegetables as fresh
                     as they are.</p>
                  <div class="readmore_bt_1"><a href="#">Read More</a></div>
               </div>
            </div>
            <div class="col-md-6">
               <br>
               <br>
               <br>
               <br>
               <div data-aos="zoom-in" class="div" data-aos-duration="2000"><img src="images/seed1.jpg"
                     style="border-radius:30px;" class="image_8">
               </div>
            </div>
         </div>
      </div>
      <br>
      <br>
      <br>
      <br>
   </div>
   <!-- resources section end -->
   <!-- choose section star -->
   <div class="choose_section layout_padding" id="section4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
      class="div">

      <div class="container">
         <h1 class="choose_taital">Why Choose Us</h1>
         <p class="choose_text">Our team and website provides below features:-</p>
         <div class="choose_section_2 layout_padding">
            <div class="row">
               <div class="col-sm-4" data-aos="fade-right" class="div" data-aos-duration="2000">
                  <div class="icon_1"><img src="images/icon-1.png"></div>
                  <h2 class="farm_text">Letest information to farmers</h2>
                  <p class="dummy_text">It provide the letest soil moisture,temperature using IOT devices.Which helps
                     farmers to farm the crops according to the conditions.</p>
               </div>
               <div class="col-sm-4" data-aos="zoom-in" class="div" data-aos-duration="2000">
                  <div class="icon_1"><img src="images/icon-1.png"></div>
                  <h2 class="farm_text">Fresh <br>Food and vegetables</h2>
                  <p class="dummy_text">The website provides marketplace for both buyer side and farmer side .Which is
                     used to sell and buy fresh items.</p>
               </div>
               <div class="col-sm-4" data-aos="fade-left" class="div" data-aos-duration="2000">
                  <div class="icon_1"><img src="images/icon-1.png"></div>
                  <h2 class="farm_text">Chat Feature for both farmers and buyers.</h2>
                  <p class="dummy_text">The website has rating system as well as chat feature so that farmer and buyer
                     can communicate and build relation between them.</p>
               </div>
            </div>
         </div>
         <div class="read_bt_1"><a href="#">Read More</a></div>
      </div>
   </div>
   <!-- choose section end -->
   <!-- blog section start -->
   <!-- <div class="blog_section layout_padding">
      <div class="container">
         <h1 class="choose_taital">Our Team of Founders</h1>
         <div class="blog_section_2 layout_padding">
            <div class="row">
               <div class="col-lg-4">
                  <div class="box_main">
                     <img src="images/krish.jpg" class="image_9">
                     <div class="post_main">
                        <h6 class="post_text">Krish Maniar</h6>
                        <div class="comment_main">
                           <div class="left_main">
                              <div class="like_text">Like<span class="padding_left_10"><img
                                       src="images/like-icon.png"></span></div>
                           </div>
                           <div class="middle_main">
                              <div class="like_text">Comment<span class="padding_left_10"><img
                                       src="images/chat-icon.png"></span></div>
                           </div>
                           <div class="right_main">
                              <div class="like_text">Share<span class="padding_left_10"><img
                                       src="images/share-icon.png"></span></div>
                           </div>
                        </div>
                        <p class="long_text">I am Krish Maniar,Currently Studing B.Tech-IT from KPGU,Vadodara. </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="box_main">
                     <img src="images/kamlesh.jpg" class="image_9">
                     <div class="post_main">
                        <h6 class="post_text">Kamlesh Patel</h6>
                        <div class="comment_main">
                           <div class="left_main">
                              <div class="like_text">Like<span class="padding_left_10"><img
                                       src="images/like-icon.png"></span></div>
                           </div>
                           <div class="middle_main">
                              <div class="like_text">Comment<span class="padding_left_10"><img
                                       src="images/chat-icon.png"></span></div>
                           </div>
                           <div class="right_main">
                              <div class="like_text">Share<span class="padding_left_10"><img
                                       src="images/share-icon.png"></span></div>
                           </div>
                        </div>
                        <p class="long_text">I am Kamlesh Patel,Currently Studing B.Tech-IT from KPGU,Vadodara. </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="box_main">
                     <img src="images/mahim.jpg" class="image_9">
                     <div class="post_main">
                        <h6 class="post_text">Mahim Patel</h6>
                        <div class="comment_main">
                           <div class="left_main">
                              <div class="like_text">Like<span class="padding_left_10"><img
                                       src="images/like-icon.png"></span></div>
                           </div>
                           <div class="middle_main">
                              <div class="like_text">Comment<span class="padding_left_10"><img
                                       src="images/chat-icon.png"></span></div>
                           </div>
                           <div class="right_main">
                              <div class="like_text">Share<span class="padding_left_10"><img
                                       src="images/share-icon.png"></span></div>
                           </div>
                        </div>
                        <p class="long_text">I am Mahim Patel,Currently Studing B.Tech-IT from KPGU,Vadodara. </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
-->
   <!-- Testimonial section-->
   <div class="testimonial_section" id="section5" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
      class="div">

      <div class="row">
         <div class="col-lg-10 offset-lg-1 text-center">
            <div class="testimonial-sliders">

               <div class="single-testimonial-slider">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="client-avater">

                     <img src="images/tn.jpg" alt="">
                  </div>
                  <div class="client-meta">
                     <h3>daksh parmar <span>Farmer</span></h3>
                     <p class="testimonial-body">
                        "their team provided sensors and farm prediction system are the most iconic part for me.
                        I tries their sensors and these Technology for my farm and it was very useful for my farm thank you to their team.  I am very happy with the service provided by this platform."
                     </p>
                     <div class="last-icon">
                        <i class="fas fa-quote-right"></i>
                     </div>
                  </div>
               </div>
               <div class="single-testimonial-slider">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="client-avater">
                     <img src="assets/img/avaters/avatar2.png" alt="">
                  </div>
                  <div class="client-meta">
                     <h3>Tanush Sharma<span>Local shop owner</span></h3>
                     <p class="testimonial-body">
                        "The chat feature of this website is very helpfull for my business ,
                        it helps me to communicate with the buyers and farmers. thanks for ther services."
                     </p>
                     <div class="last-icon">
                        <i class="fas fa-quote-right"></i>
                     </div>
                  </div>
               </div>
               <div class="single-testimonial-slider">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="client-avater">
                     <img src="assets/img/avaters/avatar3.png" alt="">
                  </div>
                  <div class="client-meta">
                     <h3>chirag ashit <span>Local shop owner & businessman</span></h3>
                     <p class="testimonial-body">
                        " This website has very good and exciting pricing segments of the sensors.its very cheap according to me. I bought sensors for my farmers which helps them to the production of crops.it is very helpful. <i class="fas fa-heart"></i>"</p>
                     <div class="last-icon">
                        <i class="fas fa-quote-right"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- contact section start -->
   <div class="contact_section layout_padding" id="section9" data-aos="zoom-in-right" class="div"
      data-aos-duration="2000">
      <div class="container">
         <h1 class="contact_text">Contact us</h1>
      </div>
   </div>
   <div class="contact_section_2 layout_padding" data-aos="zoom-in-right" class="div" data-aos-duration="2000">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <div class="mail_main">
                  <form action="https://api.web3forms.com/submit" method="POST">

                     <input type="hidden" name="access_key" value="71ce203d-fa5c-4a35-8850-04a31fe040db">

                     <div class="form-group">
                        <input type="text" class="email-bt" placeholder="Name" name="name" required>
                     </div>
                     <div class="form-group">
                        <input type="email" class="email-bt" placeholder="Email" name="email" required>
                     </div>
                     <div class="form-group">
                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="message"
                           required></textarea>
                     </div>
                     <div class="h-captcha" data-captcha="true"></div>
                     <div class="send_btn">
                        <div class="main_bt">
                           <button type="submit">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6">
               <div data-aos="zoom-in" class="div" data-aos-duration="3000"><img src="images/img-13.png"
                     class="image_13"></div>
            </div>
         </div>
      </div>
      <br>
      <br>
      <br>

   </div>

   <!-- contact section end -->
   </div>
   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">Services</h2>
               <div class="footer_links">
                  <ul>
                     <li><a href="#">Farm</a></li>
                     <li><a href="#">Chat</a></li>
                     <li><a href="disease.php">Crop-disease-detection</a></li>
                     <li><a href="Crop.php">Crop-Recommendation</a></li>
                     <li><a href="#">And more</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">Pages</h2>
               <div class="footer_links">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="indexchat.php">Chat-page</a></li>
                     <li><a href="test.php">Login/Register</a></li>
                     <li><a href="aboutus2.php">About-us</a></li>
                     <li><a href="http://localhost/farmtech-master/index.php#section9">Contact-us</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">Our Pricing</h2>
               <div class="footer_links">
                  <ul>
                     <li><a href="#">For Own use</a></li>
                     <li><a href="#">For small Business</a></li>
                     <li><a href="#">Enterprise business</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h2 class="useful_text">contact us</h2>
               <div class="addres_link">
                  <ul>
                     <li><a
                           href="https://www.google.com/maps/place/KPGU,+Vadodara+(Formerly+BITS+Edu+Campus)/@22.189792,73.1848399,17z/data=!3m1!4b1!4m6!3m5!1s0x395fc3e15a4fce63:0x5f75d8caf42dbaec!8m2!3d22.1897871!4d73.1874148!16s%2Fg%2F1tftvc84?entry=ttu"><img
                              src="images/map-icon.png"><span class="padding_left_10">KPGU, Vadodara</span></a></li>
                     <li><img src="images/call-icon.png"><span class="padding_left_10">+91 6353952351</span></li>
                     <li><a
                           href="https://accounts.google.com/InteractiveLogin/signinchooser?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&emr=1&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&osid=1&passive=1209600&service=mail&ifkv=AVQVeyyL4JunN3-zpVh7pnaq3g6HRmeoWNOqhquyYPlzhsSMz5JW2vwQrK63U0KRCBjPdlfC0D_J&theme=glif&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><img
                              src="images/mail-icon.png"><span class="padding_left_10">agrofarmtech@gmail.com</span></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <script src="assets/js/jquery-1.11.3.min.js"></script>
   <!-- bootstrap -->
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- count down -->
   <script src="assets/js/jquery.countdown.js"></script>
   <!-- isotope -->
   <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
   <!-- waypoints -->
   <script src="assets/js/waypoints.js"></script>
   <!-- owl carousel -->
   <script src="assets/js/owl.carousel.min.js"></script>
   <!-- magnific popup -->
   <script src="assets/js/jquery.magnific-popup.min.js"></script>
   <!-- mean menu -->
   <script src="assets/js/jquery.meanmenu.min.js"></script>
   <!-- sticker js -->
   <script src="assets/js/sticker.js"></script>
   <!-- main js -->
   <script src="assets/js/main.js"></script>
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script>
      $(document).ready(function () {
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
         });
      })     
   </script>
   <!--Loading bar-->
   <script>
      window.addEventListener("beforeunload", function (e) {
         document.body.className = "page-loading";
      }, false);
   </script>
   <!-- aos animation-->
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>
   <!-- watermark remover-->
   <script>
      document.addEventListener('DOMContentLoaded', () => {

         var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
         if (disclaimer) {
            disclaimer.remove();
         }
      });
   </script>
</body>

</html>