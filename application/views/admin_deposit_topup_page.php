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
				<li><a href="#tab-1">Request From Agent</a></li>
				<li><a href="#tab-2">Issued Top-Up</a></li>
				<li><a href="#tab-3">Rejected Top-Up</a></li>
			</ul>
			<div>
				<div id="tab-1">
					<div id="data-request"></div>
					
				</div>
				<div id="tab-2">
					<div id="data-issued"></div>
				</div>
				<div id="tab-3">
					<div id="data-rejected"></div>
				</div>
			</div>
		</div>
		
		
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>

<script>
	$( window ).load(function() {
		load_request();
		load_issued();
		load_rejected();
	});
	function load_request(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_topup_by_status/Requested',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,id: datajson[i].id, agent_name:datajson[i].agent_name, bank_from: datajson[i].bank_from, sender_number: datajson[i].sender_account_number, sender_name: datajson[i].sender_account_name, bank_name: datajson[i].bank_name, transfer_date: datajson[i].transfer_date, nominal: datajson[i].nominal};
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
					{key:"agent_name", label:"Nama Agen"},
					{key:"bank_from", label:"Bank Pengirim"},
					{key:"sender_name", label:"Nama Pengirim"},
					{key:"sender_number", label:"No Rekening Pengirim"},
					{key:"bank_name", label:"Bank Penerima"},
					{key:"transfer_date", label:"Tanggal Pengiriman"},
					{key:"nominal", label:"Nominal", formatter:formatCurrency},
					{
						key:"id", 
						label: "Issued",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/topup_issued/{value}" style="color:red"><button>Issued</button></a>',
						allowHTML: true
					},
					{
						key:"id", 
						label: "Reject",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/topup_reject/{value}" style="color:red"><button>Reject</button></a>',
						allowHTML: true
					}
				],
				data: data_order,
				caption: "Daftar Permintaan Top-Up",
				rowsPerPage: 10
			});
			table.render("#data-request");
		});
	}
	function load_issued(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_topup_by_status/Issued',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,id: datajson[i].id, agent_name:datajson[i].agent_name, bank_from: datajson[i].bank_from, sender_number: datajson[i].sender_account_number, sender_name: datajson[i].sender_account_name, bank_name: datajson[i].bank_name, transfer_date: datajson[i].transfer_date, nominal: datajson[i].nominal};
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
					{key:"agent_name", label:"Nama Agen"},
					{key:"bank_from", label:"Bank Pengirim"},
					{key:"sender_name", label:"Nama Pengirim"},
					{key:"sender_number", label:"No Rekening Pengirim"},
					{key:"bank_name", label:"Bank Penerima"},
					{key:"transfer_date", label:"Tanggal Pengiriman"},
					{key:"nominal", label:"Nominal", formatter:formatCurrency}
				],
				data: data_order,
				caption: "Daftar Top-Up yang Di-Issued",
				rowsPerPage: 10
			});
			table.render("#data-issued");
		});
	}
	function load_rejected(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_topup_by_status/Rejected',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,id: datajson[i].id, agent_name:datajson[i].agent_name, bank_from: datajson[i].bank_from, sender_number: datajson[i].sender_account_number, sender_name: datajson[i].sender_account_name, bank_name: datajson[i].bank_name, transfer_date: datajson[i].transfer_date, nominal: datajson[i].nominal};
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
					{key:"agent_name", label:"Nama Agen"},
					{key:"bank_from", label:"Bank Pengirim"},
					{key:"sender_name", label:"Nama Pengirim"},
					{key:"sender_number", label:"No Rekening Pengirim"},
					{key:"bank_name", label:"Bank Penerima"},
					{key:"transfer_date", label:"Tanggal Pengiriman"},
					{key:"nominal", label:"Nominal", formatter:formatCurrency}
				],
				data: data_order,
				caption: "Daftar Top-Up Rejected",
				rowsPerPage: 10
			});
			table.render("#data-rejected");
		});
	}
</script>