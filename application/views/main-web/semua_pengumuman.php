<div id="content-tengah">
<div id="title-pengumuman"></div>
<div class="tglcari">Cari Pengumuman : 
<select name="tgl" class="dropdown">
<option selected="selected">- Tanggal -</option>
<?php
for($i=1;$i<=31;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select> - 
<select name="bln" class="dropdown">
<option selected="selected">- Bulan -</option>
<?php
for($i=1;$i<=12;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select> - 
<select name="thn" class="dropdown">
<option selected="selected">- Tahun -</option>
<?php
$tahun=date('Y');
$tahun_min=$tahun-5;
for($i=$tahun_min;$i<=$tahun;$i++)
{
echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
</select>
<input type="submit" class="submitButton" value="Lihat" />
</div>
<?php
foreach($semua->result_array() as $pengumuman)
{
echo'<div id="pengumuman">';
echo "<span><h1>Pengumuman ".$pengumuman["judul_pengumuman"]."</h1></span>";
echo "<span class='tanggalberita'>Diposting pada tanggal : ".$pengumuman["tanggal"]." - oleh <b>".$pengumuman["penulis"]."</b></span>";
echo "<span>".$pengumuman["isi"]."</span>";
echo'</div>';
}
?>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

