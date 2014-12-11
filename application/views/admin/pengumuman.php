<div id="isi">
<h1>Data Pengumuman</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahpengumuman"><div class="submitButton">Tambah Pengumuman</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Nomor</strong></td><td><strong>Judul Pengumuman</strong></td><td><strong>Tanggal</strong></td><td><strong>Penulis</strong></td><td colspan='2' width='10'><strong>Aksi Data</strong></td></tr>";
$no=$page+1;
foreach($berita->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['judul_pengumuman']."</td><td>".$s['tanggal']."</td><td>".$s['penulis']."</td><td>
	<a href='".base_url()."index.php/adminweb/editpengumuman/".$s['id_pengumuman']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapuspengumuman/".$s['id_pengumuman']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
	$no++;
}
?>
<table align="center" width="100%"><tr><td><?php echo $paginator; ?></td></tr></table>
</table>
</div>