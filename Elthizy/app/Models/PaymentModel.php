<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'payment_id';
    protected $allowedFields = [
        'payment_id',
        'id', 
        'payment_method', 
        'payment_status', 
        'payment_date', 
        'payment_total'
    ];

    public function recordPayment($data)
    {
        return $this->insert($data);
    }

    public function getPayments()
    {
        return $this->findAll();
    }
}
