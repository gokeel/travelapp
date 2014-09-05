<div id="content"  style="min-height:400px;"> 
  <!--content--> 
	
	<div class="frametab">
		<div id="data-detail">
			<table>
				<tr>
					<td><b>Username</b></td>
					<td><div id="username"></div></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><b>Tipe Agen</b></td>
					<td><div id="member-type"></div></td>
					<td><b>Nama Perusahaan</b></td>
					<td><div id="agent-name"></div></td>
				</tr>
				<tr>
					<td><b>Tanggal Bergabung</b></td>
					<td><div id="join-date"></div></td>
					<td><b>Alamat</b></td>
					<td><div id="address"></div></td>
				</tr>
				<tr>
					<td><b>No. Telp</b></td>
					<td><div id="agent-phone"></div></td>
					<td><b>Kota</b></td>
					<td><div id="city"></div></td>
				</tr>
				<tr>
					<td><b>Fax</b></td>
					<td><div id="agent-fax"></div></td>
					<td><b>Akun Yahoo!</b></td>
					<td><div id="yahoo"></div></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td><div id="agent-email"></div></td>
					<td><b>Website</b></td>
					<td><div id="website"></div></td>
				</tr>
				<tr>
					<td><b>Nama Manager</b></td>
					<td><div id="manager-name"></div></td>
					<td><b>Telp Manager</b></td>
					<td><div id="manager-phone"></div></td>
				</tr>
				<tr>
					<td><b>Email Manager</b></td>
					<td><div id="manager-email"></div></td>
					<td><b>Password</b></td>
					<td><div id="password"></div></td>
				</tr>
				<tr>
					<td><b>Agen Upline</b></td>
					<td><div id="parent-agent"></div></td>
					<td><b>Point Reward</b></td>
					<td><div id="point-reward"></div></td>
				</tr>
				<tr>
					<td><b>Jumlah Deposit</b></td>
					<td><div id="deposit-amount"></div></td>
					<td><b>Voucher</b></td>
					<td><div id="voucher"></div></td>
				</tr>
				<tr>
					<td><b>Status persetujuan</b></td>
					<td><div id="approved"></div></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div class="formFooter">
				<input class="mybutton" style="float:left" name="dbproses" type="button" value="Kembali ke halaman agen" onclick="document.location.href='<?php echo base_url();?>index.php/admin/agent_page';" />
			</div>
		</div>
	</div> 

</div>

<script>
	
	
	$.ajax({
		type : "GET",
		url: '<?php echo base_url();?>index.php/admin/get_agent_by_id/<?php echo $this->uri->segment(3);?>',
	//	data: form,
	//	cache: false,
		dataType: "json",
		success:function(data){
			for(var i=0; i<data.length;i++){
				document.getElementById('member-type').innerHTML = replace_undefined(data[i].agent_type) ;
				document.getElementById('username').innerHTML = replace_undefined(data[i].username);
				document.getElementById('agent-name').innerHTML = replace_undefined(data[i].agent_name);
				document.getElementById('join-date').innerHTML = replace_undefined(data[i].join_date);
				document.getElementById('address').innerHTML = replace_undefined(data[i].address);
				document.getElementById('agent-phone').innerHTML = replace_undefined(data[i].agent_phone);
				document.getElementById('city').innerHTML = replace_undefined(data[i].city);
				document.getElementById('agent-fax').innerHTML = replace_undefined(data[i].agent_fax);
				document.getElementById('yahoo').innerHTML = replace_undefined(data[i].yahoo);
				document.getElementById('agent-email').innerHTML = replace_undefined(data[i].agent_email);
				document.getElementById('website').innerHTML = replace_undefined(data[i].website);
				document.getElementById('license-number').innerHTML = replace_undefined(data[i].license_number);
				document.getElementById('manager-name').innerHTML = replace_undefined(data[i].manager_name);
				document.getElementById('manager-phone').innerHTML = replace_undefined(data[i].manager_phone);
				document.getElementById('manager-email').innerHTML = replace_undefined(data[i].manager_email);
				document.getElementById('password').innerHTML = replace_undefined(data[i].password);
				document.getElementById('parent-agent').innerHTML = replace_undefined(data[i].parent_agent);
				document.getElementById('point-reward').innerHTML = replace_undefined(data[i].point_reward);
				document.getElementById('deposit-amount').innerHTML = replace_undefined(data[i].deposit_amount);
				document.getElementById('voucher').innerHTML = replace_undefined(data[i].voucher);
				document.getElementById('approved').innerHTML = replace_undefined(data[i].approved);
				// buat image lisensi file
				var img = document.createElement('img');
				img.setAttribute('src', '<?php echo base_url();?>/assets/uploads/agent_license_files/'+data[i].license_file);
				img.setAttribute('height', '350');
				img.setAttribute('width', '400');
				img.setAttribute('alt', data[i].license_file)
				var el = document.getElementById('license-file');
				el.appendChild(img);
			}
		}
	})
</script>