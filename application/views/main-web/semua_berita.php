<div id="content-tengah">
<div id="title-berita"></div>
<?php
foreach($berita->result_array() as $b)
{
$isi=substr($b['isi'],0,300);
echo'<div id="berita"><img src='.base_url().'berita/'.$b['gambar'].' width="70" class="image"><h1>'.$b['judul_berita'].'
<h2>Kategori <b>Berita</b> -'. $b['tanggal'].' -|- '.$b['waktu'].' WIB</h2>'.$isi.'.... <a href="'.base_url().'index.php/web/berita/'.$b["id_berita"].'">[Baca Selengkapnya]</a>
</div>';
}
?>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

