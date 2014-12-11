<div id="isi">
<?php
foreach($detail->result_array() as $k)
{
$nip = $k['nip'];
$nama = $k['nama_pegawai'];
$lahir = $k['kelahiran'];
$matpel = $k['matpel'];
$jk = $k['jk'];
$status = $k['status'];
$username = $k['username'];
$gambar = $k['gambar'];
$id = $k['id_kepegawaian'];
}
?>
<h1>Edit Kepegawaian</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkepegawaian"><div class="submitButton">Tambah Data Pegawai</div></a>
<table width="100%">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updatekepegawaian" enctype="multipart/form-data">
<tr><td width="200">Nomor Induk Pegawai</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nip" size="70" value="<?php echo $nip ?>" /></td></tr>
<tr><td width="200">Nama Pegawai</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nama_pegawai" size="70" value="<?php echo $nama ?>"/></td></tr>
<tr><td width="200">Kelahiran</td><td width="10" align="center">:</td><td><input type="text" class="input" name="kelahiran" size="70" value="<?php echo $lahir ?>" /></td></tr>
<tr><td width="200">Guru Mata Pelajaran</td><td width="10" align="center">:</td><td><input type="text" class="input" name="matpel" size="70" value="<?php echo $matpel ?>" /></td></tr>
<tr><td width="200">Jenis Kelamin</td><td width="10" align="center">:</td><td>
<select name="jk" class="input">
<?php
if($jk=='L')
{
?>
<option value="L" selected="selected">Laki-Laki</option><option value="P">Wanita</option></select>
<?php
}
else{
?>
<option value="L">Laki-Laki</option><option value="P" selected="selected">Wanita</option></select>
<?php
}
?>
</td></tr>
<tr><td width="200">Status</td><td width="10" align="center">:</td><td>
<select name="status" class="input">
<?php
if($status=='admin')
{
?>
<option value="guru">Guru</option><option value="admin" selected="selected">Administrator</option>
<?php
}
else {
?>
<option value="guru" selected="selected">Guru</option><option value="admin">Administrator</option>
<?php
}
?>

</select>
</td></tr>
<tr><td width="200">Username Login</td><td width="10" align="center">:</td><td><input type="text" class="input" name="username" size="70" value="<?php echo $username ?>" /></td></tr>
<tr><td width="200">Password Login</td><td width="10" align="center">:</td><td><input type="password" class="input" name="password" size="70" /> *Kosongkan saja jika tidak diganti</td></tr>
<tr><td width="200">Gambar</td><td width="10" align="center">:</td><td><input type="file"  name="gambar" /> *Kosongkan saja jika tidak diganti</td></tr>
<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="hidden" name="gambar_lama" value="<?php echo $gambar; ?>" /></td></tr>
</form>
</table>
</div>