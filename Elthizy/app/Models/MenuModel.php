<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'Makanan_id';

    protected $allowedFields = ['Makanan_id', 'Nama_makanan', 'Deskripsi_makanan', 'Harga_makanan'];

    public function getMenuItems()
    {                   
        return $this->findAll();
    }

    public function getMenuIdByName($itemName)
    {
        $menu = $this->where('Nama_makanan', $itemName)->first();
        return $menu ? $menu['Makanan_id'] : null;
        log_message('info', 'Menu ID for ' . $itemName . ': ' . $menuId);

    }
}