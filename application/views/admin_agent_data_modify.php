<!--slidemenu--> 
<?php
	if ($this->uri->segment(2)=='edit_agent')
		$editable = True;
	else
		$editable = False;
?>

<div id="content"  style="min-height:400px;"> 
  <!--content--> 
	
	<div class="frametab">
		<form method="post" action="<?php echo ($editable ? base_url().'index.php/admin/agent_edit/'.$this->uri->segment(3) : base_url().'index.php/admin/agent_add');?>" accept-charset="utf-8" class="myform" id="add_form" enctype="multipart/form-data">
			<h3 style="margin:5px 0 5px 5px;"><?php echo ($editable ? 'Ubah Data Agen' : 'Tambah Data Agen');?></h3>
			<table cellpadding="5"  id="table-modify"   cellspacing="0" border="0px" bgcolor="#FFFFFF" class="myTable" >
				<tr id="trid" class="editTR" style="display:none;">
					<td class="tdTitle">Id</td>
					<td><p id="temp-value"></p></td>
				</tr>
				<tr id="trmember_type" class="editTR" >
					<td class="tdTitle">Tipe Agen</td>
					<td>
						<select name="member_type" data-placeholder="-- Pilih Member Type --" id="member_type"  class="validate[required]  chzn-select">
							<!--<option value="" selected="selected"></option>
							<option value="1">Franchise</option>
							<option value="2">Agen</option>
							<option value="3">Sub Agen</option>
							<option value="4">Customer</option>-->
						</select>
						<span class="bintang">*</span>
					</td>
				</tr>
				<tr id="trcompany_name" class="editTR" >
					<td class="tdTitle">Username</td>
					<td><input name="username" id="username" type="text" value="" size="60" <?php if($editable) echo 'readonly';?>></td>
				</tr>
				<tr id="trcompany_name" class="editTR" >
					<td class="tdTitle">Nama Agen</td>
					<td><input name="company_name" id="company_name" type="text" value="" size="60"></td>
				</tr>
				<tr id="trcompany_logo" class="editTR" style="display:none;">
					<td class="tdTitle">Logo Agen</td>
					<td></td>
				</tr>
				<script>
					$(function() {
						$( "#join_date" ).datepicker({"dateFormat": "yy-mm-dd"});
					});
				</script>
				<tr id="trjoin_date" class="editTR" >
					<td class="tdTitle">Tanggal Bergabung</td>
					<td><input name="join_date" id="join_date" value= "" size="20" /></td>
				</tr>
				<tr id="traddress" class="editTR" >
					<td class="tdTitle">Alamat</td>
					<td><textarea class="no_editor" id="address" name="address"   cols="100" rows="8"></textarea></td>
				</tr>
				<tr id="trtelp_no" class="editTR" >
					<td class="tdTitle">No. Telp</td>
					<td><input name="telp_no" id="telp_no" type="text" value="" size="60"></td>
				</tr>
				<tr id="trid_propinsi" class="editTR" style="display:none;">
					<td class="tdTitle">Id Propinsi</td>
					<td></td>
				</tr>
				<tr id="trid_kota" class="editTR" >
					<td class="tdTitle">Kota</td>
					<td>
						<select name="id_kota" data-placeholder="-- Pilih Kota --" id="id_kota" class="chzn-select">
						</select>
					</td>
				</tr>
				<tr id="trfax" class="editTR" >
					<td class="tdTitle">Fax</td>
					<td><input name="fax" style="font-size:14px" id="fax" type="text"   value="" ></td>
				</tr>
				<tr id="tryahoo_account" class="editTR" >
					<td class="tdTitle">Akun Yahoo!</td>
					<td><input name="yahoo_account" id="yahoo_account" type="text" value="" size="60"></td>
				</tr>
				<tr id="trwebsite" class="editTR" >
					<td class="tdTitle">Website</td>
					<td><input name="website" id="website" type="text" value="" size="60"></td>
				</tr>
				<tr id="tremail" class="editTR" >
					<td class="tdTitle">Email</td>
					<td><input name="email" id="email" type="text" value="" size="60"></td>
				</tr>
				<!--<tr id="trlisensi_number" class="editTR" >
					<td class="tdTitle">No KTP/SIM/Identitas lain</td>
					<td><input name="lisensi_number" id="lisensi_number" type="text" value="" size="60">
					</td>
				</tr>
				<tr id="trlisensi_file" class="editTR" >
					<?php //echo form_open_multipart('admin/do_upload');?>
					<td class="tdTitle">Berkas Identitas</td>
					<td>
						<?php if ($editable)
							echo '<div id="license-file"></div><label>Klik Browse untuk mengganti</label>';
						?>
						<input name="lisensi_file" type="file" id="lisensi_file" size="40" class="fileupload" />
					</td>
				</tr>-->
				<tr id="trmanager_name" class="editTR" >
					<td class="tdTitle">Nama Manager</td>
					<td><input name="manager_name" id="manager_name" type="text" value="" size="60"></td>
				</tr>
				<tr id="trmanager_phone" class="editTR" >
					<td class="tdTitle">Telp Manager</td>
					<td><input name="manager_phone" id="manager_phone" type="text" value="" size="60"></td>
				</tr>
				<tr id="tremail_manager" class="editTR" >
					<td class="tdTitle">Email Manager</td>
					<td><input name="manager_email" id="email_manager" type="text" value="" size="60"></td>
				</tr>
				<tr id="trid_agen_upline" class="editTR" >
					<td class="tdTitle">Agen Upline</td>
					<td>
						<select name="id_agen_upline" data-placeholder="-- Pilih M-Agen --" id="id_agen_upline" class="chzn-select">
						</select>
					</td>
				</tr>
				<?php
					if (!$editable){
						echo '<tr id="trpassword" class="editTR" >';
						echo '<td class="tdTitle">Password</td>';
						echo '<td><input name="password" id="password" type="password" value="" size="60"></td>';
						echo '</tr>';
					}					
				?>
				<tr id="trdeposit_amount" class="editTR" >
					<td class="tdTitle">Jumlah Deposit</td>
					<td><input name="deposit_amount" id="deposit_amount" type="text" value="" size="60"></td>
				</tr>
				<tr id="trvoucher" class="editTR" >
					<td class="tdTitle">Voucher</td>
					<td><input name="voucher" id="voucher" type="text" value="" size="60"></td>
				</tr>
				<tr id="trdeposit_lock" class="editTR" style="display:none;">
					<td class="tdTitle">Deposit Lock</td>
					<td></td>
				</tr>
				<tr id="trapproved" class="editTR" >
					<td class="tdTitle">Approved</td>
					<td>
						<select name="approve" data-placeholder="-- Pilih approved --" id="approved" class="chzn-select">
							<option value="Trial">Trial</option>
							<option value="No">Tidak</option>
							<option value="Yes">Ya</option>
							<option value="Rejected">Rejected</option>
						</select>
					</td>
				</tr>
				<tr id="trpoint_reward" class="editTR" >
					<td class="tdTitle">Point reward</td>
					<td><input name="point_reward" id="point_reward" type="text" value="" size="60"></td>
				</tr>
			</table>
			<div id="status"></div>
			<div class="formFooter">
				<input class="mybutton" style="float:left" name="dbproses" type="button" value="Cancel" onclick="document.location.href='<?php echo base_url();?>index.php/admin/agent_page';" />
				<?php
					if ($editable)
						echo '<input class="mybutton" name="edit_data" id="edit_data" type="submit" value="Ubah Data" />';
					else
						echo '<input class="mybutton" name="add_data" id="add_data" type="submit" value="Tambah Data" />';
				?>
				
			</div>
			<input name="protabID" type="hidden" value="5[%]" />
		</form>
	</div> 

