<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{

	protected $perPage = 5; // 1 halaman menampung 5 data

	public function getDefaultValues()
	{
		return [
			'id' 	=> '',
			'slug'	=> '',
			'title' => ''
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'slug',
				'label'	=> 'Slug',
				'rules' => 'trim|required|callback_unique_slug'
			],
			[
				'field'	=> 'title',
				'label'	=> 'Kategori',
				'rules' => 'trim|required|callback_unique_category'
			],
		];

		return $validationRules;
	}
}

/* End of file Category_model.php */
