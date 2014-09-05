<?php
	$uri3 = $this->uri->segment(3);
	$uri4 = $this->uri->segment(4);
	$uri5 = $this->uri->segment(5);
?>
<div class="main fullwidth">
	<form id="form-order" name="form-order" method="post" action="<?php 
	if ($uri3=='flight') echo base_url('index.php/order/add_flight_order');
	else if ($uri3=='train') echo base_url('index.php/order/add_train_order');
	else if ($uri3=='hotel') echo base_url('index.php/order/add_hotel_order');
	?>">
		<input type="hidden" name="id" value="<?php echo $uri4;?>">
		<input type="hidden" name="departing_date" value="<?php echo $uri5;?>">
		
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div class="formcekin" style="background:#CCC; padding:8px 5px 0 5px; ">
					<h3 class="thin underline">Detil <?php if($uri3=='flight') echo 'Penerbangan'; elseif($uri3=='train') echo 'Kereta Api';elseif($uri3=='hotel') echo 'Hotel';?></h3>
					<div id="detail"></div>
				</div>
			</div>
		</section>
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div style="background:#CCC; padding:8px 5px 0 5px; ">
					<h3 class="thin underline">Data Pemesan</h3>
					<div id="pemesan" ></div>
				</div>
			</div>
		</section>
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div style="background:#CCC; padding:8px 5px 0 5px; ">
					<h3 class="thin underline">Data Penumpang Dewasa</h3>
					<div id="passenger-adult" ></div>
				</div>
			</div>
		</section>
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div style="background:#CCC; padding:8px 5px 0 5px; ">
					<h3 class="thin underline">Data Penumpang Anak</h3>
					<div id="passenger-child" ></div>
				</div>
			</div>
		</section>
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div style="background:#CCC; padding:8px 5px 0 5px; ">
					<h3 class="thin underline">Data Penumpang Bayi</h3>
					<div id="passenger-infant" ></div>
				</div>
			</div>
		</section>
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
					
					<input type="submit" name="submit" class="button cari-btn" id="submit-<?php if($uri3=='flight') echo 'flight'; elseif($uri3=='train') echo 'train';elseif($uri3=='hotel') echo 'hotel';?>" value="Submit" tabindex="8" style="float:left;" />
				
			</div>
		</section>
		
	</form>
</div>

