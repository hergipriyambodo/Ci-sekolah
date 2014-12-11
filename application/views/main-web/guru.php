<style>
#content-tengah_display2{
width: 460px;
margin-bottom: 30px;
padding-left: 10px;
padding-right: 10px;
float: left;
}
#content-tengah{
display:none;
}
</style>


<div id="content-tengah_display2">
<div id="title-isi">Data Guru SMPN 2 Cikande</div>
<br />

<?php
foreach($guru->result_array() as $g)
{
echo "<div id='guru'>";
if($g['jk']=="L")
{
echo"<img src='".base_url()."media/gambar/laki-laki.jpg' class='image' width='45'>";

}
else{
echo"<img src='".base_url()."media/gambar/perempuan.jpg' class='image' width='45'>";
}
echo"<table><tr><td>NIP</td><td> : </td><td>".$g['nip']."</td></tr>
<tr><td>Nama</td><td> : </td><td>".$g['nama_pegawai']."</td></tr>
<tr><td>Kelahiran</td><td> : </td><td>".$g['kelahiran']."</td></tr>
<tr><td>Guru Mata Pelajaran </td><td> : </td><td>".$g['matpel']."</td></tr></table>
</div>";
}
?>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

