<?php
if (isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == 1) {
	$loginProfile = "My Profile: " . $_SESSION['Username'];
	$logo = "glyphicon glyphicon-user";
	if ($_SESSION['Category'] != 1) {
		$link = "Login/profile.php";
	} else {
		$link = "profileView.php";
	}
} else {
	$loginProfile = "Login";
	$link = "test.php";
	$logo = "glyphicon glyphicon-log-in";
}
?>

<!DOCTYPE html>

<head>

	<style>
		html {
			scroll-behavior: smooth;
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