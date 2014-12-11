<div id="isi">
<h1>Siswa</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahkelas"><div class="submitButton">Tambah Data Kelas</div></a>
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahsiswa"><div class="submitButton">Tambah Data Siswa</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Nomor</strong></td><td><strong>NIS</strong></td><td><strong>Nama Siswa</strong></td><td><strong>Kelas</strong></td><td colspan='2' width='10'><strong>Aksi Data</strong></td></tr>";
$no=1;
foreach($kelas->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>".$s['nis']."</td><td>".$s['nama_siswa']."</td><td>".$s['nama_kelas']."</td><td>
	<a href='".base_url()."index.php/adminweb/editsiswa/".$s['id_siswa']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapussiswa/".$s['id_siswa']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
	$no++;
}
?>
</table>
</div>