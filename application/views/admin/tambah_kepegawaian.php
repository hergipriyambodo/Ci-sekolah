<div id="isi">
<h1>Tambah Kepegawaian</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkepegawaian"><div class="submitButton">Tambah Data Pegawai</div></a>
<table width="100%">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpankepegawaian" enctype="multipart/form-data">
<tr><td width="200">Nomor Induk Pegawai</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nip" size="70" /></td></tr>
<tr><td width="200">Nama Pegawai</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nama_pegawai" size="70" /></td></tr>
<tr><td width="200">Kelahiran</td><td width="10" align="center">:</td><td><input type="text" class="input" name="kelahiran" size="70" /></td></tr>
<tr><td width="200">Guru Mata Pelajaran</td><td width="10" align="center">:</td><td><input type="text" class="input" name="matpel" size="70" /></td></tr>
<tr><td width="200">Jenis Kelamin</td><td width="10" align="center">:</td><td>
<select name="jk" class="input"><option value="L">Laki-Laki</option><option value="P">Wanita</option></select>
</td></tr>
<tr><td width="200">Status</td><td width="10" align="center">:</td><td>
<select name="status" class="input"><option value="guru">Guru</option><option value="admin">Administrator</option></select>
</td></tr>
<tr><td width="200">Username Login</td><td width="10" align="center">:</td><td><input type="text" class="input" name="username" size="70" /></td></tr>
<tr><td width="200">Password Login</td><td width="10" align="center">:</td><td><input type="password" class="input" name="password" size="70" /></td></tr>
<tr><td width="200">Gambar</td><td width="10" align="center">:</td><td><input type="file"  name="gambar" /></td></tr>
<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /></td></tr>
</form>
</table>
</div>