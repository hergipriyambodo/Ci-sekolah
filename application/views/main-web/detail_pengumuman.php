<style>
body{
	background-image:url(images/bg-body.jpg);
	background-repeat:repeat-x;
	background-attachment:fixed;
	background-position:bottom;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
}
h2{
	font-size:15px;
	padding:0px;
	margin:0px;
	font-weight:bold;
	color:#666666;
}
h3{
	font-size:11px;
	padding:0px;
	margin:0px;
	font-weight:normal;
	color:#666666;
}
.tanggalberita {
	color:#000000;
	font-size: 10px;
	line-height: 150%;
	font-style: italic;
}
</style>
<?php
foreach($detail->result_array() as $pengumuman)
{
echo "<span><h2>Pengumuman ".$pengumuman['judul_pengumuman']."</h2></span>";
echo "<span class='tanggalberita'><h3>Diposting pada tanggal : ".$pengumuman['tanggal']." - oleh <b>".$pengumuman['penulis']."</b></h3></span>";
echo "<span><h3>".$pengumuman['isi']."</h3></span><br>";
}
?>
