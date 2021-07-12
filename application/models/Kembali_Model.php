<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Kembali_Model extends CI_Model
{
    public function get_buku(){
        $query = $this->db->get('buku');
        return $query;
    }

    public function get_anggota(){
        $query = $this->db->get('anggota');
        return $query;
    }

    public function get_buku_by_pinjam($id_pinjam){
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->join('detail_pinjam', 'buku.id_buku=detail_pinjam.id_buku');
        $this->db->join('peminjaman', 'peminjaman.id_pinjam=detail_pinjam.id_pinjam');
        $this->db->where('detail_pinjam.id_pinjam',$id_pinjam);
        $query = $this->db->get();
        return $query;
    }

    public function get_pinjam(){
        $this->db->select('peminjaman.*,COUNT(detail_pinjam.id_buku) AS item_buku, anggota.nama_anggota');
        $this->db->from('peminjaman');
        $this->db->join('detail_pinjam', 'peminjaman.id_pinjam=detail_pinjam.id_pinjam');
        $this->db->join('buku', 'detail_pinjam.id_buku=buku.id_buku');
        $this->db->join('anggota', 'anggota.id_anggota=peminjaman.id_anggota');
        $this->db->where('status_pinjam', 0);
        $this->db->group_by('peminjaman.id_pinjam');
        $this->db->group_by('anggota.id_anggota');
        $query = $this->db->get();
        return $query;
    }

    public function get_pinjam_by_id($id_pinjam){
        $this->db->select('peminjaman.*,COUNT(detail_pinjam.id_buku) AS item_buku, anggota.nama_anggota');
        $this->db->from('peminjaman');
        $this->db->join('detail_pinjam', 'peminjaman.id_pinjam=detail_pinjam.id_pinjam');
        $this->db->join('buku', 'detail_pinjam.id_buku=buku.id_buku');
        $this->db->join('anggota', 'anggota.id_anggota=peminjaman.id_anggota');
        $this->db->where('peminjaman.id_pinjam', $id_pinjam);
        $this->db->group_by('peminjaman.id_pinjam');
        $this->db->group_by('anggota.id_anggota');
        $query = $this->db->get();
        return $query;
    }

}