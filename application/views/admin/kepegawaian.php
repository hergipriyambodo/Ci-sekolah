<div id="isi">
<h1>Data Kepegawaian</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkepegawaian"><div class="submitButton">Tambah Data Pegawai</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Nomor</strong></td><td><strong>NIP</strong></td><td><strong>Nama Pegawai</strong></td><td><strong>Jabatan</strong></td><td colspan='2' width='10'><strong>Aksi Data</strong></td></tr>";
$no=$page+1;
foreach($pegawai->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['nip']."</td><td>".$s['nama_pegawai']."</td><td>".$s['status']."</td><td>
	<a href='".base_url()."index.php/adminweb/editkepegawaian/".$s['id_kepegawaian']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapuskepegawaian/".$s['id_kepegawaian']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
	$no++;
}
?>
<tr><td colspan="6"><?php echo $paginator; ?></td></tr>
</table>
</div>