<style>
#content-tengah_display {
width: 460px;
margin-bottom: 30px;
padding-left: 10px;
padding-right: 10px;
float: left;
}
#content-tengah {
display:none;
}
</style>

<div id="content-tengah_display">
<div id="judul-berita">List Download File/Berkas</div>

<?php
foreach($semua->result_array() as $b)
{
echo "<div id='download'><img src='".base_url()."images/download.png' border='0' class='image2'>
<table>
<tr><td width='70'><b>File</b></td><td width='10'> : </td><td>".$b['judul_file']."</td></tr>
<tr><td><b>Tanggal</b></td><td> : </td><td>".$b['tgl_posting']."</td></tr>
<tr><td><b>Oleh</b></td><td> : </td><td>".$b['nama_pegawai']."</td></tr>
<tr><td></td><td></td><td><a href='".base_url()."download/".$b['nama_file']."'><span class='submitButton2'>Download File</span></a></td></tr>
</table>
</div>";
}
?>

<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>