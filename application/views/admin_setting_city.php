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
		
		<h3 style="margin:5px 0 5px 5px;">Daftar Kota</h3>
		<button id="add-city">Tambah Kota</button>
		<div id="data-city"></div>
	</div>
	<div id="end"></div>
	
	<div id="panel-add-city">
		<div class="yui3-widget-bd">
			<form id="form-add-city" name="form-add-city">
				<fieldset>
					<p>
						<label for="namakota">Nama Kota</label><br/>
						<input type="text" name="namakota" id="namakota" value="" placeholder="">
					</p>
				</fieldset>
			</form>
		</div>
	</div>		
	
  <!--&content--> 
</div>
	
	
<script>
	$( window ).load(function() {
		load_city();
	});
	
	function load_city(){
		var data_via = [];
		/*$.getJSON("<?php echo base_url();?>index.php/admin/get_all_bank_via", function(datajson) {
			for (var i in datajson) {
				data_via[i] = {number_row: datajson[i].number_row, id:datajson[i].id, via:datajson[i].via, via_code: datajson[i].via_code};
			}
		});*/
		
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_cities',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data_via[i] = {number_row: datajson[i].number_row, id:datajson[i].value, name:datajson[i].name};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_bank_via = data_via;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					//{key:"id", label:"ID"},
					{key:"name", label:"Nama Kota"},
					{
						key:"id", 
						label: "Ubah",
						width: "30px",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/city_edit_page/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a>',
						allowHTML: true
					},
					{
						key:"id", 
						label: "Hapus",
						width: "30px",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/city_delete/{value}"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
					
				],
				data: data_bank_via,
				caption: "Kota Terdaftar",
				rowsPerPage: 30
			});
			table.render("#data-city");
		});
	}
	
	// $('.formAnchor').on('click', function(e) {
		// e.preventDefault(); // prevents a window.location change to the href
		// $('#bar').val( $(this).data('val') );  // sets to 123 or abc, respectively
		// $('#editcity').submit();
	// });
	
	// $('#editcity').on('submit', function(){ 
		// alert($('#bar').val()); 
		// return false;
	// });
	
	YUI().use('panel', 'dd-plugin', function (Y) {
		function add_city(){
			
			var form = $('#form-add-city').serialize();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/city_add',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
					window.location.assign("<?php echo base_url('index.php/admin/setting_city_page');?>");
				}
			})
		}
		
		var addRowBtn  = Y.one('#add-city');
		// Create the main modal form for add city
		var panel = new Y.Panel({
			srcNode      : '#panel-add-city',
			headerContent: 'Tambah Kota',
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
				add_city();
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
		function edit_city(){
			var form = $('#form-edit-city').serialize();
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
		var addRowBtn  = Y.one('#edit-city');
		// Create the main modal form for add bank
		var panel_via = new Y.Panel({
			srcNode      : '#panel-edit-city',
			headerContent: 'Ubah nama kota',
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

 