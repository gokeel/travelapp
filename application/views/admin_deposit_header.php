<?php
	$uri2 = $this->uri->segment(2);
	
?>
<!--slidemenu--> 
<div class="navigator">
	<div class="pagetitle"></div>
	<div id="top_menu">
		<ul class="sub0 sortleftmenu" id="ul_0" >
			<?php echo ($uri2=='setting_deposit_topup' ? '<li id="grp_5" class="selected">' : '<li id="grp_5">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Top Up</a>
			</li>
			<?php echo ($uri2=='setting_deposit_withdraw' ? '<li id="grp_6" class="selected">' : '<li id="grp_6">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Withdraw</a>
			</li>
			<?php echo ($uri2=='setting_deposit_redeem' ? '<li id="grp_7" class="selected">' : '<li id="grp_7">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Redeem Point</a>
			</li>
			<?php echo ($uri2=='setting_deposit_voucher' ? '<li id="grp_8" class="selected">' : '<li id="grp_8">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Voucher</a>
			</li>
			<?php echo ($uri2=='setting_deposit_manage' ? '<li id="grp_9" class="selected">' : '<li id="grp_9">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Manage Deposit</a>
			</li>
			<?php echo ($uri2=='setting_deposit_payment_registration' ? '<li id="grp_10" class="selected">' : '<li id="grp_10">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Payment Registration</a>
			</li>
		</ul>
	</div>
</div>