<div id="content-tengah">
<div id="title-agenda"></div>
<div class="tglcari">Cari Agenda : 
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
foreach($semua->result_array() as $agenda)
{
echo "<div id='pengumuman'>";
echo "<table><tr><td colspan='3'><h1>".$agenda['tema_agenda']."</h1></td></tr>";
echo "<tr><td colspan='3'><h2>Diposting pada tanggal : ".$agenda['tgl_posting']." - oleh <b>Admin</b></h2></td></tr>";
echo "<tr><td valign='top'><b>Deskripsi</b></td><td valign='top'> : </td><td>".$agenda['isi']."</td></tr>";
echo "<tr><td valign='top'><b>Tanggal</b></td><td valign='top'> : </td><td>".$agenda['tgl_mulai']." sampai ".$agenda['tgl_selesai']."</td></tr>";
echo "<tr><td valign='top'><b>Tempat</b></td><td valign='top'> : </td><td>".$agenda['tempat']."</td></tr>";
echo "<tr><td valign='top'><b>Waktu</b></td><td valign='top'> : </td><td>".$agenda['jam']."</td></tr>";
echo "<tr><td valign='top'><b>Keterangan</b></td><td valign='top'> : </td><td>".$agenda['keterangan']."</td></tr></table></div>";
}
?>
<?php
echo "<table align='center'><tr><td>".$paginator."</td></tr></table>";
?>
</div>

