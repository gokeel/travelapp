<?php
	$type = $this->uri->segment(3);
	$id = $this->uri->segment(4);
?>
<div id="content"  style="min-height:400px;"> 
  <!--content--> 
	
	<div class="frametab">
		<h3 style="margin:5px 0 5px 5px;">Proses Checkout</h3>
		<div id="data-order">
			<form name="form-checkout" method="post" action="<?php echo base_url();?>index.php/order/add_order_tiketcom/<?php echo $type.'/'.$id;?>">
				<div id="data-general"></div>
				<div id="data-pemesan"></div>
				<div id="data-adult"></div>
				<div id="data-child"></div>
				<div id="data-infant"></div>
				<?php
					//only hotel that do not need to be checkout using tiket.com
					if ($type!='hotel')
						echo '<input class="mybutton" style="float:right" type="submit" value="Checkout Tiket.com"/>';
				?>
				
			</form>
			<div class="formFooter" style="margin-top:50px;">
				<input class="mybutton" style="float:left" name="dbproses" type="button" value="Kembali ke halaman pesanan" onclick="document.location.href='<?php echo base_url();?>index.php/admin/booking_page';" />
				<input class="mybutton" style="float:center" name="checkout-system" id="checkout-system" type="button" value="Checkout oleh Sistem" />
			</div>
			
		</div>
	</div> 

</div>

<script>
	$(document).ready(function() {
		$('#checkout-system').click(function(event) {
			event.preventDefault();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/order/checkout_order_by_system/<?php echo $id;?>',
				cache: false,
				dataType: "json",
				success:function(data){
					if (data.response=="nok")
						alert(data.message);
					else if (data.response=="ok")
						window.location.assign('<?php echo base_url();?>index.php/admin/booking_page');
				}
			})
		})
	});
