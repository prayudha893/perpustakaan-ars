<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
		$this->load->model('Anggota_Model');
	}

	public function index()
	{
		$data = [
			'title' => 'Anggota',
			'sub_title' => 'Daftar Anggota',
			'content' => 'anggota/index',
			'show' => $this->Anggota_Model->read()->result()
		];
		$this->load->view('template/my_template', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Anggota',
			'sub_title' => 'Tambah Anggota',
			'content' => 'anggota/add',
		];
		$this->load->view('template/my_template', $data);
	}

	public function create()
	{

		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'),
			'gender' => $this->input->post('gender'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		// kirim data ke model
		$insert_data = $this->Anggota_Model->create($data);

		if($insert_data)
		{
			redirect('anggota');
		}
		else
		{
			redirect('anggota/add');
		}

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
