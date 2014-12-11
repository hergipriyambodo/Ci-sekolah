<?php
class Admin_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			
		}
		
		function Data_Statis()
		{
			$q=$this->db->query("select * from data left join menu on data.data_id=menu.id where data.data_id!='counter' order by data.data_id ASC");
			return $q;
		}
		function Menu_Statis()
		{
			$q=$this->db->query("select * from menu where id_parent='0' and level='0'");
			return $q;
		}	

		function Get_Id_Menu($id_parent=0)
		{
			$this->db->select('id');
			$this->db->from('menu');
			$this->db->where('id_parent', $id_parent);
			$data = $this->db->get();
			
			if($data->num_rows() > 0)
			{
				return $data->result();
			}
			return FALSE;
		}		
		function getDataGambar() 
		{
			$query=$this->db->query("select * from gambar");
			return $query;
		}
		function Simpan_Data_Statis($data)
		{
			$this->db->insert('menu', array('id' => $data['data_id'], 'title' => $data['judul'], 'id_parent' => $data['id_parent'], 'level' => '1'));
			$this->db->insert('data', array('id_data' => '', 'content' => $data['content'], 'data_id' => $data['data_id']));
		}
		function Simpan_Gambar($datainsert)
		{
			$this->db->insert('gambar',$datainsert);
		}
		function Hapus_Media($id)
		{
			$this->db->where('id_file',$id );
			$this->db->delete('gambar');
		}
		function Edit_Content($tabel,$seleksi)
		{
			$query=$this->db->query("select * from $tabel where $seleksi");
			return $query;
		}
		function Update_Content($tabel,$isi,$seleksi)
		{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
			
			if($this->db->affected_rows() > 0)
			{
				return true;
			}
			
			return false;
		}
		function Update_Content_Menu($data,$id)
		{
			$this->db->where("id",$id);
			$this->db->update("menu",$data);
		}
		function Update_Content_Data($data,$id)
		{
			$this->db->where("id_data",$id);
			$this->db->update("data",$data);
			
		}
		
		function Delete_Content($id,$seleksi,$tabel)
		{
			$this->db->where($seleksi,$id);
			$this->db->delete($tabel);
			
			// new
			if($this->db->affected_rows() > 0)
			{
				return TRUE;
			}
			
			return FALSE;
		}
		
		// new
		function Get_Files($field, $tabel, $field2, $id=0)
		{
			$this->db->select($field);
			$this->db->from($tabel);
			$this->db->where($field2, $id);
			$gambar = $this->db->get();
			
			if($gambar->num_rows() > 0)
			{
				foreach($gambar->result() as $gmb)
				{
					return $gmb->$field;
				}
				
			}
			return false;
		}
		
		function Berita($offset,$limit)
		{
			$q=$this->db->query("select * from berita order by id_berita DESC LIMIT $offset,$limit");
			return $q;
		}
		function Total_Artikel($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		function Simpan_Artikel($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
		function Pengumuman($offset,$limit)
		{
			$q=$this->db->query("select * from pengumuman order by id_pengumuman DESC LIMIT $offset,$limit");
			return $q;
		}
		function Agenda($offset,$limit)
		{
			$q=$this->db->query("select * from agenda order by id_agenda DESC LIMIT $offset,$limit");
			return $q;
		}
		function Siswa_Kelas()
		{
			$q=$this->db->query("select * from kelas order by nama_kelas");
			return $q;
		}
		function Siswa_Per_Kelas($id)
		{
			$q=$this->db->query("select * from siswa left join kelas on siswa.id_kelas=kelas.id_kelas where siswa.id_kelas=$id order by siswa.id_siswa ASC"
			);
			return $q;
		}
		function Daftar_Pegawai($offset,$limit)
		{
			$q=$this->db->query("select * from kepegawaian order by kepegawaian.id_kepegawaian ASC LIMIT $offset,$limit");
			return $q;
		}
		function Simpan_Pegawai($in)
		{
			$this->db->trans_start();
			$this->db->query("INSERT INTO kepegawaian (nip, nama_pegawai, kelahiran, matpel, jk, status, username, password, gambar) VALUES ('".$in['nip']."', 
			'".$in['nama_pegawai']."', '".$in['kelahiran']."', '".$in['matpel']."', '".$in['jk']."', '".$in['status']."', '".$in['username']."', 
			md5( '".$in['password']."'), '".$in['gambar']."')");
			$this->db->trans_complete();
			$sukses = TRUE;
			if ($this->db->trans_status() === FALSE)
			{
				$sukses = FALSE;
			} 
			return $sukses;
		}
		function Update_Password($in,$id)
		{
			$q=$this->db->query("update kepegawaian set password=md5('".$in."') where id_kepegawaian='".$id."'");
			return $q;
		}
		
		function Tampil_Data_Download()
		{
			$q=$this->db->query("select download.*, kepegawaian.nama_pegawai FROM download, kepegawaian WHERE download.author=kepegawaian.id_kepegawaian ORDER BY id_download DESC");
			return $q;
		}
		
		function Tampil_Data($tabel,$id)
		{
			$q=$this->db->query("select * from ".$tabel." order by ".$id." DESC");
			return $q;
		}
		function Tampil_Data_Terbatas($tabel,$id,$join,$offset,$limit)
		{
			$q=$this->db->query("select * from ".$tabel." ".$join." order by ".$id." DESC LIMIT ".$offset.",".$limit."");
			return $q;
		}
		function Tampil_Data_Terseleksi($tabel,$id,$id_seleksi)
		{
			$q=$this->db->query("select * from ".$tabel." where ".$id." = ".$id_seleksi."");
			return $q;
		}
		function Tampil_Data_Terseleksi_Join($tabel,$id,$id_seleksi,$join)
		{
			$q=$this->db->query("select * from ".$tabel." left join kelas on siswa.id_kelas=kelas.id_kelas where ".$id." = ".$id_seleksi."");
			return $q;
		}
		function Tampil_Data_Terseleksi_Join2($id)
		{
			$q=$this->db->query("select * from data left join menu on data.data_id=menu.id where data.id_data= ".$id."");
			return $q;
		}
		
		//function Daftar_PSB($offset,$limit)
		//{
			//$q=$this->db->query("select * from pendaftar order by pendaftar.id ASC LIMIT $offset,$limit");
			//return $q;
		//}
		
		function Psb()
		{
			$q=$this->db->query("select * from pendaftar order by nama");
			return $q;
		}
		
		function Tampil_Data_Terbatas2($tabel,$id,$join,$offset,$limit)
		{
			$q=$this->db->query("select * from ".$tabel." ".$join." order by ".$id." DESC LIMIT ".$offset.",".$limit."");
			return $q;
		}
		
		
		function Tampil_Cek_Absen($id_kelas,$tgl,$bln,$thn)
		{
			$q=$this->db->query("select * from absensi left join siswa on absensi.id_siswa=siswa.id_siswa where absensi.id_kelas=".$id_kelas." and tanggal=".$tgl." and bulan=".$bln." and tahun=".$thn
			."");
			return $q;
		}
		function Simpan_Data($query)
		{
			$this->db->query($query);
		}
		function Edit_Absen($id_absen)
		{
			$q=$this->db->query("select * from absensi left join (kelas,siswa) on absensi.id_kelas=kelas.id_kelas and absensi.id_siswa=siswa.id_siswa 
			where absensi.id_absensi = ".$id_absen."");
			return $q;
		}
		
	}
?>