</script>
<script>
	<?php
		echo 'var type = "'.$type.'";';
		echo 'var id = "'.$id.'";';
	?>
	$.ajax({
		type : "GET",
		url: '<?php echo base_url();?>index.php/order/get_order_by_id/<?php echo $type;?>/<?php echo $id;?>',
	//	data: form,
	//	cache: false,
		dataType: "json",
		success:function(data){
			//generate general info
				$('#data-general').empty();
				$('#data-general').append('<h2>Data Detil Pemesanan</h2>');
				// FLIGHT
				if (type=="flight"){
					$('#data-general').append('<table>\
							<tr>\
								<td><strong>Nama Agen</strong></td><td>'+data.responses.general[0].agent_name+'</td>\
								<td><strong>Maskapai</strong></td><td>'+data.responses.general[0].airline_name+'</td>\
							</tr>\
							<tr>\
								<td><strong>Rute</strong></td><td>'+data.responses.general[0].route+'</td>\
								<td><strong>Keberangkatan-Kedatangan</strong></td><td>'+data.responses.general[0].departing_date+' '+data.responses.general[0].time_travel+'</td>\
							</tr>\
							<tr>\
								<td><strong>Rincian Harga</strong></td>\
								<td>\
									<ul style="list-style-type:square; margin-left: 20px;">\
										<li>\
										Dewasa: '+data.responses.general[0].adult.value+' x '+data.responses.general[0].price_adult+' = '+data.responses.general[0].adult.value * data.responses.general[0].price_adult+'\
										</li>\
										<li>\
										Anak: '+data.responses.general[0].child.value+' x '+data.responses.general[0].price_child+' = '+data.responses.general[0].child.value * data.responses.general[0].price_child+'\
										</li>\
										<li>\
										Bayi: '+data.responses.general[0].infant.value+' x '+data.responses.general[0].price_infant+' = '+data.responses.general[0].infant.value * data.responses.general[0].price_infant+'\
										</li>\
									</ul>\
								</td>\
								<td><strong>Total Harga</strong></td>\
								<td>IDR <strong>'+data.responses.general[0].total_price+'</strong></td>\
							</tr>\
						</table>');
					
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].flight_id.name+'" value="'+data.responses.general[0].flight_id.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].token.name+'" value="'+data.responses.general[0].token.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].lion_captcha.name+'" value="'+data.responses.general[0].lion_captcha.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].lion_session_id.name+'" value="'+data.responses.general[0].lion_session_id.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].adult.name+'" value="'+data.responses.general[0].adult.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].child.name+'" value="'+data.responses.general[0].child.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].infant.name+'" value="'+data.responses.general[0].infant.value+'">');
					$('#data-pemesan').append('<h2>Data Pemesan</h2>');
					$('#data-pemesan').append('<table>\
							<tr>\
								<td><strong>Titel</strong></td>\
								<td>'+data.responses.contact[0].title.value+'</td>\
								<td></td>\
								<td></td>\
							</tr>\
							<tr>\
								<td><strong>Nama Depan</strong></td>\
								<td>'+data.responses.contact[0].firstname.value+'</td>\
								<td><strong>Nama Belakang</strong></td>\
								<td>'+data.responses.contact[0].lastname.value+'</td>\
							</tr>\
							<tr>\
								<td><strong>Email</strong></td>\
								<td>'+data.responses.contact[0].email.value+'</td>\
								<td><strong>Telepon/HP</strong></td>\
								<td>'+data.responses.contact[0].phone.value+'</td>\
							</tr>\
						</table>');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].title.name+'" value="'+data.responses.contact[0].title.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].firstname.name+'" value="'+data.responses.contact[0].firstname.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].lastname.name+'" value="'+data.responses.contact[0].lastname.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].email.name+'" value="'+data.responses.contact[0].email.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].phone.name+'" value="'+data.responses.contact[0].phone.value+'">');
					
					$('#data-adult').append('<h2>Data Penumpang Dewasa</h2>');
					var div = document.getElementById('data-adult');
					var table = document.createElement('table');
					var thead = document.createElement('tr');
					thead.appendChild(set_td_data('th', 'Title'));
					thead.appendChild(set_td_data('th', 'Nama Depan'));
					thead.appendChild(set_td_data('th', 'Nama Belakang'));
					thead.appendChild(set_td_data('th', 'Tanggal Lahir'));
					thead.appendChild(set_td_data('th', 'No. Identitas'));
					table.appendChild(thead);
					for (var a=0; a<data.responses.general[0].adult.value; a++){
						var tr = document.createElement('tr');
						tr.appendChild(set_td_data('td', data.responses.adult[a].title.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].firstname.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].lastname.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].birthdate.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].id.value));
						table.appendChild(tr);
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].title.name+'" value="'+data.responses.adult[a].title.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].firstname.name+'" value="'+data.responses.adult[a].firstname.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].lastname.name+'" value="'+data.responses.adult[a].lastname.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].birthdate.name+'" value="'+data.responses.adult[a].birthdate.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].id.name+'" value="'+data.responses.adult[a].id.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].baggage_direct.name+'" value="'+data.responses.adult[a].baggage_direct.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[a].baggage_transit.name+'" value="'+data.responses.adult[a].baggage_transit.value+'">');
					}
					div.appendChild(table);
					
					$('#data-child').append('<h2>Data Penumpang Anak</h2>');
					var div = document.getElementById('data-child');
					var table = document.createElement('table');
					var thead = document.createElement('tr');
					thead.appendChild(set_td_data('th', 'Title'));
					thead.appendChild(set_td_data('th', 'Nama Depan'));
					thead.appendChild(set_td_data('th', 'Nama Belakang'));
					thead.appendChild(set_td_data('th', 'Tanggal Lahir'));
					thead.appendChild(set_td_data('th', 'No. Identitas'));
					table.appendChild(thead);
					for (var a=0; a<data.responses.general[0].child.value; a++){
						var tr = document.createElement('tr');
						tr.appendChild(set_td_data('td', data.responses.child[a].title.value));
						tr.appendChild(set_td_data('td', data.responses.child[a].firstname.value));
						tr.appendChild(set_td_data('td', data.responses.child[a].lastname.value));
						tr.appendChild(set_td_data('td', data.responses.child[a].birthdate.value));
						tr.appendChild(set_td_data('td', data.responses.child[a].id.value));
						table.appendChild(tr);
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].title.name+'" value="'+data.responses.child[a].title.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].firstname.name+'" value="'+data.responses.child[a].firstname.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].lastname.name+'" value="'+data.responses.child[a].lastname.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].birthdate.name+'" value="'+data.responses.child[a].birthdate.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].id.name+'" value="'+data.responses.child[a].id.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].baggage_direct.name+'" value="'+data.responses.child[a].baggage_direct.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[a].baggage_transit.name+'" value="'+data.responses.child[a].baggage_transit.value+'">');
					}
					div.appendChild(table);
					
					$('#data-infant').append('<h2>Data Penumpang Bayi</h2>');
					var div = document.getElementById('data-infant');
					var table = document.createElement('table');
					var thead = document.createElement('tr');
					thead.appendChild(set_td_data('th', 'Title'));
					thead.appendChild(set_td_data('th', 'Nama Depan'));
					thead.appendChild(set_td_data('th', 'Nama Belakang'));
					thead.appendChild(set_td_data('th', 'Tanggal Lahir'));
					thead.appendChild(set_td_data('th', 'Orang Tua'));
					table.appendChild(thead);
					for (var a=0; a<data.responses.general[0].infant.value; a++){
						var tr = document.createElement('tr');
						tr.appendChild(set_td_data('td', data.responses.infant[a].title.value));
						tr.appendChild(set_td_data('td', data.responses.infant[a].firstname.value));
						tr.appendChild(set_td_data('td', data.responses.infant[a].lastname.value));
						tr.appendChild(set_td_data('td', data.responses.infant[a].birthdate.value));
						tr.appendChild(set_td_data('td', 'Dewasa '+data.responses.infant[a].parent.value));
						table.appendChild(tr);
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[a].title.name+'" value="'+data.responses.infant[a].title.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[a].firstname.name+'" value="'+data.responses.infant[a].firstname.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[a].lastname.name+'" value="'+data.responses.infant[a].lastname.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[a].birthdate.name+'" value="'+data.responses.infant[a].birthdate.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[a].parent.name+'" value="'+data.responses.infant[a].parent.value+'">');
					}
					div.appendChild(table);
				} // end-flight
				
				// train
				else if (type=="train"){
					$('#data-general').append('<table>\
							<tr>\
								<td><strong>Nama Agen</strong></td><td>'+data.responses.general[0].agent_name+'</td>\
								<td><strong>Kereta Api / Kelas / Sub-Kelas</strong></td><td>'+data.responses.general[0].train_name+' / '+data.responses.general[0].kelas+' / '+data.responses.general[0].subclass.value+'</td>\
							</tr>\
							<tr>\
								<td><strong>Rute</strong></td><td>'+data.responses.general[0].route+'</td>\
								<td><strong>Keberangkatan-Kedatangan</strong></td><td>'+data.responses.general[0].departing_date.value+' '+data.responses.general[0].time_travel+'</td>\
							</tr>\
							<tr>\
								<td><strong>Rincian Harga</strong></td>\
								<td>\
									<ul style="list-style-type:square; margin-left: 20px;">\
										<li>\
										Dewasa: '+data.responses.general[0].adult.value+' x '+data.responses.general[0].price_adult+' = '+data.responses.general[0].adult.value * data.responses.general[0].price_adult+'\
										</li>\
										<li>\
										Anak: '+data.responses.general[0].child.value+' x '+data.responses.general[0].price_child+' = '+data.responses.general[0].child.value * data.responses.general[0].price_child+'\
										</li>\
										<li>\
										Bayi: '+data.responses.general[0].infant.value+' x '+data.responses.general[0].price_infant+' = '+data.responses.general[0].infant.value * data.responses.general[0].price_infant+'\
										</li>\
									</ul>\
								</td>\
								<td><strong>Total Harga</strong></td>\
								<td>IDR <strong>'+data.responses.general[0].total_price+'</strong></td>\
							</tr>\
						</table>');
					
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].train_id.name+'" value="'+data.responses.general[0].train_id.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].token.name+'" value="'+data.responses.general[0].token.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].depart_station.name+'" value="'+data.responses.general[0].depart_station.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].arrival_station.name+'" value="'+data.responses.general[0].arrival_station.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].departing_date.name+'" value="'+data.responses.general[0].departing_date.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].subclass.name+'" value="'+data.responses.general[0].subclass.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].adult.name+'" value="'+data.responses.general[0].adult.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].child.name+'" value="'+data.responses.general[0].child.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.general[0].infant.name+'" value="'+data.responses.general[0].infant.value+'">');
					$('#data-pemesan').append('<h2>Data Pemesan</h2>');
					$('#data-pemesan').append('<table>\
							<tr>\
								<td><strong>Titel</strong></td>\
								<td>'+data.responses.contact[0].title.value+'</td>\
								<td></td>\
								<td></td>\
							</tr>\
							<tr>\
								<td><strong>Nama Depan</strong></td>\
								<td>'+data.responses.contact[0].firstname.value+'</td>\
								<td><strong>Nama Belakang</strong></td>\
								<td>'+data.responses.contact[0].lastname.value+'</td>\
							</tr>\
							<tr>\
								<td><strong>Email</strong></td>\
								<td>'+data.responses.contact[0].email.value+'</td>\
								<td><strong>Telepon/HP</strong></td>\
								<td>'+data.responses.contact[0].phone.value+'</td>\
							</tr>\
						</table>');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].title.name+'" value="'+data.responses.contact[0].title.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].firstname.name+'" value="'+data.responses.contact[0].firstname.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].lastname.name+'" value="'+data.responses.contact[0].lastname.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].email.name+'" value="'+data.responses.contact[0].email.value+'">');
					$('#data-general').append('<input type="hidden" name="'+data.responses.contact[0].phone.name+'" value="'+data.responses.contact[0].phone.value+'">');
					
					$('#data-adult').append('<h2>Data Penumpang Dewasa</h2>');
					var div = document.getElementById('data-adult');
					var table = document.createElement('table');
					var thead = document.createElement('tr');
					thead.appendChild(set_td_data('th', 'Title'));
					thead.appendChild(set_td_data('th', 'Nama Lengkap'));
					thead.appendChild(set_td_data('th', 'Tanggal Lahir'));
					thead.appendChild(set_td_data('th', 'No. Identitas'));
					thead.appendChild(set_td_data('th', 'No. Telepon/HP'));
					table.appendChild(thead);
					for (var a=0; a<data.responses.general[0].adult.value; a++){
						var tr = document.createElement('tr');
						tr.appendChild(set_td_data('td', data.responses.adult[a].title.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].name.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].birthdate.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].id.value));
						tr.appendChild(set_td_data('td', data.responses.adult[a].phone.value));
						table.appendChild(tr);
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[0].title.name+'" value="'+data.responses.adult[0].title.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[0].name.name+'" value="'+data.responses.adult[0].name.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[0].birthdate.name+'" value="'+data.responses.adult[0].birthdate.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[0].id.name+'" value="'+data.responses.adult[0].id.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.adult[0].phone.name+'" value="'+data.responses.adult[0].phone.value+'">');
					}
					div.appendChild(table);
					
					$('#data-child').append('<h2>Data Penumpang Anak</h2>');
					var div = document.getElementById('data-child');
					var table = document.createElement('table');
					var thead = document.createElement('tr');
					thead.appendChild(set_td_data('th', 'Title'));
					thead.appendChild(set_td_data('th', 'Nama Lengkap'));
					thead.appendChild(set_td_data('th', 'Tanggal Lahir'));
					table.appendChild(thead);
					for (var a=0; a<data.responses.general[0].child.value; a++){
						var tr = document.createElement('tr');
						tr.appendChild(set_td_data('td', data.responses.child[a].title.value));
						tr.appendChild(set_td_data('td', data.responses.child[a].name.value));
						tr.appendChild(set_td_data('td', data.responses.child[a].birthdate.value));
						table.appendChild(tr);
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[0].title.name+'" value="'+data.responses.child[0].title.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[0].name.name+'" value="'+data.responses.child[0].name.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.child[0].birthdate.name+'" value="'+data.responses.child[0].birthdate.value+'">');
					}
					div.appendChild(table);
					
					$('#data-infant').append('<h2>Data Penumpang Bayi</h2>');
					var div = document.getElementById('data-infant');
					var table = document.createElement('table');
					var thead = document.createElement('tr');
					thead.appendChild(set_td_data('th', 'Title'));
					thead.appendChild(set_td_data('th', 'Nama Lengkap'));
					thead.appendChild(set_td_data('th', 'Tanggal Lahir'));
					table.appendChild(thead);
					for (var a=0; a<data.responses.general[0].infant.value; a++){
						var tr = document.createElement('tr');
						tr.appendChild(set_td_data('td', data.responses.infant[a].title.value));
						tr.appendChild(set_td_data('td', data.responses.infant[a].name.value));
						tr.appendChild(set_td_data('td', data.responses.infant[a].birthdate.value));
						table.appendChild(tr);
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[0].title.name+'" value="'+data.responses.infant[0].title.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[0].name.name+'" value="'+data.responses.infant[0].name.value+'">');
						$('#data-general').append('<input type="hidden" name="'+data.responses.infant[0].birthdate.name+'" value="'+data.responses.infant[0].birthdate.value+'">');
					}
					div.appendChild(table);
				} // end-train
				
				//hotel
				else if (type=="hotel"){
					$('#data-general').append('<table>\
							<tr>\
								<td><strong>Nama Agen</strong></td><td>'+data.responses.general[0].agent_name+'</td>\
								<td><strong>Hotel</strong></td><td>'+data.responses.general[0].hotel_name+'</td>\
							</tr>\
							<tr>\
								<td><strong>Alamat</strong></td><td>'+data.responses.general[0].hotel_address+'</td>\
								<td><strong>Regional</strong></td><td>'+data.responses.general[0].hotel_regional+'</td>\
							</tr>\
							<tr>\
								<td><strong>Kamar</strong></td><td>'+data.responses.general[0].room+'</td>\
								<td><strong>Checkin-Checkout (Malam)</strong></td><td>'+data.responses.general[0].checkin+' - '+data.responses.general[0].checkout+' ('+data.responses.general[0].night+' malam)</td>\
							</tr>\
							<tr>\
								<td><strong>Jumlah Orang</strong></td>\
								<td>\
									<ul style="list-style-type:square; margin-left: 20px;">\
										<li>\
										Dewasa: '+data.responses.general[0].adult+'\
										</li>\
										<li>\
										Anak: '+data.responses.general[0].child+'\
										</li>\
									</ul>\
								</td>\
								<td><strong>Total Harga</strong></td>\
								<td>IDR <strong>'+data.responses.general[0].total_price+'</strong></td>\
							</tr>\
						</table>');
				}
				
		}
	})
</script>