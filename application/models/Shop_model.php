<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Shop_model extends MY_Model
{
    /**
     * Karena nama class tidak sama dengan nama table database
     */
    protected $table   = 'product';
    protected $perPage = 12; // Jumlah produk yang ditampilkan tiap halamanya
}

/* End of file Shop_model.php */
