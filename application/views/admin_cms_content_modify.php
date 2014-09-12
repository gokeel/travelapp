<div id="content"  style="min-height:400px;"> 
	<div class="frametab">
			<h3 style="margin:5px 0 5px 5px;">Ubah Konten</h3>
			<?php echo form_open_multipart('admin/edit_post/'.$id);?>
				<input type="hidden" name="post_id" value="<?php echo $id;?>">
				<input type="hidden" name="author" value="<?php echo $this->session->userdata('account_id');?>">
				<table cellpadding="5"  id="table-modify"   cellspacing="0" border="0px" bgcolor="#FFFFFF" class="myTable" >
					<tr class="editTR" >
						<td>Kategori</td>
						<td><select name="category" id="category"></select></td>
					</tr>
					<tr class="editTR" >
						<td class="tdTitle">Titel</td>
						<td><input name="title" id="title" type="text" value="" size="60"></td>
					</tr>
					<tr class="editTR" >
						<td class="tdTitle">Konten</td>
						<td><textarea name="content" id="content" type="text" value="" size="60"></textarea></td>
					</tr>
					<tr class="editTR" >
						<td class="tdTitle">Hot Promo</td>
						<td><input name="is_promo" id="is_promo-true" type="radio" value="true">Ya<br>
							<input name="is_promo" id="is_promo-false" type="radio" value="false">Tidak</td>
					</tr>
					<tr class="editTR" >
						<td class="tdTitle">Pasang Foto (ukuran max 1MB)</td>
						<td><div id="image-show"></div><input name="image" id="image" type="file" value="" size="60"></td>
					</tr>
					<tr class="editTR" >
						<td class="tdTitle">Price</td>
						<td><input name="price" id="price" type="text" value="" size="60"></td>
					</tr>
					<tr class="editTR" >
						<td>Status</td>
						<td><select name="status" id="status">
								<option value=""></option>
								<option value="draft">Draft</option>
								<option value="publish">Publish</option>
							</select>
						</td>
					</tr>
					<tr class="editTR" >
						<td class="tdTitle">Ditampilkan</td>
						<td><input name="enabled" id="enabled-true" type="radio" value="true">Ya<br>
							<input name="enabled" id="enabled-false" type="radio" value="false">Tidak</td>
					</tr>
				</table>
				<input type="submit" value="Submit">
			</form>		
	</div>
</div>
<script>
	$( window ).load(function() {
		simple_load('<?php echo base_url();?>index.php/admin/get_content_categories', '#category', '');
		load_content();
	})
	
	function load_content(){
		var data = [];
		var d = new Date(); 
		var image_path = '<?php echo base_url();?>assets/uploads/posts/';
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_content_by_id/<?php echo $id;?>',
			dataType: "json",
			success:function(datajson){
				$('#category').val(datajson.category);
				$('#title').val(datajson.title);
				$('textarea#content').val(datajson.content);
				$('#price').val(datajson.price);
				$('#status').val(datajson.status);
				$("#is_promo-"+datajson.is_promo).prop("checked", true);
				$("#enabled-"+datajson.enabled).prop("checked", true);
				$("#image-show").append('<img src="'+image_path+datajson.image+'?ver='+d.getTime()+'" alt="picture" width="250px" height="250px" />');
			}
		});
	}
</script>