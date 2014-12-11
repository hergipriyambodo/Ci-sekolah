<div id="isi">
<h1>Module Hubungi Kami</h1>
<br>
<!-- Batas Content -->
<?php
foreach($detail->result_array() as $d)
{
	$id = $d['id_pesan'];
	$nama = $d['nama'];
	$email = $d['email'];
	$pesan = $d['pesan'];
	$status = $d['status'];
}
?>
<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updatehubungi">
<table width="100%" style="border:1px dashed #999999;" cellpadding="2" cellspacing="1" class="widget-small">
<tr><td>Nama Pengirim :<br /><input type="text" class="input" size="70" name="nama" value="<?php echo $nama; ?>" /></td></tr>
<tr><td>Email :<br /><input type="text" class="input" size="70" name="email" value="<?php echo $email; ?>" /></td></tr>
<tr><td>Status :<br />
<select class="input" name="status">
<?php
if($status=="Y")
{
?>
<option value="N">Tidak Aktif</option><option value="Y" selected="selected">Aktif</option>
<?php
}
else{
?>
<option value="N" selected="selected">Tidak Aktif</option><option value="Y">Aktif</option>
<?php
}
?>
</select></td></tr>
<tr><td>Pesan :<br /><textarea name="pesan"><?php echo $pesan; ?></textarea></td></tr>
<tr><td><input type="submit" class="input" value="Simpan Data" /> <input type="reset" class="input" value="Hapus" /><input type="hidden" name="id"  value="<?php echo $id; ?>"  /></td></tr>
</table>
</form><!-- Batas content bawah -->
</div>