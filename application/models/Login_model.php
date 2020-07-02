<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends MY_Model
{

	protected $table = 'user'; // jika nama class model sama dengan nama table database ini tidak perlu ditulis

	public function getDefaultValues()
	{
		/**
		 * Data Array
		 */
		return [
			'email'		=> '',
			'password'	=> '',
		];
	}

	/**
	 * validasi rules = aturan dalam input/memasukan data
	 */
	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'email',
				'label'	=> 'E-Mail',
				'rules'	=> 'trim|required|valid_email' // trim = menghapus sebelum dan sesudah spasi dari inputan
			],
			[
				'field'	=> 'password',
				'label'	=> 'Password',
				'rules'	=> 'required'
			]
		];

		return $validationRules;
	}

	public function run($input)
	{
		$query	= $this->where('email', strtolower($input->email))
			->where('is_active', 1) // jika status akun nya non aktif = 0 maka akan gagal
			->first();

		/**
		 * Jika variable $query tidak kosong && dan apakah input password input login ini sama dengan field password dari hasil $query di atas
		 * jika benar maka $sess_data akan jalan
		 */
		if (!empty($query) && hashEncryptVerify($input->password, $query->password)) {
			$sess_data = [
				'id'		=> $query->id,
				'name'		=> $query->name,
				'email'		=> $query->email,
				'role'		=> $query->role,
				'is_login'	=> true,
			];
			$this->session->set_userdata($sess_data);
			return true; // proses berhasil
		}

		return false; // proses gagal
	}
}

/* End of file Login_model.php */
