<div id="content-tengah">
<h1 align="center">SITEMAP</h1><br />
<p>PROFIL SEKOLAH</p>
<?php
foreach($sitemap1->result_array() as $s)
{
	echo "<a href='".base_url()."index.php/web/data/".$s['id']."'>".$s['title']."<br /></a>";
	
}
?>
<p>FASILITAS SEKOLAH</p>
<?php
foreach($sitemap2->result_array() as $s)
{
	echo "<a href='".base_url()."index.php/web/data/".$s['id']."'>".$s['title']."<br /></a>";
	
}
?>
<p>PENDIDIK & TENAGA PENDIDIK</p>
<?php
foreach($sitemap3->result_array() as $s)
{
	echo "<a href='".base_url()."index.php/web/data/".$s['id']."'>".$s['title']."<br /></a>";
	
}
?>
<p>KESISWAAN</p>
<?php
foreach($sitemap4->result_array() as $s)
{
	echo "<a href='".base_url()."index.php/web/data/".$s['id']."'>".$s['title']."<br /></a>";
	
}
?>
<p>AKADEMIK SEKOLAH</p>
<?php
foreach($sitemap5->result_array() as $s)
{
	echo "<a href='".base_url()."index.php/web/data/".$s['id']."'>".$s['title']."<br /></a>";
	
}
?>
<p>EKSTRA KURIKULER<p>
<?php
foreach($sitemap6->result_array() as $s)
{
	echo "<a href='".base_url()."index.php/web/data/".$s['id']."'>".$s['title']."<br /></a>";
	
}
?>
<p>INDEXS BERITA</p>
<p>GALERI KEGIATAN</p>
<p>PENGUMUMAN</p>
<p>AGENDA SEKOLAH</p>
<p>LIST DOWNLOAD</p>

</div>
