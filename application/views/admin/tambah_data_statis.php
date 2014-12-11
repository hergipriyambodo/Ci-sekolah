<div id="isi">
<h1>Tambah Menu Statis</h1><br />

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
			<form name="frmContent" method="POST" action="<?php echo base_url()?>index.php/adminweb/simpandatastatis">
			<table height="100%">
			<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="data_id" class="input">
				<?php
				foreach($statis->result_array() as $s)
				{
					echo "<option value='".$s['id']."'>".$s['id']." - ".$s['title']."</option>";
				}
				?>	
				</select>
			</td>
			</tr>
			<tr>
			<td>Judul</td>
			<td>:</td>
			<td><input type="text" name="judul" /></td>
			</tr>
			<tr>
			<td>Isi Content</td>
			<td>:</td>
			<td><textarea name="content"></textarea></td>
			</tr>
			<tr><td></td><td></td><td><input type="submit"  value="Simpan Data" class="input"/></td>	</tr>
			</table>
            </form>
        </div>
        
		
		
    </div>
</div>
</div>