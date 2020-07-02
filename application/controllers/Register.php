<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{

	/**
	 * fungsinya untuk mengecek user sudah login/register atau belum
	 */
	public function __construct()
	{
		parent::__construct();
		$is_login	= $this->session->userdata('is_login'); // untuk mendapatkan nilai dari session login

		/**
		 * Validasi & Redirect
		 * jika sudah/berhasil login di redirect ke page home
		 */
		if ($is_login) {
			redirect(base_url());
			return;
		}
	}

	public function index()
	{
		/**
		 * !$_POST => jika bukan dengan methode POST
		 * artinya harus diakses dengan methode POST
		 * getDefaultValues() = isi dari Register_model.php
		 */
		if (!$_POST) {
			$input	= (object) $this->register->getDefaultValues();
		} else {
			$input 	= (object) $this->input->post(null, true);
		}

		/**
		 * Jika validasi gagal / tidak ada proses validasi maka akan dikembalikan lagi ke page Register
		 */
		if (!$this->register->validate()) {
			$data['title']	= 'Register';
			$data['input']	= $input;
			$data['page']	= 'pages/auth/register'; // halaman yang akan dimuat
			$this->view($data);
			return; // jika sudah memuat view($data) maka prosesnya berhenti sampai sini
		}

		/**
		 * Jika validasi berhasil maka akan di redirect ke home
		 * Jika gagal akan muncul error
		 */
		if ($this->register->run($input)) {
			$this->session->set_flashdata('success', 'Berhasil melakukan registrasi!');
			redirect(base_url());
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
			redirect(base_url('/register'));
		}
	}
}

/* End of file Register.php */
