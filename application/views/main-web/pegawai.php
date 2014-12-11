<div id="content-tengah">
<div id="title-isi">Data Pegawai SMP Negeri 2 Cikande</div>
<br />
<?php
foreach($pegawai->result_array() as $g)
{
echo "<div id='guru'>";
if($g['jk']=="L")
{
echo"<img src='".base_url()."system/application/views/main-web/images/laki.jpg' class='image' width='45'>";
}
else{
echo"<img src='".base_url()."system/application/views/main-web/images/perempuan.jpg' class='image' width='45'>";
}
echo"<table><tr><td width='80'>NBM</td><td width='10'> : </td><td>".$g['nbm']."</td></tr>
<tr><td>Nama</td><td> : </td><td>".$g['nama_pegawai']."</td></tr>
<tr><td>Kelahiran</td><td> : </td><td>".$g['kelahiran']."</td></tr>
<tr><td>Jabatan</td><td> : </td><td>Pegawai</td></tr></table>
</div>";
}
?>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

