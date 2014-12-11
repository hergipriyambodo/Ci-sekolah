<?php
class Web_model extends CI_Model
	{
	
		public function __construct()
		{
			parent::__construct();
			
		}
		
		function Side_Pengumuman()
		{
			$q=$this->db->query("select * from pengumuman order by id_pengumuman DESC limit 5");
			return $q;
		}
		function Side_Agenda()
		{
			$q=$this->db->query("select * from agenda order by id_agenda DESC limit 5");
			return $q;
		}
		function Detail_Agenda($id_agenda)
		{
			$q=$this->db->query("select * from agenda where id_agenda='$id_agenda'");
			return $q;
		}
		function Detail_Pengumuman($id_pengumuman)
		{
			$q=$this->db->query("select * from pengumuman where id_pengumuman='$id_pengumuman'");
			return $q;
		}
		function Berita_Home()
		{
			$q=$this->db->query("select * from berita order by id_berita DESC limit 0,4");
			return $q;
		}
		function Kepegawaian($limit,$ofset,$status)
		{
			$q=$this->db->query("select * from kepegawaian where status='$status' order by id_kepegawaian ASC limit $ofset,$limit");
			return $q;
		}
		function Total_Kepegawaian($status)
		{
			$q=$this->db->query("select * from kepegawaian where status='$status' order by id_kepegawaian ASC");
			return $q;
		}
		function Semua_Berita($limit,$ofset)
		{
			$q=$this->db->query("select * from berita order by id_berita DESC limit $ofset,$limit");
			return $q;
		}
		function Total_Berita()
		{
			$q=$this->db->query("select * from berita order by id_berita DESC");
			return $q;
		}
		function Semua_Pengumuman($limit,$ofset)
		{
			$q=$this->db->query("select * from pengumuman order by id_pengumuman DESC limit $ofset,$limit");
			return $q;
		}
		function semua_menu(){
		$q=$this->db->query("select * from menu order by id ASC");
			return $q;
		}
		function Total_Pengumuman()
		{
			$q=$this->db->query("select * from pengumuman order by id_pengumuman DESC");
			return $q;
		}
		function Semua_Agenda($limit,$ofset)
		{
			$q=$this->db->query("select * from agenda order by id_agenda DESC limit $ofset,$limit");
			return $q;
		}
		function Total_Agenda()
		{
			$q=$this->db->query("select * from agenda order by id_agenda DESC");
			return $q;
		}
		function Menu_Atas()
		{
			$q=$this->db->query("SELECT * from menu where id_parent='0' and level='0'");
			return $q;
		}
		function Sub_Menu_Atas($id_parent,$level)
		{
			$q=$this->db->query("SELECT * from menu where id_parent='$id_parent' and level='$level'");
			return $q;
		}
		function Menu_Bawah()
		{
			$q=$this->db->query("SELECT * from menu where id_parent='0' and level=10");
			return $q;
		}
		function sitemap()
		{
			$q=$this->db->query("SELECT * from menu order by id asc");
			return $q;
		}
		function sitemap1()
		{
			$q=$this->db->query("SELECT * from menu where id_parent=1");
			return $q;
		}
		function sitemap2()
		{
			$q=$this->db->query("SELECT * from menu where id_parent=2");
			return $q;
		}
		function sitemap3()
		{
			$q=$this->db->query("SELECT * from menu where id_parent=3");
			return $q;
		}
		function sitemap4()
		{
			$q=$this->db->query("SELECT * from menu where id_parent=4");
			return $q;
		}
		function sitemap5()
		{
			$q=$this->db->query("SELECT * from menu where id_parent=5");
			return $q;
		}
		function sitemap6()
		{
			$q=$this->db->query("SELECT * from menu where id_parent=6");
			return $q;
		}
		function Data_Statis($id)
		{
			$q=$this->db->query("select * from data left join menu on data.data_id=menu.id where data_id='$id'");
			return $q;
		}
		function Update_Pengunjung()
		{
			$query_update=$this->db->query("update data set content=content+1 where data_id='counter'");
			return $query_update;
		}
		function Counter_Pengunjung()
		{
			$q=$this->db->query("select * from data where data_id='counter'");
			return $q;
		}
		function Detail_Berita($id)
		{
			$q=$this->db->query("select * from berita where id_berita='$id'");
			return $q;
		}
		function Update_Polling($id_poll)
		{
			$query_update=$this->db->query("update jawabanpoll set counter=counter+1 where id_jawaban_poll='$id_poll'");
			return $query_update;
		}
		function Kelas()
		{
			$q=$this->db->query("select * from kelas order by id_kelas ASC");
			return $q;
		}
		function Nama_Siswa($kls)
		{
			$q=$this->db->query("select * from siswa left join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_kelas='$kls' order by siswa.id_siswa 
			ASC");
			return $q;
		}
		
		function Pendaftaran()
		{
			$q=$this->db->query("select * from pendaftar");
			return $q;
		}
		
		function Insert_Pendaftar($datainsert) 
		{
			$this->db->insert('pendaftar',$datainsert);
		}
		
		
		
		function Total_Download()
		{
			$q=$this->db->query("select * from download");
			return $q;
		}
		function Semua_Download($limit,$offset)
		{
			$q=$this->db->query("select * from download left join kepegawaian on download.author=kepegawaian.id_kepegawaian order by id_download DESC limit $offset,$limit");
			return $q;
		}
		function Berita_Acak($id_berita)
		{
			$query_berita=$this->db->query("SELECT * from berita where id_berita!='$id_berita' order by RAND() LIMIT 5");
			return $query_berita;
		}
		function Insert_Pesan($datainsert) 
		{
			$this->db->insert('pesan',$datainsert);
		}
		function Data_Login($user,$pass)
		{
			$user_bersih=mysql_real_escape_string($user);
			$pass_bersih=mysql_real_escape_string($pass);
			$query=$this->db->query("select * from kepegawaian where username='$user_bersih' and password=md5('$pass_bersih')");
			return $query;
		}
	}
?>
