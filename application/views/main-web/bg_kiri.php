<div id="content">
<div id="content-kiri">

<div id="bg-judul">Kepala Sekolah</div>
<div id="isi-side-kepsek">
<img src="<?php echo base_url(); ?>images/kepala-sekolah.jpg" /><br />
Riyadi Santosa, M.Pd<br />NBM. 1136754
</div>
<div id="bg-bawah-judul"></div>

<div id="bg-judul">Pengumuman Terbaru</div>
<div id="isi-side">
<ul>
<?php
foreach($umum->result_array() as $u)
{
echo "<li class='li-class'><a href=".base_url()."index.php/web/detailpengumuman/".$u['id_pengumuman']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$u['judul_pengumuman']."</a></li>";
}
?>
</ul><br />


</div>
<div id="isi-side">

</div>
<div id="bg-bawah-judul"></div>

<div id="bg-judul">Alamat Lengkap</div>
<div id="blokAdress">

		<p class="sekretariat">Jalan Otonom Cikande-Pamarayan Km. 6,5 Kecamatan Cikande Kabupaten Serang Provinsi Banten 42186</p>
		<p class="email">info@smpn2cikande.sch.id</p>
		<p></p>

</div>
<div id="bg-bawah-judul"></div>

</div>