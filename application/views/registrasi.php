<style type="text/css">
<!--
.style1 {
	color: #FF9900;
	font-weight: bold;
	font-size:18px;
}
-->
</style>
<div class="main fullwidth">
	<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
		<div class="container">
			<?php
				if ($this->uri->segment(3)=="success"){
					echo '<h4>Masukan anda telah kami terima</h4>';
                    echo '<p>Kami akan segera menghubungi anda pada jam kerja.</p>';
				}
			?>
			<div class="span8 boxfix" style="margin-right:10px">            
				<div style="font-family:Arial; font-size:24px; font-weight:bold; color:#FF9900; padding-bottom:20px">
					<h3>Formulir Keagenan</h3>
					<p style="font-size:12px;color:black">Mohon untuk mengisi semua input berikut ini:</p>
					<form action="<?php echo base_url();?>index.php/admin/agent_register" method="post" id="registration">
						<input type="hidden" name="member_type" value="2">
						<input type="hidden" name="id_agen_upline" value="2">
						<div style="width:15%"><label>Username</label></div>
						<div style="width:35%">    <input type="text" name="username" id="username" value="" size="40" tabindex="1" /></div>
						<div style="width:15%"><label>Password</label></div>
						<div style="width:45%">    <input type="password" name="password" id="password" value="" size="40" tabindex="2"/></div>
						<div style="width:15%"><label>Nama Lengkap</label></div>
						<div style="width:35%">    <input type="text" name="company_name" id="company_name" value="" size="40"tabindex="2"/></div>
						<div style="width:15%"><label>Alamat lengkap </label></div>
						<div style="width:45%">    <input type="text" name="address" id="address" value="" size="70" tabindex="3"/></div>
						<div style="width:15%"><label>Kota </label></div>
						<div style="width:45%"> <select name="id_kota" data-placeholder="-- Pilih Kota --" id="id_kota" class="chzn-select"> </select></div>
						<div style="width:15%"><label>Telepon/HP</label></div>
						<div style="width:35%">    <input type="text" name="telp_no" id="telp_no" value="" size="40" tabindex="3"/></div>
						<div style="width:15%"><label>Email</label></div>
						<div style="width:35%">    <input type="email" name="email" id="email" value="" size="40" tabindex="3"/></div>
						<div style="width:15%"><label>Yahoo Messenger</label></div>
						<div style="width:35%">    <input type="email" name="yahoo_account" id="yahoo_account" value="" size="40" tabindex="3"/></div>
						
						<p class="input-wrap">
						<!--<div style="width:15%"><label for="country">Country</label></div>
						<div style="width:45%"> <select name="cmb_country" id="cmb_country" tabindex="3">
							<option value="0">Pick Country</option><option data="+93" value="af">Afghanistan </option><option data="+358" value="ax">Åland Islands </option><option data="+355" value="al">Albania </option><option data="+213" value="dz">Algeria </option><option data="+684" value="as">American Samoa </option><option data="+376" value="ad">Andorra </option><option data="+244" value="ao">Angola </option><option data="+126" value="ai">Anguilla </option><option data="+672" value="aq">Antarctica </option><option data="+126" value="ag">Antigua And Barbuda </option><option data="+54" value="ar">Argentina </option><option data="+374" value="am">Armenia </option><option data="+297" value="aw">Aruba </option><option data="+61" value="au">Australia </option><option data="+43" value="at">Austria </option><option data="+994" value="az">Azerbaijan </option><option data="+124" value="bs">Bahamas </option><option data="+973" value="bh">Bahrain </option><option data="+880" value="bd">Bangladesh </option><option data="+124" value="bb">Barbados </option><option data="+375" value="by">Belarus </option><option data="+32" value="be">Belgium </option><option data="+501" value="bz">Belize </option><option data="+229" value="bj">Benin </option><option data="+144" value="bm">Bermuda </option><option data="+975" value="bt">Bhutan </option><option data="+591" value="bo">Bolivia </option><option data="+387" value="ba">Bosnia And Herzegovina </option><option data="+267" value="bw">Botswana </option><option data="+47" value="bv">Bouvet Island </option><option data="+55" value="br">Brazil </option><option data="+246" value="io">British Indian Ocean Territory </option><option data="+673" value="bn">Brunei Darussalam </option><option data="+359" value="bg">Bulgaria </option><option data="+226" value="bf">Burkina Faso </option><option data="+257" value="bi">Burundi </option><option data="+855" value="kh">Cambodia </option><option data="+237" value="cm">Cameroon </option><option data="+1" value="ca">Canada </option><option data="+238" value="cv">Cape Verde </option><option data="+345" value="ky">Cayman Islands </option><option data="+236" value="cf">Central African Republic </option><option data="+235" value="td">Chad </option><option data="+56" value="cl">Chile </option><option data="+86" value="cn">China </option><option data="+61" value="cx">Christmas Island </option><option data="+61" value="cc">Cocos (Keeling) Islands </option><option data="+57" value="co">Colombia </option><option data="+269" value="km">Comoros </option><option data="+242" value="cg">Congo </option><option data="+243" value="cd">Congo, The Democratic Republic Of The </option><option data="+682" value="ck">Cook Islands </option><option data="+506" value="cr">Costa Rica </option><option data="+225" value="ci">Côte D'Ivoire </option><option data="+385" value="hr">Croatia </option><option data="+53" value="cu">Cuba </option><option data="+357" value="cy">Cyprus </option><option data="+420" value="cz">Czech Republic </option><option data="+45" value="dk">Denmark </option><option data="+253" value="dj">Djibouti </option><option data="+767" value="dm">Dominica </option><option data="+809" value="do">Dominican Republic </option><option data="+593" value="ec">Ecuador </option><option data="+20" value="eg">Egypt</option><option data="+503" value="sv">El Salvador </option><option data="+240" value="gq">Equatorial Guinea </option><option data="+291" value="er">Eritrea </option><option data="+372" value="ee">Estonia </option><option data="+251" value="et">Ethiopia </option><option data="+500" value="fk">Falkland Islands (Malvinas) </option><option data="+298" value="fo">Faroe Islands </option><option data="+679" value="fj">Fiji </option><option data="+358" value="fi">Finland </option><option data="+33" value="fr">France </option><option data="+594" value="gf">French Guiana </option><option data="+689" value="pf">French Polynesia </option><option data="+596" value="tf">French Southern Territories </option><option data="+241" value="ga">Gabon </option><option data="+220" value="gm">Gambia </option><option data="+995" value="ge">Georgia </option><option data="+49" value="de">Germany </option><option data="+233" value="gh">Ghana </option><option data="+350" value="gi">Gibraltar </option><option data="+30" value="gr">Greece </option><option data="+299" value="gl">Greenland </option><option data="+147" value="gd">Grenada </option><option data="+590" value="gp">Guadeloupe </option><option data="+167" value="gu">Guam </option><option data="+502" value="gt">Guatemala </option><option data="+44" value="gg">Guernsey </option><option data="+224" value="gn">Guinea </option><option data="+245" value="gw">Guinea-Bissau </option><option data="+592" value="gy">Guyana </option><option data="+509" value="ht">Haiti </option><option data="+672" value="hm">Heard Island And Mcdonald Islands </option><option data="+504" value="hn">Honduras </option><option data="+852" value="hk">Hong Kong </option><option data="+36" value="hu">Hungary </option><option data="+354" value="is">Iceland </option><option data="+91" value="in">India </option><option data="+62" value="id" selected="">Indonesia</option><option data="+98" value="ir">Iran, Islamic Republic Of </option><option data="+964" value="iq">Iraq </option><option data="+353" value="ie">Ireland </option><option data="+44" value="im">Isle Of Man </option><option data="+972" value="il">Israel </option><option data="+39" value="it">Italy </option><option data="+876" value="jm">Jamaica </option><option data="+81" value="jp">Japan </option><option data="+44" value="je">Jersey </option><option data="+962" value="jo">Jordan </option><option data="+7" value="kz">Kazakhstan </option><option data="+254" value="ke">Kenya </option><option data="+686" value="ki">Kiribati </option><option data="+965" value="kw">Kuwait </option><option data="+996" value="kg">Kyrgyzstan </option><option data="+856" value="la">Laos</option><option data="+371" value="lv">Latvia </option><option data="+961" value="lb">Lebanon </option><option data="+266" value="ls">Lesotho </option><option data="+231" value="lr">Liberia </option><option data="+218" value="ly">Libyan Arab Jamahiriya </option><option data="+423" value="li">Liechtenstein </option><option data="+370" value="lt">Lithuania </option><option data="+352" value="lu">Luxembourg </option><option data="+853" value="mo">Macau </option><option data="+389" value="mk">Macedonia, The Former Yugoslav Republic Of </option><option data="+261" value="mg">Madagascar </option><option data="+265" value="mw">Malawi </option><option data="+60" value="my">Malaysia </option><option data="+960" value="mv">Maldives </option><option data="+223" value="ml">Mali </option><option data="+356" value="mt">Malta </option><option data="+692" value="mh">Marshall Islands </option><option data="+596" value="mq">Martinique </option><option data="+222" value="mr">Mauritania </option><option data="+230" value="mu">Mauritius </option><option data="+269" value="yt">Mayotte </option><option data="+52" value="mx">Mexico </option><option data="+691" value="fm">Micronesia, Federated States Of </option><option data="+373" value="md">Moldova </option><option data="+377" value="mc">Monaco </option><option data="+976" value="mn">Mongolia </option><option data="+382" value="me">Montenegro </option><option data="+166" value="ms">Montserrat </option><option data="+212" value="ma">Morocco </option><option data="+258" value="mz">Mozambique </option><option data="+95" value="mm">Myanmar </option><option data="+264" value="na">Namibia </option><option data="+674" value="nr">Nauru </option><option data="+977" value="np">Nepal </option><option data="+31" value="nl">Netherlands </option><option data="+599" value="an">Netherlands Antilles </option><option data="+687" value="nc">New Caledonia </option><option data="+64" value="nz">New Zealand </option><option data="+505" value="ni">Nicaragua </option><option data="+227" value="ne">Niger </option><option data="+234" value="ng">Nigeria </option><option data="+683" value="nu">Niue </option><option data="+672" value="nf">Norfolk Island </option><option data="+850" value="kp">North Korea</option><option data="+670" value="mp">Northern Mariana Islands </option><option data="+47" value="no">Norway </option><option data="+968" value="om">Oman </option><option data="+92" value="pk">Pakistan </option><option data="+680" value="pw">Palau </option><option data="+970" value="ps">Palestinian Territory, Occupied </option><option data="+507" value="pa">Panama </option><option data="+675" value="pg">Papua New Guinea </option><option data="+595" value="py">Paraguay </option><option data="+51" value="pe">Peru </option><option data="+63" value="ph">Philippines </option><option data="+870" value="pn">Pitcairn </option><option data="+48" value="pl">Poland </option><option data="+351" value="pt">Portugal </option><option data="+787" value="pr">Puerto Rico </option><option data="+974" value="qa">Qatar </option><option data="+262" value="re">Réunion </option><option data="+40" value="ro">Romania </option><option data="+7" value="ru">Russia</option><option data="+250" value="rw">Rwanda </option><option data="+590" value="bl">Saint Barthélemy </option><option data="+290" value="sh">Saint Helena </option><option data="+186" value="kn">Saint Kitts And Nevis </option><option data="+175" value="lc">Saint Lucia </option><option data="+159" value="mf">Saint Martin </option><option data="+508" value="pm">Saint Pierre And Miquelon </option><option data="+178" value="vc">Saint Vincent And The Grenadines </option><option data="+685" value="ws">Samoa </option><option data="+378" value="sm">San Marino </option><option data="+239" value="st">Sao Tome And Principe </option><option data="+966" value="sa">Saudi Arabia </option><option data="+221" value="sn">Senegal </option><option data="+381" value="rs">Serbia </option><option data="+248" value="sc">Seychelles </option><option data="+232" value="sl">Sierra Leone </option><option data="+65" value="sg">Singapore </option><option data="+421" value="sk">Slovakia </option><option data="+386" value="si">Slovenia </option><option data="+677" value="sb">Solomon Islands </option><option data="+252" value="so">Somalia </option><option data="+27" value="za">South Africa </option><option data="+500" value="gs">South Georgia And The South Sandwich Islands </option><option data="+82" value="kr">South Korea</option><option data="+34" value="es">Spain </option><option data="+94" value="lk">Sri Lanka </option><option data="+249" value="sd">Sudan </option><option data="+597" value="sr">Suriname </option><option data="+47" value="sj">Svalbard And Jan Mayen </option><option data="+268" value="sz">Swaziland </option><option data="+46" value="se">Sweden </option><option data="+41" value="ch">Switzerland </option><option data="+963" value="sy">Syrian Arab Republic </option><option data="+886" value="tw">Taiwan</option><option data="+992" value="tj">Tajikistan </option><option data="+255" value="tz">Tanzania</option><option data="+66" value="th">Thailand </option><option data="+670" value="tl">Timor-Leste </option><option data="+228" value="tg">Togo </option><option data="+690" value="tk">Tokelau </option><option data="+676" value="to">Tonga </option><option data="+868" value="tt">Trinidad And Tobago </option><option data="+216" value="tn">Tunisia </option><option data="+90" value="tr">Turkey </option><option data="+993" value="tm">Turkmenistan </option><option data="+649" value="tc">Turks And Caicos Islands </option><option data="+688" value="tv">Tuvalu </option><option data="+256" value="ug">Uganda </option><option data="+380" value="ua">Ukraine </option><option data="+971" value="ae">United Arab Emirates </option><option data="+44" value="gb">United Kingdom </option><option data="+1" value="us">United States </option><option data="+1" value="um">United States Minor Outlying Islands </option><option data="+598" value="uy">Uruguay </option><option data="+998" value="uz">Uzbekistan </option><option data="+678" value="vu">Vanuatu </option><option data="+379" value="va">Vatican City State </option><option data="+58" value="ve">Venezuela </option><option data="+84" value="vn">Vietnam </option><option data="+128" value="vg">Virgin Islands, British </option><option data="+134" value="vi">Virgin Islands, U.S. </option><option data="+681" value="wf">Wallis And Futuna </option><option data="+212" value="eh">Western Sahara </option><option data="+967" value="ye">Yemen </option><option data="+260" value="zm">Zambia </option>	            </select>
						</div>-->
						<p style="color:black;font-size:11px;">By clicking the "submit" button below, i agree with hellotraveler.co.id <a href="" target="_blank">Privacy Policy</a> and <a href="" target="_blank">Terms &amp; Condition</a>.
						<input class="button" name="submit" type="submit" id="submit" tabindex="5" value="submit" />
						</p>
					</form>
				</div>
			</div>
			
		</div>
	</section>

