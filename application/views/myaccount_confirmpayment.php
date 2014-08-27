<!-- Terusan dari myaccount_leftmenu.php -->
	<div class="col-md-8 column">
		<div class="panel panel-primary account-border">
		<form method="GET">
			<div id="confirm-payment">
				<h3 class="text-center text-primary">
					Konfirmasi Pembayaran
				</h3>
				<h4 class="new-row">Order belum terbayar</h4>
				<div class="hr" style="width:300px"></div>
				<div id="data-order"> </div>
				
				<h4 class="new-row">Data pembayaran</h4>
				<div class="hr" style="width:300px"></div>
				<table>
					<tr>
						<td>Tanggal Transfer</td>
						<td>
							<input type="text" class="tb10" />
						</td>
					</tr>
					<tr>
						<td>Bank Tujuan</td>
						<td>
							<select>
								<option value="bca">BCA</option>
								<option value="mandiri">Mandiri</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Jumlah Dana</td>
						<td>
							<input type="text" class="tb10" />
						</td>
					</tr>
					<tr>
						<td>Nama Pemilik Rekening</td>
						<td>
							<input type="text" class="tb10" />
						</td>
					</tr>
					<tr>
						<td>Tanggal Transfer</td>
						<td>
							<input type="text" class="tb10" />
						</td>
					</tr>
					<tr>
						<td>Catatan Tambahan</td>
						<td>
							<textarea ></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" class="btn btn-primary btn-submit" value="Submit"/>
						</td>
					</tr>
				</table>
			</div>
		</form>
		</div>
	</div>
	
</div>

<script>
var data_order = [];
$.getJSON('<?php echo base_url('assets/json/notpaid.json')?>', function(datajson) {
	for (var i in datajson.orders) {
		data_order[i] = {id: datajson.orders[i].order_id, time:datajson.orders[i].order_time, category:datajson.orders[i].category, rute: datajson.orders[i].rute, status: datajson.orders[i].status};
	}
});
YUI().use('datatable', function (Y) {
	var data = data_order;
	var table = new Y.DataTable({
		columns: [
			{
				key:"cb",
				label:"Check",
				formatter:'<input type="checkbox" name="pay" value="{value}">',
				allowHTML: true
			},
			{key:"id", label: "Order ID"},
			{key:"time", label: "Waktu"},
			{key:"category", label: "Kategori"},
			{key:"rute", label: "Rute"},
			{key:"batasbayar", label: "Batas Pembayaran"},
		],
		data: data,
		caption: "Daftar Pembelian Tiket Anda"
	});
	table.render("#data-order");
});
</script>