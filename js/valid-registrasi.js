$(document).ready(function(){
	$("form#registrasi").submit(function(){
		
		var error=[];
		var nama=$("form#registrasi input[name='nama']").val();
		var jenis_kelamin=$("form#registrasi select[name='jenis_kelamin']").val();
		var tempat_lahir=$("form#registrasi input[name='tempat_lahir']").val();
		var tanggal_lahir=$("form#registrasi select[name='tanggal_lahir']").val();
		var bulan_lahir=$("form#registrasi select[name='bulan_lahir']").val();
		var tahun_lahir=$("form#registrasi select[name='tahun_lahir']").val();
		var nama_ayah=$("form#registrasi input[name='nama_ayah']").val();
		var nama_ibu=$("form#registrasi input[name='nama_ibu']").val();
		var pekerjaan_ayah=$("form#registrasi input[name='pekerjaan_ayah']").val();
		var pekerjaan_ibu=$("form#registrasi input[name='pekerjaan_ibu']").val();
		var penghasilan=$("form#registrasi select[name='penghasilan']").val();
		var alamat_ortu=$("form#registrasi textarea[name='alamat_ortu']").val();
		
		
		if(nama.length==0){
			$(".error_nama").html("x");
			error=1;
		}
		else{
			$(".error_nama").html("");
		}
		
		if(jenis_kelamin==-1){
			$(".error_jenis_kelamin").html("x");
			error=1;
		}
		else{
			$(".error_jenis_kelamin").html("");
		}
		
		if(tempat_lahir.length==0){
			$(".error_tempat_lahir").html("x");
			error=1;
		}
		else{
			$(".error_tempat_lahir").html("");
		}
		
		if(tanggal_lahir==-1 || bulan_lahir==-1 || tahun_lahir==-1){
			$(".error_tanggal_lahir").html("x");
			error=1;
		}
		else{
			$(".error_tanggal_lahir").html("");
		}
		
		if(nama_ayah.length==0){
			$(".error_nama_ayah").html("x");
			error=1;
		}
		else{
			$(".error_nama_ayah").html("");
		}
		
		if(nama_ibu.length==0){
			$(".error_nama_ibu").html("x");
			error=1;
		}
		else{
			$(".error_nama_ibu").html("");
		}
		if(pekerjaan_ayah.length==0){
			$(".error_pekerjaan_ayah").html("x");
			error=1;
		}
		else{
			$(".error_pekerjaan_ayah").html("");
		}
		if(pekerjaan_ibu.length==0){
			$(".error_pekerjaan_ibu").html("x");
			error=1;
		}
		else{
			$(".error_pekerjaan_ibu").html("");
		}
		if(penghasilan==-1){
			$(".error_penghasilan").html("x");
			error=1;
		}
		else{
			$(".error_penghasilan").html("");
		}
		if(alamat_ortu.length==0){
			$(".error_alamat_ortu").html("x");
			error=1;
		}
		else{
			$(".error_alamat_ortu").html("");
		}
		
		if(error==0){
			return true;
		}
		else{
			return false;
		}
		
	});
})(jQuery)