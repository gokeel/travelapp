<!--Cindy Nordiansyah -->
<div class="main fullwidth">
	<section class="content" style="padding-top:10px; background:#DDD"> <!-- Content -->
		<div class="container">
			<?php
				if ($this->uri->segment(3)=="success"){
				  echo '<h4>Masukan anda telah kami terima</h4>';
                  echo '<p>Kami akan segera menghubungi anda pada jam kerja.</p>';
				}
			?>
			<div class="span8 boxfix" style="margin-right:10px">            
				<div style="font-family:Arial; font-size:24px; font-weight:bold; color:#FF9900; padding-bottom:20px">
					<h3>Paket Wisata</h3>
					<p style="font-size:12px;color:black">Mohon untuk mengisi semua input berikut ini:</p>
					<form action="<?php echo base_url();?>index.php/order/order_paket" method="post" id="wisata">
						<!--<input type="hidden" name="member_type" value="2">-->
						<!--<input type="hidden" name="id_agen_upline" value="2">-->
						<input type="hidden" name="paket" value="<?php echo $this->uri->segment(3); ?>">
						<div style="width:15%"><label>Nama Lengkap</label></div>
						<div style="width:35%">    <input type="text" name="company_name" id="company_name" value="" size="40"tabindex="2"/></div>
						<div style="width:15%"><label>Telepon/HP</label></div>
						<div style="width:35%">    <input type="text" name="telp_no" id="telp_no" value="" size="40" tabindex="3"/></div>
						<div style="width:15%"><label>Email</label></div>
						<div style="width:35%">    <input type="email" name="email" id="email" value="" size="40" tabindex="3"/></div>
						
						
						<p class="input-wrap">
						<p style="color:black;font-size:11px;">By clicking the "submit" button below, i agree with hellotraveler.co.id <a href="" target="_blank">Privacy Policy</a> and <a href="" target="_blank">Terms &amp; Condition</a>.
						<input class="button" name="submit" type="submit" id="submit" tabindex="5" value="submit" />
						</p>
					</form>
				</div>
			</div>
			
		</div>
	</section>

</div> <!-- Close Header Wrapper -->  
    <div class="main homepage">
      <div class="container"> 
        <!--Dapatkan kemudahan transaksi melalui bebasterbang.com. Kami hadir untuk memberi solusi yang efektif dalam hal perjalanan dan liburan Anda.-->
        <div class="row-fluid" style="margin-bottom:10px;">
          <!-- KOLOM HOTEL MURAH  -->       
<div class="span8 boxfix" style="margin-right:10px">
</div>