<section role="main" id="main"><!--tpl:web/dasboard-->
<!-- Main content -->
	<noscript class="message black-gradient simpler">
		Your browser does not support JavaScript! Some features won't work as expected...
	</noscript>
	<hgroup id="main-title" class="thin">
		<h1 style="color:white">Penarikan/Withdrawal</h1>
	</hgroup>
	<form id="form-topup" name="form-topup" method="post" action="<?php echo base_url();?>index.php/agent/add_withdraw_request">
		<div class="with-padding">
			<div class="twelve-columns twelve-columns-tablet twelve-columns-mobile">
				<?php if($response!='') echo '<p>'.$response.'</p>';?>
				<h3 class="thin underline">Form Penarikan</h3>
				<input type="hidden" name="agent_id" value="<?php echo $this->session->userdata('account_id');?>">
				<input type="hidden" name="status" value="Requested">
				<p class="button-height inline-large-label">
					<label class="label">Maksimal Penarikan</label>
					<span id="maks_wd"><?php echo $deposit_amount;?></span>
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Nominal</label>
					<input id="nominal" class="input validate[required]" type="text" name="nominal">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Bank Tujuan</label>
					<input id="bank-to" class="input validate[required]" type="text" name="bank_to">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">No. Rekening Tujuan</label>
					<input id="receiver-number" class="input validate[required]" type="text" name="receiver_account_number">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Atas Nama Tujuan</label>
					<input id="receiver-name" class="input validate[required]" type="text" name="receiver_account_name">
				</p>
				<p class="button-height inline-large-label">
					<label class="label">Pesan</label>
					<input id="message" class="input validate[required]" type="text" name="message">
				</p>
				<div class="button-height">
					<input class="button blue-gradient" type="submit" value="Request Withdraw">
				</div>
				<div style="clear: both; height: 250px;"> </div>
				<p></p>
			</div>
		</div>
	</form>
</section>
