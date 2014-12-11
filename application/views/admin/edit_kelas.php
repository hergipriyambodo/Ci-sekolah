<?php
foreach($detail->result_array() as $e){
$nama=$e["nama_kelas"];
$id=$e["id_kelas"];
}
?>
<div id="isi">
<h1>Edit Kelas</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkelas"><div class="submitButton">Tambah Data Kelas</div></a>
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahsiswa"><div class="submitButton">Tambah Data Siswa</div></a>
<table width="100%">
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updatekelas">
<tr><td width="200">Nama Kelas</td><td width="10" align="center">:</td><td><input type="text" class="input" name="nama" size="50" value="<?php echo $nama; ?>" /></td></tr>

<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" /><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
</form>
</table>
</div>