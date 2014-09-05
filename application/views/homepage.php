    <div class="header-wrap"> <!-- Header Wrapper, contains Mene and Slider -->
      
      <div id="homepage-slider" style="float:left;"> <!-- Homepage Slider Container -->
        
        <div class="flexslider">
          <ul class="slides">
            <li> <img src="<?php echo IMG_DIR;?>/slides/flex-slider/flex-slide-1.jpg" alt="Carousel Item 1" /> </li>
            <li> <img src="<?php echo IMG_DIR;?>/slides/flex-slider/flex-slide-2.jpg" alt="Carousel Item 1" />  </li>
            <li> <img src="<?php echo IMG_DIR;?>/slides/flex-slider/flex-slide-3.jpg" alt="Carousel Item 1" />  </li>
          </ul>
        </div>
      </div>
      <!-- Close Homepage Slider Container --> 
      <!--formbook-->
      <div id="form-book" >
        <div class="shortcode-tabs" >
          <ul class="tabs-nav tabs clearfix">
            <li class="active"><a class="button button-white" href="#tab1" data-toggle="tab">Flight</a></li>
            <li><a class="button button-white" href="#tab3" data-toggle="tab">Kereta Api</a></li>
			<li><a class="button button-white" href="#tab2" data-toggle="tab">Hotel</a></li>
            <!--<li><a class="button button-white" href="#tab3" data-toggle="tab">Tour</a></li>
            <li><a class="button button-white" href="#tab4" data-toggle="tab">Travel</a></li>-->
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <form id="flight-form" name="flight-form" style="position:relative; z-index:1100;">
                <!--<div style="font-size:12px; padding:4px 0 10px;"><input type="radio" class="radio" name="trip" value="oneway"> Sekali Jalan &nbsp;&nbsp;<input type="radio" name="trip" value="twooway"> Pulang Pergi</div>
				-->
                <div style="float:left; width:340px; border:0px solid #999;">
                  <label for="from" style="width:60px; float:left">Dari</label>
                  <select data-placeholder="Choose flight from" name="dari" id="flight-from" style="width:263px"  >
                  
                  </select>
                </div>
                <div style="float:left; width:340px; border:0px solid #999;">
                  <label style="width:60px; float:left; ">Ke</label>
                  <select data-placeholder="Choose flight to" name="ke" id="flight-to" style="width:263px" >
                    
                  </select>
                </div>
                <div style="float:left; width:340px; border:0px solid #999;">
                 <script>
					$(function() {
						$( "#departing" ).datepicker({"dateFormat": "yy-mm-dd"});
						//$( "#returning" ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				</script>
                  <label style="width:60px; float:left">Pergi</label>
                  <input type="text"  id="departing" name="flight-pergi" value="" style="width:85px; float:left; margin-right:10px;"/>
                  <!--<label style="width:54px; float:left; padding-left:5px;">Pulang</label>
                  <input type="text"  id="returning" name="flight-pulang" value="" style="width:85px; float:left;"/>-->
                </div>
                <div style="float:left; width:340px; border:0px solid #999;">
                  <label style="width:60px; float:left">Dewasa</label>
                  <input type="text" name="dewasa" id="dewasa" maxlength="1" value="1" min="0" max="4" style="width: 30px; margin-right: 23px; text-align: center;float:left">
                  <label style="width:40px; float:left">Anak</label>
                  <input type="text" name="anak" id="anak" maxlength="1" value="0" min="0" max="4" style="width: 30px; margin-right: 23px; text-align: center; float:left">
                  <label style="width:40px; float:left">Bayi</label>
                  <input type="text" name="bayi" id="bayi" maxlength="1" value="0" min="0" max="4" style="width: 30px; margin-right: 23px; text-align: center;float:left">
                </div>
              
                  <input type="hidden" name="uid" value="">
                  <input type="submit" name="submit" class="button cari-btn" id="submit-flight" value="CARI" tabindex="8" style="float:left;">
               
              </form>
            </div>
			<!-- HOTEL -->
            <div class="tab-pane" id="tab2">
			<script>
					$(function() {
						$( "#checkin" ).datepicker({"dateFormat": "yy-mm-dd"});
						$( "#checkout" ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				</script>
             <form id="hotel-form" name="hotel-form" style="position:relative; z-index:1110; margin-left:20px;">
             <div style="float:left; width:320px; border:0px solid #999;">
             	Nama Kota atau Hotel <br/><input type="text"  id="query" name="query" value="" style="width:220px; "/></div>
             <div style="float:left; width:320px; border:0px solid #999;">
             	<span style="float:left;">Check In <br/><input type="text"  id="checkin" name="checkin" value="" style="width:100px; margin-right:10px;"/></span>
             	<span style="float:left;">Check out <br/><input type="text"  id="checkout" name="checkout" value="" style="width:100px; margin-right:10px;"/></span>
             </div>
             <div style="float:left; width:320px; border:0px solid #999;">
             	<span style="float:left;">Kamar <br/><input type="text"  id="kamar" name="room" value="" style="width:60px; margin-right:10px;"/></span>
             	<span style="float:left;">Malam <br/><input type="text"  id="malam" name="night" value="" style="width:60px; margin-right:10px;"/></span>
             	<span style="float:left;">Dewasa <br/><input type="text"  id="hotel-dewasa" name="dewasa" value="" style="width:60px; margin-right:10px;"/></span>
             	<span style="float:left;">Anak <br/><input type="text"  id="hotel-anak" name="anak" value="" style="width:60px; margin-right:10px;"/></span>
             </div>
             <div style="float:left; width:320px; border:0px solid #999;">
             <input type="submit" class="button cari-hotel" id="submit-hotel" value="CARI HOTEL" tabindex="8" style="float:left;">
             </div>
             </form>
              
            </div>
			<!-- KERETA API -->
            <div class="tab-pane" id="tab3">
              <form id="train-form" name="train-form" style="position:relative; z-index:1100;">
                <!--<div style="font-size:12px; padding:4px 0 10px;"><input type="radio" class="radio" name="trip" value="oneway"> Sekali Jalan &nbsp;&nbsp;<input type="radio" name="trip" value="twooway"> Pulang Pergi</div>
				-->
                <div style="float:left; width:340px; border:0px solid #999;">
                  <label for="from" style="width:60px; float:left">Dari</label>
                  <select data-placeholder="Choose flight from" name="dari" id="train-from" style="width:263px"  >
                  </select>
                </div>
                <div style="float:left; width:340px; border:0px solid #999;">
                  <label style="width:60px; float:left; ">Ke</label>
                  <select data-placeholder="Choose flight to" name="ke" id="train-to" style="width:263px" >
                  </select>
                </div>
                <div style="float:left; width:340px; border:0px solid #999;">
                 <script>
					$(function() {
						$( "#train-pergi" ).datepicker({"dateFormat": "yy-mm-dd"});
						//$( "#train-pulang" ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				</script>
                  <label style="width:60px; float:left">Pergi</label>
                  <input type="text"  id="train-pergi" name="train-pergi" value="" style="width:85px; float:left; margin-right:10px;"/>
                  <!--<label style="width:54px; float:left; padding-left:5px;">Pulang</label>
                  <input type="text"  id="train-pulang" name="train-pulang" value="" style="width:85px; float:left;"/>-->
                </div>
                <div style="float:left; width:340px; border:0px solid #999;">
                  <label style="width:60px; float:left">Dewasa</label>
                  <input type="text" name="dewasa" id="adult" maxlength="1" value="1" min="0" max="4" style="width: 30px; margin-right: 23px; text-align: center;float:left">
                  <label style="width:40px; float:left">Anak</label>
                  <input type="text" name="anak" id="child" maxlength="1" value="0" min="0" max="4" style="width: 30px; margin-right: 23px; text-align: center; float:left">
                  <label style="width:40px; float:left">Bayi</label>
                  <input type="text" name="bayi" id="infant" maxlength="1" value="0" min="0" max="4" style="width: 30px; margin-right: 23px; text-align: center;float:left">
                </div>
              
                  <input type="hidden" name="uid" value="">
                  <input type="submit" class="button cari-btn" id="submit-train" value="CARI" tabindex="8" style="float:left;">
               
              </form>
            </div>
            <div class="tab-pane" id="tab4">
              <h2>Tab triggered by long button</h2>
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
          </div>
        </div>
      </div>
      
      <!--/formbook-->
      <div class="container calltoaction-container"> <!-- Call to Action -->
        <div class="calltoaction clearfix">
          <div class="row-fluid">
            <div class="cta-text-holder clearfix">
              <h5>Dapatkan kemudahan transaksi melalui hellotraveler.co.id</h5>
              <p style="font-size:14px">Kami hadir untuk memberi solusi yang efektif untuk perjalanan dan liburan Anda.</p>
              
            </div>
            <!--<div class="cta-button-holder span3 clearfix"> <a href="#" class="cta-button button"> View our products </a> </div>-->
          </div>
        </div>
      </div>
      <!-- Close Call to Action --> 
    </div>
    <!-- Close Header Menu --> 
  </div>
  <!-- Close Header Wrapper -->
  
  <div class="page-top-stripes"></div>
  <!-- Page Background Stripes -->
  
  <div class="page"> <!-- Page -->
    <div class="main homepage">
      <div class="container"> 
        <!--Dapatkan kemudahan transaksi melalui bebasterbang.com. Kami hadir untuk memberi solusi yang efektif dalam hal perjalanan dan liburan Anda.-->
        <div class="row-fluid" style="margin-bottom:10px;">
          <!--<div class="span4 boxfix">
            <div class="content-title">
              <h3>Tiket Pesawat Murah</h3>
            </div>
            <div > 
              <!--list harga tiket murah-->
              <!--<ul class="" id="listTiketMurah">
                <li><a href="http://bebasterbang/" title=" Denpasar, Bali ke Jakarta"><strong>Denpasar, Bali</strong> <span><em>Mulai</em> <strong>IDR 308.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/" title="Penerbangan Murah dari Surabaya ke Jakarta"><strong>Surabaya</strong> <span><em>Mulai</em> <strong>IDR 198.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/" title="Penerbangan Murah dari Medan ke Jakarta"><strong>Medan</strong> <span><em>Mulai</em> <strong>IDR 480.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=PNK&amp;date=2013-01-29&amp;ret_date=2013-02-05&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Pontianak ke Jakarta"><strong>Pontianak</strong> <span><em>Mulai</em> <strong>IDR 511.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=JOG&amp;date=2013-01-09&amp;ret_date=2013-01-16&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Yogyakarta ke Jakarta"><strong>Yogyakarta</strong> <span><em>Mulai</em> <strong>IDR 290.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=PDG&amp;date=2013-01-11&amp;ret_date=2013-01-18&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Padang ke Jakarta"><strong>Padang</strong> <span><em>Mulai</em> <strong>IDR 401.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=UPG&amp;date=2013-01-11&amp;ret_date=2013-01-18&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari UjungPandang, Makassar ke Jakarta"><strong>UjungPandang, Ma...</strong> <span><em>Mulai</em> <strong>IDR 440.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=SOC&amp;date=2013-02-10&amp;ret_date=2013-02-17&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Solo ke Jakarta"><strong>Solo</strong> <span><em>Mulai</em> <strong>IDR 290.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=SRG&amp;date=2013-01-14&amp;ret_date=2013-01-21&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Semarang ke Jakarta"><strong>Semarang</strong> <span><em>Mulai</em> <strong>IDR 280.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=PLM&amp;date=2013-01-10&amp;ret_date=2013-01-17&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Palembang ke Jakarta"><strong>Palembang</strong> <span><em>Mulai</em> <strong>IDR 290.000,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=MDC&amp;date=2012-12-31&amp;ret_date=2013-01-07&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Manado ke Jakarta"><strong>Manado</strong> <span><em>Mulai</em> <strong>IDR 813.500,00</strong></span></a></li>
                <li><a href="http://bebasterbang/pesawat/cari?d=CGK&amp;a=TJQ&amp;date=2013-01-01&amp;ret_date=2013-01-08&amp;adult=1&amp;child=0&amp;infant=0" title="Penerbangan Murah dari Tanjung Pandan ke Jakarta"><strong>Tanjung Pandan</strong> <span><em>Mulai</em> <strong>IDR 320.000,00</strong></span></a></li>
              </ul> 
            </div>
          </div>  -->
          <!--<div class="span8 boxfix">
          
            <div class="content-title">
              <h3>Hotel Promo</h3>
            </div>
            
            <div class="portfolio-wrapper portfolio-four isotope listhotel" >
            
       		<div class="portfolio-item hoverdir ecofriendly isotope-item boxfix">
           	 	<div class="portfolio-overlay"></div>
                  	<span class="portfolio-single-link" >
                        <span class="news-img-mini" >  <img src="<?php echo IMAGES_DIR;?>/hotel1_l.jpg" alt="The Sunset Bali Hotel">  </span>
                        <strong><a href="#" class="title">The Sunset Bali Hotel</a></strong> <br/>
                        <span class="starsin3">3-Stars Hotel</span><br/>
                        Bali<br/>
                        <span class="redbox">Discount 20%</span><br/>
                        <strong>IDR 650.000,00</strong>    
                    </span>
              </div>
              
              <div class="portfolio-item hoverdir ecofriendly isotope-item boxfix" >
              	<div class="portfolio-overlay">tess</div>
                  <span class="portfolio-single-link" >
                        <span class="news-img-mini" > <img src="<?php echo IMAGES_DIR;?>/hotel2_l.jpg" alt="The Sunset Bali Hotel">  </span>
                        <strong><a href="#" class="title">Favehotel Solo Baru</a></strong> <br/>
                        <span class="starsin2">2-Stars Hotel</span><br/>
                        Solo<br/>
                        <span class="redbox">Discount 20%</span><br/>
                        <strong>IDR 450.000,00</strong>  
                    </span>
                	
              </div>

             <div class="portfolio-item hoverdir ecofriendly isotope-item boxfix">
                <span class="portfolio-single-link" >
                    <span class="news-img-mini" > <img src="<?php echo IMAGES_DIR;?>/hotel3_l.jpg" alt="The Sunset Bali Hotel"></span>
                    <strong><a href="#" class="title">Hotel Kuta Paradiso</a></strong><br/>
                    <span class="starsin5">5-Stars Hotel</span><br/>
                    Bali<br/>
                    <span class="redbox">Discount 20%</span><br/>
                    <strong>IDR 1.450.000,00</strong> 
                </span>
                <div class="portfolio-overlay">tess</div>
              </div>
              
              <div class="portfolio-item hoverdir ecofriendly isotope-item boxfix">
                    <span class="portfolio-single-link" >
                        <span class="news-img-mini" ><img src="<?php echo IMAGES_DIR;?>/hotel3_l.jpg" alt="The Sunset Bali Hotel"></span>
                        <strong><a href="#" class="title">Hotel Kuta Paradiso</a></strong><br/>
                        <span class="starsin5">5-Stars Hotel</span><br/>
                        Bali<br/>
                        <span class="redbox">Discount 20%</span><br/>
                        <strong>IDR 1.450.000,00</strong>
                    </span>
                    <div class="portfolio-overlay">tess</div>
                
              </div>
              
            </div>
          </div> -->
        </div>
        
		<!-- QUERY RESULTS -->
		<div id="result"> </div>
			
        <div>
            <div class="content-title">
            	<h2>Paket Wisata</h2>
            </div>
          
          
            <div class="row-fluid paket-wisata">
                	<div class="span2 hoverdir ecofriendly isotope-item boxfix">
                       	<div class="portfolio-overlay">test</div>
                    	<span class="portfolio-single-link" ><a href="<?php echo base_url();?>index.php/webfront/paketdetailbelitung">
                            <img src="<?php echo IMAGES_DIR;?>/tour1_l.jpg" alt="The Sunset Bali Hotel"></a>
                            <strong><a href="<?php echo base_url();?>index.php/webfront/paketdetailbelitung" class="title">Belitung exploration</a></strong>
                            <p>Mengeksplorasi tanah laskar pelangi. Pulau dengan puluhan destinasi eksotis. Merupakan paket yang amat terjangkau. amat cocok untuk liburan berdurasi pendek</p>
                            <span class="redbox"><a href="<?php echo base_url();?>index.php/webfront/paketdetailbelitung">Mulai dari 750.000</a></span> <br/>
                        </span>
                    </div>
                    
                    <div class="span2 hoverdir ecofriendly isotope-item boxfix">
                    	<div class="portfolio-overlay">test</div>
                        <span class="portfolio-single-link" ><a href="<?php echo base_url();?>index.php/webfront/paketdetailrajaampat">
                            <img src="<?php echo IMAGES_DIR;?>/tour2_l.jpg" alt="The Sunset Bali Hotel"></a>
                            <strong><a href="<?php echo base_url();?>index.php/webfront/paketdetailrajaampat" class="title">Raja Ampat Diving</a></strong>
                            <p>Spot diving terbaik di dunia! Selain menyelam di berbagai spot luar biasa, jelajahi pula berbagai lokasi di Kepala Burung Papua.</p>
                            <span class="redbox"><a href="<?php echo base_url();?>index.php/webfront/paketdetailrajaampat">Mulai dari 15.000.000</a></span> <br/>
                        </span>
                    </div>
                    
                      <div class="span2 hoverdir ecofriendly isotope-item boxfix">
                    	<div class="portfolio-overlay">test</div>
                        <span class="portfolio-single-link" >
                            <img src="<?php echo IMAGES_DIR;?>/tour3_l.jpg" alt="The Sunset Bali Hotel">
                            <strong><a href="#" class="title">Lombok Paradise</a></strong>
                            <p>Pulau Komodo, Gili Trawangan, Kuta-lombok, danau/gunung Kelimutu merupakan perpaduan destinasi yang beragam dalam satu paket yang luar biasa.</p>
                            <span class="redbox">Mulai dari 750.000</span> <br/>
                        </span>
                    </div>
                    
                    <div class="span2 hoverdir ecofriendly isotope-item boxfix">
                    	<div class="portfolio-overlay">test</div>
                        <span class="portfolio-single-link" >
                            <img src="<?php echo IMAGES_DIR;?>/tour4_l.jpg" alt="The Sunset Bali Hotel">
                            <strong><a href="#" class="title">Tur Eropa</a></strong>
                            <p>London - Paris - Barcelona. Segitiga surga wisata eropa, nikmati dalam satu paket perjalanan satu minggu yang amat berkesan.</p>
                            <span class="redbox">Mulai dari USD1500</span> <br/>
                        </span>
                    </div>
                    
                    <div class="span2 hoverdir ecofriendly isotope-item boxfix">
                    	<div class="portfolio-overlay">test</div>
                        <span class="portfolio-single-link" >
                            <img src="<?php echo IMAGES_DIR;?>/tour5_l.jpg" alt="The Sunset Bali Hotel">
                            <strong><a href="#" class="title">Umrah &amp; Ziarah Islam</a></strong>
                            <p>Paket ibadah umroh dipadu dengan ziarah di berbagai tempat yang disebutkan dalam Al Qur'an, Hadist dan sejarah peradaban Islam. </p>
                            <span class="redbox">Mulai dari 12.500.000</span> <br/>
                        </span>
                    </div>
                    
                    <div class="span2 hoverdir ecofriendly isotope-item boxfix">
                    	<div class="portfolio-overlay">test</div>
                        <span class="portfolio-single-link" >
                            <img src="<?php echo IMAGES_DIR;?>/tour6_l.jpg" alt="The Sunset Bali Hotel">
                            <strong><a href="#" class="title">Tur China</a></strong>
                            <p>Tembok Besar, Kota Terlarang, kebun binatang panda, dan berbagai tujuan wisata yang menarik dipaket dalam tour selama lima hari.</p>
                            <span class="redbox">Mulai dari 7.500.000</span> <br/>
                        </span>
                    </div>
            
            
          </div>
        </div>
     </div>
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
 <div class="container" style="margin-top:20px;">       
     <!--   <div class="span12" style="height:100px;">-->
        <div class="inner untb">
          
           <div id="follow" class="text-align-center" style="background:#fff; padding:20px 0; border-bottom:1px solid #ddd;">
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/kai.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/airasia.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/batavia.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/citylink.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/garuda.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/kalstar.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/merpati.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/sky.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/sriwijaya.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/trigana.jpg"/>
            <img src="<?php echo IMAGES_DIR;?>/logomaskapai/lion.jpg"/>
          </div>
          <div class="heading_border"></div>
          
          <div class="row-fluid" style="margin:20px 0;">
          
              <div class="span6 payment">
                  <div id="follow" class="text-align-center" style="background:#fff; padding:5px; border:0px solid #ddd;">
                    <img src="<?php echo IMAGES_DIR;?>/member/asita.jpg" style="width:50px; margin-right:5px;"/>
            		<img src="<?php echo IMAGES_DIR;?>/member/iata.jpg" style="width:50px; margin-right:5px;"/>
                    <img src="<?php echo IMAGES_DIR;?>/member/angkasapura.jpg" style="width:130px; margin-right:5px;"/>
  					<img src="<?php echo IMAGES_DIR;?>/member/fastpay.jpg" style="width:130px; margin-right:5px;"/>
                  </div>
          	   </div>
          
              <div class="span6 payment">
                  <div id="follow" class="text-align-center" style="background:#fff; padding:8px 5px; border:0px solid #ddd;">
                   	<img src="<?php echo IMAGES_DIR;?>/payment/mandiri.jpg" style="width:100px"/>
            		<img src="<?php echo IMAGES_DIR;?>/payment/bca.jpg" style="width:90px"/>
                    <img src="<?php echo IMAGES_DIR;?>/payment/mastercard.jpg" style="width:60px"/>
            		<img src="<?php echo IMAGES_DIR;?>/payment/visa.jpg" style="width:70px"/>
                    <img src="<?php echo IMAGES_DIR;?>/payment/paypal.jpg" style="width:100px"/>
                  </div>
              </div>
              
          </div>
          
      </div>
    <!-- /inner--> 
  </div>
<!--  xxxxxxxxxxxxxxxxxxxxxxxxx-->
 

  
    </div>
<script>
	$( window ).load(function() {
		load_all_airport('<?php echo base_url();?>index.php/flight/get_all_airport', "#flight-from");
		load_all_airport('<?php echo base_url();?>index.php/flight/get_all_airport', "#flight-to");
		
		load_all_station('<?php echo base_url();?>index.php/train/get_all_station', "#train-from");
		load_all_station('<?php echo base_url();?>index.php/train/get_all_station', "#train-to");
	});
	
	$(document).ready(function() {
		/*search flights*/
		$('#submit-flight').click(function(event) {
			$('#result').empty();
			$('#result').append('<h4>Hasil Pencarian Data Pesawat (Urutan dari harga termurah), '+document.getElementById('flight-from').value+'-'+document.getElementById('flight-to').value+' Tanggal Berangkat: '+document.getElementById('departing').value+'</h4>');
			var form = $('#flight-form').serialize();
			event.preventDefault();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/flight/search_flights',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
						if(data==''){
							$('#result').append('<p>Maaf, data tidak ada untuk rute ini.<p>');
						}
						else{
							if(data.items[0].diagnostic.status=="200"){
								var div = $("#result");
								var table = document.createElement('table');
								var thead = document.createElement('thead');
								var tr_head = document.createElement('tr');
								tr_head.appendChild(set_td_data('th', 'Maskapai'));
								tr_head.appendChild(set_td_data('th', 'Kode Penerbangan'));
								tr_head.appendChild(set_td_data('th', 'Rute & Jam'));
								tr_head.appendChild(set_td_data('th', 'Harga'));
								tr_head.appendChild(set_td_data('th', 'Pesan'));
								table.appendChild(tr_head);
								
								var tbody = document.createElement('tbody');
								
								
								for(var i=0; i<data.items[0].departures.result.length;i++){
									var tr_body = document.createElement('tr');
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].airlines_name));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].flight_number));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].full_via));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].price_value));
									
									var el_td = document.createElement('td');
									var link_order = document.createElement('a');
									var str = document.createTextNode('Pesan');
									link_order.appendChild(str);
									link_order.setAttribute('href', '<?php echo base_url();?>index.php/order/order_page/flight/'+data.items[0].departures.result[i].flight_id+'/'+data.items[0].search_queries.date);
									link_order.setAttribute('class', 'border-order');
									el_td.appendChild(link_order);
									tr_body.appendChild(el_td);
									
									table.appendChild(tr_body);
									
								}
								
								div.append(table);
							}
							else {
								$('#result').append('<p style="color:red">'+data.items[0].diagnostic.error_msgs+'</p>');
							}
						}
					}
			})
		});
		/*search trains*/
		$('#submit-train').click(function(event) {
			$('#result').empty();
			$('#result').append('<h4>Hasil Pencarian Data Kereta Api, '+document.getElementById('train-from').value+'-'+document.getElementById('train-to').value+' Tanggal Berangkat: '+document.getElementById('train-pergi').value+'</h4>');
			var form = $('#train-form').serialize();
			event.preventDefault();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/train/search_trains',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
						if(data==''){
							$('#result').append('<p>Maaf, data tidak ada untuk rute ini.<p>');
						}
						else{
							if(data.items[0].diagnostic.status=="200"){
								var div = $("#result");
								var table = document.createElement('table');
								var thead = document.createElement('thead');
								var tr_head = document.createElement('tr');
								tr_head.appendChild(set_td_data('th', 'Kereta Api (Kelas)'));
								tr_head.appendChild(set_td_data('th', 'Kursi Tersedia'));
								tr_head.appendChild(set_td_data('th', 'Pergi'));
								tr_head.appendChild(set_td_data('th', 'Tiba'));
								tr_head.appendChild(set_td_data('th', 'Durasi'));
								tr_head.appendChild(set_td_data('th', 'Harga'));
								tr_head.appendChild(set_td_data('th', 'Pesan'));
								table.appendChild(tr_head);
								
								var tbody = document.createElement('tbody');
								
								
								for(var i=0; i<data.items[0].departures.result.length;i++){
									var kelas = data.items[0].departures.result[i].class_name;
									
									var tr_body = document.createElement('tr');
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].train_name+' ('+kelas.toUpperCase()+', subclass: '+data.items[0].departures.result[i].subclass_name+')'));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].detail_availability));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].departure_time));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].arrival_time));
									tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].duration));
									
									var td1 = document.createElement('td');
									var p1 = document.createElement('p');
									p1.appendChild(document.createTextNode('Dewasa: '+data.items[0].departures.result[i].price_adult));
									td1.appendChild(p1);
									
									var p2 = document.createElement('p');
									p2.appendChild(document.createTextNode('Anak(3-9thn): '+data.items[0].departures.result[i].price_child));
									td1.appendChild(p2);
									
									var p3 = document.createElement('p');
									p3.appendChild(document.createTextNode('Bayi: '+data.items[0].departures.result[i].price_infant));
									td1.appendChild(p3);
									
									tr_body.appendChild(td1);
									
									var el_td = document.createElement('td');
									var link_order = document.createElement('a');
									var str = document.createTextNode('Pesan');
									link_order.appendChild(str);
									link_order.setAttribute('href', '<?php echo base_url();?>index.php/order/order_page/train/'+data.items[0].departures.result[i].schedule_id+'/'+data.items[0].search_queries.date+'/'+document.getElementById('train-from').value+'/'+document.getElementById('train-to').value+'/'+document.getElementById('adult').value+'/'+document.getElementById('child').value+'/'+document.getElementById('infant').value);
									link_order.setAttribute('class', 'border-order');
									el_td.appendChild(link_order);
									tr_body.appendChild(el_td);
									
									table.appendChild(tr_body);
								}
								
								div.append(table);
							}
							else {
								$('#result').append('<p style="color:red">'+data.items[0].diagnostic.error_msgs+'</p>');
							}
						}
					}
			})
		});
		
		$('#submit-hotel').click(function(event) {
				$('#result').empty();
				$('#result').append('<h3 class="thin underline">Hasil Pencarian Data Hotel, '+document.getElementById('checkin').value+'-'+document.getElementById('checkout').value+' Kamar:'+document.getElementById('kamar').value+' Dewasa:'+document.getElementById('hotel-dewasa').value+' Anak:'+document.getElementById('hotel-anak').value+'</h3>');
				var form = $('#hotel-form').serialize();
				event.preventDefault();
				$.ajax({
					type : "GET",
					url: '<?php echo base_url();?>index.php/hotel/search_hotels',
					data: form,
					cache: false,
					dataType: "json",
					success:function(data){
							if(data==''){
								$('#result').append('<p>Maaf, data tidak ada untuk rute ini.<p>');
							}
							else{
								if(data.items[0].diagnostic.status=="200"){
									var div = $("#result");
									var table = document.createElement('table');
									var tbody = document.createElement('tbody');
									for(var i=0; i<data.items[0].results.result.length;i++){
										var tr_body = document.createElement('tr');
										
										var td1 = document.createElement('td');
										var img = document.createElement('img');
										var path = data.items[0].results.result[i].photo_primary;
										img.src = path.replace(/\\/g, '')
										img.setAttribute('width', '120px');
										img.setAttribute('height', '100px');
										td1.appendChild(img);
										var p1 = document.createElement('p');
										p1.appendChild(document.createTextNode(data.items[0].results.result[i].name));
										td1.appendChild(p1);
										var p2 = document.createElement('p');
										p2.appendChild(document.createTextNode(data.items[0].results.result[i].address));
										td1.appendChild(p2);
										
										var td2 = document.createElement('td');
										td2.setAttribute('width', '250px');
										var p3 = document.createElement('p');
										p3.appendChild(document.createTextNode('Harga: '+data.items[0].results.result[i].price));
										td2.appendChild(p3);
										var p4 = document.createElement('p');
										p4.appendChild(document.createTextNode('Kamar Tersedia: '+data.items[0].results.result[i].room_available));
										td2.appendChild(p4);
										var p6 = document.createElement('p');
										p6.appendChild(document.createTextNode('Bintang : '+data.items[0].results.result[i].star_rating));
										td2.appendChild(p6);
										var p7 = document.createElement('p');
										p7.appendChild(document.createTextNode('Rating Pelanggan: '+data.items[0].results.result[i].rating+'/10'));
										td2.appendChild(p7);
										var p5 = document.createElement('p');
										p5.appendChild(document.createTextNode('Fasilitas: '+data.items[0].results.result[i].room_facility_name));
										td2.appendChild(p5);
										
										tr_body.appendChild(td1);
										tr_body.appendChild(td2);
										
										var el_td = document.createElement('td');
										var link_order = document.createElement('a');
										var str = document.createTextNode('Pesan');
										link_order.appendChild(str);
										link_order.setAttribute('href', '<?php echo base_url();?>index.php/order/order_page/hotel/'+data.items[0].results.result[i].id+'/'+document.getElementById('query').value+'/'+document.getElementById('checkin').value+'/'+document.getElementById('checkout').value+'/'+document.getElementById('kamar').value+'/'+document.getElementById('hotel-dewasa').value+'/'+document.getElementById('hotel-anak').value+'/'+document.getElementById('malam').value);
										link_order.setAttribute('class', 'border-order');
										el_td.appendChild(link_order);
										tr_body.appendChild(el_td);
										
										table.appendChild(tr_body);
									}
									
									div.append(table);
								}
								
							}
						}
				})
			});
	});
</script>

