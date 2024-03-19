<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\PaymentModel;

class Payment extends BaseController
{
    public function index()
    {
        $session = session();
        $customerId = $session->get('id');
        $orderModel = new OrderModel();
        $totalAmount = $orderModel->getTotalAmountByCustomerId($customerId);

        return view('payment', ['totalAmount' => $totalAmount]);
    }

    public function recordPayment()
    {
        $paymentModel = new PaymentModel();
        $session = session();

        $customerId = $session->get('id');

        $paymentMethod = $this->request->getVar('payment_method');
        $paymentStatus = $this->request->getVar('payment_status');

        $orderModel = new OrderModel();
        $totalAmount = $orderModel->getTotalAmountByCustomerId($customerId);

        $data = [
            'id'              => $customerId,
            'payment_method'  => $paymentMethod,
            'payment_status'  => $paymentStatus,
            'payment_date'    => date('Y-m-d'),
            'payment_total'   => $totalAmount
        ];

        $paymentModel->recordPayment($data);

        return view('payment_confirmation');
    }

    public function paymentTransaction()
    {
        $paymentModel = new PaymentModel();
        $payments = $paymentModel->getPayments();

        return view('/transaction', ['payments' => $payments]);
    }
    public function updateStatus()
    {
        $paymentModel = new PaymentModel();
        $orderModel = new OrderModel();
        $session = session();
        $paymentId = $this->request->getVar('payment_id');
        $newStatus = $this->request->getVar('new_status');


        $paymentModel->update($paymentId, ['payment_status' => $newStatus]);

        if (in_array($newStatus, ['completed', 'cancelled'])) {

            $customerId = $session->get('id');

            $orderModel->where('id', $customerId)->delete();
        }

        return redirect()->to('/admin/transaction');
    }
}
