<div id="content-tengah">
<div id="judul-berita">Formulir Pendaftaran</div>




<script type="text/javascript" src="<?php echo base_url("js/valid-registrasi.min.js");?>"></script>
<form method="post" name="frmpendaftaran" action="<?php echo base_url(); ?>index.php/web/simpanregistrasi">


<table id="register_table">
		<tr>
			<td colspan="4"><div class="error"></div></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type='text' name='nama' autocomplete='off'/></td>
			<td class="error_nama"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>
			<input type='text' name='jenis_kelamin' autocomplete='off'/>
			</td>
			<td class="error_jenis_kelamin"></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><input type='text' name='tempat_lahir' autocomplete='off'/></td>
			<td class="error_tempat_lahir"></td>			
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>			
			<input type='text' name='tanggal_lahir' autocomplete='off'/>
			</td>
			<td class="error_tanggal_lahir"></td>
		</tr>
		<tr>
			<td>Nama Ayah</td>
			<td>:</td>
			<td><input type='text' name='nama_ayah' autocomplete='off'/></td>
			<td class="error_nama_ayah"></td>
		</tr>
		<tr>
			<td>Nama Ibu</td>
			<td>:</td>
			<td><input type='text' name='nama_ibu' autocomplete='off'/></td>
			<td class="error_nama_ibu"></td>
		</tr>
		<tr>
			<td>Pekerjaan Ayah</td>
			<td>:</td>
			<td><input type='text' name='pekerjaan_ayah' autocomplete='off'/></td>
			<td class="error_pekerjaan_ayah"></td>
		</tr>
		<tr>
			<td>Pekerjaan Ibu</td>
			<td>:</td>
			<td><input type='text' name='pekerjaan_ibu' autocomplete='off'/></td>
			<td class="error_pekerjaan_ibu"></td>
		</tr>
		<tr>
			<td>Penghasilan Orangtua</td>
			<td>:</td>
			<td>
			<select name='penghasilan'>
				<option value='-1'>--</option>
				<option value='Rp 500.000 - Rp 1.000.000'>Rp 500.000 - Rp 1.000.000</option>
				<option value='Rp 1.000.000 - Rp 2.000.000'>Rp 1.000.000 - Rp 2.000.000</option>
				<option value='Rp 2.000.000 >'>Rp 2.000.000 +</option>
			</select>
			</td>
			<td class="error_penghasilan"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>
			<textarea name='alamat_ortu' style="resize:none;"></textarea>
			</td>
			<td class="error_alamat_ortu"></td>
		</tr>
		<tr>
		<td colspan='4'>
			<input type='submit' value='Registrasi' name='simpan'/>
			<input type='reset' value='Hapus'  />
		</td>
		</tr>
	</table>
</form>
</div>
