<?php
	$user_id = $this->uri->segment(3);
?>
<div id="content"  style="min-height:400px;"> 
	<div class="frametab">
		<form class="myform" id="edit_form" method="post" action="<?php echo base_url('index.php/admin/user_edit/'.$user_id);?>">
			<h3 style="margin:5px 0 5px 5px;">Ubah Data User</h3>
			<table cellpadding="5"  id="table-modify"   cellspacing="0" border="0px" bgcolor="#FFFFFF" class="myTable" >
				<tr class="editTR" >
					<td class="tdTitle">Username</td>
					<td><input name="user_name" id="user_name" type="text" value="" size="60" readonly></td>
				</tr>
				<tr class="editTR" >
					<td class="tdTitle">Email</td>
					<td><input name="email_login" id="email" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR" >
					<td class="tdTitle">Tipe User</td>
					<td><input name="user_level" id="user_level" type="text" value="" size="60" readonly></td>
				</tr>
				<tr class="editTR" >
					<td class="tdTitle">Jabatan</td>
					<td><input name="job_position" id="jabatan" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR" >
					<td class="tdTitle">Telepon/HP</td>
					<td><input name="phone" id="phone" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR" >
					<td class="tdTitle">Alamat</td>
					<td><input name="address" id="address" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR" >
					<td>Kota</td>
					<td><select name="city_id" id="city_id"></select></td>
				</tr>
			</table>
			<div class="formFooter">
				<input class="mybutton" id="edit_data" type="submit" value="Ubah Data" />
			</div>
		</form>
	</div>
</div>
<script>
	$( window ).load(function() {
		load_cities();
		get_detail_user();
	})
	
	function load_cities(){
		simple_load('<?php echo base_url();?>index.php/admin/get_cities', '#city_id', '');
	}
	
	function get_detail_user(){
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_user_by_id/<?php echo $this->uri->segment(3);?>',
			dataType: "json",
			success:function(datajson){
					$('#user_name').val(datajson.user_name);
					$('#email').val(datajson.email);
					$('#user_level').val(datajson.user_level);
					$('#jabatan').val(datajson.job_position);
					$('#phone').val(datajson.phone);
					$('#address').val(datajson.address);
					$('#city_id').val(datajson.city_id);
			}
		});
	}
</script>