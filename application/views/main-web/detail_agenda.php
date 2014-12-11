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
foreach($detail->result_array() as $agenda)
{
echo "<span><h2>".$agenda['tema_agenda']."</h2></span>";
echo "<span class='tanggalberita'><h3>Diposting pada tanggal : ".$agenda['tgl_posting']." - oleh <b>Admin</b></h3></span><br>";
echo "<span><b>Deskripsi</b> : ".$agenda['isi']."</span><br>";
echo "<span><b>Tanggal</b> : ".$agenda['tgl_mulai']." sampai ".$agenda['tgl_selesai']."</span><br>";
echo "<span><b>Tempat</b> : ".$agenda['tempat']."</span><br>";
echo "<span><b>Waktu</b> : ".$agenda['jam']."</span><br>";
echo "<span><b>Keterangan</b> : ".$agenda['keterangan']."</span><br>";
}
?>
