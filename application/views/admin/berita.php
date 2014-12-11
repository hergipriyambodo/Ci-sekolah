<div id="isi">
<h1>Indexs Berita</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahberita"><div class="submitButton">Tambah Berita</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Nomor</strong></td><td><strong>Judul Berita</strong></td><td><strong>Tanggal</strong></td><td><strong>Jam</strong></td><td colspan='2' width='10'><strong>Aksi Data</strong></td></tr>";
$no=$page+1;
foreach($berita->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['judul_berita']."</td><td>".$s['tanggal']."</td><td>".$s['waktu']."</td><td>
	<a href='".base_url()."index.php/adminweb/editberita/".$s['id_berita']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapusberita/".$s['id_berita']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
	$no++;
}
?>
<table align="center" width="100%"><tr><td><?php echo $paginator; ?></td></tr></table>
</table>
</div>