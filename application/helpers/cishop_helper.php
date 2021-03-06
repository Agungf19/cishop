<?php

function getDropdownList($table, $columns)
{
	$CI		= &get_instance();
	$query	= $CI->db->select($columns)->from($table)->get();

	if ($query->num_rows() >= 1) {
		$option1	= ['' => '- Select -'];
		$option2	= array_column($query->result_array(), $columns[1], $columns[0]);
		$options	= $option1 + $option2;

		return $options;
	}

	return $options	= ['' => '- Select -'];
}

function getCategories()
{
	$CI = &get_instance();
	$query = $CI->db->query('SELECT a.*,(SELECT COUNT(*) FROM product WHERE id_category = a.id) jumlah FROM category a')->result();
	return $query;
}

function getProduct()
{
	$CI = &get_instance();
	$query = $CI->db->query('SELECT a.*,(SELECT COUNT(*) FROM product WHERE id_category = a.id) jumlah FROM product a')->result();
	return $query;
}

function getCart()
{
	$CI		= &get_instance();
	$userId	= $CI->session->userdata('id');

	if ($userId) {
		// $query	= $CI->db->where('id_user', $userId)->count_all_results('cart'); =>> untuk menghitung by rows
		$query	= $CI->db->select_sum('qty')->where('id_user', $userId)->get('cart')->row(); // untuk menghitung berdasarkan jumlah qty orders
		return $query->qty;
	}

	return false;
}

function hashEncrypt($input)
{
	$hash	= password_hash($input, PASSWORD_DEFAULT);
	return $hash;
}

function hashEncryptVerify($input, $hash)
{
	if (password_verify($input, $hash)) {
		return true;
	} else {
		return false;
	}
}
