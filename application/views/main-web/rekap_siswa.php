<div id="content-tengah">
<div id="title-isi">Data Siswa-Siswi SMP Negeri 2 Cikande</div>
<div>
<form method="post" action="<?php echo base_url(); ?>index.php/web/rekapsiswa">
<h5>Pilih Nama Kelas</h5><br />Pilih Kelas : <select name="kls" class="dropdown">
<?php
foreach($kls->result_array() as $k)
{
echo "<option value='".$k['id_kelas']."'>Kelas ".$k['nama_kelas']."</option>";
}
?>
</select>
<input type="submit" value="Lihat Data Siswa" class="poll" />
</form>
</div>
<div><br />
<table width="100%" border="0" class="table">
<?php
$i=1;
echo"<tr align='center' bgcolor='#EAEAEA'><td class='td'>No</td><td class='td'>NIS</td><td class='td'>Nama Siswa</td></tr>";
foreach($siswa->result_array() as $k)
{
$kelas = $k['nama_kelas'];
}
echo "<div id='judul-berita'>Data Siswa Kelas ".$kelas."</div>";
foreach($siswa->result_array() as $h)
{
echo "<tr class='tr'><td class='td'>".$i."</td><td class='td'>".$h["nis"]."</td><td class='td'>".$h["nama_siswa"]."</td>";
echo "</tr>";
$i++;
}
?>
</table>
</div>
</div>
