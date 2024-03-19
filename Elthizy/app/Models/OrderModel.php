<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order_makanan';
    protected $primaryKey = 'order_id';

    protected $allowedFields = [
        'id', 'makanan_id', 'order_date', 'order_quantity'
    ];

    public function insertOrder($customerId, $menuId, $quantity)
    {
        $orderDate = date("Y-m-d");
    
        $data = [
            'id' => $customerId,
            'makanan_id' => $menuId,
            'order_date' => $orderDate,
            'order_quantity' => $quantity,
        ];
    
        $this->db->transStart();
        $this->insert($data);
        $this->db->transComplete();
        log_message('info', 'Last Query: ' . $this->db->getLastQuery());

        log_message('info', 'Inserting order data: ' . print_r($data, true));

        if ($this->db->transStatus() === false) {
            $dbError = $this->db->error();
            log_message('error', 'Failed to insert order: Code - ' . $dbError['code'] . ', Message - ' . $dbError['message']);
            return false;
        }
        log_message('info', 'Order inserted successfully.');
        return true;
    }     

    public function getTotalAmountByCustomerId($customerId)
    {
        $builder = $this->db->table($this->table);
        $builder->select('SUM(menu.Harga_makanan * order_makanan.order_quantity) AS total_amount');
        $builder->join('menu', 'order_makanan.makanan_id = menu.Makanan_id');
        $builder->where('order_makanan.id', $customerId);
        $query = $builder->get();

        return $query->getRow()->total_amount ?? 0;
    }

    public function getActiveOrderIdForCustomer($customerId)
    {
        // Implement logic to check for an active order for this customer
        // Example:
        $builder = $this->db->table($this->table);
        $builder->select('order_id');
        $builder->where('customer_id', $customerId);
        $builder->orderBy('order_date', 'DESC');
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            return $query->getRow()->order_id;
        }

        return null;
    }

    
    public function getAllOrders()
    {
        return $this->findAll();
    }
}