<?php
session_start();
include('database.inc.php');
$time=time();
$res=mysqli_query($con,"select * from farmer");
$i=1;
$html='';
while($row=mysqli_fetch_assoc($res)){
	$status='Offline';
	$class="btn-danger";
	if($row['last_login']>$time){
		$status='Online';
		$class="btn-success";
	}
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
                  <td>'.$row['fusername'].'</td>
                  <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
               </tr>';
	$i++;
}
echo $html;
?>