<div id="isi">
<h1>Pendaftaran Siswa Baru</h1><br />


<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td>
<td><strong>Nama</strong></td>
<td><strong>Jenis Kelamin</strong></td>
<td><strong>Tempat Lahir</strong></td>
<td><strong>Tanggal Lahir</strong></td>
<td><strong>Nama Ayah</strong></td>
<td><strong>Nama Ibu</strong></td>
<td><strong>Pekerjaan Ayah</strong></td>
<td><strong>Pekerjaan Ibu</strong></td>
<td><strong>Penghasilan</strong></td>
<td><strong>Alamat</strong></td>
<td colspan="3"><strong>Aksi</strong></td></tr>

<?php 
$no = 1+$page;
foreach($pendaftar->result_array() as $psb){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>

<td><?php echo $psb['nama']; ?></td>
<td><?php echo $psb['jenis_kelamin']; ?></td>
<td><?php echo $psb['tempat_lahir']; ?></td>
<td><?php echo $psb['tanggal_lahir']; ?></td>
<td><?php echo $psb['nama_ayah'];?></td>
<td><?php echo $psb['nama_ibu']; ?></td>
<td><?php echo $psb['pekerjaan_ayah'];?></td>
<td><?php echo $psb['pekerjaan_ibu']; ?></td>
<td><?php echo $psb['penghasilan'];?></td>
<td><?php echo $psb['alamat_ortu']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/adminweb/cetakpsb/".$psb['id']."' ><div class='submitButton2'>Cetak Data</div></a></td>";
echo"<td><a href='".base_url()."index.php/adminweb/editpsb/".$psb['id']."' ><div class='submitButton2'>Edit Data</div></a></td>";
echo"<td><a href='".base_url()."index.php/adminweb/hapuspsb/".$psb['id']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";


?>
</tr>
<?php 
$no++;
 }
  
?>
</table><br />
<?php echo $paginator;?>
<!-- Batas content bawah -->
<br />
<?php
echo"<td><a href='".base_url()."index.php/adminweb/cetaksemuapsb/".$psb['id']."' ><div class='submitButton2'>Cetak Semua Data</div></a></td>";
?>
</div>