<script type="text/javascript">
YUI().use('tabview', function(Y) {
    var tabview = new Y.TabView({srcNode:'#tabs'});
    tabview.render();
});
</script>
<div id="content"  style="min-height:400px;"> 
  <div class="frametab">
		
		<h3 style="margin:5px 0 5px 5px;">Halaman Withdraw</h3>
		<div id="tabs">
			<ul>
				<li><a href="#tab-1">Request From Agent</a></li>
				<li><a href="#tab-2">Issued Withdraw</a></li>
				<li><a href="#tab-3">Rejected Withdraw</a></li>
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
			url: '<?php echo base_url();?>index.php/admin/get_withdraw_by_status/Requested',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,id: datajson[i].id, agent_name:datajson[i].agent_name, bank_to: datajson[i].bank_to, receiver_number: datajson[i].receiver_number, receiver_name: datajson[i].receiver_name, message: datajson[i].message, nominal: datajson[i].nominal};
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
					{key:"bank_to", label:"Bank Tujuan"},
					{key:"receiver_name", label:"Nama Penerima"},
					{key:"receiver_number", label:"No Rekening Penerima"},
					{key:"nominal", label:"Nominal", formatter:formatCurrency},
					{key:"message", label:"Catatan"},
					{
						key:"id", 
						label: "Issued",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/withdraw_issued/{value}" style="color:red"><button>Issued</button></a>',
						allowHTML: true
					},
					{
						key:"id", 
						label: "Reject",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/withdraw_reject/{value}" style="color:red"><button>Reject</button></a>',
						allowHTML: true
					}
				],
				data: data_order,
				caption: "Daftar Permintaan Withdraw",
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
			url: '<?php echo base_url();?>index.php/admin/get_withdraw_by_status/Issued',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,id: datajson[i].id, agent_name:datajson[i].agent_name, bank_to: datajson[i].bank_to, receiver_number: datajson[i].receiver_number, receiver_name: datajson[i].receiver_name, message: datajson[i].message, nominal: datajson[i].nominal};
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
					{key:"bank_to", label:"Bank Tujuan"},
					{key:"receiver_name", label:"Nama Penerima"},
					{key:"receiver_number", label:"No Rekening Penerima"},
					{key:"nominal", label:"Nominal", formatter:formatCurrency},
					{key:"message", label:"Catatan"}
				],
				data: data_order,
				caption: "Daftar Withdraw yang Di-Issued",
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
			url: '<?php echo base_url();?>index.php/admin/get_withdraw_by_status/Rejected',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row:datajson[i].number_row ,id: datajson[i].id, agent_name:datajson[i].agent_name, bank_to: datajson[i].bank_to, receiver_number: datajson[i].receiver_number, receiver_name: datajson[i].receiver_name, message: datajson[i].message, nominal: datajson[i].nominal};
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
					{key:"bank_to", label:"Bank Tujuan"},
					{key:"receiver_name", label:"Nama Penerima"},
					{key:"receiver_number", label:"No Rekening Penerima"},
					{key:"nominal", label:"Nominal", formatter:formatCurrency},
					{key:"message", label:"Catatan"}
				],
				data: data_order,
				caption: "Daftar Withdraw Rejected",
				rowsPerPage: 10
			});
			table.render("#data-rejected");
		});
	}
</script>