<?php
	$uri3 = $this->uri->segment(3);
?>
<div id="content"  style="min-height:400px;"> 
  <!--content--> 
	
	<div class="frametab">
		<h3 style="margin:5px 0 5px 5px;">Proses Checkout</h3>
		<div id="data-order">
			<form name="form-checkout">
				<div id="data-general"></div>
				<div class="formFooter">
					<input class="mybutton" style="float:left" name="dbproses" type="button" value="Kembali ke halaman pesanan" onclick="document.location.href='<?php echo base_url();?>index.php/admin/booking_page';" />
				</div>
			</form>
		</div>
	</div> 

</div>

<script>
	
	
	$.ajax({
		type : "GET",
		url: '<?php echo base_url();?>index.php/admin/get_flight_order_by_id/<?php echo $uri3;?>',
	//	data: form,
	//	cache: false,
		dataType: "json",
		success:function(data){
			for(var i=0; i<data.responses.general[0].length;i++){
				$('#data-general').empty();
				$('#data-general').append('<table>\
					<tr>\
						<td>Nama Agen</td><td>'+data.responses.general[0].agent_name+'</td>\
						<td>Maskapai</td><td>'+data.responses.general[0].airline_name+'</td>\
						<td>Maskapai</td><td>'+data.responses.general[0].airline_name+'</td>\
					</tr>\
				</table>');
			}
		}
	})
</script>