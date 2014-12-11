<div id="isi">
<h1>Edit Berita</h1><br />
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
   
    <!--Pages-->
    <div class="Pages">
        <!--Page 1-->
        <div class="Page">
<?php echo form_open_multipart('adminweb/updateberita');?>
<table height="100%">
<tr>
<td>Category</td>
<td>:</td>
<td>
<?php
	foreach($detail->result_array() as $d)
	{
		$id = $d["id_berita"];
		$judul = $d["judul_berita"];
		$isi = $d["isi"];
		$gambar = $d['gambar'];
	}
?>
<input type="text" name="judul" class="input" value="<?php echo $judul; ?>" size="100"/>
<input type="hidden" name="id_berita" value="<?php echo $id; ?>" />
</td>
</tr>
<tr>
<td>Isi Content</td>
<td>:</td>
<td><textarea name="content"><?php echo $isi; ?></textarea></td>
</tr>
<tr><td></td><td></td><td><img src="<?php echo base_url(); ?>berita/<?php echo $gambar; ?>" /><br /><br /><input type="file" name="userfile" size="40"/> * Apabila gambar tidak diubah, dikosongkan saja.</td>	</tr>
<tr><td></td><td></td><td><input type="hidden" name="gambarlama" value="<?=$gambar; ?>" /><input type="submit"  value="Simpan Data" class="input"/></td>	</tr>
</table>
           
            </form>
        </div>
        
        
		
    </div>
</div>
</div>