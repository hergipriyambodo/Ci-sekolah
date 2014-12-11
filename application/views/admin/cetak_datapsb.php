<style type="text/css">

table {
  align: center; 
  width : 600px;
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
<tr align="center"><td colspan="3"><strong>DATA PSB</strong></td></tr>
<?php
foreach($detail->result_array() as $d)
{
$nama=$d['nama'];
$jenis_kelamin=$d['jenis_kelamin'];
$tempat_lahir=$d['tempat_lahir'];
$tanggal_lahir=$d['tanggal_lahir'];
$nama_ayah=$d['nama_ayah'];
$nama_ibu=$d['nama_ibu'];
$pekerjaan_ayah=$d['pekerjaan_ayah'];
$pekerjaan_ibu=$d['pekerjaan_ibu'];
$penghasilan=$d['penghasilan'];
$alamat_ortu=$d['alamat_ortu'];
}
?>
<tr><td width="200">Nama</td><td width="10" align="center">:</td><td><?php echo $nama ?></td></tr>
<tr><td width="200">Jenis Kelamin</td><td width="10" align="center">:</td><td><?php echo $jenis_kelamin ?></td></tr>
<tr><td width="200">Tempat Lahir</td><td width="10" align="center">:</td><td><?php echo $tempat_lahir ?></td></tr>
<tr><td width="200">Tanggal Lahir</td><td width="10" align="center">:</td><td><?php echo $tanggal_lahir ?></td></tr>
<tr><td width="200">Nama Ayah</td><td width="10" align="center">:</td><td><?php echo $nama_ayah ?></td></tr>
<tr><td width="200">Nama Ibu</td><td width="10" align="center">:</td><td><?php echo $nama_ibu ?></td></tr>
<tr><td width="200">Pekerjaan ayah</td><td width="10" align="center">:</td><td><?php echo $pekerjaan_ayah ?></td></tr>
<tr><td width="200">Pekerjaan Ibu</td><td width="10" align="center">:</td><td><?php echo $pekerjaan_ibu ?></td></tr>
<tr><td width="200">Penghasilan</td><td width="10" align="center">:</td><td><?php echo $penghasilan ?></td></tr>
<tr><td width="200">Alamat Orang Tua</td><td width="10" align="center">:</td><td><?php echo $alamat_ortu ?></td></tr>
</table>

<table>
<tr>
	<td width="236">
    <p><div align="left"></div></p>
	<div align="left">Mengetahui,</div>
    <div align="left">Orang Tua / Wali Siswa</div>
    <p> 
    <div align="left"></div>
    <p></p>
    <p>&nbsp;</p>
	<p>&nbsp;</p>
    <p> 
    <div align="left"></div>
    <p></p>
    <div align="left"> (...............................) </div>
	</td>
	
    <td width="262"><div align="left"></div>
    <div align="left">Tanggal, 
		<script language="JavaScript" type="text/javascript">
			d = new Date();
			document.write(format_time(d));
		</script>
    </div>
    <div align="left"> 
        <div align="left">Siswa/Siswi</div>
    </div>
    <p> 
    <div align="left"></div>
    <p></p>
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p> 
    <div align="left"></div>
    <p></p></p>
    <div align="left">(..................................)</div></td>
</tr>
<tr align="center"> 
    <td colspan="3"><a href="javascript:window.print();">
    [ Cetak Laporan ]</a></td>
</tr>
</table>
</tr></td>
</table>
</div>