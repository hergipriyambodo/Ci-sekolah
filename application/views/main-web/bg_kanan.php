<div id="content-kanan">

<div id="bg-judul">Agenda Sekolah</div>
<div id="isi-side">
<ul>
<?php
foreach($agenda->result_array() as $agenda)
{
echo "<li class='li-class'><a href=".base_url()."index.php/web/detailagenda/".$agenda['id_agenda']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$agenda['tema_agenda']."</a></li>";
}
?>
</ul><br />
</div>


<div id="bg-bawah-judul"></div> 

<div id="bg-judul">Support By</div>

<div id="isi-side">
<ul>
<li class="li-class">
<a target="_blank" href="#">Dinas Pendidikan Kab Serang</a>
</li>
<li class="li-class">
<a target="_blank" href="#">Dinas Pendidiakan Prov Banten</a>
</li>
<li class="li-class">
<a target="_blank" href="#">Pemerintah Provinsi Banten</a>
</li>
</ul>
</div> 

<div id="bg-bawah-judul"></div> 

</div>

