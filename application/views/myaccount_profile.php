<!-- Terusan dari myaccount_leftmenu.php -->
	<div class="col-md-8 column">
		<div class="panel panel-primary account-border">
			<label>Pilih profil yang akan diubah</label><br/>
			<select name="profile">
				<option value="1234">Ocky Harliansyah</option>
				<option value="2345">Sir Nordy</option>
				<option value="3456" >Irfan Nugnug</option>
			</select>
			<a id="modal-add-profile" href="#modal-container-add-profile" role="button" class="btn" data-toggle="modal"><img src="<?php echo IMAGES_DIR;?>/add.png" style="width:30px; height:30px;" />Tambah Profil</a>
			<div class="modal fade" id="modal-container-add-profile" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header panel-fill-1">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
							<h4 class="modal-title" id="myModalLabel">
								Tambah profil untuk memudahkan registrasi penumpang
							</h4>
						</div>
						<div class="modal-body panel-fill-2" id="modal-body">
							<form method="GET">
								<table border=0>
									<tr>
										<td>Title/Gelar</td>
										<td>
											<select name="title">
												<option value="Mr.">Mr.</option>
												<option value="Mrs.">Mrs.</option>
												<option value="Ms.">Ms.</option>
											</select>
										</td>
									<tr>
									<tr>
										<td>Nama Depan</td>
										<td>
											<input type="text" class="tb8" />
										</td>
									<tr>
									<tr>
										<td>Nama Belakang</td>
										<td>
											<input type="text" class="tb8" />
										</td>
									<tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>
											<input type="radio" name="sex" value="male">  Laki-laki<br>
											<input type="radio" name="sex" value="female">  Perempuan
										</td>
									</tr>
									<tr>
										<td>Nomor Kartu Identitas<br/>(KTP/SIM/Kartu Pelajar)</td>
										<td>
											<input type="text" class="tb8" />
										</td>
									</tr>
									<tr>
										<td>Nomor Telepon/HP<span style="font-size:11px;color:#F00;"><br/>*Format: +62815814xxxx</span></td>
										<td>
											<input type="text" class="tb8" />
										</td>
									</tr>
									<tr>
										<td>Tanggal Lahir</td>
										<td>
											<select name="tgllahir">
												<?php
													for ($i=1; $i<=31; $i++)
														echo '<option value="'.$i.'">'.$i.'</option>';
												?>
											</select>
											<select name="blnlahir">
												<?php
													for ($i=1; $i<=12; $i++)
														echo '<option value="'.$i.'">'.$i.'</option>';
												?>
											</select>
											<select name="thnlahir">
												<?php
													for ($i=date("Y"); $i>=1910; $i--)
														echo '<option value="'.$i.'">'.$i.'</option>';
												?>
											</select>
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div class="modal-footer panel-fill-1" style="margin-top:0px;">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary btn-submit"><img src="<?php echo IMAGES_DIR;?>/add.png" style="width:30px; height:30px;" />Tambah</button>
						</div>
					</div>
					
				</div>
				
				</div>
			<div class="hr new-row"></div>
			<div class="new-row">
				<form method="get">
				<div class="row clearfix">
					<div class="col-md-6 column">
						<table>
							<tr>
								<td>Title/Gelar<br/>
								
									<select name="title">
										<option value="Mr.">Mr.</option>
										<option value="Mrs.">Mrs.</option>
										<option value="Ms.">Ms.</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Nama Depan<br/>
									<input type="text" class="tb8" />
								</td>
							</tr>
							<tr>
								<td>Nama Belakang<br/>
									<input type="text" class="tb8" />
								</td>
							</tr>
							<tr>
								<td>Jenis Kelamin<br/>
								
									<input type="radio" name="sex" value="male">  Laki-laki<br>
									<input type="radio" name="sex" value="female">  Perempuan
								</td>
							</tr>
						</table>
					</div>
					<div class="col-md-6 column">
						<table>
							<tr>
								<td>Nomor Kartu Identitas (KTP/SIM/Kartu Pelajar)<br/>
									<input type="text" class="tb8" />
								</td>
							</tr>
							<tr>
								<td>Nomor Telepon/HP<span style="font-size:11px;color:#F00;"> *Format: +62815814xxxx</span><br/>
									<input type="text" class="tb8" />
								</td>
							</tr>
							<tr>
								<td>Tanggal Lahir<br/>
									<select name="tgllahir">
										<?php
											for ($i=1; $i<=31; $i++)
												echo '<option value="'.$i.'">'.$i.'</option>';
										?>
									</select>
									<select name="blnlahir">
										<?php
											for ($i=1; $i<=12; $i++)
												echo '<option value="'.$i.'">'.$i.'</option>';
										?>
									</select>
									<select name="thnlahir">
										<?php
											for ($i=date("Y"); $i>=1910; $i--)
												echo '<option value="'.$i.'">'.$i.'</option>';
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" class="btn btn-primary btn-submit" value="Ubah Profile"/>
								</td>
							</tr>
						</table>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>