<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminweb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib'));
		//$this->load->plugin();
		$this->load->model(array('Web_model', 'Admin_model'));
		session_start();
	}
	
	function index()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/isi_index',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak Mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function datastatis()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["statis"] = $this->Admin_model->Data_Statis();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/data_statis',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahdatastatis()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_data_statis',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function simpandatastatis() 
	{
		$data_id = $this->input->post('data_id');
		$id_data = $this->Admin_model->Get_Id_Menu($data_id);
		if($id_data !== FALSE)
		{
			$dataid = array();
			foreach($id_data AS $did){
				$dataid2 = intval(substr($did->id, 2));
				
				array_push($dataid, $dataid2);
			}
			$data_id = $data_id.".".(max($dataid)+1);
		}else{
			$data_id = $id_data.".1";
		}
		$data=array();
		
		$data["data_id"] = $data_id ;
		$data["id_parent"] = $this->input->post('data_id');
		$data["judul"] = $this->input->post('judul');
		$content=$this->input->post('content');
		$data["content"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
		
		if(empty($content))
		{
			echo "Data Masih Kosong";
		}
		else{
			$this->Admin_model->Simpan_Data_Statis($data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/datastatis'>";
		}
	}
	
	function uploadfile()
	{
		$title = $this->input->post('title');
		$filesize = $this->input->post('file_size');
		$description = $this->input->post('description');
		$filetype = $this->input->post('filetype');
		$tujuan = $this->input->post('tujuan');
		if ($_FILES['imagefile']['type'] == "application/pdf")
			$ori_src="media/pdf/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
		else
			$ori_src="media/image/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
			
		if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
		{
			chmod("$ori_src",0777);
		}else{
			echo "Gagal melakukan proses upload file. Hal ini biasanya disebabkan ukuran file yang terlalu besar atau koneksi jaringan anda sedang bermasalah";
			exit;
		}
		
		if ($_FILES['imagefile']['type'] == "application/pdf"){
			$thumb_src="media/pdf/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
		} 
		else
		{
			$thumb_src="media/image/imgthumb/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
			
			switch($filesize) {
				case "72x48":
					$n_width = 72;
					$n_height = 48;
				break;
				case "144x96":
					$n_width = 144;
					$n_height = 96;
				break;
				case "230x160":
					$n_width = 230;
					$n_height = 160;
				break;
				case "460x320":
					$n_width = 460;
					$n_height = 320;
				break;
				case "original_size":
					$n_width = 0;
					$n_height = 0;
				break;
			}
		
			if(($_FILES['imagefile']['type']=="image/jpeg") ||
				($_FILES['imagefile']['type']=="image/png") ||
				($_FILES['imagefile']['type']=="image/gif"))
			{
				$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
				$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
				$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
				$im = false; // If image is not JPEG, PNG, or GIF
				
				//$im=ImageCreateFromJPEG($ori_src); 
				$width=ImageSx($im);              // Original picture width is stored
				$height=ImageSy($im);             // Original picture height is stored
				if(($n_height==0) && ($n_width==0)) {
					$n_height = $height;
					$n_width = $width;
				}	

				if(!$im) {
					echo '<p>Gagal membuat thumbnail</p>';
					exit;
				}
				else {				
					$newimage=@imagecreatetruecolor($n_width,$n_height);                 
					@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
					@ImageJpeg($newimage,$thumb_src);
					chmod("$thumb_src",0777);
				}
			}
		}
		
		$data = array();
		$data["uploaded_date"] = date("d-m-Y H:m:s");
		$data["title"] = $title;
		$data["image_description"] = $description;
		$data["file_type"] = $filetype;
		$data["image_url"] = $thumb_src;
		$data["image_size"] = $filesize;
		$this->Admin_model->Simpan_Gambar($data);
		$this->reloadPage($tujuan);
	}
	
	function editdatastatis()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["detail"] = $this->Admin_model->Tampil_Data_Terseleksi_Join2($id);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_data_statis',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatedatastatis()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$data2 = array();
		$data3 = array();
		$data2["content"] = $this->input->post('content');
		$data3["id_parent"] = $this->input->post('data_id');
		$data3["title"] = $this->input->post('judul');
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Update_Content_Menu($data3, $this->input->post('id_menu'));
			$this->Admin_model->Update_Content_Data($data2, $this->input->post('id_data'));
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/datastatis'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusdatastatis()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$del = $this->Admin_model->Delete_Content($id,"data_id","data");
			if($del === TRUE){
				$del = $this->Admin_model->Delete_Content($id,"id","menu");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/datastatis'>";
				}else{
				?>
				<script type="text/javascript" language="javascript">
				alert("Gagal Menghapus data...!!!");
				</script>
				<?php
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function berita()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["berita"] = $this->Admin_model->Berita($offset,$limit);
			$tot_hal = $this->Admin_model->Total_Artikel("berita");
			$config['base_url'] = base_url() . '/index.php/adminweb/berita/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editberita()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["detail"]=$this->Admin_model->Edit_Content("berita","id_berita=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateberita()
	{
		$data2 = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$config['upload_path'] = './berita/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '400';
			$config['max_height'] = '400';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$data2["judul_berita"]=$this->input->post('judul');
				$data2["isi"]=$this->input->post('content');
				$data2["id_berita"]=$this->input->post('id_berita');
				$this->Admin_model->Update_Content("berita",$data2,"id_berita");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/berita'>";
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$data2["judul_berita"]=$this->input->post('judul');
				$data2["isi"]=$this->input->post('content');
				$data2["id_berita"]=$this->input->post('id_berita');
				$data2["gambar"]=$_FILES['userfile']['name'];
				$this->Admin_model->Update_Content("berita",$data2,"id_berita");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/berita'>";
				}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahberita()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanberita() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$content=$this->input->post('content');
			$data2["judul_berita"]=$this->input->post('judul');
			$data2["isi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal"] = mdate($tgl,$time);
			$data2["waktu"] = mdate($jam,$time);
			$data2["author"] = $_SESSION["user_id"];
			$data2["counter"] = "1";
				if(empty($content) && empty($data2["judul"]))
				{
					echo "Data Masih Kosong";
				}
				else{
					$config['upload_path'] = './berita/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '1000';
					$config['max_width'] = '400';
					$config['max_height'] = '400';						
					$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
					$data2["gambar"]= "welcome.jpg";
					$this->Admin_model->Simpan_Artikel("berita",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/berita'>";
					}
					else{
						if(!$this->upload->do_upload())
						{
						echo $this->upload->display_errors();
						}
						else {
						$data2["gambar"]=$_FILES['userfile']['name'];
						$this->Admin_model->Simpan_Artikel("berita",$data2);
						echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/berita'>";
						}
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusberita()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id_berita","berita");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/berita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function pengumuman()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["berita"] = $this->Admin_model->Pengumuman($offset,$limit);
			$tot_hal = $this->Admin_model->Total_Artikel("pengumuman");
			$config['base_url'] = base_url() . '/index.php/adminweb/pengumuman/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/pengumuman',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahpengumuman()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["imglist"]=$this->Admin_model->getDataGambar();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_pengumuman',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanpengumuman() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tgl = " %Y-%m-%d";
			$time = time();
			$content=$this->input->post('content');
			$data2["judul_pengumuman"]=$this->input->post('judul');
			$data2["isi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
			$data2["tanggal"] = mdate($tgl,$time);
			$data2["penulis"] = $data["username"];
				if(empty($content) && empty($data["judul"]))
				{
					echo "Data Masih Kosong";
				}
				else
				{
					$this->Admin_model->Simpan_Artikel("pengumuman",$data2);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/pengumuman'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editpengumuman()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["imglist"]=$this->Admin_model->getDataGambar();
			$data["detail"]=$this->Admin_model->Edit_Content("pengumuman","id_pengumuman=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_pengumuman',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatepengumuman()
	{
		$data2 = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$content=$this->input->post('content');
				$data2["judul_pengumuman"]=$this->input->post('judul');
				$data2["isi"] = preg_replace('#(href|src)="(.*?)/media#', '$1="'.base_url().'media', $content);
				$data2["id_pengumuman"]=$this->input->post('id_pengumuman');
				$this->Admin_model->Update_Content("pengumuman",$data2,"id_pengumuman");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuspengumuman()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id_pengumuman","pengumuman");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function agenda()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			$data["berita"] = $this->Admin_model->Agenda($offset,$limit);
			$tot_hal = $this->Admin_model->Total_Artikel("agenda");
			$config['base_url'] = base_url() . '/index.php/adminweb/agenda/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/agenda',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahagenda()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["imglist"]=$this->Admin_model->getDataGambar();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_agenda',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanagenda() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["tgl_posting"] = mdate($tgl,$time);
				$in["tema_agenda"]=$this->input->post('judul');
				$in["isi"]=strip_tags($this->input->post('isi'));
				$t_mulai=$this->input->post('tgl_mulai');
				$b_mulai=$this->input->post('bln_mulai');
				$y_mulai=$this->input->post('thn_mulai');
				$in["tgl_mulai"]="".$y_mulai."-".$b_mulai."-".$t_mulai."";
				$t_selesai=$this->input->post('tgl_selesai');
				$b_selesai=$this->input->post('bln_selesai');
				$y_selesai=$this->input->post('thn_selesai');
				$in["tgl_selesai"]="".$y_selesai."-".$b_selesai."-".$t_selesai."";
				$in["tempat"]=$this->input->post('tempat');
				$in["jam"]=$this->input->post('jam');
				$in["keterangan"]=strip_tags($this->input->post('keterangan'));
				$this->Admin_model->Simpan_Artikel("agenda",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editagenda()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["imglist"]=$this->Admin_model->getDataGambar();
			$data["detail"]=$this->Admin_model->Edit_Content("agenda","id_agenda=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_agenda',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateagenda()
	{
		$in = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$in["id_agenda"]=$this->input->post('id_agenda');
				$in["tema_agenda"]=$this->input->post('judul');
				$in["isi"]=strip_tags($this->input->post('isi'));
				$t_mulai=$this->input->post('tgl_mulai');
				$b_mulai=$this->input->post('bln_mulai');
				$y_mulai=$this->input->post('thn_mulai');
				$in["tgl_mulai"]="".$y_mulai."-".$b_mulai."-".$t_mulai."";
				$t_selesai=$this->input->post('tgl_selesai');
				$b_selesai=$this->input->post('bln_selesai');
				$y_selesai=$this->input->post('thn_selesai');
				$in["tgl_selesai"]="".$y_selesai."-".$b_selesai."-".$t_selesai."";
				$in["tempat"]=$this->input->post('tempat');
				$in["jam"]=$this->input->post('jam');
				$in["keterangan"]=strip_tags($this->input->post('keterangan'));
				$this->Admin_model->Update_Content("agenda",$in,"id_agenda");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapusagenda()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id_agenda","agenda");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function siswa()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["kelas"] = $this->Admin_model->Siswa_Kelas();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/siswa',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahkelas()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_kelas',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpankelas() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["nama_kelas"]=$this->input->post('nama');
				if($in["nama_kelas"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->Admin_model->Simpan_Artikel("kelas",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/siswa'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuskelas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id_kelas","kelas");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/siswa'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editkelas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["detail"]=$this->Admin_model->Edit_Content("kelas","id_kelas=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_kelas',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatekelas()
	{
		$in = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$in["id_kelas"]=$this->input->post('id');
				$in["nama_kelas"]=$this->input->post('nama');
				$this->Admin_model->Update_Content("kelas",$in,"id_kelas");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/siswa'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function siswaperkelas()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["kelas"] = $this->Admin_model->Siswa_Per_Kelas($id);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/siswa_per_kelas',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahsiswa()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["kelas"]=$this->Admin_model->Siswa_Kelas();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_siswa',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpansiswa() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["id_kelas"]=$this->input->post('kelas');
				$in["nis"]=$this->input->post('no_induk');
				$in["nama_siswa"]=$this->input->post('nama');
				if($in["nama_siswa"]=="" || $in["nis"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->Admin_model->Simpan_Artikel("siswa",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/siswa'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapussiswa()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id_siswa","siswa");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editsiswa()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["kelas"]=$this->Admin_model->Siswa_Kelas();
			$data["detail"]=$this->Admin_model->Edit_Content("siswa","id_siswa=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_siswa',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatesiswa()
	{
		$in = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$in["id_kelas"]=$this->input->post('kelas');
				$in["id_siswa"]=$this->input->post('id_siswa');
				$in["nama_siswa"]=$this->input->post('nama');
				$in["nis"]=$this->input->post('no_induk');
				$this->Admin_model->Update_Content("siswa",$in,"id_siswa");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/siswaperkelas/".$in["id_kelas"]."'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function kepegawaian()
	{
		
		$page=$this->uri->segment(3);
      	$limit=9;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tot_hal = $this->Admin_model->Total_Artikel("kepegawaian");
			$config['base_url'] = base_url() . '/index.php/adminweb/kepegawaian/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["pegawai"] = $this->Admin_model->Daftar_Pegawai($offset,$limit);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/kepegawaian',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function tambahkepegawaian()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/tambah_kepegawaian',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpankepegawaian() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			
				$tgl = " %Y-%m-%d";
				$time = time();
				
                if(! empty ($_FILES['gambar'])){
				
					$config['upload_path'] = './media/gambar/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '1000';
					//$config['max_width'] = '400';
					//$config['max_height'] = '400';						
					$this->load->library('upload', $config);
					
					if($this->upload->do_upload('gambar'))
					{
						$upd = $this->upload->data();
						$in["gambar"] = $upd['file_name'];
					}
				}
                
				$in["nip"]=$this->input->post('nip');
				$in["nama_pegawai"]=$this->input->post('nama_pegawai');
				$in["kelahiran"]=$this->input->post('kelahiran');
				$in["matpel"]=$this->input->post('matpel');
				$in["jk"]=$this->input->post('jk');
				$in["status"]=$this->input->post('status');
				$in["username"]=$this->input->post('username');
				$in["password"]=$this->input->post('password');
				if($in["nip"]=="" || $in["nama_pegawai"]=="" || $in["kelahiran"]=="" || $in["matpel"]=="" || $in["username"]=="" || $in["password"]=="")
				{
					?>
					<script type="text/javascript" language="javascript">
					alert("Data tidak lengkap!!!");
					</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/tambahkepegawaian'>";
				}
				else{
				$this->Admin_model->Simpan_Pegawai($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/kepegawaian'>";
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editkepegawaian()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			
				$config['upload_path'] = './berita/';
				$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
				$config['max_size'] = '1000';
				$config['max_width'] = '400';
				$config['max_height'] = '400';						
				$this->load->library('upload', $config);
			
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["kelas"]=$this->Admin_model->Siswa_Kelas();
			$data["detail"]=$this->Admin_model->Edit_Content("kepegawaian","id_kepegawaian=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_kepegawaian',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatekepegawaian()
	{
		$in = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		// new
		$delgambar = false;
		
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				
				$in["gambar"] = $this->input->post('gambar_lama');
				// new
				$gambarlama = $in["gambar"];
				$pass = $this->input->post('password');
				
				if(! empty ($_FILES['gambar']))
				{
					$config['upload_path'] = './media/gambar/';
					$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
					$config['max_size'] = '1000';
					//$config['max_width'] = '400';
					//$config['max_height'] = '400';						
					$this->load->library('upload', $config);
					
					if($this->upload->do_upload('gambar'))
					{
						$upd = $this->upload->data();
						$in["gambar"] = $upd['file_name'];
						// new
						$delgambar = true;
					}
					
				}
				
				if($pass!="")
				{
					$in["nip"]=$this->input->post('nip');
					$in["nama_pegawai"]=$this->input->post('nama_pegawai');
					$in["kelahiran"]=$this->input->post('kelahiran');
					$in["matpel"]=$this->input->post('matpel');
					$in["jk"]=$this->input->post('jk');
					$in["status"]=$this->input->post('status');
					$in["username"]=$this->input->post('username');
					$pass=$this->input->post('password');
					$in["id_kepegawaian"]=$this->input->post('id');
					// new
					$upd = $this->Admin_model->Update_Content("kepegawaian",$in,"id_kepegawaian");
					$this->Admin_model->Update_Password($pass,$in["id_kepegawaian"]);
					
					if(($upd !== false) && ($delgambar === true))
					{
						unlink('./media/gambar/'.$gambarlama);
					}
					
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/kepegawaian'>";
				}
				else{
					$in["nip"]=$this->input->post('nip');
					$in["nama_pegawai"]=$this->input->post('nama_pegawai');
					$in["kelahiran"]=$this->input->post('kelahiran');
					$in["matpel"]=$this->input->post('matpel');
					$in["jk"]=$this->input->post('jk');
					$in["status"]=$this->input->post('status');
					$in["username"]=$this->input->post('username');
					$in["id_kepegawaian"]=$this->input->post('id');
					// new
					$upd = $this->Admin_model->Update_Content("kepegawaian", $in, "id_kepegawaian");
					
					if(($upd !== false) && ($delgambar === true))
					{
						unlink('./media/gambar/'.$gambarlama);
					}
					
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/kepegawaian'>";
				
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapuskepegawaian()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			
			// new
			$gambar = $this->Admin_model->Get_Files('gambar', 'kepegawaian', 'id_kepegawaian', $id);
			$del = $this->Admin_model->Delete_Content($id,"id_kepegawaian","kepegawaian");
			
			if(($gambar !== false) && ($del !== false))
			{
				unlink('./media/gambar/'.$gambar);
			}
			
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
		
	function upload()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tot_hal = $this->Admin_model->Total_Artikel("download");
			$config['base_url'] = base_url() . '/index.php/adminweb/upload/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["download"]=$this->Admin_model->Tampil_Data_Download();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/upload',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function simpanupload() 
	{
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$tgl = " %Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$in["tgl_posting"] = mdate($tgl,$time);
				$in["judul_file"]=$this->input->post('judul');
				$in["author"]=$_SESSION['user_id'];
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in["nama_file"]=$acak.$nm;
				$config['upload_path'] = './download/';
				$config['allowed_types'] =  'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
				$config['max_size'] = '50000';
				$config['max_width'] = '1200';
				$config['max_height'] = '1200';						
				$this->load->library('upload', $config);
			
				if(!$this->upload->do_upload())
				{
				 echo $this->upload->display_errors();
				}
				else {
				$this->Admin_model->Simpan_Artikel("download",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/upload'>";
				}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function editupload()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["download"]=$this->Admin_model->Tampil_Data_Terseleksi("download","id_download",$id);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_upload',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updateupload()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$config['upload_path'] = './download/';
				$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
				$config['max_size'] = '10000';
				$config['max_width'] = '400';
				$config['max_height'] = '300';
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in2["nama_file"]=$acak.$nm;					
				$this->load->library('upload', $config);
		
				if(empty($_FILES['userfile']['name'])){
					$in["judul_file"]=$this->input->post('judul');
					$in["id_download"]=$this->input->post('id_download');
					$this->Admin_model->Update_Content("download",$in,"id_download");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/upload'>";
					
				}
				else{
					if(!$this->upload->do_upload())
					{
					 echo $this->upload->display_errors();
					}
					else {
					$in2["judul_file"]=$this->input->post('judul');
					$in2["id_download"]=$this->input->post('id_download');
					$this->Admin_model->Update_Content("download",$in2,"id_download");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/upload'>";
					}
				}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function hapusupload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$id='';	
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($data["status"]=="admin"){
				$this->Admin_model->Delete_Content($id,"id_download","download");
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/upload'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel admin dan Pegawaian...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function psb()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data["page"]=$page;
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tot_hal = $this->Admin_model->Total_Artikel("pendaftar");
			$config['base_url'] = base_url() . '/index.php/adminweb/psb/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["pendaftar"]=$this->Admin_model->Tampil_Data_Terbatas2("pendaftar","id","",$offset,$limit);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/psb',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function tambahpsb()
	{
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="web"){
			$this->load->view('main-web/bg_atas',$data);
			$this->load->view('main-web/pendaftaran',$data);
			$this->load->view('main-web/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function editpsb()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["statis"] = $this->Admin_model->Menu_Statis();
			$data["pendaftar"]=$this->Admin_model->Psb();
			$data["detail"]=$this->Admin_model->Edit_Content("pendaftar","id=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/edit_psb',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	function hapuspsb()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id","pendaftar");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatepsb()
	{
		$in = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
				$in["nama"]=$this->input->post('nama');
				$in["jenis_kelamin"]=$this->input->post('jenis_kelamin');
				$in["nama_ayah"]=$this->input->post('nama_ayah');
				$in["pekerjaan_ayah"]=$this->input->post('pekerjaan_ayah');
				$in["penghasilan"]=$this->input->post('penghasilan');
				$this->Admin_model->Update_Content("pendaftar",$in,"id");
	   			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/psb/'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function cetakpsb()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			

			$data["pendaftar"]=$this->Admin_model->Psb();
			$data["detail"]=$this->Admin_model->Edit_Content("pendaftar","id=".$id."");

			$this->load->view('admin/cetak_datapsb',$data);

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
	
	function cetaksemuapsb()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data["pendaftar"]=$this->Admin_model->Psb();
			$this->load->view('admin/cetak_datasemuapsb',$data);
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
		
				
	function hubungi()
	{
		$page=$this->uri->segment(3);
      	$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		$data["page"]=$page;
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$tot_hal = $this->Admin_model->Total_Artikel("pesan");
			$config['base_url'] = base_url() . '/index.php/adminweb/hubungi/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["pesan"]=$this->Admin_model->Tampil_Data_Terbatas("pesan","id_pesan","",$offset,$limit);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/hubungi',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function updatehubungi()
	{
		$data = array();
		$data2 = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$data2["id_pesan"] = $this->input->post('id');
			$data2["nama"] = $this->input->post('nama');
			$data2["email"] = $this->input->post('email');
			$data2["pesan"] = $this->input->post('pesan');
			$data2["status"] = $this->input->post('status');
			$this->Admin_model->Update_Content("pesan",$data2,"id_pesan");
	   		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/hubungi'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	function hapushubungi()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_smp2cikande']) ? $_SESSION['username_smp2cikande']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="admin"){
			$this->Admin_model->Delete_Content($id,"id_pesan","pesan");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminweb/hubungi'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
	
	
	
//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce() {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/adminweb/image_list/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	}
	
	
	
	private function reloadPage($reloadURL)
	{
		echo 
			'<html>
			<head>
			</head>
			<body>
			<script languange="javascript">
			document.location = \''.base_url().'index.php/adminweb/'.$reloadURL.'\'
			</script>
			</body>
			</html>';
	} 	
}









?>
