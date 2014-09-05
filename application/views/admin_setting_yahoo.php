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
<div id="content"  style="min-height:400px;"> 
  <div class="frametab">
		<h3 style="margin:5px 0 5px 5px;">Daftar Akun Yahoo! Messenger</h3>
		<button id="add-ym">Tambah Akun</button>
		<div id="data-ym"></div>
	</div>
	<div id="end"></div>
	
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_ym();
	});
	
	function load_ym(){
		var data_via = [];
			data_via[0] = {number_row:'1', id:'1', name:'hello_support@yahoo.co.id', type: 'Support'};
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_yahoo',
			dataType: "json",
			success:function(datajson){
				//for(var i=0; i<datajson.length;i++)
					//data_via[i] = {number_row: datajson[i].number_row, id:datajson[i].value, name:datajson[i].name};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_bank_via = data_via;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					{key:"type", label:"Tipe Akun"},
					{key:"name", label:"Akun"},
					{
						key:"id", 
						label: "Ubah",
						width: "30px",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/yahoo_edit/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a>',
						allowHTML: true
					},
					{
						key:"id", 
						label: "Hapus",
						width: "30px",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/yahoo_delete/{value}"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
				],
				data: data_bank_via,
				caption: "Akun Yahoo! Terdaftar",
				rowsPerPage: 10
			});
			table.render("#data-ym");
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
		
		var addRowBtn  = Y.one('#add-ym');
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

 