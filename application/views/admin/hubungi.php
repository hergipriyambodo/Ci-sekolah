<div id="isi">
<h1>Data Hubungi Kami</h1><br />
<br>
<!-- Batas Content -->
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Nama Pengirim</strong></td><td><strong>pesan</strong></td><td><strong>Email Pengirim</strong></td><td><strong>Tanggal Posting</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 
$no = $page+1;
foreach($pesan->result_array() as $artikel){ 
if(($no%2)==0){
$warna="#B3E8FF";
} else{
$warna="#D6F3FF";
}
?>
<tr bgcolor='<?php echo $warna; ?>'>
<td align='center'><?php echo $no; ?></td>
<td><?php echo $artikel['nama']; ?></td>
<td><?php echo $artikel['pesan']; ?></td>
<td><?php echo $artikel['email']; ?></td>
<td><?php echo $artikel['tgl_posting']; ?></td>
<?php
echo "<td><a href='".base_url()."index.php/adminweb/hapushubungi/".$artikel['id_pesan']."' onClick=\"return confirm('Yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
?>

<?php 
	$no++;
 }
  
?>
</table><br />
<?php echo $paginator;?>
<!-- Batas content bawah -->
</div>
</div>