<!-- Terusan dari myaccount_leftmenu.php -->
	<div class="col-md-8 column">
		<div class="panel panel-primary account-border">
			<div id="dataorder"></div>
		</div>
	</div>
<!-- Close tag dari myaccount_leftmenu.php -->
</div>

<script>
var data_order = [];
$.getJSON('<?php echo base_url('assets/json/orders.json')?>', function(datajson) {
	for (var i in datajson.orders) {
		data_order[i] = {id: datajson.orders[i].order_id, time:datajson.orders[i].order_time, category:datajson.orders[i].category, rute: datajson.orders[i].rute, status: datajson.orders[i].status};
	}
});
YUI().use('datatable','datatable-sort','datatype-date','datatable-paginator', function (Y) {
	var data = data_order;
	var table = new Y.DataTable({
		columns: [
			{
				key:"id", 
				label: "Order ID",
				sortable: true,
				formatter: '<a href="<?php echo base_url('index.php/account/order/');?>/{value}">{value}</a>',
				allowHTML: true
			},
			{key:"time", label: "Waktu"},
			{key:"category", label: "Kategori"},
			{key:"rute", label: "Rute"},
			{key:"status", label: "Status"},
			{key:"batasbayar", label: "Batas Pembayaran"},
		],
		data: data,
		caption: "Daftar Pembelian Tiket Anda",
		rowsPerPage: 10
	});
	table.render("#dataorder");
});
</script>