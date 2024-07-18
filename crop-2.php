<?php
include 'db.php';
session_start();
$fid = $_SESSION['fid'];

if (!isset($_SESSION['fid'])) {         // condition Check: if session is not set. 
    header('location: test.php');   // if not set the user is sendback to login page.
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
     body {
    background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0.2)), url('background.jpg');
    background-size: cover;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    color: #333; /* Change default text color */
  }

  .container {
    max-width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  form {
    background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity to your preference */
    border-radius: 20px;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
    padding: 30px;
    max-width: 600px;
    margin: 50px auto;
    animation: fade-in 0.5s ease-in-out;
  }

  form input[type="number"] {
    display: block;
    width: calc(100% - 22px);
    padding: 15px;
    border-radius: 10px;
    border: none;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    background-color: rgba(255, 255, 255, 0.9); /* Adjust the opacity to your preference */
    transition: all 0.3s ease-in-out;
  }

  form input[type="number"]:focus {
    box-shadow: 0 4px 10px mediumseagreen;
  }

  form label {
    display: block;
    font-size: 18px;
    font-weight: bold;
    color: #000; /* Change label color here */
    margin-bottom: 10px;
  }

  form .btn-submit {
    display: block;
    width: 100%;
    padding: 15px;
    background-color: #4CAF50; /* Green color */
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease-in-out;
  }

  form .btn-submit:hover {
    background-color: #45a049; /* Darker green color on hover */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
  }

  .result-container {
    background-color: rgba(255, 255, 255, 0.9); /* Adjust the opacity to your preference */
    border-radius: 20px;
    padding: 20px;
    margin-top: 30px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    width: 570px;
    margin:auto;
  }

  .result-title {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-bottom: 20px;
    font-family: cursive;
  }

  .result-text {
    font-size: 18px;
    color: #000;
    
    font-variant: all-petite-caps;
    font-family:cursive;

  }

@media only screen and (max-width: 767px) {
  form input[type="number"] {
    width: calc(100% - 30px);
    margin-bottom: 20px;
  }

  form label {
    font-size: 16px;
  }

  form .btn-submit {
    padding: 15px 20px;
  }
}


@media only screen and (max-width: 450px) {
    .container {
      padding-right: 5px;
      padding-left: 5px;
    }

    form {
      width: 460px;
    padding: 15px;
    margin-left: 10px 20px auto;
    }

    .result-container{
      width: 460px;
      padding: 14px;
      margin-left: 10px 20px auto;
    }
  }
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Crop Recommendation System</title>
    <link rel="icon" type="image/jpg" href="images/123.jpg">

    
  <!--     Fonts and icons     -->
  
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
	integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
	<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css "/>
	
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  
  <!-- Data Tables -->	
  <link rel="stylesheet" type="numebr/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
		


<script src="assets/js/state_district_crops_dropdown.js"></script>


</head>

  <body class="bg-white" id="top">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
<!-- ======================================================================================================================================== -->

  
        		<form role="form" action="#" method="post" >  
				  <div class="card-header">
				  <span class=" numebr-info display-4" > Crop Recommendation  </span>	
						<span class="pull-right">
							</span>		
				  
				  </div>
<br><br>
				      <form role="form" action="#" method="post" >     
					 <label for="input1">Nitrogen</label>	
  <input type = 'number' name = 'n' placeholder="Eg:90" required class="form-control">
									

  <label for="input2">phosphorus</label>
  <input type = 'number' name = 'p' placeholder="Eg:42" required class="form-control">
									

  <label for="input3">potassium</label>
  <input type = 'number' name = 'k' placeholder="Eg:43" required class="form-control">
										

  <label for="input4">Temperature</label>
  <input type = 'number' name = 't' step =0.01 placeholder="Eg:21" required class="form-control">
									
  <label for="input5">Humidity</label>
  <input type = 'number' name = 'h' step =0.01 placeholder="Eg:82" required class="form-control">
								

  <label for="input6">PH</label>
	<input type = 'number' name = 'ph' step =0.01 placeholder="Eg:6.5" required class="form-control">
											
								
  <label for="input7">RainFall</label>
  <input type = 'number' name = 'r' step =0.01 placeholder="Eg:203" required class="form-control">
								
	<button type="submit" value="Recommend" name="Crop_Recommend" class="btn btn-warning btn-submit">SUBMIT</button>
					
</form>
          


<div class="result-container card bg-gradient-success mb-3">
  <div class="result-title card-header">

  <span class="display-4"> Result  </span>					
				  </div>
 <div class="result-text card-body">
   
  <!-- Add result container -->
  <h4>
					<?php 
					if(isset($_POST['Crop_Recommend'])){
					$n=trim($_POST['n']);
					$p=trim($_POST['p']);
					$k=trim($_POST['k']);
					$t=trim($_POST['t']);
					$h=trim($_POST['h']);
					$ph=trim($_POST['ph']);
					$r=trim($_POST['r']);


					echo "Recommended Crop is : ";

					$Jsonn=json_encode($n);
					$Jsonp=json_encode($p);
					$Jsonk=json_encode($k);
					$Jsont=json_encode($t);
					$Jsonh=json_encode($h);
					$Jsonph=json_encode($ph);
					$Jsonr=json_encode($r);
					
					$command = escapeshellcmd("python Crop-recommend/recommend.py $Jsonn $Jsonp $Jsonk $Jsont $Jsonh $Jsonph $Jsonr ");
                    $output = passthru($command);
					echo $output;					
					}
                    ?>
					</h4>
           
          </div>  
       </div>
       <div>
		 
       </div>
    </div>
  </div>

</body>
</html>