<div class="main fullwidth">
	<div id="data-bank" style="margin-left: 100px;margin-bottom:30px;">
		<h3>Pemesanan tiket telah selesai. ID pesanan anda adalah</h3>
		<h1 style="margin-left:150px;;color:red"><strong><u><?php echo $order_id;?></u></strong></h1>
		<h3>Mohon cek email anda sebagai pengingat ID pesanan ketika melakukan konfirmasi pembayaran</h3>
		<p><p>
		<h2><strong><u>Metode Pembayaran Tiket</u></strong></h2>
		<p>Mohon untuk melakukan pembayaran melalui opsi bank di bawah ini:</p>
	</div>
</div>
<script>
	$( window ).load(function() {
		$.ajax({
			type : "GET",
			url: "<?php echo base_url('index.php/order/get_banks');?>",
			//async: false,
			dataType: "json",
			success:function(data){
				$('#data-bank').append('<a class="border-order" style="text-align:left;" href="<?php echo base_url();?>index.php/order/confirm_payment">Konfirmasi Pembayaran</a>');
				$('#data-bank').append('<table border=0 id="table-bank" style="margin-left: 300px">');
				for (var i=0; i<data.length; i++){
					$('#table-bank').append('<tr>\
						<td><img src="<?php echo base_url();?>assets/images/payment/'+data[i].logo+'" width="150px" height="150px"></td>\
						<td><p>Bank '+data[i].bank_name+'</p>\
							<p>Cabang: '+data[i].branch+', '+data[i].city+'</p>\
							<p>Rekening: '+data[i].account_number+'</p>\
							<p>Atas Nama: '+data[i].holder+'</p>\
						</td>\
					</tr>');
				}
				
			}
		})
	})
</script>