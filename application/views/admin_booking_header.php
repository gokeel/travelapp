<?php
	$uri2 = $this->uri->segment(2);
	$uri3 = ($uri2=='booking_page' ? '' : $this->uri->segment(3));
?>
<!--slidemenu--> 
<div class="navigator">
	<div class="pagetitle"></div>
	<div id="top_menu">
		<ul class="sub0 sortleftmenu" id="ul_0" >
			<?php echo ($uri2=='booking_page' ? '<li id="grp_5" class="selected">' : '<li id="grp_5">');?>
				<a href="<?php echo base_url();?>index.php/admin/booking_page" >Pesanan Terbaru</a>
			</li>
			<?php echo ($uri2=='validate_payment' ? '<li id="grp_6" class="selected">' : '<li id="grp_6">');?>
				<a href="<?php echo base_url();?>index.php/admin/validate_payment" >Validasi Pembayaran Pelanggan</a>
			</li>
			<?php echo ($uri2=='booking_processed' ? '<li id="grp_4" class="selected">' : '<li id="grp_4">');?>
				<a href="<?php echo base_url();?>index.php/admin/booking_processed" >Pesanan Terproses</a>
			</li>
			<?php echo ($uri2=='booking_cancel' ? '<li id="grp_12" class="selected">' : '<li id="grp_12">');?>
				<a href="<?php echo base_url();?>index.php/admin/booking_cancelled" >Pesanan Batal</a>
			</li>
			<?php //echo ($uri3=='Trial' ? '<li id="grp_401" class="selected">' : '<li id="grp_401">');?>
			<!--	<a href="<?php echo base_url();?>index.php/admin/agent_page_by_status/Trial" >Agen Trial</a>
			</li>
			<li id="grp_426">
				<a href="http://www.hellotraveler.co.id/cms/tb/1/nav/426" >Agen Tree</a>
			</li>-->
			<!--<li id="grp_394">
				<span >Supplier
					<div class="nextrow">&nbsp;</div>
				</span>
				<ul class="sub1 sortleftmenu" id="ul_394" >
					<li id="grp_423">
						<a href="http://www.hellotraveler.co.id/cms/tb/1/nav/423" >Supplier Request</a>
					</li>
					<li id="grp_424">
						<a href="http://www.hellotraveler.co.id/cms/tb/1/nav/424" >Supplier Accept</a>
					</li>
					<li id="grp_425">
						<a href="http://www.hellotraveler.co.id/cms/tb/1/nav/425" >Supplier Reject</a>
					</li>
				</ul>
			</li>-->
		</ul>
	</div>
</div>