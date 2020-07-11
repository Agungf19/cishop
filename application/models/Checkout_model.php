<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends MY_Model
{
	/**
	 * Deklarasi "orders" karean berbeda dengan nama class
	 * table "Checkou" di database tidak ada
	 */
	public $table = 'orders';

	public function getDefaultValues()
	{
		return [
			// 'id_user' => '', tidak ditulis karena id_user didapat dari id_session
			// 'invoice' => '', tidak ditulis karena invoice di generate
			'name'    => '',
			'address' => '',
			'phone'   => '',
			'catatan'  => '',
			'status'  => ''
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'name',
				'label'	=> 'Nama',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'address',
				'label'	=> 'Alamat',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'phone',
				'label'	=> 'Telepon',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'catatan',
				'label'	=> 'Catatan',
				'rules'	=> 'trim|required'
			]
		];

		return $validationRules;
	}
}

/* End of file Checkout_model.php */
