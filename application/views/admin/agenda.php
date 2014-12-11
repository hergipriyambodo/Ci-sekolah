<div id="isi">
<h1>Data Agenda Sekolah</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahagenda"><div class="submitButton">Tambah Agenda Sekolah</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Nomor</strong></td><td><strong>Judul Agenda</strong></td><td><strong>Tanggal Posting</strong></td><td><strong>Tempat</strong></td><td colspan='2' width='10'><strong>Aksi Data</strong></td></tr>";
$no=$page+1;
foreach($berita->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['tema_agenda']."</td><td>".$s['tgl_posting']."</td><td>".$s['tempat']."</td><td>
	<a href='".base_url()."index.php/adminweb/editagenda/".$s['id_agenda']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapusagenda/".$s['id_agenda']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
	$no++;
}
?>
<table align="center" width="100%"><tr><td><?php echo $paginator; ?></td></tr></table>
</table>
</div>