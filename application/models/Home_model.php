<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends MY_Model
{

	public function getAllCount()
    {
        $sql = "SELECT COUNT(data_inventaris.id_inventaris) AS jumlah_total FROM data_inventaris WHERE waktu_keluar is null";
        return $this->db->query($sql)->row();
    }
    
	public function getAllCount_level()
    {
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql = "SELECT COUNT(data_inventaris.id_inventaris) AS jumlah_total FROM data_inventaris WHERE data_inventaris.id_level_ruang = $id_level_ruang AND waktu_keluar is null";
        return $this->db->query($sql)->row();
    }

	public function selectjenis()
    {
        $sql = "SELECT jenis_barang, count(*) AS count_jenis FROM data_inventaris WHERE jenis_barang is not null AND waktu_keluar is null GROUP BY jenis_barang";
        
        return $this->db->query($sql)->result();
    }
    
	public function selectjenis_level()
    {
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql = "SELECT jenis_barang, count(*) AS count_jenis FROM data_inventaris WHERE jenis_barang is not null AND data_inventaris.id_level_ruang = $id_level_ruang AND waktu_keluar is null GROUP BY jenis_barang";
        
        return $this->db->query($sql)->result();
    }
	
	public function selectkondisi()
    {
        $sql = "SELECT data_inventaris.id_inventaris, kondisi.kondisi, count(*) AS count_kondisi FROM data_inventaris, kondisi WHERE waktu_keluar is null AND data_inventaris.id_kondisi=kondisi.id_kondisi GROUP BY data_inventaris.id_kondisi";
        
        return $this->db->query($sql)->result();
    }

	public function selectkondisi_level()
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$sql = "SELECT data_inventaris.id_inventaris, kondisi.kondisi, count(*) AS count_kondisi FROM data_inventaris, kondisi WHERE waktu_keluar is null AND data_inventaris.id_kondisi=kondisi.id_kondisi AND data_inventaris.id_level_ruang = $id_level_ruang GROUP BY data_inventaris.id_kondisi";
        
        return $this->db->query($sql)->result();
    }

	public function selectrusak()
    {		
		$sql = "SELECT COUNT(data_inventaris.id_inventaris) AS total_rusak FROM data_inventaris WHERE id_kondisi =  2 AND waktu_keluar is null ";
        
        return $this->db->query($sql)->row();
    }
	
	public function selectrusak_level()
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		
		$sql = "SELECT COUNT(data_inventaris.id_inventaris) AS total_rusak FROM data_inventaris WHERE  data_inventaris.id_level_ruang = $id_level_ruang AND id_kondisi =  2 AND waktu_keluar is null ";
        
        return $this->db->query($sql)->row();
    }
	
	public function selectmasuk()
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$awal = date("Y-m-01 00:00:00");
		$akhir = date("Y-m-t 23:59:59");
		
		$sql = "SELECT COUNT(data_inventaris.id_inventaris) AS total_masuk FROM data_inventaris WHERE (waktu_masuk between '$awal' AND '$akhir') ";
        
        return $this->db->query($sql)->row();
    }
	
	public function selectmasuk_level()
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$awal = date("Y-m-01 00:00:00");
		$akhir = date("Y-m-t 23:59:59");
		
		$sql = "SELECT COUNT(data_inventaris.id_inventaris) AS total_masuk FROM data_inventaris WHERE data_inventaris.id_level_ruang = $id_level_ruang AND (waktu_masuk between '$awal' AND '$akhir') ";
        
        return $this->db->query($sql)->row();
    }
	
	public function selectkeluar()
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$awal = date("Y-m-01 00:00:00");
		$akhir = date("Y-m-t 23:59:59");
		
		$sql = "SELECT COUNT(data_inventaris.id_inventaris) AS total_keluar FROM data_inventaris WHERE (waktu_keluar between '$awal' AND '$akhir') ";
        
        return $this->db->query($sql)->row();
    }
	
	public function selectkeluar_level()
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$awal = date("Y-m-01 00:00:00");
		$akhir = date("Y-m-t 23:59:59");
		
		$sql = "SELECT COUNT(data_inventaris.id_inventaris) AS total_keluar FROM data_inventaris WHERE data_inventaris.id_level_ruang = $id_level_ruang AND (waktu_keluar between '$awal' AND '$akhir') ";
        
        return $this->db->query($sql)->row();
    }
}