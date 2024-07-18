<!-- Dribbble shot: https://dribbble.com/shots/3148955-Invoice-Sherpa-Pricing -->
<html>

<head>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
		@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');

		* {
			box-sizing: border-box;
		}

		body {
			background-color: #fafafa;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			font-family: 'Roboto', sans-serif;
			margin-bottom: 60px;
		}

		h1 {
			letter-spacing: 1px;
		}

		.pricing-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.pricing-container:hover {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			transform: scale(1.05);
		}

		.pricing {
			background-color: #fff;
			border: 1px solid #eee;
			margin: 10px;
			text-align: center;
		}

		.pricing:hover {
			background-color: black;
			border: 1px solid #eee;
			margin: 10px;
			color: white;
			text-align: center;
			transform: scale(1.05);
		}

		.pricing.highlight {
			border-top: 2px solid #50BC01;
			box-shadow: 0 0 30px 10px rgba(0, 0, 0, 0.1);
		}

		.pricing h1 {
			color: #5CAEFE;
			margin: 30px 0 0;
		}

		.pricing h4 {
			margin: 20px 0 0;
		}

		.pricing small.green {
			color: #50BC01;
			margin: 0;
		}

		.pricing small.green+h1 {
			margin-top: 10px;
		}

		.pricing small {
			color: #777;
		}

		.pricing ul {
			list-style-type: none;
			padding: 0;
			margin: 40px 0;
		}

		.pricing ul li {
			margin: 20px 30px;
			max-width: 250px;
		}

		.pricing button {
			background-color: #5CAEFE;
			border: 0;
			border-radius: 2px;
			color: #fff;
			padding: 12px 20px;
			margin-bottom: 30px;
		}


		/* SOCIAL PANEL CSS */
		.social-panel-container {
			position: fixed;
			right: 0;
			bottom: 80px;
			transform: translateX(100%);
			transition: transform 0.4s ease-in-out;
		}

		.social-panel-container.visible {
			transform: translateX(-10px);
		}

		.social-panel {
			background-color: #fff;
			border-radius: 16px;
			box-shadow: 0 16px 31px -17px rgba(0, 31, 97, 0.6);
			border: 5px solid #001F61;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			font-family: 'Muli';
			position: relative;
			height: 169px;
			width: 370px;
			max-width: calc(100% - 10px);
		}

		.social-panel button.close-btn {
			border: 0;
			color: #97A5CE;
			cursor: pointer;
			font-size: 20px;
			position: absolute;
			top: 5px;
			right: 5px;
		}

		.social-panel button.close-btn:focus {
			outline: none;
		}

		.social-panel p {
			background-color: #001F61;
			border-radius: 0 0 10px 10px;
			color: #fff;
			font-size: 14px;
			line-height: 18px;
			padding: 2px 17px 6px;
			position: absolute;
			top: 0;
			left: 50%;
			margin: 0;
			transform: translateX(-50%);
			text-align: center;
			width: 235px;
		}

		.social-panel p i {
			margin: 0 5px;
		}

		.social-panel p a {
			color: #FF7500;
			text-decoration: none;
		}

		.social-panel h4 {
			margin: 20px 0;
			color: #97A5CE;
			font-family: 'Muli';
			font-size: 14px;
			line-height: 18px;
			text-transform: uppercase;
		}

		.social-panel ul {
			display: flex;
			list-style-type: none;
			padding: 0;
			margin: 0;
		}

		.social-panel ul li {
			margin: 0 10px;
		}

		.social-panel ul li a {
			border: 1px solid #DCE1F2;
			border-radius: 50%;
			color: #001F61;
			font-size: 20px;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 50px;
			width: 50px;
			text-decoration: none;
		}

		.social-panel ul li a:hover {
			border-color: #FF6A00;
			box-shadow: 0 9px 12px -9px #FF6A00;
		}

		.floating-btn {
			border-radius: 26.5px;
			background-color: #001F61;
			border: 1px solid #001F61;
			box-shadow: 0 16px 22px -17px #03153B;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			line-height: 20px;
			padding: 12px 20px;
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 999;
		}

		.floating-btn:hover {
			background-color: #ffffff;
			color: #001F61;
		}

		.floating-btn:focus {
			outline: none;
		}

		.floating-text {
			background-color: #001F61;
			border-radius: 10px 10px 0 0;
			color: #fff;
			font-family: 'Muli';
			padding: 7px 15px;
			position: fixed;
			bottom: 0;
			left: 50%;
			transform: translateX(-50%);
			text-align: center;
			z-index: 998;
		}

		.floating-text a {
			color: #FF7500;
			text-decoration: none;
		}

		@media screen and (max-width: 480px) {

			.social-panel-container.visible {
				transform: translateX(0px);
			}

			.floating-btn {
				right: 10px;
			}
		}
	</style>
	<title>Pricing-page-CropCareConnect</title>
