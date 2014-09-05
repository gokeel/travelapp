<!--slidemenu--> 

<div class="navigator">
	<div class="pagetitle">HOME</div>
	<div style="float:right; padding5px; color:#888; margin:5px;">Your IP: <?php echo $ip_address;?></div>
</div>

<div id="content"  style="min-height:400px;"> 

  <div class="frametab">
		<h3 style="margin:5px 0 5px 5px;">Dashboard</h3>
		<div id="data-booking"></div>
	</div>
	<div id="end"></div>
  <!--&content--> 

</div>
<script>
	$( window ).load(function() {
		load_booking();
	});
	function load_booking(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/order/get_booking_list',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row, payment_status: datajson[i].payment_status, order_id: datajson[i].order_id, category:datajson[i].category, total_price: datajson[i].total_price, order_status: datajson[i].order_status, timestamp: datajson[i].timestamp};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			function formatCurrency(cell) {
				//console.log("column key : " + cell.column.key);
				if(cell.column.key == "imps"){
					console.log(JSON.stringify(cell));
				}
				format = {
					//prefix: "Rp ",
					thousandsSeparator: ".",
					decimalSeparator: ",",
					decimalPlaces: 2
				};
				cell.record.set(Number(cell.value));
				return Y.DataType.Number.format(Number(cell.value), format);
			}
			
			var data_order = data;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"10px"},
					{key:"order_id", label:"ID Pesanan"},
					{key:"category", label:"Kategori"},
					{key:"total_price", label:"Total Harga", formatter:formatCurrency},
					{key:"order_status", label:"Status Pesanan"},
					{key:"payment_status", label:"Status Pembayaran"},
					{key:"timestamp", label:"Tanggal Pemesanan"}
				],
				data: data_order,
				caption: "Daftar Pesanan",
				rowsPerPage: 10
			});
			table.render("#data-booking");
		});
	}
</script>