<script>
	function get_detail_flight(){
		$.ajax({
			type : "GET",
			url: "<?php echo base_url('index.php/flight/get_flight_data/'.$uri4.'/'.$uri5);?>",
			//async: false,
			dataType: "json",
			success:function(data){
				var total_price_adult = data.items[0].departures.count_adult * data.items[0].departures.price_adult;
				var total_price_child = data.items[0].departures.count_child * data.items[0].departures.price_child;
				var total_price_infant = data.items[0].departures.count_infant * data.items[0].departures.price_infant;
				var total_price = total_price_adult + total_price_child + total_price_infant;
				$('#detail').empty();
				/*create input contains data*/
				$('#detail').append('\
				<input type="hidden" name="airlines_name" value="'+data.items[0].departures.airlines_name+'">\
				<input type="hidden" name="time_travel" value="'+data.items[0].departures.simple_departure_time+'-'+data.items[0].departures.simple_arrival_time+'">\
				<input type="hidden" name="route" value="'+data.items[0].departures.flight_infos.flight_info[0].departure_city+'-'+data.items[0].departures.flight_infos.flight_info[0].arrival_city+'">\
				<input type="hidden" name="total_price" value="'+total_price+'">\
				<input type="hidden" name="price_adult" value="'+data.items[0].departures.price_adult+'">\
				<input type="hidden" name="price_child" value="'+data.items[0].departures.price_child+'">\
				<input type="hidden" name="price_infant" value="'+data.items[0].departures.price_infant+'">\
				<input type="hidden" name="tot_adult" value="'+data.items[0].departures.count_adult+'">\
				<input type="hidden" name="tot_child" value="'+data.items[0].departures.count_child+'">\
				<input type="hidden" name="tot_infant" value="'+data.items[0].departures.count_infant+'">\
				');
				/*fetch data*/
				$('#detail').append('\
					<table>\
						<tr>\
							<td><p><strong>'+data.items[0].departures.airlines_name+' '+data.items[0].departures.flight_number+'</strong></p>\
								<p>Tanggal: <?php echo $uri5;?></p>\
								<p>Departure-Arrival: '+data.items[0].departures.full_via+'</p>\
							</td>\
							<td>\
							<p>Rincian Harga:</p>\
								<ul style="list-style-type:square; margin-left: 20px;">\
								<li>Dewasa: '+data.items[0].departures.count_adult+' x '+data.items[0].departures.price_adult+' = '+total_price_adult+'</li>\
								<li>Anak: '+data.items[0].departures.count_child+' x '+data.items[0].departures.price_child+' = '+total_price_child+'</li>\
								<li>Bayi: '+data.items[0].departures.count_infant+' x '+data.items[0].departures.price_infant+' = '+total_price_infant+'</li>\
								</ul>\
							<p>Total harus dibayar: IDR <strong>'+total_price+'</strong></p>\
							</td>\
						</tr>\
					</table>');
				create_form('#pemesan', 1, 'con', 0);
				create_form('#passenger-adult', data.items[0].departures.count_adult, 'a', 0);
				create_form('#passenger-child', data.items[0].departures.count_child, 'c', 0);
				create_form('#passenger-infant', data.items[0].departures.count_infant, 'i', data.items[0].departures.count_adult);
			}
		});
	};
	function get_detail_train(){
		<?php
			$train_id = $this->uri->segment(4);
			echo 'var train_id = "'.$train_id.'";';
			$departure_date = $this->uri->segment(5);
			echo 'var departure = "'.$departure_date.'";';
			$from = $this->uri->segment(6);
			echo 'var from = "'.$from.'";';
			$to = $this->uri->segment(7);
			echo 'var to = "'.$to.'";';
			$adult = $this->uri->segment(8);
			echo 'var adult = "'.$adult.'";';
			$child = $this->uri->segment(9);
			echo 'var child = "'.$child.'";';
			$infant = $this->uri->segment(10);
			echo 'var infant = "'.$infant.'";';
			$request = 'dari='.$from.'&ke='.$to.'&train-pergi='.$departure_date.'&dewasa='.$adult.'&anak='.$child.'&bayi='.$infant;
			echo 'var train_id = "'.$train_id.'";';
		?>
		$.ajax({
			type : "GET",
			url: "<?php echo base_url('index.php/train/search_trains');?>",
			data: "<?php echo $request;?>",
			cache: false,
			dataType: "json",
			success:function(data){
				for(var i=0; i<data.items[0].departures.result.length;i++){
					if (train_id == data.items[0].departures.result[i].schedule_id){
						var total_price_adult = adult * data.items[0].departures.result[i].price_adult;
						var total_price_child = child * data.items[0].departures.result[i].price_child;
						var total_price_infant = infant * data.items[0].departures.result[i].price_infant;
						var total_price = total_price_adult + total_price_child + total_price_infant;
						$('#detail').empty();
						/*create input contains data*/
						$('#detail').append('\
						<input type="hidden" name="train_id" value="'+data.items[0].departures.result[i].train_id+'">\
						<input type="hidden" name="train_name" value="'+data.items[0].departures.result[i].train_name+'">\
						<input type="hidden" name="class" value="'+data.items[0].departures.result[i].class_name+'">\
						<input type="hidden" name="subclass" value="'+data.items[0].departures.result[i].subclass_name+'">\
						<input type="hidden" name="time_travel" value="'+data.items[0].departures.result[i].departure_time+'-'+data.items[0].departures.result[i].arrival_time+'">\
						<input type="hidden" name="route" value="'+data.items[0].search_queries.dep_station+'-'+data.items[0].search_queries.arr_station+'">\
						<input type="hidden" name="total_price" value="'+total_price+'">\
						<input type="hidden" name="price_adult" value="'+data.items[0].departures.result[i].price_adult+'">\
						<input type="hidden" name="price_child" value="'+data.items[0].departures.result[i].price_child+'">\
						<input type="hidden" name="price_infant" value="'+data.items[0].departures.result[i].price_infant+'">\
						<input type="hidden" name="tot_adult" value="'+adult+'">\
						<input type="hidden" name="tot_child" value="'+child+'">\
						<input type="hidden" name="tot_infant" value="'+infant+'">\
						');
						/*fetch data*/
						$('#detail').append('\
							<table>\
								<tr>\
									<td><p><strong>'+data.items[0].departures.result[i].train_name+' (subclass: '+data.items[0].departures.result[i].subclass_name+')</strong></p>\
										<p>Tanggal: <?php echo $uri5;?></p>\
										<p>Departure-Arrival: '+data.items[0].departures.result[i].departure_time+'-'+data.items[0].departures.result[i].arrival_time+'</p>\
									</td>\
									<td>\
									<p>Rincian Harga:</p>\
										<ul style="list-style-type:square; margin-left: 20px;">\
										<li>Dewasa: '+adult+' x '+data.items[0].departures.result[i].price_adult+' = '+total_price_adult+'</li>\
										<li>Anak: '+child+' x '+data.items[0].departures.result[i].price_child+' = '+total_price_child+'</li>\
										<li>Bayi: '+infant+' x '+data.items[0].departures.result[i].price_infant+' = '+total_price_infant+'</li>\
										</ul>\
									<p>Total harus dibayar: IDR <strong>'+total_price+'</strong></p>\
									</td>\
								</tr>\
							</table>');
						create_form('#pemesan', 1, 'con', 0);
						create_form('#passenger-adult', adult, 'a', 0);
						create_form('#passenger-child', child, 'c', 0);
						create_form('#passenger-infant', infant, 'i', adult);
					}
				}
			}
		});
	};
	function get_detail_hotel(){
		<?php
			$hotel_id = $this->uri->segment(4);
			echo 'var hotel_id = "'.$hotel_id.'";';
			$query = $this->uri->segment(5);
			echo 'var query = "'.$query.'";';
			$checkin = $this->uri->segment(6);
			echo 'var checkin = "'.$checkin.'";';
			$checkout = $this->uri->segment(7);
			echo 'var checkout = "'.$checkout.'";';
			$room = $this->uri->segment(8);
			echo 'var room = "'.$room.'";';
			$adult = $this->uri->segment(9);
			echo 'var adult = "'.$adult.'";';
			$child = $this->uri->segment(10);
			echo 'var child = "'.$child.'";';
			$night = $this->uri->segment(11);
			echo 'var night = "'.$night.'";';
			$request = 'id='.$hotel_id.'&query='.$query.'&checkin='.$checkin.'&checkout='.$checkout.'&room='.$room.'&dewasa='.$adult.'&anak='.$child.'&night='.$night;
		?>
		$.ajax({
			type : "GET",
			url: "<?php echo base_url('index.php/hotel/search_hotels');?>",
			data: "<?php echo $request;?>",
			cache: false,
			dataType: "json",
			success:function(data){
				for(var i=0; i<data.items[0].results.result.length;i++){
					if (hotel_id == data.items[0].results.result[i].id){
						$('#detail').empty();
						/*create input contains data*/
						$('#detail').append('\
						<input type="hidden" name="hotel_id" value="'+data.items[0].results.result[i].id+'">\
						<input type="hidden" name="hotel_name" value="'+data.items[0].results.result[i].name+'">\
						<input type="hidden" name="hotel_address" value="'+data.items[0].results.result[i].address+'">\
						<input type="hidden" name="regional" value="'+data.items[0].results.result[i].regional+'">\
						<input type="hidden" name="checkin" value="'+checkin+'">\
						<input type="hidden" name="checkout" value="'+checkout+'">\
						<input type="hidden" name="room" value="'+room+'">\
						<input type="hidden" name="price" value="'+data.items[0].results.result[i].price+'">\
						<input type="hidden" name="tot_adult" value="'+adult+'">\
						<input type="hidden" name="night" value="'+night+'">\
						');
						/*fetch data*/
						$('#detail').append('\
							<table>\
								<tr>\
									<td><p><strong>'+data.items[0].results.result[i].name+'</strong></p>\
										<p>Checkin - Checkout: '+checkin+' - '+checkout+'</p>\
									</td>\
									<td>\
									<p>Kamar: '+room+'</p>\
									<p>Dewasa: '+adult+'</p>\
									<p>Anak: '+child+'</p>\
									<p>Total harus dibayar: IDR <strong>'+data.items[0].results.result[i].price+'</strong></p>\
									</td>\
								</tr>\
							</table>');
						create_form('#pemesan', 1, 'con', 0);
						create_form('#passenger-adult', 1, 'a', 0);
					}
				}
			}
		});
	};
	
	function create_form(el_div, n, who, tot_adult){
		var div = $(el_div);
		if (n>0){
			for (var i=0; i<n; i++){
				idx = i + 1;
				if (who=='con'){
					$(el_div).append('<fieldset style="border: 1px dotted;margin-top: 10px;">\
						<table>\
							<tr>\
								<td>Titel</td>\
								<td><select id="conSalutation" type="text" name="conSalutation"><option value="Mr">Tuan</option><option value="Mrs">Nyonya</option><option value="Ms">Nona</option></select></td>\
								<td>ID Card(KTP/SIM/Kartu Pelajar)</td>\
								<td><input type="text" name="conid"></td>\
							</tr>\
							<tr>\
								<td>Nama Depan</td>\
								<td><input type="text" name="conFirstName"></td>\
								<td>Nama Belakang</td>\
								<td><input type="text" name="conLastName"></td>\
							</tr>\
							<tr>\
								<td>Email</td>\
								<td><input type="text" name="conEmailAddress"></td>\
								<td>Telepon/HP 1</td>\
								<td><input type="text" name="conPhone"></td>\
							</tr>\
						</table>\
						\
						</fieldset>');
				}
				else if(who=='a'){
					$(el_div).append('<fieldset style="border: 1px dotted;margin-top: 10px;">\
						<legend>Penumpang Dewasa '+idx+'</legend>\
						<table>\
							<tr>\
								<td>Titel</td>\
								<td><select id="titlea'+idx+'" type="text" name="titlea'+idx+'"><option value="Mr">Tuan</option><option value="Mrs">Nyonya</option><option value="Ms">Nona</option></select></td>\
								<td>ID Card(KTP/SIM/Kartu Pelajar)</td>\
								<td><input type="text" name="ida'+idx+'"></td>\
							</tr>\
							<tr>\
								<td>Nama Depan</td>\
								<td><input type="text" name="firstnamea'+idx+'"></td>\
								<td>Nama Belakang</td>\
								<td><input type="text" name="lastnamea'+idx+'"></td>\
							</tr>\
							<tr>\
								<td>Tanggal Lahir (Format: YYYY-MM-DD)</td>\
								<td><input type="text" name="birthdatea'+idx+'" id="birthdatea'+idx+'"></td>\
								<td>Telepon/HP 1</td>\
								<td><input type="text" name="phonea'+idx+'"></td>\
							</tr>\
						</table>\
						\
						</fieldset>');
					$(function() {
						$( "#birthdatea"+idx ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				}
				else if(who=='c'){
					$(el_div).append('<fieldset style="border: 1px dotted;margin-top: 10px;">\
						<legend>Penumpang Anak '+idx+'</legend>\
						<table>\
							<tr>\
								<td>Titel</td>\
								<td><select id="titlec'+idx+'" type="text" name="titlec'+idx+'"><option value="Mstr">Tuan</option><option value="Miss">Nona</option></select></td>\
								<td>ID Card(KTP/SIM/Kartu Pelajar)</td>\
								<td><input type="text" name="idc'+idx+'"></td>\
							</tr>\
							<tr>\
								<td>Nama Depan</td>\
								<td><input type="text" name="firstnamec'+idx+'"></td>\
								<td>Nama Belakang</td>\
								<td><input type="text" name="lastnamec'+idx+'"></td>\
							</tr>\
							<tr>\
								<td>Tanggal Lahir (Format: YYYY-MM-DD)</td>\
								<td><input type="text" name="birthdatec'+idx+'" id="birthdatec'+idx+'"></td>\
								<td></td>\
								<td></td>\
							</tr>\
						</table>\
						\
						</fieldset>');
					$(function() {
						$( "#birthdatec"+idx ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				}
				else if(who=='i'){
					$(el_div).append('<fieldset style="border: 1px dotted;margin-top: 10px;">\
						<legend>Penumpang Bayi '+idx+'</legend>\
						<table>\
							<tr>\
								<td>Titel</td>\
								<td><select id="titlei'+idx+'" type="text" name="titlei'+idx+'"><option value="Mstr">Tuan</option><option value="Miss">Nona</option></select></td>\
								<td>Orang Tua</td>\
								<td><select id="parenti'+idx+'" name="parenti'+idx+'">'+create_opt_parents(tot_adult)+'</select></td>\
							</tr>\
							<tr>\
								<td>Nama Depan</td>\
								<td><input type="text" name="firstnamei'+idx+'"></td>\
								<td>Nama Belakang</td>\
								<td><input type="text" name="lastnamei'+idx+'"></td>\
							</tr>\
							<tr>\
								<td>Tanggal Lahir (Format: YYYY-MM-DD)</td>\
								<td><input type="text" name="birthdatei'+idx+'" id="birthdatei'+idx+'"></td>\
								<td></td>\
								<td></td>\
							</tr>\
						</table>\
						\
						</fieldset>');
					$(function() {
						$( "#birthdatei"+idx ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				}
				
			}
		}
	}
	
	$( window ).load(function() {
		<?php
			if ($uri3=='flight')
				echo 'get_detail_flight()';
			else if ($uri3 == 'train')
				echo 'get_detail_train()';
			else if ($uri3 == 'hotel')
				echo 'get_detail_hotel()';
		?>
	});
	
	function create_opt_parents(tot_adult){
		var str = '';
		for (var i=0; i<tot_adult; i++){
			idx = i+1;
			str = str + '<option value="'+idx+'">Dewasa '+idx+'</option>';
		}
		return str;
	}
	
</script>