<?php
	error_reporting(0);
	set_time_limit(0);
	
	$depart=$_GET['depart'];
	$destiny=$_GET['destiny'];
	$date1=$_GET['date'];
	
	//$stackpenerbangan=(array)json_decode(file_get_contents("http://qscjunior.com/flights/b2c/b2c_result.php?depart=$depart&destiny=$destiny&date=$date1&flight=lion"));
	$stackpenerbangan=(array)json_decode(file_get_contents("http://online-tiket.com/b2c/b2c_result.php?depart=$depart&destiny=$destiny&date=$date1&flight=lion"));
	
	//echo "<pre>";
	//print_r($stackpenerbangan);
	//echo "</pre>";
?>
<table width="100%">
	<tr style="height:50px; font-weight:bold;">
		<td>Airlines</td>
		<td>Code</td>
		<td>Class</td>
		<td>Seat</td>
		<td>Departure</td>
		<td>Arrival</td>
		<td>Price</td>
		<td>&nbsp;</td>
	</tr>
	<?php
		foreach($stackpenerbangan as $dataflights)
		{
			$dataflights=(array)$dataflights;?>
			<tr style="height:30px;">
				<td><?php echo $dataflights['airlines_name']?></td>
				<td><?php echo $dataflights['airlines_code']?></td>
				<td><?php echo $dataflights['airlines_class']?></td>
				<td><?php echo $dataflights['airlines_seat']?></td>
				<td><?php echo $dataflights['airlines_depart']?></td>
				<td><?php echo $dataflights['airlines_arrive']?></td>
				<td><?php echo $dataflights['airlines_price']?></td>
				<td>
					<a target="_blank" 
						href="
							b2c_<?php echo $dataflights['airlines_name']?>_captcha.php?
							depart=<?php echo $depart;?>
							&destiny=<?php echo $destiny;?>
							&date=<?php echo $date1;?>
							&kode=<?php echo $dataflights['airlines_code'];?>
							&departure=<?php echo $dataflights['airlines_depart'];?>
							&arrival=<?php echo $dataflights['airlines_arrive'];?>
						">
							Fill Captcha
					</a>
				</td>
			</tr>
		<?php
		}
	?>
</table>
















