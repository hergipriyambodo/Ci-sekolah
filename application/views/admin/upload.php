<div id="isi">
<h1>Data Upload</h1><br />

<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/simpanupload" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<td width="150">Judul File</td><td width="10" align="center">:</td><td><input type="text" name="judul" size="60" class="input" /></td></tr>
<td width="150">Cari File</td><td width="10" align="center">:</td><td><input type="file" class="input" name="userfile" size="50" /></td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Upload" class="input" /> <input type="reset" value="Ulang" class="input" /></td></tr>
</table>
</form> 
<br />

<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td>
<td><strong>Judul File</strong></td>
<td><strong>Tgl Posting</strong></td>
<td><strong>Author</strong></td>
<td colspan="2"><strong>Aksi</strong></td></tr>
<?php 
$no = 1+$page;
foreach($download->result_array() as $materi){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $materi['judul_file']; ?></td>
<td><?php echo $materi['tgl_posting']; ?></td>
<td><?php echo $materi['nama_pegawai']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/adminweb/editupload/".$materi['id_download']."' ><div class='submitButton2'>Edit Data</div></a></td>";
echo"<td><a href='".base_url()."index.php/adminweb/hapusupload/".$materi['id_download']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
  
?>
</table><br />
<?php echo $paginator;?>
<!-- Batas content bawah -->
</div>