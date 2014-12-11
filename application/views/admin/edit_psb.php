<div id="isi">




<?php
foreach($pendaftar->result_array() as $p)

{
$nama = $p['nama'];
$jk = $p['jenis_kelamin'];
$tempatlahir = $p['tempat_lahir'];
$tanggallahir = $p['tanggal_lahir'];
$namaayah = $p['nama_ayah'];
$namaibu = $p['nama_ibu'];
$pekerjaanayah = $p['pekerjaan_ayah'];
$pekerjaanibu = $p['pekerjaan_ibu'];
$penghasilanorangtua = $p['penghasilan'];
$alamatortu = $p['alamat_ortu'];
$id = $p['id'];
}
?>

<h1>Edit Pendaftaran Siswa Baru</h1><br />

<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">

<form method="post" action="<?php echo base_url(); ?>index.php/adminweb/updatepsb" enctype="multipart/form-data">
<table>
				<tr><td width="200">Nama</td>
                <td width="10" align="center">:</td>
                <td><input type="text" class="input" name="nbm" size="70" value="<?php echo $nama ?>" />
                </td></tr>
                
                
                   <tr><td width="200">Jenis Kelamin</td>
                        <td width="10" align="center">:</td>
                        <td>
                        <select name="jk" class="input">
                        <?php
                        if($jk=='L')
                        {
                        ?>
                        <option value="L" selected="selected">Laki-Laki</option><option value="P">Wanita</option></select>
                        <?php
                        }
                        else{
                        ?>
                        <option value="L">Laki-Laki</option><option value="P" selected="selected">Wanita</option></select>
                        <?php
                        }
                        ?>
                        
                        </td></tr>
                
                
			<tr><td width="200">Tempat Lahir</td>
			<td width="10" align="center">:</td>
			<td><input type="text" class="input" name="tempat_lahir" size="70" value="<?php echo $tempatlahir ?>"/>
			</td></tr>

			<tr><td width="200">Tanggal Lahir</td>
			<td width="10" align="center">:</td>
			<td>
            <select name='tanggal_lahir'>
						<option value='-1'>--</option>
						<?php for($i=1;$i<=31;$i++){
						echo "<option value='".$i."'>$i</option>";
					}?>
					</select>
					<select name='bulan_lahir'>
						<option value='-1'>--</option>
						<option value='Januari'>Januari</option>
						<option value='Februari'>Februari</option>
						<option value='Maret'>Maret</option>
						<option value='April'>April</option>
						<option value='Mei'>Mei</option>
						<option value='Juni'>Juni</option>
						<option value='Juli'>Juli</option>
						<option value='Agustus'>Agustus</option>
						<option value='September'>September</option>
						<option value='Oktober'>Oktober</option>
						<option value='November'>November</option>
						<option value='Desember'>Desember</option>
					</select>
					<select name='tahun_lahir'>
						<option value='-1'>--</option>
						<?php for($j=1980;$j<=2012;$j++){
						echo "<option value='".$j."'>$j</option>";
					}?>
					</select>
            
			</td></tr>

			<tr><td width="200">Nama Ayah</td>
			<td width="10" align="center">:</td>
			<td><input type="text" class="input" name="nama_ayah" size="70" value="<?php echo $namaayah ?>" />
			</td></tr>
            
            
            <tr><td width="200">Nama Ibu</td>
			<td width="10" align="center">:</td>
			<td><input type="text" class="input" name="nama_ibu" size="70" value="<?php echo $namaibu ?>" />
			</td></tr>


 			<tr><td width="200">Pekerjaan Ayah</td>
			<td width="10" align="center">:</td>
			<td><input type="text" class="input" name="pekerjaan_ayah" size="70" value="<?php echo $pekerjaanayah ?>" />
			</td></tr>
                     
                     
            <tr><td width="200">Pekerjaan Ibu</td>
			<td width="10" align="center">:</td>
			<td><input type="text" class="input" name="pekerjaan_ibu" size="70" value="<?php echo $pekerjaanibu ?>" />
			</td></tr>
            
            
            <tr><td width="200">Penghasilan Orang Tua</td>
			<td width="10" align="center">:</td>
			<td>
            <select name="penghasilan" class="input">
            <?php
			if($penghasilanorangtua=='Rp 500.000 - Rp 1.000.000')
			{
			?>
				<option value='Rp 500.000 - Rp 1.000.000'>Rp 500.000 - Rp 1.000.000</option>
				<option value='Rp 1.000.000 - Rp 2.000.000' selected='selected'>Rp 1.000.000 - Rp 2.000.000</option>
				<option value='Rp 2.000.000 >'>Rp 2.000.000 +</option>
                        <?php
						}
						else {
						?>
                <option value='Rp 500.000 - Rp 1.000.000' selected='selected'>Rp 500.000 - Rp 1.000.000</option>
				<option value='Rp 1.000.000 - Rp 2.000.000' >Rp 1.000.000 - Rp 2.000.000</option>
				<option value='Rp 2.000.000 >'>Rp 2.000.000 +</option>
                <?php
}
?>
                        
                        
					</select>
			</td></tr>

			<tr><td width="200">Alamat</td>
			<td width="10" align="center">:</td>
			<td><input type="text" class="input" name="pekerjaan_ibu" size="70" value="<?php echo $alamatortu ?>" />
			</td></tr>


<tr><td width="200"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan Data" class="input" /> <input type="reset" value="Hapus" class="input" />




                    
                    
					
                   </form>
                 
                    </table>
                    </div>
				
