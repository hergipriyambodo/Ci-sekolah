<div id="content-tengah">
<div id="berita-utama"><div id="berita-main">
<h3>Selamat Datang di Website SMP Negeri 2 Cikande</h3>
<h2>Media Sistem Informasi Akademik Online <strong>SMP Negeri 2 Cikande</strong></h2>
<img src="<?php echo base_url(); ?>images/welcome.png" class="image" width="70"/>Kami Menyambut baik terbitnya Website SMP Negeri 2 Cikande, dengan harapan dipublikasinya website ini : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat. Sebaliknya orangtua dapat mengakses informasi tentang kegiatan akademik dan non akademik putra - puterinya di sekolah ini.
</div>
</div>

<br />
<div id="title-isi">Berita Terbaru</div>
<?php
foreach($berita_home->result_array() as $b)
{
$isi=substr($b['isi'],0,230);
echo'<div class="list-berita"><img src='.base_url().'berita/'.$b['gambar'].' width="60" class="image"><h1>'.$b['judul_berita'].'
<h2>Kategori <b>Berita</b>  </h2>'.$isi.'.... <a href="'.base_url().'index.php/web/berita/'.$b["id_berita"].'">[Baca Selengkapnya]</a>
</div>';
}
?>
</div>