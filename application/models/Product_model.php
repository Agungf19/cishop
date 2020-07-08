<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends MY_Model
{

	// protected $perPage = 5; // tidak perlu di tulis karena nama class = nama table

	/**
	 * Secara default fiel pada form inputan adalah kosong
	 */
	public function getDefaultValues()
	{
		return [
			'id_category'  => '',
			'merk'         => '',
			'slug'         => '',
			'title'        => '',
			'description'  => '',
			'price'        => '',
			'is_available' => 1,    // status produk tersedia
			'image'        => ''
		];
	}

	/**
	 * Validasi rules pada Field inputan
	 */
	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'id_category',
				'label' => 'Kategori',
				'rules' => 'required'
			],
			[
				'field' => 'merk',
				'label' => 'Merk',
				'rules' => 'trim|required'
			],
			[
				'field' => 'slug',
				'label' => 'Slug',
				'rules' => 'trim|required|callback_unique_slug'
			],
			[
				'field' => 'title',
				'label' => 'Nama Produk',
				'rules' => 'trim|required'
			],
			[
				'field' => 'description',
				'label' => 'Deskripsi',
				'rules' => 'trim|required'
			],
			[
				'field' => 'price',
				'label' => 'Harga',
				'rules' => 'trim|required|numeric'
			],
			[
				'field' => 'is_available',
				'label' => 'Ketersediaan',
				'rules' => 'required'
			],
		];

		return $validationRules;
	}

	/**
	 * Fungsi upload gambar
	 */
	public function uploadImage($fieldName, $fileName)
	{
		$config	= [
			'upload_path'		=> './images/product', // letak upload folder
			'file_name'			=> $fileName,
			'allowed_types'		=> 'jpg|gif|png|jpeg|JPG|PNG', // jenis file
			'max_size'			=> 1024, // ukuran max = 1MB
			'max_width'			=> 0,
			'max_height'		=> 0,
			'overwrite'			=> true,
			'file_ext_tolower'	=> true
		];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload($fieldName)) {
			return $this->upload->data();
		} else {
			$this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
			return false;
		}
	}

	/**
	 * Fungsi delete gambar
	 */
	public function deleteImage($fileName)
	{
		if (file_exists("./images/product/$fileName")) {
			unlink("./images/product/$fileName"); // unlink = untuk hapus gambar pada folder, agar tidak menumpuk
		}
	}
}

/* End of file Product_model.php */
