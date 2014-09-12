<?php
	$uri2 = $this->uri->segment(2);
	$uri3 = ($uri2=='booking_page' ? '' : $this->uri->segment(3));
?>
<!--slidemenu--> 
<div class="navigator">
	<div class="pagetitle"></div>
	<div id="top_menu">
		<ul class="sub0 sortleftmenu" id="ul_0" >
			<?php echo ($uri2=='cms_page' ? '<li id="grp_5" class="selected">' : '<li id="grp_5">');?>
				<a href="<?php echo base_url();?>index.php/admin/cms_page" >Contents</a>
			</li>
			<?php echo ($uri2=='content_category_page' ? '<li id="grp_6" class="selected">' : '<li id="grp_6">');?>
				<a href="<?php echo base_url();?>index.php/admin/content_category_page" >Content Category</a>
			</li>
			<?php echo ($uri2=='content_add_page' ? '<li id="grp_4" class="selected">' : '<li id="grp_4">');?>
				<a href="<?php echo base_url();?>index.php/admin/content_add_page" >Add New Content</a>
			</li>
		</ul>
	</div>
</div>