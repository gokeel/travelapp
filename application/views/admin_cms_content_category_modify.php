<div id="content"  style="min-height:400px;"> 
	<div class="frametab">
		
		<h3 style="margin:5px 0 5px 5px;">Daftar Semua Kategori</h3>
		<div id="list">
			<form id="form-edit-cat" name="form-edit-cat" method="post" action="<?php echo base_url('index.php/admin/edit_category/'.$this->uri->segment(3));?>">
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
							<td><input type="radio" name="removable" id="yes" value="yes">Ya<br><input type="radio" name="removable" id="no" value="no">Tidak</td>
						</tr>
					</table>
				</fieldset>
				<input class="mybutton" style="float:left" name="dbproses" type="button" value="Batal" onclick="document.location.href='<?php echo base_url();?>index.php/admin/content_category_page';" />&nbsp;&nbsp;&nbsp;
				<input class="mybutton" style="float:center" id="edit_data" type="submit" value="Ubah Data" />
			</form>
		</div>
		
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_cat();
	})
	
	function load_cat(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_category_by_id/<?php echo $this->uri->segment(3);?>',
			dataType: "json",
			success:function(datajson){
				$('#category').val(datajson.category);
				$('#description').val(datajson.description);
				$("#"+datajson.removable).prop("checked", true);
			}
		});
	}
</script>