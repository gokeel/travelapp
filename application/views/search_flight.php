	<script>
		$(function() {
			$( "#flight-pergi" ).datepicker({"dateFormat": "yy-mm-dd"});
			$( "#flight-pulang" ).datepicker({"dateFormat": "yy-mm-dd"});
		});
	</script>
	<div class="main fullwidth">
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div class="formcekin" style="background:#CCC; padding:8px 5px 0 5px; ">
				<form name="form-tiket-pesawat" id="form-tiket-pesawat">
					<!--<div style="font-size:12px; padding:4px 0 10px;"><input type="radio" class="radio" name="trip" value="oneway"> Sekali Jalan &nbsp;&nbsp;<input type="radio" name="trip" value="twooway"> Pulang Pergi</div>-->
					<span>Dari</span>
					<select data-placeholder="Choose flight from" name="dari" id="flight_from" style="width:163px"></select>
					<span>Ke</span>
                    <select data-placeholder="Choose flight to" name="ke" id="flight_to" style="width:163px" ></select>
					<span>Pergi :</span><input type="text"  id="flight-pergi" name="flight-pergi" value="" style="width:100px;"/>
					<span>Pulang :</span><input type="text"  id="flight-pulang" name="flight-pulang" value="" style="width:100px;"/>
					<span>Dewasa :</span><input type="text"  id="dewasa" name="dewasa" value="" style="width:30px;"/>
					<span>Anak :</span><input type="text"  id="anak" name="anak" value="" style="width:30px;"/>
					<span>Bayi :</span><input type="text"  id="bayi" name="bayi" value="" style="width:30px;"/>
					<input type="submit" class="button cari-hotel" id="submitH" value="Cari Pesawat" tabindex="8" style="margin:-7px 0 0 5px;" >
				</form>
				</div>
			</div>
		</section>
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div style="background:#CCC; padding:8px 5px 0 5px; ">
					<div id="result"> </div>
				</div>
			</div>
		</section>
	</div>
	
<script>
	
	
	$( window ).load(function() {
		load_all_airport('<?php echo base_url();?>index.php/flight/get_all_airport', "#flight_from");
		load_all_airport('<?php echo base_url();?>index.php/flight/get_all_airport', "#flight_to");
	});
	
	$(document).ready(function() {
		$('#submitH').click(function(event) {
			$('#result').empty();
			$('#result').append('<h4>Hasil Pencarian Data, '+document.getElementById('flight-from').value+'-'+document.getElementById('flight-to').value+' Tanggal Berangkat: '+document.getElementById('flight-pergi').value+'</h4>');
			var form = $('#form-tiket-pesawat').serialize();
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
								link_order.setAttribute('href', '<?php echo base_url();?>index.php/order/staging_order/'+data.items[0].departures.result[i].flight_id);
								link_order.setAttribute('class', 'border-order');
								el_td.appendChild(link_order);
								tr_body.appendChild(el_td);
								
								table.appendChild(tr_body);
							}
							
							div.append(table);
						}
					}
			})
		});
	});
</script>