<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>About</title>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"
    rel="stylesheet"
  />
  <link rel="icon" type="image/jpg" href="images/123.jpg" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
 
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
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
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
<style>
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



	</style>
</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<!-- end header -->

	<!-- search area -->
	
	<!-- end search arewa -->
   
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
							<h1>About Us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
	<!-- end featured section -->


	<!-- team section -->
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Our <span class="orange-text">Team</span></h3>
						<p>It is very important for the customer to pay attention to the adipiscing process. Something, the flight which will therefore happen to be a happy option.</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-1"></div>
						<h4> Krish Maniar <span>Coding and Backend</span></h4>
						<ul class="social-link-team">
							<li><a href="https://github.com/Krish09092004" target="_blank"><i class="fab fa-github"></i></a></li>
							<li><a href="https://www.instagram.com/krish_maniar/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-team-item">
						<div class="team-bg team-bg-2"></div>
						<h4>Kamlesh Patel<span>Design And Some coding</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-github"></i></a></li>
								<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-team-item">
						<div class="team-bg team-bg-3"></div>
						<h4>Mahim Patel<span>Helping member</span></h4>
						<ul class="social-link-team">
							<li><a href="#" target="_blank"><i class="fab fa-github"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <br>
        <br>
        <br>
	</div>
	<!-- end team section -->

	<!-- testimonail-section -->
    <section
      class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply"
    >
      <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1
          class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
        >
          We invest and help the world's potential <br />
          <br />
          <b>"FARMERS"</b>
        </h1>
        <br />
        <br />
        <p
          class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48"
        >
          Here at Farmtech we focus on markets where technology, innovation, and
          capital can unlock long-term value and drive economic growth.As well
          as the advancement of the farmers who provide our daily needs.
        </p>
        <div
          class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
        >
          <a
            href="test.php"
            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900"
          >
            Get started
            <svg
              class="w-3.5 h-3.5 ml-2"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9"
              />
            </svg>
          </a>
        </div>
      </div>
    </section>
	<!-- end testimonail-section -->

	
	<!-- jquery -->
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

</body>
</html>