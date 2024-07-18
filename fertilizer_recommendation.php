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
		</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fertilizer Recommendation System</title>
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
<body>
	
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
            <span class="badge badge-danger badge-pill mb-3">Recommendation-CropCareConnect</span>
          </div>
        </div>
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-success mb-3">
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >  
				  <div class="card-header">
				  <span class=" text-info display-4" > Fertilizer Recommendation  </span>	
						<span class="pull-right">
							<button type="submit" value="Recommend" name="Fert_Recommend" class="btn btn-warning btn-submit">SUBMIT</button>
						</span>		
				  
				  </div>

				  <div class="card-body text-dark">
					 
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">

    <thead>
					<tr class="font-weight-bold text-default">
					<th><center> Nitrogen</center></th>
					<th><center>Phosporous</center></th>
					<th><center>Potasioum</center></th>
					<th><center>Temparature</center></th>
					<th><center>Humidity</center></th>
					<th><center>Soil Moisture</center></th>
					<th><center>Soil Type</center></th>
					<th><center>Crop</center></th>
        </tr>
    </thead>
 <tbody>
                                 <tr class="text-center">
                                    <td>
                                    	<div class="form-group">
											<input type = 'number' name = 'n' id="nitrogen"  placeholder="Nitrogen Eg:37" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'p' id="phosphorus"  placeholder="Phosphorus Eg:0" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'k' id="potassium" placeholder="Pottasium Eg:0" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 't' id="temperature" placeholder="Temperature Eg:26" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'h'  id="humidity"  placeholder="Humidity Eg:52" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
                                    	<div class="form-group">
											<input type = 'number' name='soil_moisture' id="soil_moisture" placeholder="Soil Moisture Eg:38" required class="form-control">
											
										</div>
                                    </td>
									
									<td>
										<div class="form-group ">
													<select name="soil_type" class="form-control">
													<option  value="" disabled>Select Soil Type</option>
													<option  value="Sandy">Sandy</option>
													<option  value="Loamy">Loamy</option>
													<option  value="Black">Black</option>
													<option  value="Red">Red</option>
													<option  value="Clayey">Clayey</option>											
													</select>
										</div>
									</td>
									
									<td>
										<div class="form-group ">
									<select name="crop_type" class="form-control">
													<option  value="" disabled>Select Crop</option>
													<option  value="Maize">Maize</option>
													<option  value="Sugarcane">Sugarcane</option>
													<option  value="Cotton">Cotton</option>
													<option  value="Tobacco">Tobacco</option>
													<option  value="Paddy">Paddy</option>	
													<option  value="Barley">Barley</option>	
													<option  value="Wheat">Wheat</option>	
													<option  value="Millets">Millets</option>	
													<option  value="Oil seeds">Oil seeds</option>	
													<option  value="Pulses">Pulses</option>	
													<option  value="Ground Nuts">Ground Nuts</option>													
													</select>
										</div>

									</td>
                                </tr>
                            </tbody>
							
					
	</table>
	</div>
	</form>

</div>



<div class="card text-white bg-gradient-success mb-3">
				  <div class="card-header">
				  <span class=" text-success display-4" > Result  </span>					
				  </div>

					<h4>
    

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if all required fields are present
        $required_fields = ['n', 'p', 'k', 't', 'h', 'soil_moisture', 'soil_type', 'crop_type'];
        $missing_fields = array_filter($required_fields, function($field) {
            return !isset($_POST[$field]) || $_POST[$field] === '';
        });

        if (!empty($missing_fields)) {
            echo "<p>Please fill in all required fields.</p>";
        } else {
            // Get input data from the form
            $temperature = $_POST['t'];
            $humidity = $_POST['h'];
            $soil_moisture = $_POST['soil_moisture'];
            $soil_type = $_POST['soil_type'];
            $crop_type = $_POST['crop_type'];
            $nitrogen = $_POST['n'];
            $phosphorus = $_POST['p'];
            $potassium = $_POST['k'];

            // Construct input JSON
            $input_data = array(
                "temperature" => $temperature,
                "humidity" => $humidity,
                "soil_moisture" => $soil_moisture,
                "soil_type" => $soil_type,
                "crop_type" => $crop_type,
                "nitrogen" => $nitrogen,
                "phosphorus" => $phosphorus,
                "potassium" => $potassium
            );

            $input_json = json_encode($input_data);

            // Execute Python script
			$descriptors = [
				0 => ["pipe", "r"], // stdin
				1 => ["pipe", "w"], // stdout
				2 => ["pipe", "w"]  // stderr
			];
	
			$process = proc_open('python fertilizer_recommendation/fertilizer_recommendation.py', $descriptors, $pipes);
	
            if (is_resource($process)) {
                fwrite($pipes[0], $input_json);
                fclose($pipes[0]);

                $output = stream_get_contents($pipes[1]);
                fclose($pipes[1]);

                $error = stream_get_contents($pipes[2]);
                fclose($pipes[2]);

                $return_value = proc_close($process);

                if ($return_value === 0) {
                    echo "<p>Output from Python: " . $output . "</p>";
                } else {
                    echo "<p>Error from Python: " . $error . "</p>";
                }
            }
        }
    }
    ?>
</body>
</html>
