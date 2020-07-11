<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{

	/**
	 * Hanya bisa di akses oleh admin
	 */
	public function __construct()
	{
		parent::__construct();
		$role = $this->session->userdata('role');
		if ($role != 'admin') {
			redirect(base_url('/'));
			return;
		}
	}

	public function index($page = null)
	{
		$data['title']		= 'Admin: Category';
		$data['content']	= $this->category->paginate($page)->get();
		$data['total_rows']	= $this->category->count(); // total data kategori
		$data['pagination']	= $this->category->makePagination(base_url('category'), 2, $data['total_rows']); // 2 = lokasi segmen url
		$data['page']		= 'pages/category/index';

		$this->view($data);
	}

	public function search($page = null)
	{
		if (isset($_POST['keyword'])) {
			/**
			 * Memasukan keyword kedalam session
			 * Menyimpan suatu data Post dari form search dengan name inputnya adalah keyword => name='keyword'
			 */
			$this->session->set_userdata('keyword', $this->input->post('keyword'));
		} else {
			redirect(base_url('category'));
		}

		$keyword      = $this->session->userdata('keyword');
		$data['title']      = 'Admin: Category';
		$data['content']    = $this->category->like('title', $keyword)->paginate($page)->get();
		$data['total_rows'] = $this->category->like('title', $keyword)->count();
		$data['pagination'] = $this->category->makePagination(
			base_url('category/search'),
			3,
			$data['total_rows']
		);
		$data['page']		= 'pages/category/index';

		$this->view($data);
	}

	public function reset()
	{
		/**
		 * menghapus keyword dari session
		 */
		$this->session->unset_userdata('keyword');
		redirect(base_url('category'));
	}

	public function create()
	{
		/**
		 * Variable 1 = Apabila admin akses page kategori makan field kosong
		 * Variable 2 = Jika akses page kategori dan inputan pada field ada yg error maka field yg tidak error tetap ada tidak hilang
		 */
		if (!$_POST) {
			$input = (object) $this->category->getDefaultValues();  // Variable 1
		} else {
			$input = (object) $this->input->post(null, true);  // Variable 2
		}

		/**
		 * Tanda negasi !
		 * Setelah melakukan inputan pada field maka akan di cek validasinya sudah sesuai dengan required apa belum
		 * jika gagal akan di kembalikan di page form categori, dengan inputan pada filed tidak hilang
		 */
		if (!$this->category->validate()) {
			$data['title']       = 'Tambah Kategori';
			$data['input']       = $input;
			$data['form_action'] = base_url('category/create');  // form action untuk mengarahkan ke dalam page form tambah kategori
			$data['page']        = 'pages/category/form';

			$this->view($data);
			return;
		}

		/**
		 * if jika data berhasil divalidasi maka akan di insertkan ke database
		 * dan di redirect ke page categori
		 */
		if ($this->category->create($input)) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
		}

		redirect(base_url('category'));
	}

	public function edit($id)
	{
		$data['content'] = $this->category->where('id', $id)->first();

		if (!$data['content']) {
			$this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
			redirect(base_url('category'));
		}

		if (!$_POST) {
			$data['input'] = $data['content'];
		} else {
			$data['input'] = (object) $this->input->post(null, true);
		}

		if (!$this->category->validate()) {
			$data['title']       = 'Ubah Kategori';
			$data['form_action'] = base_url("category/edit/$id");
			$data['page']        = 'pages/category/form';

			$this->view($data);
			return;
		}

		if ($this->category->where('id', $id)->update($data['input'])) {
			$this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
		}

		redirect(base_url('category'));
	}

	public function delete($id)
	{
		/**
		 * ! = Negasi = Tidak
		 */
		if (!$_POST) {
			redirect(base_url('category'));
		}

		/**
		 * untuk cek data dengan ID apakah ada atau tidak
		 */
		if (!$this->category->where('id', $id)->first()) {
			$this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan.');
			redirect(base_url('category'));
		}

		/**
		 * untuk cek data dengan ID apakah ada atau tidak
		 */
		if ($this->category->where('id', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
		}

		redirect(base_url('category'));
	}

	public function unique_slug()
	{
		$slug = $this->input->post('slug');
		$id   = $this->input->post('id');
		/**
		 * Apakah terdata suatu data di table category pada kolom Slug
		 * sama dengan nilanya dalam varibale Slug
		 */
		$category	= $this->category->where('slug', $slug)->first();

		if ($category) {
			if ($id == $category->id) {
				return true;
			}
			$this->load->library('form_validation'); // untuk cek validasi form apakah datanya sudah ada atau belum di database
			$this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
			return false;
		}

		return true;
	}

	public function unique_category()
	{
		$title = $this->input->post('title');
		$id    = $this->input->post('id');
		/**
		 * Apakah terdata suatu data di table category pada kolom Title
		 * sama dengan nilanya dalam varibale title
		 */
		$category	= $this->category->where('title', $title)->first();

		if ($category) {
			if ($id == $category->id) {
				return true;
			}
			$this->load->library('form_validation'); // untuk cek validasi form apakah datanya sudah ada atau belum di database
			$this->form_validation->set_message('unique_category', '%s sudah digunakan!');
			return false;
		}

		return true;
	}
}

/* End of file Category.php */