</head>

<body>
	<h1>Pricing</h1>
	<div class="pricing-container">
		<div class="pricing">
			<h4>For Own Use</h4>
			<h1>$35.99</h1>
			<ul>
				<li>2 Devices and Sensors</li>
				<li>Customisable code script for sensor usage</li>
				<li>24 hours customer support and 1 Month Warranty on product</li>
			</ul>
			<button>Start Free Trial</button>
		</div>
		<div class="pricing highlight">
			<h4>Small Business</h4>
			<small class="green">Most Popular</small>
			<h1>$70.99</h1>
			<ul>
				<li>7 Devices</li>
				<li>Customisable code script for sensor usage</li>
				<li>24 hours customer support and 2 Month Warranty on product</li>
			</ul>
			<button>Start Free Trial</button>
		</div>
		<div class="pricing">
			<h4>Enterprise</h4>
			<h1>$200.99</h1>
			<ul>
				<li>23 Devices </li>
				<li>Customisable code script for sensor usage</li>
				<li>24 hours customer support and 3 Month Warranty on product</li>
			</ul>
			<button>Start Free Trial</button>
		</div>
	</div>

	<!-- SOCIAL PANEL HTML -->
	<div class="social-panel-container">
		<div class="social-panel">
			<p>Created with <i class="fa fa-heart"></i> by Agrofarmkset</p>
			<button class="close-btn"><i class="fas fa-times"></i></button>
			<h4>Get in touch on</h4>
			<ul>
				<li>
					<a href="https://twitter.com" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="https://facebook.com" target="_blank">
						<i class="fab fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="https://instagram.com" target="_blank">
						<i class="fab fa-instagram"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</body>

</html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

<h1 class="demo-title">Material responsive pricing tables</h1>

<div class="pricing-table">
	<div class="pricing-option">
		<i class="material-icons">important_devices</i>
		<h1>Ui design</h1>
		<hr />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum voluptatibus
			inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto reprehenderit hic saepe nesciunt sed
			illo.</p>
		<hr />
		<div class="price">
			<div class="front">
				<span class="price">199 <b>$</b></span>
			</div>
			<div class="back">
				<a href="#" class="button">Purchase now</a>
			</div>
		</div>
	</div>

	<div class="pricing-option">
		<i class="material-icons">perm_identity</i>
		<h1>Ux design</h1>
		<hr />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum voluptatibus
			inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto reprehenderit hic saepe nesciunt sed
			illo.</p>
		<hr />
		<div class="price">
			<div class="front">
				<span class="price">399 <b>$</b></span>
			</div>
			<div class="back">
				<a href="#" class="button">Purchase now</a>
			</div>
		</div>
	</div>

	<div class="pricing-option">
		<i class="material-icons">art_track</i>
		<h1>Print design</h1>
		<hr />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum voluptatibus
			inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto reprehenderit hic saepe nesciunt sed
			illo.</p>
		<hr />
		<div class="price">
			<div class="front">
				<span class="price">999 <b>$</b></span>
			</div>
			<div class="back">
				<a href="#" class="button">Purchase now</a>
			</div>
		</div>
	</div>
</div>