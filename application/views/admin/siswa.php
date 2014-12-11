<div id="isi">
<h1>Data Kelas</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkelas"><div class="submitButton">Tambah Data Kelas</div></a>
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahsiswa"><div class="submitButton">Tambah Data Siswa</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Nomor</strong></td><td><strong>Nama Kelas</strong></td><td colspan='3' width='10'><strong>Aksi Data</strong></td></tr>";
$no=1;
foreach($kelas->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['nama_kelas']."</td><td>
	<a href='".base_url()."index.php/adminweb/siswaperkelas/".$s['id_kelas']."'><div class='submitButton2'>Lihat Siswa</div></a></td><td>
	<a href='".base_url()."index.php/adminweb/editkelas/".$s['id_kelas']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapuskelas/".$s['id_kelas']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
	$no++;
}
?>
</table>
</div>