<?php
	$uri2 = $this->uri->segment(2);
	if ($uri2 == 'setting_page')
		$uri3 = '';
	//else if ($uri2 == 'agent_page_by_status')
	//	$uri3 = $this->uri->segment(3);
	
?>
<!--slidemenu--> 
<div class="navigator">
	<div class="pagetitle"></div>
	<div id="top_menu">
		<ul class="sub0 sortleftmenu" id="ul_0" >
			<?php echo ($uri2=='setting_bank_page' ? '<li id="grp_5" class="selected">' : '<li id="grp_5">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_bank_page/bank_list" >Bank</a>
			</li>
			<?php echo ($uri2=='setting_user_page' ? '<li id="grp_4" class="selected">' : '<li id="grp_4">');?>
				<span >User Management
					<div class="nextrow">&nbsp;</div>
				</span>
				<ul class="sub1 sortleftmenu" id="ul_394" >
					<li id="grp_423">
						<a href="<?php echo base_url();?>index.php/admin/setting_user_page/office" >Office</a>
					</li>
					<li id="grp_424">
						<a href="<?php echo base_url();?>index.php/admin/setting_user_page/tiket" >Tiket</a>
					</li>
					<li id="grp_424">
						<a href="<?php echo base_url();?>index.php/admin/setting_user_page/uas" >UAS</a>
					</li>
				</ul>
			</li>
			<?php echo ($uri2=='setting_commission_page' ? '<li id="grp_12" class="selected">' : '<li id="grp_12">');?>
				<span >Commission
					<div class="nextrow">&nbsp;</div>
				</span>
				<ul class="sub1 sortleftmenu" id="ul_394" >
					<li id="grp_423">
						<a href="<?php echo base_url();?>index.php/admin/setting_commission_page/airline" >Pesawat</a>
					</li>
					<li id="grp_424">
						<a href="<?php echo base_url();?>index.php/admin/setting_commission_page/hotel" >Hotel</a>
					</li>
					<li id="grp_424">
						<a href="<?php echo base_url();?>index.php/admin/setting_commission_page/train" >Kereta</a>
					</li>
				</ul>
			</li>
			<?php echo ($uri2=='setting_city_page' ? '<li id="grp_401" class="selected">' : '<li id="grp_401">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_city_page" >City</a>
			</li>
			<?php echo ($uri2=='setting_agent_news_page' ? '<li id="grp_426" class="selected">' : '<li id="grp_426">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_agent_news_page" >Berita Agen</a>
			</li>
			<?php echo ($uri2=='setting_yahoo_page' ? '<li id="grp_426" class="selected">' : '<li id="grp_426">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_yahoo_page" >YM!</a>
			</li>
			<?php echo ($uri2=='setting_kurs_page' ? '<li id="grp_426" class="selected">' : '<li id="grp_426">');?>
				<a href="<?php echo base_url();?>index.php/admin/setting_kurs_page" >Kurs</a>
			</li>
		</ul>
	</div>
</div>