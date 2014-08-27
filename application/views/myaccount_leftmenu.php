<?php
	$uri_last = $this->uri->segment(2);
?>
<div id="account" class="row clearfix new-row">
	<div class="col-md-4 column">
		<div class="panel panel-primary account-border">
			<div class="panel-body">
				<h3 class="text-center font-color-2">Ocky Harliansyah</h3>
			</div>
			<div class="hr"></div>
			<div class="<?php echo (($uri_last=='order') ? 'panel-fill-3' : 'panel-body');?>">
				<!--<h3 class="panel-title">-->
				<a href="<?php echo base_url();?>index.php/account/order">Atur Pembelian</a>
				<!--</h3>-->
			</div>
			<div class="<?php echo (($uri_last=='confirmpayment') ? 'panel-fill-3' : 'panel-body');?>">
				<a href="<?php echo base_url();?>index.php/account/confirmpayment">Konfirmasi Pembayaran</a>
			</div>
			<div class="<?php echo (($uri_last=='profile') ? 'panel-fill-3' : 'panel-body');?>">
				<a href="<?php echo base_url();?>index.php/account/profile">Ubah Profil</a>
			</div>
			<div class="<?php echo (($uri_last=='changepasswd') ? 'panel-fill-3' : 'panel-body');?>">
				<a href="<?php echo base_url();?>index.php/account/changepasswd">Ganti Password</a>
			</div>
		</div>
	</div>

