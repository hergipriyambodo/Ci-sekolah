<div id="content-tengah">
<?php
foreach($detail->result_array() as $b)
{
echo "<div id='title-isi'>Ekstra Kurikuler ".$b['title']."</div>";
?>
	
	<?php
	echo"<br><br>";
echo $b['content'];
}
?>
</div>

