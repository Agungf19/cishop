<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$model = strtolower(get_class($this));
		if (file_exists(APPPATH . 'models/' . $model . '_model.php')) {
			$this->load->model($model . '_model', $model, true);
		}

		$this->load->model('cart_model', 'cart', true);
		$cart = $this->cart->select([
			'cart.id',
			'cart.qty',
			'cart.subtotal',
			'product.slug',
			'product.title AS product_title',
			'product.image',
			'product.price'
		])
			->join('product')
			->where('cart.id_user', $this->session->userdata('id'))
			->get();

		$this->session->set_userdata(['cart' => $cart]);
	}
	/**
	 * Load view with default layouts
	 *
	 * @param [type] $data
	 * @return void
	 */
	public function view($data)
	{
		$this->load->view('layouts/app', $data); //untuk me load app.php yg ada di view->layouts
	}
}

/* End of file MY_Controller.php */
