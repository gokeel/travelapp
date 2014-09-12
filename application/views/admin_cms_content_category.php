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
		<button id="add-cat" style="margin:10px; float:right;padding: 4px 5px;">Tambah Kategori</button>
		<h3 style="margin:5px 0 5px 5px;">Daftar Semua Kategori</h3>
		<div id="list"></div>
	</div>
	<div id="end"></div>
	<div id="panel-add-cat">
		<div class="yui3-widget-bd">
			<form id="form-add-cat" name="form-add-cat">
				<fieldset>
					<table>
						<tr>
							<td>Kategori</td>
							<td><input type="text" name="category" id="category" placeholder=""></td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td><input type="text" name="description" id="description" placeholder=""></td>
						</tr>
						<tr>
							<td>Dapat dihapus</td>
							<td><input type="radio" name="removable" value="yes">Ya<br><input type="radio" name="removable" value="no">Tidak</td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
	</div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_categories();
	})
	
	function load_categories(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_content_categories',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row: datajson[i].number_row, id:datajson[i].id, category:datajson[i].category, description: datajson[i].description, removable: datajson[i].removable};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_user = data;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					//{key:"id", label:"ID"},
					{key:"category", label:"Kategori"},
					{key:"description", label:"Deskripsi"},
					{
						key:"id", 
						label: "Ubah",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/edit_content_category/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a>&nbsp;&nbsp;&nbsp;&nbsp;',
						allowHTML: true
					},
					{
						label:"Hapus",
						nodeFormatter:function (o) {
							if (o.data.removable=="yes")
								o.cell.setHTML('<a href="<?php echo base_url();?>index.php/admin/delete_content_category/'+o.data.id+'"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn" title="Jika diperbolehkan menghapus dapat mengakibatkan konten tidak mempunyai kategori dan dapat merubah fungsi. Disarankan untuk memilih NO untuk kategori paket."></a>');
							return false;
						}
					}
				],
				data: data_user,
				caption: "",
				rowsPerPage: 10
			});
			table.render("#list");
		});
	}
	
	YUI().use('panel', 'dd-plugin', function (Y) {
		function add_user(){
			var form = $('#form-add-cat').serialize();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/add_content_category',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
					window.location.assign("<?php echo base_url('index.php/admin/content_category_page');?>");
				}
			})
		}
		
		var addRowBtn  = Y.one('#add-cat');
		// Create the main modal form for add bank
		var panel = new Y.Panel({
			srcNode      : '#panel-add-cat',
			headerContent: 'Tambah User',
			width        : 600,
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
				add_user();
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
</script>