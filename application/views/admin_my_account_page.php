<script type="text/javascript">
YUI().use('tabview', function(Y) {
    var tabview = new Y.TabView({srcNode:'#tabs'});
    tabview.render();
});
</script>
<div id="content"  style="min-height:400px;"> 
  <div class="frametab">
		<h3 style="margin:5px 0 5px 5px;">Daftar Semua User</h3>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Profil</a></li>
				<li><a href="#tabs-2">Ganti Password</a></li>
			</ul>
			<div>
				<div id="tabs-1">
					<div id="profile">
						<table cellpadding="5"  id="table-modify"   cellspacing="0" border="0px" bgcolor="#FFFFFF" class="myTable" >
							<tr class="editTR" >
								<td class="tdTitle">Username</td>
								<td><div id="user-name"></div></td>
							</tr>
							<tr class="editTR" >
								<td class="tdTitle">Email</td>
								<td><div id="email"></div></td>
							</tr>
							<tr class="editTR" >
								<td class="tdTitle">Tipe User</td>
								<td><div id="user-level"></div></td>
							</tr>
							<tr class="editTR" >
								<td class="tdTitle">Jabatan</td>
								<td><div id="jabatan"></div></td>
							</tr>
							<tr class="editTR" >
								<td class="tdTitle">Telepon/HP</td>
								<td><div id="phone"></div></td>
							</tr>
							<tr class="editTR" >
								<td class="tdTitle">Alamat</td>
								<td><div id="address"></div></td>
							</tr>
							<tr class="editTR" >
								<td>Kota</td>
								<td><div id="city"></div></td>
							</tr>
						</table>
						<div class="formFooter">
							<input class="mybutton" style="float:left" name="dbproses" type="button" value="Ubah Profil" onclick="document.location.href='<?php echo base_url();?>index.php/admin/user_edit_page/<?php echo $this->session->userdata('account_id');?>';" />
						</div>
					</div>
				</div>
				<div id="tabs-2">
					<div id="change-password">
						<form method="post" action="<?php echo base_url();?>index.php/admin/change_password/<?php echo $this->session->userdata('account_id');?>" name="form-chg-passwd">
							<table cellpadding="5"  id="table-modify"   cellspacing="0" border="0px" bgcolor="#FFFFFF" class="myTable" >
								<tr>
									<td>Password lama</td>
									<td><input type="password" name="password-now" /></td>
								</tr>
								<tr>
									<td>Password baru</td>
									<td><input type="password" name="password-new" /></td>
								</tr>
								
							</table>
							<input class="mybutton" id="edit_data" type="submit" value="Ubah Password" />
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		get_detail_user();
	})
	
	function get_detail_user(){
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_user_by_id/<?php echo $this->session->userdata('account_id');?>',
			dataType: "json",
			success:function(datajson){
					$('#user-name').append('<p>'+datajson.user_name+'</p>');
					$('#email').append('<p>'+datajson.email+'</p>');
					$('#user-level').append('<p>'+datajson.user_level+'</p>');
					$('#jabatan').append('<p>'+datajson.job_position+'</p>');
					$('#phone').append('<p>'+datajson.phone+'</p>');
					$('#address').append('<p>'+datajson.address+'</p>');
					$('#city').append('<p>'+datajson.city+'</p>');
			}
		});
	}
</script>