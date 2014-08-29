<script type="text/javascript">
YUI().use('tabview', function(Y) {
    var tabview = new Y.TabView({srcNode:'#tabs'});
    tabview.render();
});
</script>
<div id="content"  style="min-height:400px;"> 
  <div class="frametab">
		
		<h3 style="margin:5px 0 5px 5px;">Daftar Antrian Pesanan</h3>
		<div id="tabs">
			<ul>
				<li><a href="#tab-1">Pesawat</a></li>
				<li><a href="#tab-2">Kereta Api</a></li>
				<li><a href="#tab-3">Hotel</a></li>
			</ul>
			<div>
				<div id="tab-1">
					<div id="order-flight"></div>
					
				</div>
				<div id="tab-2">
					<div id="order-train"></div>
				</div>
				<div id="tab-3">
					<div id="order-hotel"></div>
				</div>
			</div>
		</div>
		
		
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>

<script>
	$( window ).load(function() {
		load_order_flight();
	});
	function load_order_flight(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_registered_order/flight',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,order_id: datajson[i].order_id, agent_name:datajson[i].agent_name, airline_name: datajson[i].airline_name, flight_id: datajson[i].flight_id, route: datajson[i].route, full_via: datajson[i].departing_date+'-'+datajson[i].time_travel, total_price: datajson[i].total_price, adult: datajson[i].adult, price_adult: datajson[i].price_adult, child: datajson[i].child, price_child: datajson[i].price_child, infant: datajson[i].infant, price_infant: datajson[i].price_infant};
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
					{key:"number_row", label:"No.", width:"60px"},
					{key:"agent_name", label:"Nama Agen"},
					{key:"airline_name", label:"Maskapai"},
					{key:"route", label:"Rute"},
					{key:"full_via", label:"Waktu"},
					{key:"total_price", label:"Total Harga", formatter:formatCurrency},
					{
						key:"order_id", 
						label: "Action",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/proceed_order/{value}" style="color:red"><button>Proses Checkout</button></a>',
						allowHTML: true
					}
				],
				data: data_order,
				caption: "Daftar Antrian Pesanan",
				rowsPerPage: 10
			});
			table.render("#order-flight");
		});
	}
</script>