</div> <!-- Close Header Wrapper -->  
    <div class="main homepage">
      <div class="container"> 
        <!--Dapatkan kemudahan transaksi melalui bebasterbang.com. Kami hadir untuk memberi solusi yang efektif dalam hal perjalanan dan liburan Anda.-->
        <div class="row-fluid" style="margin-bottom:10px;">
          <!-- KOLOM HOTEL MURAH  -->       
<div class="span8 boxfix" style="margin-right:10px">
                                <!-- response setelah submit
								<div class="contact-form-respons">
                                    <div class="infobox info-succes info-succes-alt clearfix">
                                        <span></span>
                                        <div class="infobox-wrap">
                                            <h4>Your message was succesfully send!</h4>
                                            <p>We will contact you as soon as possible. Please reload the page if you want to send a message again.</p>                                            
                                        </div>
                                        <a href="#" class="info-hide"></a>
                                    </div>
                                </div>
								-->
 


<!-- IIRRRRFFFFAAANNN -->
</div>
<script>
	function load_cities(){
		simple_load('<?php echo base_url();?>index.php/admin/get_cities', '#id_kota', '');
	}
	function simple_load(uri, el_sel, selected_id){
		$.ajax({
			type : "GET",
			url: uri,
			dataType: "json",
			success:function(data){
				insert_select(el_sel, data, selected_id);
			}
		})
	}
	function insert_select(el_sel, data, selected_id){
		
		var sel = $(el_sel);
		for(var i=0; i<data.length;i++){
			if (selected_id == '')
				sel.append('<option value="'+data[i].value+'">'+data[i].name+'</option>');
			else {
				if (selected_id == data[i].value)
					sel.append('<option value="'+data[i].value+'" selected="selected">'+data[i].name+'</option>');
				else
					sel.append('<option value="'+data[i].value+'">'+data[i].name+'</option>');
			}
		}
	}
	$( window ).load(function() {
		load_cities();
	});
</script>