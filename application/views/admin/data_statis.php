<div id="isi">
<h1>Menu Data Statis</h1><br />
<a href="<?php echo base_url(); ?>index.php/adminweb/tambahdatastatis"><div class="submitButton">Tambah Data Statis</div></a>
<table width="100%">
<?php
echo "<tr align='center'><td><strong>Data Id</strong></td><td><strong>Judul Data</strong></td><td><strong>ID Parent</strong></td><td><strong>Level</strong></td><td colspan='2' width='10'><strong>Aksi Data</strong></td></tr>";
foreach($statis->result_array() as $s)
{
	echo "<tr><td>".$s['data_id']."</td><td>".$s['title']."</td><td>".$s['id_parent']."</td><td>".$s['level']."</td><td>
	<a href='".base_url()."index.php/adminweb/editdatastatis/".$s['id_data']."'><div class='submitButton2'>Edit Data</div></a></td><td><a href='".base_url()."index.php/adminweb/hapusdatastatis/".$s['data_id']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td></tr>";
}
?>
</table>
</div>