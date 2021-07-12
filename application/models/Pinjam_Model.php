<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pinjam_Model extends CI_Model
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
        $this->db->where('id_pinjam',$package_id);
        $query = $this->db->get();
        return $query;
    }

    public function get_pinjam(){
        $this->db->select('peminjaman.*,COUNT(detail_pinjam.id_buku) AS item_buku, anggota.nama_anggota');
        $this->db->from('peminjaman');
        $this->db->join('detail_pinjam', 'peminjaman.id_pinjam=detail_pinjam.id_pinjam');
        $this->db->join('buku', 'detail_pinjam.id_buku=buku.id_buku');
        $this->db->join('anggota', 'anggota.id_anggota=peminjaman.id_anggota');
        $this->db->group_by('peminjaman.id_pinjam');
		$this->db->group_by('anggota.nama_anggota');
        $query = $this->db->get();
        return $query;
    }

    public function create($data)
	{
		// input data baru
		if($this->db->insert('peminjaman', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function update($id, $data)
	{
		// ubah data

		$this->db->where('id_anggota', $id);
		if($this->db->update('anggota', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id)
	{
		// hapus data
		// hard delete atau soft delete
		$this->db->where('id_anggota', $id);
		if($this->db->delete('anggota')){
			return true;
		}else{
			return false;
		}
	}

	public function soft_delete($id)
	{
		$this->db->where('id_anggota', $id);
		if($this->db->delete('anggota')){
			return true;
		}else{
			return false;
		}
	}

	public function show($id)
	{	
		// baca data
		$this->db->where('id_anggota', $id);
		return $this->db->get('anggota');
	}
}