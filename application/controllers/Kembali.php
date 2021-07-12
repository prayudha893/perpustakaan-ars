<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kembali extends CI_Controller {

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
		$this->load->model('Kembali_Model');
	}

	public function index()
	{
		$data = [
			'title' => 'Pengembalian',
			'sub_title' => 'Daftar Pengembalian',
			'content' => 'kembali/index',
			'buku' => $this->Kembali_Model->get_buku(),
            'pinjam' => $this->Kembali_Model->get_pinjam()
		];
		$this->load->view('template/my_template', $data);
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Pengembalian',
			'sub_title' => 'Transaksi Pengembalian',
			'content' => 'kembali/edit',
			'pinjam' => $this->Kembali_Model->get_pinjam_by_id($id)->row(),
			'buku' => $this->Kembali_Model->get_buku_by_pinjam($id)
		];
		$this->load->view('template/my_template', $data);
	}

	public function update()
	{
		date_default_timezone_set("Asia/Bangkok");
		$id_pinjam = $this->input->post('id_pinjam');
		$days = $this->input->post('days');
		$tanggal_now = date('Y-m-d');

		$data = array(
			'totaldenda' => $this->input->post('total_denda'),
			'status_pinjam' => 1,
		);
		// kirim data ke model
		$this->db->where('id_pinjam', $id_pinjam);
		$this->db->update('peminjaman', $data);
		
		$update = array(
			'tgl_pengembalian' => $tanggal_now,
			'denda' => $days * 2500,
			'status_kembali' => 1
		);
		$this->db->where('id_pinjam',$id_pinjam);
		$this->db->update('detail_pinjam', $update);
		
		redirect('kembali');

	}
}
