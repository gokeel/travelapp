<style type="text/css">
.yui3-panel {
    outline: none;
}
.yui3-panel-content .yui3-widget-hd {
    font-weight: bold;
}
.yui3-panel-content .yui3-widget-bd {
    padding: 15px;
}
.yui3-panel-content label {
    margin-right: 30px;
}
.yui3-panel-content fieldset {
    border: none;
    padding: 0;
}
.yui3-panel-content input[type="text"] {
    border: none;
    border: 1px solid #ccc;
    padding: 3px 7px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: 100%;
    width: 200px;
}

#addRow {
    margin-top: 10px;
}

</style>
<script type="text/javascript">
YUI().use('tabview', function(Y) {
    var tabview = new Y.TabView({srcNode:'#tabs'});
    tabview.render();
});
</script>
<div id="content"  style="min-height:400px;"> 
  <div class="frametab">
		
		<h3 style="margin:5px 0 5px 5px;">Daftar Semua Bank</h3>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Akun Bank</a></li>
				<li><a href="#tabs-2">Bank Via</a></li>
			</ul>
			<div>
				<div id="tabs-1">
					<button id="add-bank">Tambah Akun Bank</button>
					<div id="list-bank"></div>
					
				</div>
				<div id="tabs-2">
					<button id="add-bank-via">Tambah Bank Via</button>
					<div id="list-bank-via"></div>
				</div>
			</div>
		</div>
		
		
	</div>
	<div id="end"></div>
	<div id="panel-add-bank">
		<div class="yui3-widget-bd">
			<form id="form-add-bank" name="form-add-bank">
				<fieldset>
					<p>
						<label for="bank-name">Nama Bank</label>
						<input type="text" name="bank-name" id="bank-name" placeholder="">
					</p>
					<p>
						<label for="account-no">No Rekening</label>
						<input type="text" name="account-no" id="account-no" value="" placeholder="">
					</p>
					<p>
						<label for="account-no">Atas Nama</label>
						<input type="text" name="holder" id="holder" value="" placeholder="">
					</p>
					<p>
						<label for="branch">Cabang</label>
						<input type="text" name="branch" id="branch" value="" placeholder="">
					</p>
					<p>
						<label for="city">Kota</label>
						<input type="text" name="city" id="city" value="" placeholder="">
					</p>
				</fieldset>
			</form>
		</div>
	</div>
	<div id="panel-add-bank-via">
		<div class="yui3-widget-bd">
			<form id="form-add-bank-via" name="form-add-bank-via">
				<fieldset>
					<p>
						<label for="via">Bank Via</label><br/>
						<input type="text" name="via" id="via" placeholder="">
					</p>
					<p>
						<label for="via-code">Kode Bank Via</label><br/>
						<input type="text" name="via-code" id="via-code" value="" placeholder="">
					</p>
				</fieldset>
			</form>
		</div>
	</div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_banks();
		load_bank_via();
	});
	function load_banks(){
		var data = [];
		/*$.getJSON("<?php echo base_url();?>index.php/admin/get_all_banks", function(datajson) {
			for (var i in datajson) {
				data[i] = {number_row: datajson[i].number_row, id:datajson[i].id, name:datajson[i].name, account_number: datajson[i].account_number, branch: datajson[i].branch, city: datajson[i].city};
			}
		});*/
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_all_banks',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row: datajson[i].number_row, id:datajson[i].id, name:datajson[i].name, account_number: datajson[i].account_number, holder: datajson[i].holder_name, branch: datajson[i].branch, city: datajson[i].city};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_bank = data;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					//{key:"id", label:"ID"},
					{key:"name", label:"Bank"},
					{key:"account_number", label:"Nomer Rekening"},
					{key:"holder", label:"Atas Nama"},
					{key:"branch", label:"Cabang"},
					{key:"city", label:"Kota"},
					{
						key:"id", 
						label: "Action",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/bank_edit/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a><a href="<?php echo base_url();?>index.php/admin/bank_delete/{value}"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
				],
				data: data_bank,
				caption: "Bank Terdaftar",
				rowsPerPage: 10
			});
			table.render("#list-bank");
		});
	}
	
	function load_bank_via(){
		var data_via = [];
		/*$.getJSON("<?php echo base_url();?>index.php/admin/get_all_bank_via", function(datajson) {
			for (var i in datajson) {
				data_via[i] = {number_row: datajson[i].number_row, id:datajson[i].id, via:datajson[i].via, via_code: datajson[i].via_code};
			}
		});*/
		
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_all_bank_via',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data_via[i] = {number_row: datajson[i].number_row, id:datajson[i].id, via:datajson[i].via, via_code: datajson[i].via_code};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_bank_via = data_via;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					//{key:"id", label:"ID"},
					{key:"via", label:"Via"},
					{key:"via_code", label:"Kode"},
					{
						key:"id", 
						label: "Action",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/bank_via_edit/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a><a href="<?php echo base_url();?>index.php/admin/bank_via_delete/{value}"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
				],
				data: data_bank_via,
				caption: "Bank Via Terdaftar",
				rowsPerPage: 10
			});
			table.render("#list-bank-via");
		});
	}
	
	YUI().use('panel', 'dd-plugin', function (Y) {
		function add_bank(){
			var form = $('#form-add-bank').serialize();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/bank_add',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
					window.location.assign("<?php echo base_url('index.php/admin/setting_bank_page/bank_list');?>");
				}
			})
		}
		
		var addRowBtn  = Y.one('#add-bank');
		// Create the main modal form for add bank
		var panel = new Y.Panel({
			srcNode      : '#panel-add-bank',
			headerContent: 'Tambah Akun Bank',
			width        : 250,
			zIndex       : 5,
			centered     : true,
			modal        : true,
			visible      : false,
			render       : true,
			plugins      : [Y.Plugin.Drag]
		});
		panel.addButton({
			value  : 'Simpan',
			section: Y.WidgetStdMod.FOOTER,
			action : function (e) {
				e.preventDefault();
				add_bank();
			}
		});
		panel.addButton({
			value  : 'Batal',
			section: Y.WidgetStdMod.FOOTER,
			action : function (e) {
				panel.hide();
			}
		});
		// When the addRowBtn is pressed, show the modal form.
		addRowBtn.on('click', function (e) {
			panel.show();
		});
	});
	
	YUI().use('panel', 'dd-plugin', function (Y) {
		function add_bank_via(){
			var form = $('#form-add-bank-via').serialize();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/bank_via_add',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
					window.location.assign("<?php echo base_url('index.php/admin/setting_bank_page/bank_list');?>");
				}
			})
		}
		var addRowBtn  = Y.one('#add-bank-via');
		// Create the main modal form for add bank
		var panel_via = new Y.Panel({
			srcNode      : '#panel-add-bank-via',
			headerContent: 'Tambah Bank Via',
			width        : 250,
			zIndex       : 5,
			centered     : true,
			modal        : true,
			visible      : false,
			render       : true,
			plugins      : [Y.Plugin.Drag]
		});
		panel_via.addButton({
			value  : 'Simpan',
			section: Y.WidgetStdMod.FOOTER,
			action : function (e) {
				e.preventDefault();
				add_bank_via();
			}
		});
		panel_via.addButton({
			value  : 'Batal',
			section: Y.WidgetStdMod.FOOTER,
			action : function (e) {
				panel_via.hide();
			}
		});
		// When the addRowBtn is pressed, show the modal form.
		addRowBtn.on('click', function (e) {
			panel_via.show();
		});
	});
</script>

 