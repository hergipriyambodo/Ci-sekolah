<div id="content-tengah">
<div id="judul-berita">Login Control Panel</div>
<?php
	$session=isset($_SESSION['username_smkmuh']) ? $_SESSION['username_smkmuh']:'';
	if($session!=""){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/guru'>";
	}
?>
<script languange="javascript">

function CekUser(txt, alertid) {
	var input = txt.value;
	var benar1 = false;
	if(input!='')
		benar1=true;
	if(benar1) { 
  		document.getElementById(alertid).style.display='none';
  	} else {
  		document.getElementById(alertid).style.display='';
  	}
}
function CekPass(txt, alertid) {
	var input = txt.value;
	var benar = false;
	if(input!='')
		benar=true;
	if(benar) { 
  		document.getElementById(alertid).style.display='none';
  	} else {
  		document.getElementById(alertid).style.display='';
  	}
}
</script>
<form method="post" name="frmguestbook" action="<?php echo base_url(); ?>index.php/web/masuklogin">
<table style="border:1px dashed #999999; padding-left:10px; padding-right:10px;" width="100%">
<tr>
<td width="70">Username</td><td width="20">:</td>
<td><input class="input" name="user" type="text" value="" size="50"  onchange="javascript:CekUser(this, 'alertnama');" onblur="javascript:CekUser(this, 'alertnama');"></td>
</tr>
<tr>
<td colspan="3"><div id="alertnama" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Username tidak boleh kosong</div>
</td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td>
<input class="input" name="pass" type="password" value="" size="50" onchange="javascript:CekPass(this, 'alertpass');" onblur="javascript:CekPass(this, 'alertpass');"></td></tr>
<tr>
<td colspan="3"><div id="alertpass" style="display:none; background-color:#999999; color:#FFFFFF; padding:5px;">Password tidak boleh kosong</div>
</td>
</tr>
<tr>
<td valign="top"></td>
<td valign="top"></td>
<td><input type="submit" value="Login" class="poll" name="simpan" /> <input type="reset" value="Batal" class="poll" /></td>
</tr>
</table>
<br /><br />

</form>
</div>