</div>

<script>
	function get_id_by_agent_id(uri){
		var id = '<?php echo $this->uri->segment(3);?>';
		var result;
		$.ajax({
			type : "GET",
			async: false,
			url: uri+id,
			dataType: "json",
			success:function(data){
				for(var i=0; i<data.length;i++)
					result = data[i].id;
			}
		});
		//var tmp = result;
		return result;
	}
	
	function load_agents(){
		<?php 
			if ($editable){
		?>
				var city_id = get_id_by_agent_id('<?php echo base_url();?>index.php/admin/get_upline_by_agent_id/');
				simple_load('<?php echo base_url();?>index.php/admin/get_agents', '#id_agen_upline', city_id);
		<?php
			}
			else {
		?>
				simple_load('<?php echo base_url();?>index.php/admin/get_agents', '#id_agen_upline', '');
		<?php	
			}
		?>
	}
	
	function load_cities(){
		<?php 
			if ($editable){
		?>
				var city_id = get_id_by_agent_id('<?php echo base_url();?>index.php/admin/get_city_by_agent_id/');
				simple_load('<?php echo base_url();?>index.php/admin/get_cities', '#id_kota', city_id);
		<?php
			}
			else {
		?>
				simple_load('<?php echo base_url();?>index.php/admin/get_cities', '#id_kota', '');
		<?php	
			}
		?>
		
	}
	
	function load_agent_types(){
		<?php 
			if ($editable){
		?>
				var agent_type = get_id_by_agent_id('<?php echo base_url();?>index.php/admin/get_agent_type_by_agent_id/');
				simple_load('<?php echo base_url();?>index.php/admin/get_agent_types', '#member_type', agent_type);
		<?php
			}
			else {
		?>
				simple_load('<?php echo base_url();?>index.php/admin/get_agent_types', '#member_type', '');
		<?php	
			}
		?>
	}
	
	function simple_load(uri, el_sel, selected_id){
		$.ajax({
			type : "GET",
			url: uri,
			dataType: "json",
			success:function(data){
				insert_select(el_sel, data, selected_id);
			}
		})
	}
	
	function insert_select(el_sel, data, selected_id){
		
		var sel = $(el_sel);
		for(var i=0; i<data.length;i++){
			if (selected_id == '')
				sel.append('<option value="'+data[i].value+'">'+data[i].name+'</option>');
			else {
				if (selected_id == data[i].value)
					sel.append('<option value="'+data[i].value+'" selected="selected">'+data[i].name+'</option>');
				else
					sel.append('<option value="'+data[i].value+'">'+data[i].name+'</option>');
			}
		}
	}
	
	
	
	$( window ).load(function() {
		load_agents();
		load_cities();
		load_agent_types();
		<?php if ($editable) echo 'load_data_edit();';?>
		
	});
	
	function load_data_edit(){
		$.ajax({
			type : "GET",
			url: '<?php echo base_url();?>index.php/admin/get_agent_by_id/<?php echo $this->uri->segment(3);?>',
		//	data: form,
		//	cache: false,
			dataType: "json",
			success:function(data){
				for(var i=0; i<data.length;i++){
					//document.getElementById('member-type').innerHTML = replace_undefined(data[i].agent_type) ;
					$('#username').val(replace_undefined(data[i].username));
					$('#company_name').val(replace_undefined(data[i].agent_name));
					$('#join_date').val(replace_undefined(data[i].join_date));
					$('#address').val(replace_undefined(data[i].address));
					$('#telp_no').val(replace_undefined(data[i].agent_phone));
					$('#fax').val(replace_undefined(data[i].agent_fax));
					$('#yahoo_account').val(replace_undefined(data[i].agent_yahoo));
					$('#email').val(replace_undefined(data[i].agent_email));
					$('#website').val(replace_undefined(data[i].website));
					$('#lisensi_number').val(replace_undefined(data[i].license_number));
					$('#manager_name').val(replace_undefined(data[i].manager_name));
					$('#manager_phone').val(replace_undefined(data[i].manager_phone));
					$('#email_manager').val(replace_undefined(data[i].manager_email));
					$('#password').val(replace_undefined(data[i].password));
					$('#point_reward').val(replace_undefined(data[i].point_reward));
					$('#deposit_amount').val(replace_undefined(data[i].deposit_amount));
					$('#voucher').val(replace_undefined(data[i].voucher));
					$('#approved').val(replace_undefined(data[i].approved));
					// buat image lisensi file
					/*var img = document.createElement('img');
					img.setAttribute('src', '<?php echo base_url();?>/assets/uploads/agent_license_files/'+data[i].license_file);
					img.setAttribute('height', '350');
					img.setAttribute('width', '400');
					img.setAttribute('alt', data[i].license_file)
					var el = document.getElementById('license-file');
					el.appendChild(img);*/
				}
			}
		})
	}
	
	$(document).ready(function() {
		$('#rewadd_data').click(function(event) {
			$('#status').empty();
			$('#status').append('<p>Sedang memproses, mohon tunggu...</p>');
			var form = $('#add_form').serialize();
			event.preventDefault();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/agent_add',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
						if(data==false){
							alert('Data tidak berhasil dimasukkan. Mohon contact system administrator anda.');
						}
						else{
							var hel = 'temp';
							//window.location.assign("<?php echo base_url('index.php/admin/agent_page');?>");
						}
					}
			})
		});
		$('#rewedit_data').click(function(event) {
			$('#status').empty();
			$('#status').append('<p>Sedang memproses, mohon tunggu...</p>');
			var form = $('#add_form').serialize();
			event.preventDefault();
			$.ajax({
				type : "GET",
				url: '<?php echo base_url();?>index.php/admin/agent_edit/<?php echo $this->uri->segment(3);?>',
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
						if(data==false){
							alert('Data tidak berhasil dimasukkan. Mohon contact system administrator anda.');
						}
						else{
							var hel = 'temp';
							//window.location.assign("<?php echo base_url('index.php/admin/agent_page');?>");
						}
					}
			})
		});
	});
</script>