	<script>
		$(function() {
			$( "#train-pergi" ).datepicker({"dateFormat": "yy-mm-dd"});
			$( "#train-pulang" ).datepicker({"dateFormat": "yy-mm-dd"});
		});
	</script>
	<div class="main fullwidth">
		<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
			<div class="container">
				<div class="formcekin" style="background:#CCC; padding:8px 5px 0 5px; ">
				<form name="form-tiket-kereta" id="form-tiket-kereta">
					<!--<div style="font-size:12px; padding:4px 0 10px;"><input type="radio" class="radio" name="trip" value="oneway"> Sekali Jalan &nbsp;&nbsp;<input type="radio" name="trip" value="twooway"> Pulang Pergi</div>-->
					<span>Dari</span>
					<select data-placeholder="Choose train from" name="dari" id="train-from" style="width:163px"></select>
					<span>Ke</span>
                    <select data-placeholder="Choose train to" name="ke" id="train-to" style="width:163px" ></select>
					<span>Pergi :</span><input type="text"  id="train-pergi" name="train-pergi" value="" style="width:100px;"/>
					<span>Pulang :</span><input type="text"  id="train-pulang" name="train-pulang" value="" style="width:100px;"/>
					<span>Dewasa :</span><input type="text"  id="dewasa" name="dewasa" value="" style="width:30px;"/>
					<span>Anak :</span><input type="text"  id="anak" name="anak" value="" style="width:30px;"/>
					<span>Bayi :</span><input type="text"  id="bayi" name="bayi" value="" style="width:30px;"/>
					<input type="submit" class="button cari-hotel" id="submit-train" value="Cari kereta" tabindex="8" style="margin:-7px 0 0 5px;" >
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
		load_all_station('<?php echo base_url();?>index.php/train/get_all_station', "#train-from");
		load_all_station('<?php echo base_url();?>index.php/train/get_all_station', "#train-to");
	});
	
	$(document).ready(function() {
		$('#submit-train').click(function(event) {
			$('#result').empty();
			$('#result').append('<h4>Hasil Pencarian Data Kereta Api, '+document.getElementById('train-from').value+'-'+document.getElementById('train-to').value+' Tanggal Berangkat: '+document.getElementById('train-pergi').value+'</h4>');
			var form = $('#form-tiket-kereta').serialize();
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
							var div = $("#result");
							var table = document.createElement('table');
							var thead = document.createElement('thead');
							var tr_head = document.createElement('tr');
							tr_head.appendChild(set_td_data('th', 'Kereta Api (Kelas)'));
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
								tr_body.appendChild(set_td_data('td', data.items[0].departures.result[i].train_name+' ('+kelas.toUpperCase()+')'));
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
								link_order.setAttribute('href', '<?php echo base_url();?>index.php/order/staging_order/'+data.items[0].departures.result[i].schedule_id);
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