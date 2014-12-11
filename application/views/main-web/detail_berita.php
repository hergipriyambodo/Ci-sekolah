<div id="content-tengah">
<?php
foreach($detail_berita->result_array() as $d)
{
	echo"<div id='judul-berita'>".$d['judul_berita']."</div>";
	$isi=nl2br($d['isi']);
	echo"<div id='detail'><img src='".base_url()."berita/".$d['gambar']."' class='image' width='150'>".$isi."</div>";
}
echo"<br><br><span class='berita-lain'><img src='".base_url()."images/icon-berita.png'>Baca Juga Berita Lainnya</span>";
echo"<ul>";
foreach($acak_berita->result_array() as $acak)
{
echo "<li class='li-class'><a href='".base_url()."index.php/web/berita/".$acak['id_berita']."'>".$acak['judul_berita']."</a></li>";
}
echo"</ul>";

?>
</div>