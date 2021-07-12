<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pinjam_Model');
	}

	public function index()
	{
		$data = [
			'title' => 'Peminjaman',
			'sub_title' => 'Daftar Peminjaman',
			'content' => 'pinjam/index',
			'buku' => $this->Pinjam_Model->get_buku(),
            'pinjam' => $this->Pinjam_Model->get_pinjam()
		];
		$this->load->view('template/my_template', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Peminjaman',
			'sub_title' => 'Tambah Transaksi Peminjaman',
			'content' => 'pinjam/add',
            'buku' => $this->Pinjam_Model->get_buku(),
            'anggota' => $this->Pinjam_Model->get_anggota(),
		];
		$this->load->view('template/my_template', $data);
	}

	public function create()
	{
        date_default_timezone_set("Asia/Bangkok");
		$data = array(
			'tanggal' => date('Y-m-d H:i:s'),
			'id_anggota' => $this->input->post('id_anggota'),
			'tgl_pinjam' => date("Y-m-d", strtotime($this->input->post('tgl_pinjam'))),
			'tgl_kembali' => date("Y-m-d", strtotime($this->input->post('tgl_kembali'))),
			'totaldenda' => 0,
			'status_pinjam' => 0,
		);
		// kirim data ke model
		$this->db->insert('peminjaman', $data);

        $id_pinjam = $this->db->insert_id();
        $result = array();
            foreach($_POST['buku'] as $key => $val){
                $result[] = array(
                'id_pinjam' => $id_pinjam,
                'id_buku' => $_POST['buku'][$key],
                'tgl_pengembalian' => date("Y-m-d", strtotime($this->input->post('tgl_kembali'))),
                'denda' => 0,
                'status_kembali' => 0
                );
            }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('detail_pinjam', $result);
		
		redirect('pinjam');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Anggota',
			'sub_title' => 'Ubah Data Anggota',
			'content' => 'anggota/edit',
			'show' => $this->Anggota_Model->show($id)->row()
		];
		$this->load->view('template/my_template', $data);
	}

	public function update()
	{
		$id_anggota = $this->input->post('id_anggota');

		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'),
			'gender' => $this->input->post('gender'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		// kirim data ke model
		$update_data = $this->Anggota_Model->update($id_anggota, $data);

		if($update_data)
		{
			redirect('anggota');
		}
		else
		{
			redirect('anggota/edit');
		}

	}

	public function delete($id)
	{
		$hapus_data = $this->Anggota_Model->soft_delete($id);

		if($hapus_data){
			redirect('anggota');
		}else{
			redirect('anggota');
		}
	}
}
