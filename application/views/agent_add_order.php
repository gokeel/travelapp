<?php
	$uri3 = $this->uri->segment(3);
	$uri4 = $this->uri->segment(4);
	$uri5 = $this->uri->segment(5);
?>
<section role="main" id="main"><!--tpl:web/dasboard-->
<!-- Main content -->

	<noscript class="message black-gradient simpler">
		Your browser does not support JavaScript! Some features won't work as expected...
	</noscript>
	<hgroup id="main-title" class="thin">
		<h1 style="color:white">Form Pemesanan Tiket</h1>
	</hgroup>
	<form id="form-order" name="form-order">
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<p> </p>
				<h3 class="thin underline">Detil <?php if($uri3=='flight') echo 'Penerbangan'; elseif($uri3=='train') echo 'Kereta Api';elseif($uri3=='hotel') echo 'Hotel';?></h3>
				<div id="detail"></div>
				<p></p>
			</div>
		</div>
		<div style="clear:both;"></div>  
		
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<p> </p>
				<h3 class="thin underline">Data Pemesan</h3>
				<div id="pemesan" ></div>
				<p></p>
			</div>
		</div>
		<div style="clear:both;"></div> 
		
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<p> </p>
				<h3 class="thin underline">Data Penumpang Dewasa</h3>
				<div id="passenger-adult" ></div>
				<p></p>
			</div>
		</div>
		<div style="clear:both;"></div> 
		
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<p> </p>
				<h3 class="thin underline">Data Penumpang Anak</h3>
				<div id="passenger-child" ></div>
				<p></p>
			</div>
		</div>
		<div style="clear:both;"></div> 
		
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<p> </p>
				<h3 class="thin underline">Data Penumpang Bayi</h3>
				<div id="passenger-infant" ></div>
				<p></p>
			</div>
		</div>
		<div style="clear:both;"></div> 
	</form>
	<div style="text-align:center; margin-top: 20px;">
	</div>

	<!-- End main content --> 
	<script>
	function addDays(theDate, days) {
		return new Date(theDate.getTime() + days*24*60*60*1000);
	}
	 </script> 
