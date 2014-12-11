<div id="isi">
<h1>Edit Agenda Sekolah</h1><br />
<script type="text/javascript">
function TabView(id, current){
    if(typeof(TabView.cnt) == "undefined"){
        TabView.init();
    }
    current = (typeof(current) == "undefined") ? 0 : current;
    this.newTab(id, current);
}
TabView.init = function(){
    TabView.cnt = 0;
    TabView.arTabView = new Array();
}
TabView.switchTab = function(TabViewIdx, TabIdx){
    TabView.arTabView[TabViewIdx].TabView.switchTab(TabIdx);
}
TabView.prototype.newTab = function(id, current){
    var TabViewElem, idx = 0, el = '', elTabs = '', elPages = '';
    TabViewElem = document.getElementById(id);
    TabView.arTabView[TabView.cnt] = TabViewElem;
    this.TabElem = TabViewElem;
    this.TabElem.TabView = this;
    this.tabCnt = 0;
    this.arTab = new Array();
    // Loop throught the elements till the object with
    // classname 'Tabs' is obtained
    elTabs = TabViewElem.firstChild;
    while(elTabs.className != "Tabs" )elTabs = elTabs.nextSibling;
    el = elTabs.firstChild;
    do{
        if(el.tagName == "A"){
            el.href = "javascript:TabView.switchTab(" + TabView.cnt + "," + idx + ");";
            this.arTab[idx] = new Array(el, 0);
            this.tabCnt = idx++;
        }
    }while (el = el.nextSibling);

    // Loop throught the elements till the object with
    // classname 'Pages' is obtained
    elPages = TabViewElem.firstChild;
    while (elPages.className != "Pages")elPages = elPages.nextSibling;
    el = elPages.firstChild;
    idx = 0;
    do{
        if(el.className == "Page"){
            this.arTab[idx][1] = el;
            idx++;
        }
    }while (el = el.nextSibling);
    this.switchTab(current);
    // Update TabView Count
    TabView.cnt++;
}
TabView.prototype.switchTab = function(TabIdx){
    var Tab;
    if(this.TabIdx == TabIdx)return false;
    for(idx in this.arTab){
        Tab = this.arTab[idx];
        if(idx == TabIdx){
            Tab[0].className = "ActiveTab";
            Tab[1].style.display = "block";
            Tab[0].blur();
        }else{
            Tab[0].className = "InactiveTab";
            Tab[1].style.display = "none";
        }
    }
    this.TabIdx = TabIdx;
   
}
function init(){
    t1 = new TabView('TabView1');
}
function filetypechanged(rdo)
{
	if(rdo.value=='pdf')
		document.formupload.file_size.disabled=true;
	else
		document.formupload.file_size.disabled=false;
}
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
</script>
<style type="text/css">
.TabView{
    border:1px #CCC solid;overflow-y:scroll;margin:5px;
}
.TabView .Tabs {
  height:40px;display:block;background:#CCC;
}
.TabView .Tabs a {
    display:block;float:left;width:150px;height:30px;line-height:25px;color:#333;text-align:center;text-decoration:none;font-weight:bold;border:0px #666 dashed;margin:0px 2px;
}
.TabView .Tabs a.ActiveTab{
    background:#FFF;border:1px #666 solid;
}
.TabView .Tabs a.InactiveTab{

}
.TabView .Pages{
    width:100%;
}
.TabView .Pages .Page{
    border:1px #CCC solid;/*height:400px;*/
}
</style>
<div class="TabView" id="TabView1">
    <!--Tabs-->
    <div class="Tabs"><a>Isi Data Contents</a> <a>Upload File</a> <a>Manajemen File</a> </div>
    <!--Pages-->
    <div class="Pages">
        <!--Page 1-->
        <div class="Page">
