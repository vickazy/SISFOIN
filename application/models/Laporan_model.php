<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends MY_Model
{
	public function kondisi($id_kondisi)
    {				
		$sql = "SELECT * FROM data_inventaris,kondisi, data_ruang WHERE data_inventaris.id_kondisi = '$id_kondisi' AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang AND waktu_keluar is null ORDER by kd_barang ASC, no_aset ASC";
        
        return $this->db->query($sql)->result();
    }
	
	public function kondisi_level($id_kondisi)
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_kondisi = '$id_kondisi' AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang AND waktu_keluar is null AND data_inventaris.id_level_ruang = $id_level_ruang ORDER by kd_barang ASC, no_aset ASC";
        
        return $this->db->query($sql)->result();
    }
	
	public function ruang($id_ruang)
    {				
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_ruang = '$id_ruang' AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang AND waktu_keluar is null ORDER by kd_barang ASC, no_aset ASC";
        
        return $this->db->query($sql)->result();
    }
	
	public function ruang_level($id_ruang)
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_ruang = '$id_ruang' AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang AND waktu_keluar is null AND data_inventaris.id_level_ruang = $id_level_ruang ORDER by kd_barang ASC, no_aset ASC";
        
        return $this->db->query($sql)->result();
    }
	
	public function getruang_all()
    {           
        $sql =" SELECT * FROM data_ruang";
	
        return $this->db->query($sql)->result();
    }
	
	public function getruang_level()
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql =" SELECT * FROM data_ruang WHERE data_ruang.id_level_ruang = $id_level_ruang ";
	
        return $this->db->query($sql)->result();
    }
	
	public function masuk($awal_masuk, $akhir_masuk)
    {
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE (data_inventaris.waktu_masuk between '$awal_masuk' AND '$akhir_masuk') AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ";
        
        return $this->db->query($sql)->result();
    }
	
	public function masuk_level($awal_masuk, $akhir_masuk)
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_level_ruang = $id_level_ruang AND (data_inventaris.waktu_masuk between '$awal_masuk' AND '$akhir_masuk') AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ";
        
        return $this->db->query($sql)->result();
    }
	
	public function keluar($awal_keluar, $akhir_keluar)
    {
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE (data_inventaris.waktu_keluar between '$awal_keluar' AND '$akhir_keluar') AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ";
        
        return $this->db->query($sql)->result();
    }
	
	public function keluar_level($awal_keluar, $akhir_keluar)
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_level_ruang = $id_level_ruang AND (data_inventaris.waktu_keluar between '$awal_keluar' AND '$akhir_keluar') AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ";
        
        return $this->db->query($sql)->result();
    }
	
	public function jenis_barang($jenis_barang)
    {				
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.jenis_barang = '$jenis_barang' AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang AND waktu_keluar is null ORDER by kd_barang ASC, no_aset ASC";
        
        return $this->db->query($sql)->result();
    }
	
	public function jenis_barang_level($jenis_barang)
    {
		$id_level_ruang = $this->session->userdata('id_level_ruang');
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.jenis_barang = '$jenis_barang' AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang AND waktu_keluar is null AND data_inventaris.id_level_ruang = $id_level_ruang ORDER by kd_barang ASC, no_aset ASC";
        
        return $this->db->query($sql)->result();
    }
	
	public function adv_search($jenis_barang, $id_ruang, $id_kondisi)
    {
		$sql = "SELECT * FROM data_inventaris, kondisi, data_ruang WHERE <?php if ($jenis_barang != null) {data_inventaris.jenis_barang = '$jenis_barang' AND} elseif ($id_ruang != null) { data_inventaris.id_ruang = '$id_ruang' AND } elseif ($id_kondisi != null) { data_inventaris.id_kondisi = '$id_kondisi' AND} ?> data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ";
        
        return $this->db->query($sql)->result();
    }
}