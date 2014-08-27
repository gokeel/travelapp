<?php
	set_time_limit(0);

	$stackcaptcha=array();

	$url="https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx";
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0');
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
	curl_setopt($ch,CURLOPT_HTTPHEADER, array(                             
		"Referer: https://agent.lionair.co.id/LionAirAgentsPortal/Agents/Welcome.aspx"
		)                                                                       
	); 
	curl_setopt($ch,CURLOPT_HEADER, true);
	$result=curl_exec($ch);
										
	$viewstate=explode('id="__VIEWSTATE" value="',$result);
	$viewstate=explode('" />',$viewstate[1]);
	$viewstate=$viewstate[0];
										
	$eventvalidation=explode('id="__EVENTVALIDATION" value="',$result);
	$eventvalidation=explode('" />',$eventvalidation[1]);
	$eventvalidation=$eventvalidation[0];
										
	$session=explode('ASP.NET_SessionId=',$result);
	$session=explode(';',$session[1]);
	$session=$session[0];
										
	$url="https://agent.lionair.co.id/LionAirAgentsPortal/CaptchaGenerator.aspx";
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HTTPHEADER, array(    
		"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",
		'Referer: https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx', 
		"Cookie: ASP.NET_SessionId=$session;"
		)                               
	); 
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
	$captcha=curl_exec($ch);
										
	$timedatecaptcha=md5(date("s m y")).'.jpg';
	$fimage = fopen('captcha/'.$timedatecaptcha, 'w');
	fwrite($fimage, $captcha);
	fclose($fimage);

	array_push(
		$stackcaptcha, 
		array(
			'viewstate'=>$viewstate,
			'eventvalidation'=>$eventvalidation,
			'captcha'=>$timedatecaptcha,
			'session'=>$session,
		)
	);

	echo json_encode($stackcaptcha);
?>
<img src="captcha/<?php echo $timedatecaptcha ?>" />
<br/><br/>
<form action="b2c_lion_booking.php" method="post">
	<input type="hidden" name="depart" value="<?php echo $_GET['depart']?>" />
	<input type="hidden" name="destiny" value="<?php echo $_GET['destiny']?>" />
	<input type="hidden" name="date" value="<?php echo $_GET['date']?>" />
	<input type="hidden" name="adult" value="2" />
	<input type="hidden" name="child" value="1" />
	<input type="hidden" name="kode" value="<?php echo $_GET['kode']?>" />
	<input type="hidden" name="departure" value="<?php echo $_GET['departure']?>" />
	<input type="hidden" name="arrival" value="<?php echo $_GET['arrival']?>" />
	<input type="hidden" name="viewstate" value="<?php echo $viewstate?>" />
	<input type="hidden" name="eventvalidation" value="<?php echo $eventvalidation?>" />
	<input type="hidden" name="session" value="<?php echo $session?>" />
	<input type="hidden" name="title1" value="Mr" />
	<input type="hidden" name="name1" value="Koko" />
	<input type="hidden" name="namel1" value="Plort" />
	<input type="hidden" name="title2" value="Mrs" />
	<input type="hidden" name="name2" value="Donny" />
	<input type="hidden" name="namel2" value="Verry" />
	<input type="hidden" name="title3" value="Mstr" />
	<input type="hidden" name="name3" value="Serrri" />
	<input type="hidden" name="namel3" value="Jenny" />
	<input type="hidden" name="date3" value="22" />
	<input type="hidden" name="month3" value="FEB" />
	<input type="hidden" name="year3" value="2005" />
	<input type="hidden" name="ctitle" value="Mr" />
	<input type="hidden" name="cname" value="Serry" />
	<input type="hidden" name="cnamel" value="Dovey" />
	<input type="text" name="captcha" />
	<br/>
	<input type="submit" value="Booked" />
</form>














