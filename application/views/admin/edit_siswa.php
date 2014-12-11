<div id="isi">
<h1>Edit Siswa</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkelas"><div class="submitButton">Tambah Data Kelas</div></a>
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahsiswa"><div class="submitButton">Tambah Data Siswa</div></a>
<table width="100%">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updatesiswa">
<tr><td width="200">Kelas</td><td width="10" align="center">:</td><td>
<?php
foreach($detail->result_array() as $d)
{
$id_kls=$d['id_kelas'];
$id_siswa=$d['id_siswa'];
$nama=$d['nama_siswa'];
$nis=$d['nis'];
}
?>
<select name="kelas" class="input">
<?php
foreach($kelas->result_array() as $k)
{
if($k['id_kelas']==$id_kls)
{
echo "<option value='".$k['id_kelas']."' selected='selected'>".$k['nama_kelas']."</option>";
}
else{
echo "<option value='".$k['id_kelas']."'>".$k['nama_kelas']."</option>";
}
}
?>
</select>
</td></tr>
<tr><td width="200">Nomor Induk Siswa</td><td width="10" align="center">:</td><td><input type="text" class="input" name="no_induk" size="50" value="<?php echo $nis; ?>" /></td></tr>
<tr><td width="200">Nama Siswa</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nama" size="50" value="<?php echo $nama; ?>" /></td></tr>
<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /><input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" /><input type="hidden" name="id_kelas" value="<?php echo $id_kls; ?>" /></td></tr>
</form>
</table>
</div>