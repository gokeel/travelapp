<?php
	set_time_limit(0);
	
	$stackbooking=array();
	
	$depart=$_POST['depart'];
	$destiny=$_POST['destiny'];
	$date1=$_POST['date'];
		
	$explodedate=explode('-',$date1);
	$ddlDepDay=$explodedate[0];
	$ddlDepMonth=date('M Y',strtotime($date1));
	$txtDepartureDate=date("d M Y",strtotime($date1));
	$newdate = strtotime ( '+1 day' , strtotime ( date("d M Y",strtotime($date1)) ) );
	$txtReturnDate = date ( "d M Y" , $newdate );
	
	if($_POST['captcha']!=NULL)
	{
		$captcha=$_POST['captcha'];
		$session=$_POST['session'];
		$viewstate=$_POST['viewstate'];
		$eventvalidation=$_POST['eventvalidation'];
		
		$data=array
		(
			'__EVENTTARGET'=>'btnLogin',
			'__EVENTARGUMENT'=>'',
			'__VIEWSTATE'=>$viewstate,
			'__EVENTVALIDATION'=>$eventvalidation,
			'txtLoginName'=>'HELLOTRANS-F',
			'txtPassword'=>'AGENT2',
			'CodeNumberTextBox'=>$captcha,
			'NameReqExtend_ClientState'=>'',
			'PasswordReqExtend_ClientState'=>''
		);
		
		$data = http_build_query($data);
	
		$url="https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(       
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                       
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx",
			"Cookie: ASP.NET_SessionId=$session",
			"Content-Type: application/x-www-form-urlencoded")                                                                       
		); 
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsPortal/Agents/Welcome.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(        
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                      
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx?consID=81430";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(                 
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",             
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsPortal/Agents/Welcome.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(                       
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",       
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsPortal/Agents/Welcome.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$viewstate=explode('id="__VIEWSTATE" value="',$result);
		$viewstate=explode('" />',$viewstate[1]);
		$viewstate=$viewstate[0];
		
		$data=array
		(
			'__EVENTTARGET'=>'UcFlightSelection$lbSearch',
			'__EVENTARGUMENT'=>'',
			'__VIEWSTATE'=>$viewstate,
			'UcFlightSelection$TripType'=>'rbOneWay',
			'UcFlightSelection$DateFlexibility'=>'rbMustTravel',
			'UcFlightSelection$txtSelOri'=>$depart,
			'UcFlightSelection$ddlDepMonth'=>$ddlDepMonth,
			'UcFlightSelection$ddlDepDay'=>$ddlDepDay,
			'UcFlightSelection$ddlADTCount'=>$_POST['adult'],
			'UcFlightSelection$txtSelDes'=>$destiny,
			'UcFlightSelection$ddlCNNCount'=>'0',
			'UcFlightSelection$ddlINFCount'=>'0',
			'UcFlightSelection$txtDepartureDate'=>$txtDepartureDate,
			'UcFlightSelection$txtReturnDate'=>$txtReturnDate,
		);
		
		$data = http_build_query($data);
	
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/Step1.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(      
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                        
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session",
			"Content-Type: application/x-www-form-urlencoded")                                                                       
		); 
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$lionflight=explode("<img src='images/Logos/JT.gif' alt=' Lion Air' class='carrierImage' title=' Lion Air' />",$result);
		
		for($flaglion=1;$flaglion<=(count($lionflight)-1);$flaglion++)
		{
			$codeairlines=explode('</div>',$lionflight[$flaglion]);
			$codeairlines=$codeairlines[1];
			
			$codeflight=explode('name="RGM0_0" value="',$lionflight[$flaglion]);
			
			//echo '<pre>'; print_r($codeflight); echo '<pre>';
			$takecodeflight=count($codeflight)-1;
			
			for($flagcek=$takecodeflight;$flagcek>=1;$flagcek--)
			{
				$cekseat=explode('</label>',$codeflight[$flagcek]);
				$cekseat=explode('">',$cekseat[0]);
				$cekseat=$cekseat[1];
				
				if($cekseat!=0)
				{
					$codeflight=explode('"',$codeflight[$flagcek]);
					$codeflight=$codeflight[0];
					break;
				}
				else
				{
					continue;
				}
			}
				
			if($_POST['kode']==$codeairlines)
			{
				$RGM0_0=$codeflight;
			}
		}
		
		$viewstate=explode('id="__VIEWSTATE" value="',$result);
		$viewstate=explode('" />',$viewstate[1]);
		$viewstate=$viewstate[0];
		
		$RowID=explode('F0',$RGM0_0);
		$RowID='R'.$RowID[0].'FO';
		
		$data=array
		(
			'M0_C0_F0_S3_bc'=>'Y/SS',
			'M0_C0_F0_S4_bc'=>'A/SS',
			'M0_C0_F0_S5_bc'=>'G/SS',
			'M0_C0_F0_S6_bc'=>'W/SS',
			'M0_C0_F0_S7_bc'=>'S/SS',
			'M0_C0_F0_S8_bc'=>'B/SS',
			'M0_C0_F0_S9_bc'=>'H/SS',
			'M0_C0_F0_S10_bc'=>'K/SS',
			'M0_C0_F0_S11_bc'=>'L/SS',
			'M0_C0_F0_S12_bc'=>'M/SS',
			'M0_C0_F0_S13_bc'=>'N/SS',
			'M0_C0_F0_S14_bc'=>'Q/SS',
			'M0_C0_F0_S15_bc'=>'T/HL',
			'M0_C0_F0_S16_bc'=>'V/HL',
			'M0_C0_F0_S17_bc'=>'X/HL',
			'M0_C1_F0_S3_bc'=>'Y/SS',
			'M0_C1_F0_S4_bc'=>'A/SS',
			'M0_C1_F0_S5_bc'=>'G/SS',
			'M0_C1_F0_S6_bc'=>'W/SS',
			'M0_C1_F0_S7_bc'=>'S/SS',
			'M0_C1_F0_S8_bc'=>'B/SS',
			'M0_C1_F0_S9_bc'=>'H/SS',
			'M0_C1_F0_S10_bc'=>'K/SS',
			'M0_C1_F0_S11_bc'=>'L/SS',
			'M0_C2_F0_S3_bc'=>'Y/SS',
			'M0_C2_F0_S4_bc'=>'A/SS',
			'M0_C2_F0_S5_bc'=>'G/SS',
			'M0_C2_F0_S6_bc'=>'W/SS',
			'M0_C2_F0_S7_bc'=>'S/SS',
			'M0_C2_F0_S8_bc'=>'B/SS',
			'M0_C2_F0_S9_bc'=>'H/SS',
			'M0_C2_F0_S10_bc'=>'K/SS',
			'M0_C2_F0_S11_bc'=>'L/SS',
			'M0_C2_F0_S12_bc'=>'M/SS',
			'M0_C2_F0_S13_bc'=>'N/HL',
			'M0_C2_F0_S14_bc'=>'Q/HL',
			'M0_C2_F0_S15_bc'=>'T/HL',
			'M0_C2_F0_S16_bc'=>'V/HL',
			'M0_C2_F0_S17_bc'=>'X/HL',
			'M0_C3_F0_S0_bc'=>'C/SS',
			'M0_C3_F0_S1_bc'=>'D/SS',
			'M0_C3_F0_S2_bc'=>'I/SS',
			'M0_C3_F0_S3_bc'=>'Y/SS',
			'M0_C3_F0_S4_bc'=>'A/SS',
			'M0_C3_F0_S5_bc'=>'G/SS',
			'M0_C3_F0_S6_bc'=>'W/SS',
			'M0_C3_F0_S7_bc'=>'S/SS',
			'M0_C3_F0_S8_bc'=>'B/SS',
			'M0_C3_F0_S9_bc'=>'H/SS',
			'M0_C3_F0_S10_bc'=>'K/SS',
			'M0_C3_F0_S11_bc'=>'L/SS',
			'M0_C3_F0_S12_bc'=>'M/SS',
			'M0_C3_F0_S13_bc'=>'N/HL',
			'M0_C3_F0_S14_bc'=>'Q/HL',
			'M0_C4_F0_S0_bc'=>'C/SS',
			'M0_C4_F0_S1_bc'=>'D/SS',
			'M0_C4_F0_S2_bc'=>'I/SS',
			'M0_C4_F0_S3_bc'=>'Y/SS',
			'M0_C4_F0_S4_bc'=>'A/SS',
			'M0_C4_F0_S5_bc'=>'G/SS',
			'M0_C4_F0_S6_bc'=>'W/SS',
			'M0_C4_F0_S7_bc'=>'S/SS',
			'M0_C4_F0_S8_bc'=>'B/SS',
			'M0_C4_F0_S9_bc'=>'H/SS',
			'M0_C4_F0_S10_bc'=>'K/SS',
			'M0_C4_F0_S11_bc'=>'L/SS',
			'M0_C5_F0_S3_bc'=>'Y/SS',
			'M0_C5_F0_S4_bc'=>'A/SS',
			'M0_C5_F0_S5_bc'=>'G/SS',
			'M0_C5_F0_S6_bc'=>'W/SS',
			'M0_C5_F0_S7_bc'=>'S/SS',
			'M0_C5_F0_S8_bc'=>'B/SS',
			'M0_C5_F0_S9_bc'=>'H/SS',
			'M0_C5_F0_S10_bc'=>'K/SS',
			'M0_C5_F0_S11_bc'=>'L/SS',
			'M0_C5_F0_S12_bc'=>'M/HL',
			'M0_C6_F0_S3_bc'=>'Y/SS',
			'M0_C6_F0_S4_bc'=>'A/SS',
			'M0_C6_F0_S5_bc'=>'G/SS',
			'M0_C6_F0_S6_bc'=>'W/SS',
			'M0_C6_F0_S7_bc'=>'S/SS',
			'M0_C6_F0_S8_bc'=>'B/SS',
			'M0_C6_F0_S9_bc'=>'H/SS',
			'M0_C6_F0_S10_bc'=>'K/SS',
			'M0_C6_F0_S11_bc'=>'L/HL',
			'M0_C6_F0_S12_bc'=>'M/HL',
			'M0_C7_F0_S3_bc'=>'Y/SS',
			'M0_C7_F0_S4_bc'=>'A/SS',
			'M0_C7_F0_S5_bc'=>'G/SS',
			'M0_C7_F0_S6_bc'=>'W/SS',
			'M0_C7_F0_S7_bc'=>'S/SS',
			'M0_C7_F0_S8_bc'=>'B/SS',
			'M0_C7_F0_S9_bc'=>'H/SS',
			'M0_C7_F0_S10_bc'=>'K/SS',
			'M0_C7_F0_S11_bc'=>'L/HL',
			'M0_C7_F0_S12_bc'=>'M/HL',
			'M0_C8_F0_S3_bc'=>'Y/SS',
			'M0_C8_F0_S4_bc'=>'A/SS',
			'M0_C8_F0_S5_bc'=>'G/SS',
			'M0_C8_F0_S6_bc'=>'W/SS',
			'M0_C8_F0_S7_bc'=>'S/SS',
			'M0_C8_F0_S8_bc'=>'B/SS',
			'M0_C8_F0_S9_bc'=>'H/SS',
			'M0_C8_F0_S10_bc'=>'K/HL',
			'M0_C8_F0_S11_bc'=>'L/HL',
			'M0_C8_F0_S12_bc'=>'M/HL',
			'M0_C8_F0_S13_bc'=>'N/HL',
			'M0_C8_F0_S14_bc'=>'Q/HL',
			'M0_C8_F0_S15_bc'=>'T/HL',
			'M0_C9_F0_S3_bc'=>'Y/SS',
			'M0_C9_F0_S4_bc'=>'A/SS',
			'M0_C9_F0_S5_bc'=>'G/SS',
			'M0_C9_F0_S6_bc'=>'W/SS',
			'M0_C9_F0_S7_bc'=>'S/SS',
			'M0_C9_F0_S8_bc'=>'B/SS',
			'M0_C9_F0_S9_bc'=>'H/SS',
			'M0_C9_F0_S10_bc'=>'K/SS',
			'M0_C9_F0_S11_bc'=>'L/SS',
			'M0_C9_F0_S12_bc'=>'M/HL',
			'M0_C10_F0_S0_bc'=>'C/SS',
			'M0_C10_F0_S1_bc'=>'D/SS',
			'M0_C10_F0_S2_bc'=>'I/SS',
			'M0_C10_F0_S3_bc'=>'Y/SS',
			'M0_C10_F0_S4_bc'=>'A/SS',
			'M0_C10_F0_S5_bc'=>'G/SS',
			'M0_C10_F0_S6_bc'=>'W/SS',
			'M0_C10_F0_S7_bc'=>'S/SS',
			'M0_C10_F0_S8_bc'=>'B/SS',
			'M0_C10_F0_S9_bc'=>'H/SS',
			'M0_C10_F0_S10_bc'=>'K/SS',
			'M0_C10_F0_S11_bc'=>'L/SS',
			'M0_C10_F0_S12_bc'=>'M/HL',
			'M0_C10_F0_S13_bc'=>'N/HL',
			'M0_C10_F0_S14_bc'=>'Q/HL',
			'M0_C10_F0_S15_bc'=>'T/HL',
			'M0_C10_F0_S16_bc'=>'V/HL',
			'M0_C10_F0_S17_bc'=>'X/HL',
			'M0_C11_F0_S3_bc'=>'Y/SS',
			'M0_C11_F0_S4_bc'=>'A/SS',
			'M0_C11_F0_S5_bc'=>'G/SS',
			'M0_C11_F0_S6_bc'=>'W/SS',
			'M0_C11_F0_S7_bc'=>'S/SS',
			'M0_C11_F0_S8_bc'=>'B/SS',
			'M0_C11_F0_S9_bc'=>'H/SS',
			'M0_C11_F0_S10_bc'=>'K/HL',
			'M0_C11_F0_S11_bc'=>'L/HL',
			'M0_C11_F0_S12_bc'=>'M/HL',
			'M0_C12_F0_S3_bc'=>'Y/SS',
			'M0_C12_F0_S4_bc'=>'A/SS',
			'M0_C12_F0_S5_bc'=>'G/SS',
			'M0_C12_F0_S6_bc'=>'W/SS',
			'M0_C12_F0_S7_bc'=>'S/SS',
			'M0_C12_F0_S8_bc'=>'B/SS',
			'M0_C12_F0_S9_bc'=>'H/SS',
			'M0_C12_F0_S10_bc'=>'K/SS',
			'M0_C12_F0_S11_bc'=>'L/SS',
			'M0_C12_F0_S12_bc'=>'M/SS',
			'M0_C13_F0_S3_bc'=>'Y/SS',
			'M0_C13_F0_S4_bc'=>'A/SS',
			'M0_C13_F0_S5_bc'=>'G/SS',
			'M0_C13_F0_S6_bc'=>'W/SS',
			'M0_C13_F0_S7_bc'=>'S/SS',
			'M0_C13_F0_S8_bc'=>'B/SS',
			'M0_C13_F0_S9_bc'=>'H/SS',
			'M0_C13_F0_S10_bc'=>'K/SS',
			'M0_C13_F0_S11_bc'=>'L/SS',
			'M0_C13_F0_S12_bc'=>'M/SS',
			'M0_C13_F0_S13_bc'=>'N/SS',
			'M0_C13_F0_S14_bc'=>'Q/HL',
			'M0_C13_F0_S15_bc'=>'T/HL',
			'M0_C14_F0_S3_bc'=>'Y/SS',
			'M0_C14_F0_S4_bc'=>'A/SS',
			'M0_C14_F0_S5_bc'=>'G/SS',
			'M0_C14_F0_S6_bc'=>'W/SS',
			'M0_C14_F0_S7_bc'=>'S/SS',
			'M0_C14_F0_S8_bc'=>'B/SS',
			'M0_C14_F0_S9_bc'=>'H/SS',
			'M0_C14_F0_S10_bc'=>'K/SS',
			'M0_C14_F0_S11_bc'=>'L/SS',
			'M0_C14_F0_S12_bc'=>'M/SS',
			'M0_C14_F0_S13_bc'=>'N/SS',
			'M0_C14_F0_S14_bc'=>'Q/HL',
			'M0_C14_F0_S15_bc'=>'T/HL',
			'M0_C14_F0_S16_bc'=>'V/HL',
			'M0_C14_F0_S17_bc'=>'X/HL',
			'M0_C15_F0_S3_bc'=>'Y/SS',
			'M0_C15_F0_S4_bc'=>'A/SS',
			'M0_C15_F0_S5_bc'=>'G/SS',
			'M0_C15_F0_S6_bc'=>'W/SS',
			'M0_C15_F0_S7_bc'=>'S/SS',
			'M0_C15_F0_S8_bc'=>'B/SS',
			'M0_C15_F0_S9_bc'=>'H/SS',
			'M0_C15_F0_S10_bc'=>'K/SS',
			'M0_C15_F0_S11_bc'=>'L/SS',
			'M0_C15_F0_S12_bc'=>'M/SS',
			'M0_C15_F0_S13_bc'=>'N/SS',
			'M0_C15_F0_S14_bc'=>'Q/HL',
			'M0_C16_F0_S3_bc'=>'Y/SS',
			'M0_C16_F0_S4_bc'=>'A/SS',
			'M0_C16_F0_S5_bc'=>'G/SS',
			'M0_C16_F0_S6_bc'=>'W/SS',
			'M0_C16_F0_S7_bc'=>'S/SS',
			'M0_C16_F0_S8_bc'=>'B/SS',
			'M0_C16_F0_S9_bc'=>'H/SS',
			'M0_C16_F0_S10_bc'=>'K/SS',
			'M0_C16_F0_S11_bc'=>'L/SS',
			'M0_C16_F0_S12_bc'=>'M/SS',
			'M0_C16_F0_S13_bc'=>'N/SS',
			'M0_C16_F0_S14_bc'=>'Q/SS',
			'M0_C16_F0_S15_bc'=>'T/HL',
			'M0_C16_F0_S16_bc'=>'V/HL',
			'M0_C16_F0_S17_bc'=>'X/HL',
			'M0_C17_F0_S3_bc'=>'Y/SS',
			'M0_C17_F0_S4_bc'=>'A/SS',
			'M0_C17_F0_S5_bc'=>'G/SS',
			'M0_C17_F0_S6_bc'=>'W/SS',
			'M0_C17_F0_S7_bc'=>'S/SS',
			'M0_C17_F0_S8_bc'=>'B/SS',
			'M0_C17_F0_S9_bc'=>'H/SS',
			'M0_C17_F0_S10_bc'=>'K/SS',
			'M0_C17_F0_S11_bc'=>'L/SS',
			'M0_C17_F0_S12_bc'=>'M/SS',
			'RGM0_0'=>$RGM0_0,
			'txtUpdateInsurance'=>'no',
			'Insurance$rblInsurance'=>'No',
			'Insurance$txtInsPostbackRequired'=>'no',
			'txtPricingResponse'=>'OK',
			'txtOutFBCsUsed'=>'MOW',
			'txtInFBCsUsed'=>'',
			'txtTaxBreakdown'=>'',
			'lbContinue.x'=>'96',
			'lbContinue.y'=>'20',
			'UcFlightSelection$TripType'=>'rbOneWay',
			'UcFlightSelection$DateFlexibility'=>'rbMustTravel',
			'UcFlightSelection$txtSelOri'=>$depart,
			'UcFlightSelection$ddlDepMonth'=>$ddlDepMonth,
			'UcFlightSelection$ddlDepDay'=>$ddlDepDay,
			'UcFlightSelection$ddlADTCount'=>'1',
			'UcFlightSelection$txtSelDes'=>$destiny,
			'UcFlightSelection$ddlCNNCount'=>'0',
			'UcFlightSelection$ddlINFCount'=>'0',
			'UcFlightSelection$txtDepartureDate'=>$txtDepartureDate,
			'UcFlightSelection$txtReturnDate'=>$txtReturnDate,
			'txtOBNNCellID'=>$RGM0_0,
			'txtIBNNCellID'=>'oneway',
			'txtOBNNRowID'=>$RowID,
			'txtIBNNRowID'=>'',
			'txtUserSelectedOneway'=>'',
			'__EVENTTARGET'=>'',
			'__EVENTARGUMENT'=>'',
			'__LASTFOCUS'=>'',
			'__VIEWSTATE'=>$viewstate
		);
		
		$data = http_build_query($data);
	
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/Step2Availability.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(         
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                    
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session",
			"Content-Type: application/x-www-form-urlencoded")                                                                       
		); 
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$viewstate=explode('id="__VIEWSTATE" value="',$result);
		$viewstate=explode('" />',$viewstate[1]);
		$viewstate=$viewstate[0];
		
		$arrayadult=array();
		for($flagadult=1;$flagadult<=($_POST['adult']+$_POST['child']);$flagadult++)
		{
			if($flagadult<=$_POST['adult'])
			{
				array_push(
					$arrayadult,
					array(
						'NameBlock'.$flagadult.'$ddlTitle'=>$_POST["title$flagadult"],
						'NameBlock'.$flagadult.'$txtFirstName'=>$_POST["name$flagadult"],
						'NameBlock'.$flagadult.'$txtLastName'=>$_POST["namel$flagadult"],
						'NameBlock'.$flagadult.'$ddlAirline'=>'JT',
						'NameBlock'.$flagadult.'$ddlSpecRequest'=>'NA',
						'NameBlock'.$flagadult.'$txtFFNo'=>'',
						'NameBlock'.$flagadult.'$ddlMealRequest'=>'No Preference'
					)
				);
			}
			else
			{
				array_push(
					$arrayadult,
					array(
						'NameBlock'.$flagadult.'$ddlTitle'=>$_POST["title$flagadult"],
						'NameBlock'.$flagadult.'$txtFirstName'=>$_POST["name$flagadult"],
						'NameBlock'.$flagadult.'$txtLastName'=>$_POST["namel$flagadult"],
						'NameBlock'.$flagadult.'$ddlAirline'=>'JT',
						'NameBlock'.$flagadult.'$ddlSpecRequest'=>'NA',
						'NameBlock'.$flagadult.'$txtFFNo'=>'',
						'NameBlock'.$flagadult.'$ddlMealRequest'=>'No Preference',	
						'NameBlock'.$flagadult.'$ddlDOBDay'=>$_POST["date$flagadult"],
						'NameBlock'.$flagadult.'$ddlDOBMonth'=>$_POST["month$flagadult"],
						'NameBlock'.$flagadult.'$ddlDOBYear'=>$_POST["year$flagadult"],
					)
				);
			}
		}
		
		$data=array
		(
			'__EVENTTARGET'=>'lbContinue',
			'__EVENTARGUMENT'=>'',
			'__VIEWSTATE'=>$viewstate,
			'ContactTitle'=>$_POST['ctitle'],
			'ContactFirstName'=>$_POST['cname'],
			'ContactLastName'=>$_POST['cnamel'],
			'txtAddress1'=>'',
			'txtAddress2'=>'',
			'ddlCountry'=>'ID',
			'txtCity'=>'',
			'txtPostCode'=>'',
			'txtCountryCode1'=>'62',
			'txtAreaCode1'=>'812',
			'txtPhoneNumber1'=>'7657883',
			'ddlOriNumber'=>'H',
			'txtCountryCode3'=>'',
			'txtPhoneNumber3'=>'',
			'txtEmailAddress1'=>'lionair.ticket@gmail.com',
			'txtEmailAddress2'=>'lionair.ticket@gmail.com',
			'txtRemark'=>'',
			'AcceptFareConditions'=>'on',
			'FlightInfo'=>'',
			'AXTotal'=>'',
			'DCTotal'=>'',
			'OtherTotal'=>'',
			'nameMismatch'=>'',
		);
		
		for($flagmerge=0;$flagmerge<($_POST['adult']+$_POST['child']);$flagmerge++)
		{
			$data=array_merge($data,$arrayadult[$flagmerge]);
		}
		
		//echo '<pre>'; print_r($data); echo '</pre>';
		
		$data = http_build_query($data);
	
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/Step3NoTicketing.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(         
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                    
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session",
			"Content-Type: application/x-www-form-urlencoded")                                                                       
		); 
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$viewstate=explode('id="__VIEWSTATE" value="',$result);
		$viewstate=explode('" />',$viewstate[1]);
		$viewstate=$viewstate[0];
		
		$PNR=explode('<span id="lblRefNumber">',$result);
		$PNR=explode('</span>',$PNR[1]);
		$PNR=$PNR[0];
		
		$timelimit=explode('<span id="lblPayByDate">',$result);
		$timelimit=explode('</span>',$timelimit[1]);
		$timelimit=$timelimit[0];
		
		$hargatotal=explode('<span id="lblTotalBaseFares">',$result);
		$hargatotal=explode('</span>',$hargatotal[1]);
		$hargatotal=str_replace(',','',$hargatotal[0]);
		
		array_push(
			$stackbooking,
			array(
				'booking_code'=>$PNR,
				'total_price'=>$hargatotal,
				'time_limit'=>$timelimit
			)
		);
		
		echo json_encode($stackbooking);
		
		$data=array
		(
			'__EVENTTARGET'=>'lbExit',
			'__EVENTARGUMENT'=>'',
			'__VIEWSTATE'=>$viewstate
		);
		
		$data = http_build_query($data);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/Step4.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session",
			"Content-Type: application/x-www-form-urlencoded")                                                                       
		); 
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		$result=curl_exec($ch);
		
		$viewstate=explode('id="__VIEWSTATE" value="',$result);
		$viewstate=explode('" />',$viewstate[1]);
		$viewstate=$viewstate[0];
				
		$data=array
		(
			'__EVENTTARGET'=>'UcFlightSelection$lbGoBack',
			'__EVENTARGUMENT'=>'',
			'__VIEWSTATE'=>$viewstate,
			'UcFlightSelection$TripType'=>'rbReturn',
			'UcFlightSelection$DateFlexibility'=>'rbMustTravel',
			'UcFlightSelection$txtSelOri'=>'--Depart--',
			'UcFlightSelection$txtOri'=>'--Depart--',
			'UcFlightSelection$ddlDepMonth'=>date('M Y'),
			'UcFlightSelection$ddlDepDay'=>date('d'),
			'UcFlightSelection$ddlADTCount'=>'1',
			'UcFlightSelection$txtSelDes'=>'--Return--',
			'UcFlightSelection$txtDes'=>'--Return--',
			'UcFlightSelection$ddlRetMonth'=>date('M Y', strtotime("+1 day",strtotime(date('M Y')))),
			'UcFlightSelection$ddlRetDay'=>date('d', strtotime("+1 day",strtotime(date('d')))),
			'UcFlightSelection$ddlCNNCount'=>'0',
			'UcFlightSelection$ddlINFCount'=>'0',
			'UcFlightSelection$txtDepartureDate'=>date('d M Y'),
			'UcFlightSelection$txtReturnDate'=>date('d M Y', strtotime("+1 day",strtotime(date('d M Y'))))
		);
		
		$data = http_build_query($data);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/Step1.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: ASP.NET_SessionId=$session",
			"Content-Type: application/x-www-form-urlencoded")                                                                       
		); 
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx?consID=81430";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx",
			"Cookie: LoginName=HELLOTRANS-F; ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		curl_exec($ch);
		
		$url="https://agent.lionair.co.id/LionAirAgentsPortal/Default.aspx";
		$ch = curl_init($url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_COOKIESESSION,true); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array(     
			"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0",                         
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
			"Referer: https://agent.lionair.co.id/LionAirAgentsIBE/OnlineBooking.aspx?consID=81430",
			"Cookie: LoginName=HELLOTRANS-F; ASP.NET_SessionId=$session")                                                                       
		); 
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch,CURLOPT_HEADER, true);
		curl_exec($ch);
	}
?>