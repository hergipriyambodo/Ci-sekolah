<style type="text/css">

table {
  align: center; 
  width : 1100px;
	font-family: Tahoma; 
	font-size: 8pt;
	border-width: 1px;
	border-style: solid;
	border-color: #999999;
	border-collapse: collapse;
	margin: 10px 0px;
}
th{
<th width="20">Nomor Induk Siswa</th>
<th width="20">Nama Siswa</th>
<th width="20">Kelas</th>
	font-size: 7pt;
	text-transform: uppercase;
	text-align: left;
	padding: 0.5em;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
	background-color: #dffbff;
}
td{
	padding: 0.5em;
	vertical-align: top;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
}
</style>


<script>
	function popPrint(url){
		window.open(url+"?sid=<?=$_REQUEST["sid"]?>&print=1","CetakLaporan","width=800,height=600,scrollbars=yes,menubar=no,statusbar=no, toolbar=no,resizable=yes");
	}
</script>

<script language="JavaScript">
function makeArray() {
     for (i = 0; i<makeArray.arguments.length; i++)
         this[i] = makeArray.arguments[i];
 }
function getFullYear(d) {
    var y = d.getYear();
    if (y < 1000) {y += 1900};
    return y;
}
var months = new makeArray("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
function format_time(t) {
    var Day = t.getDay();
    var Date = t.getDate();
    var Month = t.getMonth();
    var Year = t.getFullYear();
    timeString = "";
    timeString += Date;
    timeString += " ";
    timeString += months[Month];
    timeString += " ";
    timeString += Year;
   return timeString;
 }
</script>

<div align="center">
<table border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td>
<table>
<tr align='center'>
<td colspan="11"><strong>DATA SEMUA PENDAFTAR</strong></td>
</tr>

<tr align='center'>
<td><strong>Nomor</strong></td>
<td><strong>Nama</strong></td>
<td><strong>Jenis Kelamin</strong></td>
<td><strong>Tempat Lahir</strong></td>
<td><strong>Tanggal Lahir</strong></td>
<td><strong>Nama Ayah</strong></td>
<td><strong>Nama Ibu</strong></td>
<td><strong>Pekerjaan ayah</strong></td>
<td><strong>Pekerjaan Ibu</strong></td>
<td><strong>Penghasilan</strong></td>
<td><strong>Alamat Orang Tua</strong></td>
</tr>

<?php
$no=1;
foreach($pendaftar->result_array() as $s)
{
	echo "<tr><td>".$no."</td><td>"
				.$s['nama']."</td><td>"
				.$s['jenis_kelamin']."</td><td>"
				.$s['tempat_lahir']."</td><td>"
				.$s['tanggal_lahir']."</td><td>"
				.$s['nama_ayah']."</td><td>"
				.$s['nama_ibu']."</td><td>"
				.$s['pekerjaan_ayah']."</td><td>"
				.$s['pekerjaan_ibu']."</td><td>"
				.$s['penghasilan']."</td><td>"
				.$s['alamat_ortu']."</td></tr>";
	$no++;
}
?>
</table>

<table>
<tr>
    <td width="262"><div align="center">Diberikan di Cikande</div>
        <div align="center">Tanggal, 
            <script language="JavaScript" type="text/javascript">
				d = new Date();
				document.write(format_time(d));
			</script>
        </div>
        <div align="center"> 
            <div align="center">Wakasek Kesiswaan</div>
        </div>
        <p> 
        <div align="center"></div>
            <p></p>
			<p>&nbsp;</p>
            <p>&nbsp;</p>
            <p> 
        <div align="center"></div>
            <p></p></p>
        <div align="center">(Ajat Sudrajat, S.Pd)</div>
	</td>
</tr>
<tr align="center"> 
    <td colspan="3"><a href="javascript:window.print();">
    [ Cetak Laporan ]</a></td>
</tr>
</table>
</td></tr>
</table>
</div>