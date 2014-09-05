<div id="content"  style="min-height:400px;"> 
  <div class="frametab">
		<h3 style="margin:5px 0 5px 5px;">Daftar Konfirmasi Pembayaran oleh Pelanggan</h3>
		<div id="data-payment"></div>
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_payment();
	});
	function load_payment(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/order/get_payment_list',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row, payment_id: datajson[i].payment_id, order_id: datajson[i].order_id, category:datajson[i].category, sender: datajson[i].sender, bank_name: datajson[i].bank_name, transfer_date: datajson[i].transfer_date, total_paid: datajson[i].total_paid, status: datajson[i].status, total_price: datajson[i].total_price};
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
					{key:"sender", label:"Pengirim"},
					{key:"bank_name", label:"Bank Penerima"},
					{key:"transfer_date", label:"Tanggal Transaksi"},
					{key:"total_price", label:"Total Harga", formatter:formatCurrency},
					{key:"total_paid", label:"Total Pembayaran", formatter:formatCurrency},
					{key:"status", label:"Status Pembayaran"},
					{
						key:"payment_id", 
						label: "Action",
						formatter:'<a href="<?php echo base_url();?>index.php/order/validate_payment_id/{value}" style="color:red"><button>Validasi Pembayaran</button></a>',
						allowHTML: true
					}
				],
				data: data_order,
				caption: "Daftar Konfirmasi Pembayaran",
				rowsPerPage: 10
			});
			table.render("#data-payment");
		});
	}
</script>