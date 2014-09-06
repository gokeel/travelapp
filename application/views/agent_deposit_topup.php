<section role="main" id="main"><!--tpl:web/dasboard-->
<!-- Main content -->
	<noscript class="message black-gradient simpler">
		Your browser does not support JavaScript! Some features won't work as expected...
	</noscript>
	<hgroup id="main-title" class="thin">
		<h1 style="color:white">Form Top-Up</h1>
	</hgroup>
	<form id="form-topup" name="form-topup" method="post" action="<?php echo base_url();?>index.php/agent/add_deposit_request">
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<?php if($response!='') echo '<p>'.$response.'</p>';?>
				<h3 class="thin underline">Deposit via Transfer</h3>
				<input type="hidden" name="agent_id" value="<?php echo $this->session->userdata('account_id');?>">
				<input type="hidden" name="status" value="Requested">
				<p class="button-height inline-large-label">
					<label class="label">Dari Bank</label>
					<input id="bank-from" class="input validate[required]" type="text" name="bank_from">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">No. Rekening Pengirim</label>
					<input id="sender-number" class="input validate[required]" type="text" name="sender_account_number">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Nama Pengirim</label>
					<input id="sender-name" class="input validate[required]" type="text" name="sender_account_name">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Nominal Top-Up</label>
					<input id="nominal" class="input validate[required]" type="text" name="nominal">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Bank Tujuan</label>
					<select name="bank_receiver_id" id="bank-tujuan"></select>
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Tanggal Transfer</label>
					<input id="tgl-transfer" class="input validate[required]" type="text" name="transfer_date">
				</p>
				<div class="button-height">
					<input class="button blue-gradient" type="submit" value="Request Deposit">
				</div>
				<div style="clear: both; height: 250px;"> </div>
				<p></p>
			</div>
		</div>
	</form>
</section>
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