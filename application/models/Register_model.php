<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends MY_Model
{

	protected $table = 'user'; // jika nama class model sama dengan nama table database ini tidak perlu ditulis

	/**
	 * Saat membukan form registrasi maka akan terisi value default = kosong
	 */
	public function getDefaultValues()
	{
		// Data Array
		return [
			'name'		=> '',
			'email'		=> '',
			'password'	=> '',
			'role'		=> '',
			'is_active'	=> ''
		];
	}

	public function getValidationRules()
	{
		/**
		 * Untuk validasi inputan
		 */
		$validationRules = [
			[
				'field' => 'name',
				'label'	=> 'Nama',
				'rules'	=> 'trim|required',
			],
			[
				'field' 	=> 'email',
				'label'		=> 'E-Mail',
				'rules'		=> 'trim|required|valid_email|is_unique[user.email]',
				// error ini data Array
				'errors'	=> ['is_unique' => 'This %s already e']
			],
			[
				'field' => 'password',
				'label'	=> 'Password',
				'rules'	=> 'required|min_length[8]',
			],
			[
				'field' => 'password_confirmation',
				'label'	=> 'Konfirmasi Password',
				'rules'	=> 'required|matches[password]',
			],
		];

		return $validationRules; // Nilai balik
	}

	/**
	 * Ketika register pertama kali maka akan jadi member, karena default valuenya adalah 1 => role = member
	 */
	public function run($input)
	{
		$data		= [
			'name'		=> $input->name,
			'email'		=> strtolower($input->email), //string to lower = huruf kecil
			'password'	=> hashEncrypt($input->password),
			'role'		=> 'member' // default jadi 'member'
		];

		/**
		 * Insert data ke database
		 * CREATE adalah nama model dari MY_model.php
		 */
		$user		= $this->create($data);

		$sess_data	= [
			'id'		=> $user,
			'name'		=> $data['name'],
			'email'		=> $data['email'],
			'role'		=> $data['role'],
			'is_login'	=> true
		];

		$this->session->set_userdata($sess_data); // memasukan data ke dalam session
		return true;
	}
}

/* End of file Register_model.php */
