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
	margin: 0; padding: 0; font-family: Arial, sans-serif; background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5)); 
	}

/* Add 3D effect to form */
form {
  position: relative;
  width: 100%;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2),
              -10px -10px 20px rgba(255, 255, 255, 0.3);
  border-radius: 10px;
  background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5));
  animation: fade-in 0.5s ease-in-out;
}

form input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 10px;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
  animation: fade-in 0.5s ease-in-out;
}

form label {
  display: block;
  margin-bottom: 5px;
  color: #ccc;
  font-size: 12px;
  animation: fade-in 0.5s ease-in-out;
}

form .btn-submit {
  padding: 10px 20px;
  background-color: #5cb85c;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 10px;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
  animation: fade-in 0.5s ease-in-out;
}

form .btn-submit:hover {
  background-color: #4cae4c;
  animation: fade-in 0.5s ease-in-out;
}

form .card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
  animation: fade-in 0.5s ease-in-out;
}

form .card-body {
  padding: 20px;
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 10px;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
  animation: fade-in 0.5s ease-in-out;
}

form table {
  width: 100%;
  border-collapse: collapse;
  box-shadow: 0 0 5px rgba(0,0,0,0.1);
  animation: fade-in 0.5s ease-in-out;
}

form table th,
form table td {
  padding: 10px;
  border: 1px solid #ddd;
  text-align: center;
  animation: fade-in 0.5s ease-in-out;
}

form table th {
  background-color: #5cb85c;
  color: #fff;
  border-radius: 5px;
  animation: fade-in 0.5s ease-in-out;
}
h4{
	color:tomato;
}
.result-text {
    font-size: 18px;
    color: #000;
    
    font-variant: all-petite-caps;
    font-family:cursive;

  }

		</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Crop Recommendation System-CropCareConnect</title>
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
		


<script src="assets/js/state_district_crops_dropdown.js"></script>


</head>

  <body class="bg-white" id="top">
 
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
<!-- ======================================================================================================================================== -->

<div class="container-fluid ">
    
    	 <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Recommendation</span>
          </div>
        </div>
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-success mb-3">
				<form role="form" action="#" method="post" >  
				  <div class="card-header">
				  <span class=" text-info display-4" > Crop Recommendation  </span>	
						<span class="pull-right">
							<button type="submit" value="Recommend" name="Crop_Recommend" class="btn btn-warning btn-submit">SUBMIT</button>
						</span>		
				  
				  </div>

				  <div class="card-body text-dark">
				     <form role="form" action="#" method="post" >     
					 
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

    <thead>
					<tr class="font-weight-bold text-default">
					<th><center> Nitrogen</center></th>
					<th><center>Phosporous</center></th>
					<th><center>Potasioum</center></th>
					<th><center>Temparature</center></th>
					<th><center>Humidity</center></th>
					<th><center>PH</center></th>
					<th><center>Rainfall</center></th>
					
        </tr>
    </thead>
 <tbody>
	
                                 <tr class="text-center">
                                    <td>
                                    	<div class="form-group">
											<input type = 'number' name = 'n' placeholder="Eg:90" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'p' placeholder="Eg:42" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'k' placeholder="Eg:43" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 't' step =0.01 placeholder="Eg:21" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'h' step =0.01 placeholder="Eg:82" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'ph' step =0.01 placeholder="Eg:6.5" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											 <input type = 'number' name = 'r' step =0.01 placeholder="Eg:203" required class="form-control">
											
										</div>
                                    </td>
                                </tr>
                            </tbody>
							
					
	</table>
	</form>
</div>
</div>



<div class="card text-white bg-gradient-success mb-3">
				  <div class="card-header">
				  <span class=" text-success display-4" > Result  </span>					
				  </div>

          <div class="result-text">
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
 
	
	
            </div>
          </div>  
       </div>
		 
</section>

</body>
</html>