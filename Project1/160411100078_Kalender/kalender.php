<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Calender</title>
	<link rel="stylesheet" type="text/css" href="kalender.css">
	</head>
	<body>
		<h1>Kalender Tahun 2019</h1>
		<?php
			$liburan = array("2019-1-1" => "New Year's Day", "2019-2-16" => "Chinesse Lunar New Year's Daya", "2019-3-17" => "Ball's Day of Silence and Hindu New Year", "2019-3-30" => "Good Friday", "2019-4-13" => "Ascension of the Prophet Muhammad SAW", "2019-5-1" => "International Labor Day", "2019-5-10" => "Ascension of Jesus Christ", "2019-5-29" => "Waisak Day (Budha's Anniversary)", "2019-6-1" => "Pancasila Day", "2019-6-11" => "First Joint Holiday before Idul Fitri", "2019-6-12" => "Second Joint Holiday before Idul Fitri", "2019-6-13" => "Third Joint Holiday before Idul Fitri", "2019-6-14" => "Fourth Joint Holiday before Idul Fitri", "2019-6-15" => "Idul Fitri Day 1", "2019-6-16" => "Idul Fitri 16", "2019-6-18" => "First Joint Holiday after Idul Fitri", "2019-6-19" => "Second Joint Holiday after Idul Fitri", "2019-6-20" => "Third oint Holiday after Idul Fitri", "2019-6-27" => "Regional Election Day", "2019-8-17" => "Indonesia Independence Day", "2019-8-22" => "Eid al-Adha", "2019-9-11" => "Muharram/Islamic New Year", "2019-11-20" => "The Prophet Muhammad's Birthday", "2019-12-24" => "Chrismas Eve", "2019-12-25" => "Chrismas Day");
			function cal($month,$year){
				$HariHari=array('Ahd','Sen','Sel','Rab','Kam','Jum','Sab');
				$HariPertama=mktime(0,0,0,$month,1,$year);
				$liburpertama = date('w', $HariPertama); 
				$JumlahHari=date('t',$HariPertama);
				$Tanggal=getdate($HariPertama);
				$Bulan=$Tanggal['month'];
				$Tahun=$Tanggal['year'];
				$IndeksHariPertama=$Tanggal['wday'];
				$Kalender="<table><caption class='Bulan'>$Bulan</caption><tr>";
				global $liburan;
				foreach ($HariHari as $day) {
						$Kalender.="<th>$day</th>";
				}
				$Kalender.="</tr><tr>";
				$CounterHari=1;
				if($IndeksHariPertama>0){
					$Kalender.="<td colspan='$IndeksHariPertama'>&nbsp;</td>";
				}
				for ($CounterHari = 1; $CounterHari <= $JumlahHari; $CounterHari++) {
					if($IndeksHariPertama==7) {
					$IndeksHariPertama=0;
						$Kalender.="</tr><tr>";
					}

					if ($CounterHari == date('d') and date('m-y') == date('m-y', $HariPertama)) {
						$Kalender .= "<td class='currentday'>$CounterHari</td>";
					}else if 
					(array_key_exists("$year-$month-$CounterHari", $liburan)) {
						$Kalender .= "<td class='holiday'><a target=\"_blank\" title=\"Libur Nasional\">$CounterHari</a></td>";
					}
					else if ($IndeksHariPertama==0) {
						$Kalender .= "<td class='holiday'>$CounterHari</td>";
					}else{
						$Kalender .= "<td class='day'>$CounterHari</td>";
					}
					$liburpertama++;
					$IndeksHariPertama++;
				
				}
				if($IndeksHariPertama!=7) {
					$SisaHari=7-$IndeksHariPertama;
					$Kalender.="<td colspan='$SisaHari'>&nbsp;</td>";
				}
				$Kalender.="</tr>";
				$Kalender.="</table>";
					return $Kalender;
			}
			?>
			<table class="Tang">
				<tr>
					<td class="hal"><?php echo cal(1,2019); ?></td>
					<td class="hal"><?php echo cal(2,2019); ?></td>
					<td class="hal"><?php echo cal(3,2019); ?></td>
				</tr>
				<tr>
					<td class="hal"><?php echo cal(4,2019); ?></td>
					<td class="hal"><?php echo cal(5,2019); ?></td>
					<td class="Jun"><?php echo cal(6,2019); ?></td>
				</tr>
				<tr>
					<td class="hal"><?php echo cal(7,2019); ?></td>
					<td class="hal"><?php echo cal(8,2019); ?></td>
					<td class="Sep"><?php echo cal(9,2019); ?></td>
				</tr>
				<tr>
					<td class="hal"><?php echo cal(10,2019);?></td>
					<td class="hal"><?php echo cal(11,2019); ?></td>
					<td class="Des" ><?php echo cal(12,2019); ?></td>
				</tr>
						
			</table>
			<div class="main">
				<?php foreach ($liburan as $key => $val)
										{
											echo"<p>$key : $val</p>";
										}
								?>
			</div>
			
					
	</body>
</html>