<!--&tpl:web/dasboard-->
</section>


	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	
	<script src="<?php echo JS_DIR;?>/web/setup.js"></script>

	<!-- Template functions -->
	<script src="<?php echo JS_DIR;?>/web/developr.input.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.message.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.modal.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.navigable.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.notify.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.scroll.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.table.js"></script>
    
	<script src="<?php echo JS_DIR;?>/web/developr.tooltip.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.confirm.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.agenda.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.tabs.js"></script>		<!-- Must be loaded last -->
    <script src="<?php echo JS_DIR;?>/web/libs/glDatePicker/glDatePicker.min_59edcbff.js"></script>
    <script src="<?php echo JS_DIR;?>/web/libs/jquery.tablesorter.min.js"></script>
	<!-- Tinycon -->
    <!--
	<script src="<?php echo JS_DIR;?>/web/libs/tinycon.min.js"></script>
	<script src="<?php echo JS_DIR;?>/web/developr.progress-slider.js"></script>
    <script src="<?php echo JS_DIR;?>/web/libs/datatables/datatables.min.js"></script>
    -->
    <!-- jQuery Form Validation -->
	<script src="<?php echo JS_DIR;?>/web/libs/formValidator/jquery.validationEngine.js"></script>
	<script src="<?php echo JS_DIR;?>/web/libs/formValidator/languages/jquery.validationEngine-en.js"></script>
    
    <script src="<?php echo JS_DIR;?>/web/web.js"></script>
	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Favicon count
		//Tinycon.setBubble(2);

		// If the browser support the Notification API, ask user for permission (with a little delay)
		if (notify.hasNotificationAPI() && !notify.isNotificationPermissionSet())
		{
			setTimeout(function()
			{
				notify.showNotificationPermission('Your browser supports desktop notification, click here to enable them.', function()
				{
					// Confirmation message
					if (notify.hasNotificationPermission())
					{
						notify('Notifications API enabled!', 'You can now see notifications even when the application is in background', {
							icon: '<?php echo CSS_DIR;?>/web/img/demo/icon.png',
							system: true
						});
					}
					else
					{
						notify('Notifications API disabled!', 'Desktop notifications will not be used.', {
							icon: '<?php echo CSS_DIR;?>/web/img/demo/icon.png'
						});
					}
				});

			}, 2000);
		}

		/*
		 * Handling of 'other actions' menu
		 */

		var otherActions = $('#otherActions'),
			current = false;

		// Other actions
		$('.list .button-group a:nth-child(2)').menuTooltip(otherActions, {

			classes: ['with-mid-padding'],

			onShow: function(target)
			{
				// Remove auto-hide class
				target.parent().removeClass('show-on-parent-hover');
			},

			onRemove: function(target)
			{
				// Restore auto-hide class
				target.parent().addClass('show-on-parent-hover');
			}
		});

		// Delete button
		$('.list .button-group a:last-child').data('confirm-options', {

			onShow: function()
			{
				// Remove auto-hide class
				$(this).parent().removeClass('show-on-parent-hover');
			},

			onConfirm: function()
			{
				// Remove element
				$(this).closest('li').fadeAndRemove();

				// Prevent default link behavior
				return false;
			},

			onRemove: function()
			{
				// Restore auto-hide class
				$(this).parent().addClass('show-on-parent-hover');
			}

		});

	</script>
	<script>
		function get_detail_flight(){
			$.ajax({
				type : "GET",
				url: "<?php echo base_url('index.php/flight/get_flight_data/'.$uri4.'/'.$uri5);?>",
				async: false,
				dataType: "json",
				success:function(data){
					var total_price_adult = data.items[0].departures.count_adult * data.items[0].departures.price_adult;
					var total_price_child = data.items[0].departures.count_child * data.items[0].departures.price_child;
					var total_price_infant = data.items[0].departures.count_infant * data.items[0].departures.price_infant;
					var total_price = total_price_adult + total_price_child + total_price_infant;
					$('#detail').empty();
					$('#detail').append('<p><strong>'+data.items[0].departures.airlines_name+' '+data.items[0].departures.flight_number+'</strong></p>');
					$('#detail').append('<p>Tanggal: <?php echo $uri5;?></p>');
					$('#detail').append('<p>Departure-Arrival: '+data.items[0].departures.full_via+'</p>');
					$('#detail').append('<p>Rincian Harga:</p>');
					$('#detail').append('<ul style="list-style-type:square; margin-left: 20px;">\
					<li>Dewasa: '+data.items[0].departures.count_adult+' x '+data.items[0].departures.price_adult+' = '+total_price_adult+'</li>\
					<li>Anak: '+data.items[0].departures.count_child+' x '+data.items[0].departures.price_child+' = '+total_price_child+'</li>\
					<li>Bayi: '+data.items[0].departures.count_infant+' x '+data.items[0].departures.price_infant+' = '+total_price_infant+'</li></ul>');
					$('#detail').append('<p>Total harus dibayar: IDR <strong>'+total_price+'</strong></p>');
				}
			});
		};
		
		function create_form(el_div, n){
			var div = $(eldiv);
			if (n>0){
				for (var i=0; i<n; i++){
					//create fieldset
					var fieldset = document.createElement('fieldset');
					fieldset.className = "fieldset";
					
					//create el
				}
			}
		}
		
		$( window ).load(function() {
			get_detail_flight();
		});
		
		$(document).ready(function() {
			/*search flights*/
			$('#submit-flight').click(function(event) {
				//alert('oii');
				$('#result-flight').empty();
				$('#result-flight').append('<h3 class="thin underline">Hasil Pencarian Data Pesawat (Urutan dari harga termurah), '+document.getElementById('flight-from').value+'-'+document.getElementById('flight-to').value+' Tanggal Berangkat: '+document.getElementById('tgl_berangkat').value+'</h3>');
				var form = $('#form_flight').serialize();
				event.preventDefault();
				$.ajax({
					type : "GET",
					url: '<?php echo base_url();?>index.php/flight/search_flights',
					data: form,
					cache: false,
					dataType: "json",
					success:function(data){
							if(data==''){
								$('#result-flight').append('<p>Maaf, data tidak ada untuk rute ini.<p>');
							}
							else{
								var div = $("#result-flight");
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
			/*search trains*/
			$('#submit-train').click(function(event) {
				$('#result-train').empty();
				$('#result-train').append('<h3 class="thin underline">Hasil Pencarian Data Kereta Api, '+document.getElementById('train-from').value+'-'+document.getElementById('train-to').value+' Tanggal Berangkat: '+document.getElementById('train-pergi').value+'</h3>');
				var form = $('#ka_form').serialize();
				event.preventDefault();
				$.ajax({
					type : "GET",
					url: '<?php echo base_url();?>index.php/train/search_trains',
					data: form,
					cache: false,
					dataType: "json",
					success:function(data){
							if(data==''){
								$('#result-train').append('<p>Maaf, data tidak ada untuk rute ini.<p>');
							}
							else{
								var div = $("#result-train");
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
									/*td1.appendChild(document.createTextNode('Dewasa: '+data.items[0].departures.result[i].price_adult));
									var br = document.createElement('br');
									td1.appendChild(br);
									td1.appendChild(document.createTextNode('Anak(3-9thn): '+data.items[0].departures.result[i].price_child));
									td1.appendChild(br);
									td1.appendChild(document.createTextNode('Bayi: '+data.items[0].departures.result[i].price_infant));
									*/
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
			$('#submit-hotel').click(function(event) {
				$('#result-hotel').empty();
				$('#result-hotel').append('<h3 class="thin underline">Hasil Pencarian Data Hotel, '+document.getElementById('checkin').value+'-'+document.getElementById('checkout').value+' Kamar:'+document.getElementById('room').value+' Dewasa:'+document.getElementById('adult').value+' Anak:'+document.getElementById('child').value+'</h3>');
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
								$('#result-hotel').append('<p>Maaf, data tidak ada untuk rute ini.<p>');
							}
							else{
								var div = $("#result-hotel");
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
									p4.appendChild(document.createTextNode('Available: '+data.items[0].results.result[i].room_available));
									td2.appendChild(p4);
									var p5 = document.createElement('p');
									p5.appendChild(document.createTextNode('Fasilitas: '+data.items[0].results.result[i].room_facility_name));
									td2.appendChild(p5);
									
									tr_body.appendChild(td1);
									tr_body.appendChild(td2);
									
									var el_td = document.createElement('td');
									var link_order = document.createElement('a');
									var str = document.createTextNode('Pesan');
									link_order.appendChild(str);
									link_order.setAttribute('href', '<?php echo base_url();?>index.php/order/staging_order/'+data.items[0].results.result[i].id);
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
</body>
</html>