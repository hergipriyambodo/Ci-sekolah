<div id="isi">
<h1>Tambah Data Siswa</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkelas"><div class="submitButton">Tambah Data Kelas</div></a>
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahsiswa"><div class="submitButton">Tambah Data Siswa</div></a>
<table width="100%">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpansiswa">
<tr><td width="200">Kelas</td><td width="10" align="center">:</td><td>
<select name="kelas" class="input">
<?php
foreach($kelas->result_array() as $k)
{
echo "<option value='".$k['id_kelas']."'>".$k['nama_kelas']." </option>";
}
?>
</select>
</td></tr>
<tr><td width="200">Nomor Induk Siswa</td><td width="10" align="center">:</td><td><input type="text" class="input" name="no_induk" size="50" /></td></tr>
<tr><td width="200">Nama Siswa</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nama" size="50" /></td></tr>
<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /></td></tr>
</form>
</table>
</div>