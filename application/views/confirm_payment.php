<div class="main fullwidth">
	<div id="thank-you" style="text-align:center">
		<?php
			if($thank_you)
			{
				echo '<h3>Terima kasih telah melakukan konfirmasi pembayaran. Kami akan segera memproses pemesanan anda.</h3>';
			}
		?>
	</div>
	<div id="data-bank" style="margin-left: 100px;margin-bottom:30px;">
		<form method="post" name="form-confirm" id="form-confirm" action="<?php echo base_url();?>index.php/order/confirm_payment_order">	
			<table>
				<tr>
					<td>Order ID</td>
					<td>
						<input type="text" class="tb10" name="order_id" />
					</td>
				</tr><tr>
					<td>Tanggal Transfer</td>
					<td>
						<input type="text" class="tb10" id="tgl-transfer" name="tgl_transfer" />
					</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>
						<select name="bank_tujuan" id="bank-tujuan">
						</select>
					</td>
				</tr>
				<tr>
					<td>Jumlah Dana</td>
					<td>
						<input type="text" class="tb10" name="total"/>
					</td>
				</tr>
				<tr>
					<td>Nama Pemilik Rekening</td>
					<td>
						<input type="text" class="tb10" name="sender"/>
					</td>
				</tr>
				<tr>
					<td>Catatan Tambahan</td>
					<td>
						<textarea name="note"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" class="btn btn-primary btn-submit" value="Submit"/>
					</td>
				</tr>
			</table>
		</form>
		
	</div>
</div>
<script>
	$(function() {
		$( "#tgl-transfer" ).datepicker({"dateFormat": "yy-mm-dd"});
	});

	$( window ).load(function() {
		$.ajax({
			type : "GET",
			url: "<?php echo base_url('index.php/order/get_banks');?>",
			//async: false,
			dataType: "json",
			success:function(data){
				//$('#bank-tujuan').append('<table border=0 id="table-bank" style="margin-left: 300px">');
				for (var i=0; i<data.length; i++){
					$('#bank-tujuan').append('<option value="'+data[i].bank_id+'">'+data[i].bank_name+'</option>');
				}
				
			}
		})
	})
</script>