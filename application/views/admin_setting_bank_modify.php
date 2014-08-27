<?php
	$uri2 = $this->uri->segment(2);
	$id = $this->uri->segment(3);
	if ($uri2=='bank_edit')
		$msg = 'Data Bank';
	else $msg = 'Data Bank Via';
?>
<div id="content"  style="min-height:400px;"> 
  <!--content--> 
	
	<div class="frametab">
		<form class="myform" id="edit_form">
			<h3 style="margin:5px 0 5px 5px;">Ubah <?php echo $msg;?></h3>
			<table cellpadding="5"  id="table-modify"   cellspacing="0" border="0px" bgcolor="#FFFFFF" class="myTable" >
			<?php if ($uri2=='bank_edit') {?>	
				<tr class="editTR" >
					<td class="tdTitle">Nama Bank</td>
					<td><input name="bank_name" id="bank_name" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR">
					<td class="tdTitle">No Rekening</td>
					<td><input name="account_number" id="account_number" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR">
					<td class="tdTitle">Atas Nama</td>
					<td><input name="holder" id="holder" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR" >
					<td class="tdTitle">Cabang</td>
					<td><input name="branch" id="branch" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR">
					<td class="tdTitle">City</td>
					<td><input name="city" id="city" type="text" value="" size="60"></td>
				</tr>
			<?php }
			else {
			?>	
				<tr class="editTR" >
					<td class="tdTitle">Bank Via</td>
					<td><input name="via" id="bank_via" type="text" value="" size="60"></td>
				</tr>
				<tr class="editTR">
					<td class="tdTitle">Kode Bank Via</td>
					<td><input name="via_code" id="bank_via_code" type="text" value="" size="60"></td>
				</tr>
			<?php }?>
			</table>
			<div id="status"></div>
			<div class="formFooter">
				<input class="mybutton" style="float:left" name="dbproses" type="button" value="Cancel" onclick="document.location.href='<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list';" />
				<input class="mybutton" name="edit_data" id="edit_data" type="submit" value="Ubah Data" />
			</div>
		</form>
	</div> 

</div>

<script>
	function load_data_bank(uri){
		$.ajax({
			type : "GET",
			url: uri,
			dataType: "json",
			success:function(data){
				for(var i=0; i<data.length;i++){
					$('#bank_name').val(data[i].name);
					$('#account_number').val(data[i].account_number);
					$('#holder').val(data[i].holder_name);
					$('#branch').val(data[i].branch);
					$('#city').val(data[i].city);
				}
			}
		})
	}
	
	function load_data_bank_via(uri){
		$.ajax({
			type : "GET",
			url: uri,
			dataType: "json",
			success:function(data){
				for(var i=0; i<data.length;i++){
					$('#bank_via').val(data[i].via);
					$('#bank_via_code').val(data[i].via_code);
				}
			}
		})
	}
	
	$( window ).load(function() {
	<?php
		if ($uri2=='bank_edit')
			echo 'load_data_bank("'.base_url().'index.php/admin/bank_details/'.$id.'");';
		else
			echo 'load_data_bank_via("'.base_url().'index.php/admin/bank_via_details/'.$id.'");';
	?>	
	});
	$(document).ready(function() {
		$('#edit_data').click(function(event) {
			$('#status').empty();
			$('#status').append('<p>Sedang memproses, mohon tunggu...</p>');
			var form = $('#edit_form').serialize();
			event.preventDefault();
			$.ajax({
				type : "GET",
				url: "<?php 
					if($uri2=='bank_edit')
						echo base_url().'index.php/admin/bank_edit_by_id/'.$id;
					else
						echo base_url().'index.php/admin/bank_via_edit_by_id/'.$id;
				?>",
					
				data: form,
				cache: false,
				dataType: "json",
				success:function(data){
						if(data==false){
							alert('Data tidak berhasil dimasukkan. Mohon contact system administrator anda.');
						}
						else{
							var hel = 'temp';
							window.location.assign("<?php echo base_url('index.php/admin/setting_bank_page/bank_list');?>");
						}
					}
			})
		});
	});
</script>