<?php echo form_open_multipart('adminweb/updateagenda');?>
<table height="100%">
<?php
foreach($detail->result_array() as $e){
$ps=array();
$ps=explode("-",$wkt_skr);
$tgl_skr=$ps[0];
$bln_skr=$ps[1];
$thn_skr=$ps[2];
$psh=array();
$psh=explode("-",$e["tgl_mulai"]);
$tgl_ml=$psh[2];
$bln_ml=$psh[1];
$thn_ml=$psh[0];
$psh2=array();
$psh2=explode("-",$e["tgl_selesai"]);
$tgl_sl=$psh2[2];
$bln_sl=$psh2[1];
$thn_sl=$psh2[0];
$judul=$e["tema_agenda"];
$isi=$e["isi"];
$tempat=$e["tempat"];
$waktu=$e["jam"];
$keterangan=$e["keterangan"];
$id=$e["id_agenda"];
}
?>
<tr><td width="150">Tema</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80" value="<?php echo $judul; ?>"></td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi" cols="60" rows="15" class="textfield"><?php echo $isi; ?></textarea></td></tr>
<tr><td width="150">Mulai</td><td width="10">:</td><td>
<?php
echo "<select name='tgl_mulai'>";
for($i=1;$i<32;$i++)
{
if($tgl_ml==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='bln_mulai'>";
for($i=1;$i<13;$i++)
{
if($bln_ml==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='thn_mulai'>";
for($i=$thn_skr-2;$i<=$thn_skr+2;$i++)
{
if($thn_ml==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select>";
?>
</td></tr>

<tr><td width="150">Selesai</td><td width="10">:</td><td>
<?php

echo "<select name='tgl_selesai'>";
for($i=1;$i<32;$i++)
{
if($tgl_sl==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='bln_selesai'>";
for($i=1;$i<13;$i++)
{
if($bln_sl==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='thn_selesai'>";
for($i=$thn_skr-2;$i<=$thn_skr+2;$i++)
{
if($thn_sl==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select>";
?>
</td></tr>
<tr><td width="150">Tempat</td><td width="10">:</td><td><input type="text" name="tempat" class="textfield" size="80" value="<?php echo $tempat; ?>"></td></tr>
<tr><td width="150">Waktu Kegiatan</td><td width="10">:</td><td><input type="text" name="jam" class="textfield" size="80" value="<?php echo $waktu; ?>"></td></tr>
<tr><td width="150" valign="top">Keterangan</td><td width="10" valign="top">:</td><td><textarea name="keterangan" cols="60" rows="5" class="textfield"><?php echo $keterangan; ?></textarea></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan Agenda" class="input">
<input type="hidden" name="id_agenda" value="<?php echo $id; ?>" /></td></tr>
</table>
            </form>
        </div>
        
        <div class="Page">
        <!--Page 2 -->
   <p>&nbsp;</p>     
	<form name="formupload" enctype="multipart/form-data" action="<?php echo base_url()?>index.php/adminweb/uploadfile" method="POST">
	<table width="96%" border="0">
	<tr>
	<td>Type File</td>
	<td>
	Image <input type="radio" name="filetype" value="image" checked onchange="javascript:filetypechanged(this);"> &nbsp;
	PDF <input type="radio" name="filetype" value="pdf" onchange="javascript:filetypechanged(this);">
	</td>	
	</tr>
	<tr>
	<td>Title</td><td><input type="text"name="title" size="60" /></td>	
	</tr>
	<tr>
	<td valign="top">Description</td><td>
	<input type="text" name="description" size="60" />	
	</td>	
	</tr>
	<tr>
	<td>Image Size</td>
	<td>
	<select name="file_size">
	<option value="72x48">72 x 48 pixel</option>
	<option value="144x96">144 x 96 pixel</option>
	<option value="230x160">230 x 160 pixel</option>
	<option value="460x320">460 x 320 pixel</option>
	<option value="original_size">original size</option>
	</select>	
	</td>	
	</tr>
	<tr>
	<td>Upload file</td><td><input type="file" name="imagefile" size="50"  class="input"/><input type="hidden" name="tujuan" value="editagenda/<?php echo $id; ?>" /></td>	
	</tr>
	</table>
	<p><input type="submit" VALUE="Upload File" class="input"></p>
	
	<?php
	if(isset($image_list)) {
		echo '<p><strong>Daftar image untuk kategori : '.$menu_id.'</strong></p>';
		echo '<table width="96%" border="1">
		<th>ID</th>	
		<th>Title</th>
		<th>Description</th>
		<th>File</th>		
		<th>(*)</th>';
	
		foreach($image_list->result_array() as $value) {
			echo '<tr>
			<td>'.$value['id'].'</td>
			<td>'.$value['title'].'</td>
			<td>'.$value['image_description'].'</td>';
			if($value['file_type']=='image') 		
				echo '<td align="center"><img src="'.base_url().$value['image_url'].'" width="80" height="60" />
				<p>Size:'.$value['image_size'].'</p>
				<p>File:'.str_replace('media/image/imgthumb/','',$value['image_url']).'</p>
				</td>';
			else
				echo '<td>'.base_url().$value['image_url'].'</td>';			
			echo '<td align="center"><a href="javascript:confirmDelete(\''.base_url().'index.php/webadmin/deleteimage/'.$value['menu_id'].'/'.$value['id'].'/'.$id.'\');">Delete</a></td>
			</tr>';		
		}	
		echo '</table>';
	}
	?>
	
</form>

        </div>
		
		<div class="Page">
        <!--Page 2 -->
   <p>&nbsp;</p>     
	<table width="100%">
	<tr><td><b>Judul File</b></td><td><b>Deskripsi File</b></td><td><b>Lokasi File</b></td><td><b>Aksi File</b></td></tr>
	<?php
	foreach($imglist->result_array() as $im)
	{
		echo"<tr><td>".$im['title']."</td><td>".$im['image_description']."</td><td>".base_url()."".$im['image_url']."</td><td>
		<a href='".base_url()."index.php/adminweb/hapusmedia/".$im['id_file']."'>Hapus</td></tr>";
	}
	?>
	</table>
        </div>
    </div>
</div>
</div>