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
		<button id="add-data" style="margin:10px; float:right;padding: 4px 5px;">Tambah Data</button>
		<h3 style="margin:5px 0 5px 5px;">Daftar Semua User</h3>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Merpati</a></li>
				<li><a href="#tabs-2">Ekspress</a></li>
			</ul>
			<div>
				<div id="tabs-1">
					<div id="list-tiket-merpati"></div>
				</div>
				<div id="tabs-2">
					<div id="list-tiket-ekspress"></div>
				</div>
			</div>
		</div>
		
		
	</div>
	<div id="end"></div>
	<div id="panel-add-user">
		<div class="yui3-widget-bd">
			<form id="form-add-user" name="form-add-user">
				<fieldset>
					<table>
						<tr>
							<td>Tipe User</td>
							<td>
								<select name="user_level" id="user-level">
									<option value="tiket-merpati">Merpati</option>
									<option value="tiket-ekspress">Ekspress</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="user_name" id="username" placeholder=""></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" id="password" placeholder=""></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td><input type="text" name="name" id="name" placeholder=""></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email_login" id="email" placeholder=""></td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td><input type="text" name="job_position" id="jabatan" placeholder=""></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" name="address" id="address" placeholder=""></td>
						</tr>
						<tr>
							<td>Telepon/HP</td>
							<td><input type="text" name="phone" id="phone" placeholder=""></td>
						</tr>
						<tr>
							<td>Kota</td>
							<td><select name="city_id" id="city_id"></select></td>
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
		load_cities();
		load_users('tiket-merpati');
		load_users('tiket-ekspress');
	});
	function load_cities(){
		simple_load('<?php echo base_url();?>index.php/admin/get_cities', '#city_id', '');
	}
	
	function load_users(type){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_users_by_type/'+type,
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row: datajson[i].number_row, id:datajson[i].id, username:datajson[i].username, email: datajson[i].email, name: datajson[i].name, position: datajson[i].job_position, city: datajson[i].city, phone: datajson[i].phone, address: datajson[i].address};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_user = data;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					//{key:"id", label:"ID"},
					{key:"username", label:"User Name"},
					{key:"name", label:"Nama"},
					{key:"position", label:"Jabatan"},
					{key:"email", label:"Email"},
					{key:"phone", label:"Telepon/HP"},
					{key:"address", label:"Alamat"},
					{key:"city", label:"Kota"},
					{
						key:"id", 
						label: "Action",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/user_edit_page/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/admin/user_delete/{value}"><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
				],
				data: data_user,
				caption: "User Terdaftar, Tipe: "+type,
				rowsPerPage: 10
			});
			table.render("#list-"+type);
		});
	}
	
	YUI().use('panel', 'dd-plugin', function (Y) {
		function add_user(){
			var form = $('#form-add-user').serialize();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/user_add',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
					window.location.assign("<?php echo base_url('index.php/admin/setting_user_page/tiket');?>");
				}
			})
		}
		
		var addRowBtn  = Y.one('#add-data');
		// Create the main modal form for add bank
		var panel = new Y.Panel({
			srcNode      : '#panel-add-user',
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