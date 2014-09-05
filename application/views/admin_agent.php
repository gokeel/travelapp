

<div id="content"  style="min-height:400px;"> 
  <!--content--> 
	<!--<div id="topnav">
		<form style="display:inline-block; float:right; margin:5px;" name="search-box">
		<label>Cari Nama Agen</label>
		<input type="text" name="search" />
		<input type="submit" id="search-agent" value="Cari">
		</form>
	</div>-->
	<div class="frametab">
		<input type="button" onclick="document.location='<?php echo base_url('index.php/admin/agent_data_page');?>'" value="ADD NEW DATA" name="Add Data" style="margin:10px; float:right;">
		<h3 style="margin:5px 0 5px 5px;">Agen Request</h3>
		<div id="data-agents"></div>
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_agents();
	});
	function load_agents(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_all_agents',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row: datajson[i].number_row, username:datajson[i].username, agent_type:datajson[i].agent_type, agent_name:datajson[i].agent_name, join_date: datajson[i].join_date, agent_phone: datajson[i].agent_phone, agent_city: toTitleCase(datajson[i].agent_city), agent_email: datajson[i].agent_email, parent_agent: datajson[i].parent_agent, deposit_amount: datajson[i].deposit_amount, voucher: datajson[i].voucher, approved: datajson[i].approved, agent_id: datajson[i].agent_id};
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
			
			var data_agent = data;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"10px"},
					{key:"agent_type", label:"Tipe Member"},
					{key:"username", label:"Username"},
					{key:"agent_name", label:"Nama Agen"},
					{key:"join_date", label:"Tanggal Bergabung"},
					{key:"agent_phone", label:"Telepon"},
					{key:"agent_city", label:"Kota"},
					{key:"agent_email", label:"Email"},
					{key:"parent_agent", label:"Upline"},
					{key:"deposit_amount", label:"Jml Deposit", formatter:formatCurrency},
					{key:"voucher", label:"Voucher", formatter:formatCurrency},
					{key:"approved", label:"Approved"},
					{
						key:"agent_id", 
						label: "Detil/Ubah",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/detail_agent/{value}"><img src="<?php echo IMAGES_DIR;?>/look.ico"/ class="crud-btn" /></a>&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/admin/edit_agent/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a>',
						allowHTML: true
					},
					{
						key:"agent_id", 
						label: "Delete",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/delete_agent/{value}"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
				],
				data: data_agent,
				caption: "Agen Terdaftar",
				rowsPerPage: 10
			});
			table.render("#data-agents");
		});
	}
</script>