<!-- Sidebar/drop-down menu -->
<section id="menu" role="complementary">

	<!-- This wrapper is used by several responsive layouts -->
	<div id="menu-content">

		<!--tpl:web/side_menu-->
		<header>
			<div> &nbsp; &nbsp; &nbsp; [ <a href="<?php echo base_url();?>index.php/admin/logout" style="color: #F70;">logout</a> ]</div>
		</header>

		<div id="profile">
			<img src="<?php echo base_url();?>assets/profile/thumb_IMG_20140225_1346171.jpg" width="50" height="50" alt="User name" class="user-icon">
				Hello 
				<span class="name">
					<a href="<?php echo base_url();?>/profile_edit" style="color:#fff">ONLINE TRAINING SYSTEM</a>
				</span>
		</div>
		<section class="navigable">
			<ul class="big-menu">
				<li>
					<a href="<?php echo base_url();?>index.php/agent/home" class="current navigable-current">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>form_issued_tiket" >Cart</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>form_issued_tiket" >Login Airlines</a>
				</li>
				<li class="with-right-arrow">
					<span>
						<span class="list-count">3</span>
						Deposit Menu
					</span>
					<ul class="big-menu">
						<li>
							<a href="<?php echo base_url();?>index.php/agent/topup_page" >Topup Deposit</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>index.php/agent/withdraw_page" >Tarik Deposit</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>reedem_point" >Reedem Point</a>
						</li>
					</ul>
				</li>
				<li class="with-right-arrow">
					<span>
						<span class="list-count">11</span>
						Laporan
					</span>
					<ul class="big-menu">
						<li>
							<a href="<?php echo base_url();?>history_tiket" >Booking Pesawat</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_tour" >Booking Tour</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_kereta" >Booking Kereta</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_hotel" >Booking Hotel</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_travel" >Booking Travel</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_rental" >Booking Rental</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>refund_history" >Laporan Refund</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>reschedule_history" >Lap Reschedule</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_topup" >Laporan Topup</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>history_withdraw" >Laporan Withdraw</a>
						</li>
						<li class="with-right-arrow">
							<span>
								<span class="list-count">3</span>
								History Transaksi
							</span>
							<ul class="big-menu">
								<li>
									<a href="<?php echo base_url();?>trx_history" >History Transaksi</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>history_graph_harian" >Transaksi Tiket</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>statistik_penjualan" >Statistik Transaksi</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="with-right-arrow">
					<span>
						<span class="list-count">3</span>
						Tiket Advance
					</span>
					<ul class="big-menu">
						<li>
							<a href="<?php echo base_url();?>tiket_group_booking" >Tiket Group Booking</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>form_refund" >Refund</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>form_reschedule" >Reschedule</a>
						</li>
					</ul>
				</li>
				<li class="with-right-arrow">
					<span>
						<span class="list-count">4</span>
						Profile
					</span>
					<ul class="big-menu">
						<li>
							<a href="<?php echo base_url();?>manage_staff" >Manage Staff</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>profile_edit" >Edit Profil</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>edit_logo" >Ubah Logo</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>change_password_form" >Ubah Password</a>
						</li>
					</ul>
				</li>
				<li class="with-right-arrow">
					<span>
						<span class="list-count">4</span>
						Agen Menu
					</span>
					<ul class="big-menu">
						<li>
							<a href="<?php echo base_url();?>register_agen" >Register Sub Agen</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>list_agen" >Daftar Agen</a>
						</li>
						<li class="with-right-arrow">
							<span>
								<span class="list-count">1</span>
								Transaksi Sub Agen
							</span>
							<ul class="big-menu">
								<li>
									<a href="<?php echo base_url();?>txs_tiket" >Tiket</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo base_url();?>download" >Download</a>
						</li>
					</ul>
				</li>
				<li class="with-right-arrow">
					<span>
						<span class="list-count">2</span>
						Tiket Monthly Cart
					</span>
					<ul class="big-menu">
						<li>
							<a href="<?php echo base_url();?>chart_airline" >Domestic Flight Chart</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>chart_airline_int" >International Flight Chart</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url();?>" >Landing Page</a>
				</li>
			</ul>
		</section>
		<ul class="unstyled-list">
			<li class="title-menu">Nominal Deposit</li>
			<li>
				<div id="deposit_amount" class="amount_div"><?php echo $money['deposit'];?></div>
			</li>
			
		</ul>

		<ul class="unstyled-list">
			<li class="title-menu">Nominal Voucher</li>
			<li>
				<div id="voucher_amount" class="amount_div"><?php echo $money['voucher'];?></div>
			</li>
			
		</ul>
		<ul class="unstyled-list">
			<li class="title-menu">Point Reward</li>
			<li>
				<div id="voucher_amount" class="amount_div"><?php echo $money['point_reward'];?> Poin</div>
			</li>
			
		</ul>
		<ul class="unstyled-list">
			<li class="title-menu">Support</li>
			<li>
				<div style="padding: 5px;"><ul id="ym_list"><li><a href="ymsgr:sendIM?halo.tiket5&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.tiket5&m=g&t=1" border="0"></a> <span>halo.tiket5</span></li><li><a href="ymsgr:sendIM?halo.tiket4&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.tiket4&m=g&t=1" border="0"></a> <span>halo.tiket4</span></li><li><a href="ymsgr:sendIM?halo.tiket3&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.tiket3&m=g&t=1" border="0"></a> <span>halo.tiket3</span></li><li><a href="ymsgr:sendIM?halo.accounting&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.accounting&m=g&t=1" border="0"></a> <span>halo.accounting</span></li><li><a href="ymsgr:sendIM?halo.hotel&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.hotel&m=g&t=1" border="0"></a> <span>halo.hotel</span></li><li><a href="ymsgr:sendIM?halo.transport&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.transport&m=g&t=1" border="0"></a> <span>halo.transport</span></li><li><a href="ymsgr:sendIM?halo.tiket6&m=hai..+hellotraveler."><img src="http://opi.yahoo.com/online?u=halo.tiket6&m=g&t=1" border="0"></a> <span>halo.tiket6</span></li></ul></div>
			</li>
			
		</ul>
		<ul class="unstyled-list">
			<li class="title-menu">Rekening Bank</li>
			<li><div style="margin: 10px 10px -2px 16px;">AN: HALO WISATAWAN INDONESIA</div>
			
				<div style="padding: 5px;">
					<ul id="ym_list">
						<?php foreach($bank->result_array() as $row){?>
						<li>
							<label class="rek_num"><?php echo $row['bank_name']?> </label>Cabang <?php echo $row['bank_branch'].', '.$row['bank_city'];?><br /> a/n. <?php echo $row['bank_holder_name'];?><br />
							Norek:<?php echo $row['bank_account_number'];?>
						</li>
						<?php } ?>
					</ul>
				</div>
			</li>
			
		</ul>
		<!--&tpl:web/side_menu-->

	</div>
		<!-- End content wrapper -->

		<!-- This is optional -->
	<footer id="menu-footer"></footer>
		 
</section>
	<!-- End sidebar/drop-down menu -->
