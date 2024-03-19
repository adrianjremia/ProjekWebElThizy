<?php

namespace App\Controllers;

use \App\Models\MenuModel;
use \App\Models\AuthModel;
use \App\Models\OrderModel;

class Customer extends BaseController
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function menu()
    {
        $menuModel = new MenuModel();

        $data['menuItems'] = $menuModel->getMenuItems();

        return view('menu', $data);
    }

    public function processOrder()
    {
        return view('process_order');
    }

    public function order()
    {
        $session = \Config\Services::session();
        $customerId = $session->get('id');

        $totalItems = $this->request->getPost('total_items');
        $orderModel = new OrderModel();
        $menuModel = new MenuModel();

        date_default_timezone_set('Asia/Jakarta');

        $orderDetails = [];

        $orderModel->transStart();

        try {
            for ($i = 0; $i < $totalItems; $i++) {
                $itemName = $this->request->getPost("item_$i");
                $quantity = $this->request->getPost("quantity_" . ($i + 1));

                $menuId = $menuModel->getMenuIdByName($itemName);
                if ($quantity > 0) {
                    $orderModel->insertOrder($customerId, $menuId, $quantity);

                    $orderId = $orderModel->insertID();

                    $orderDetails[] = [
                        'order_id' => $orderId,
                        'makanan_id' => $menuId,
                        'order_date' => date('Y-m-d H:i:s'),
                        'order_quantity' => $quantity,
                    ];
                }
            }
            $orderModel->transCommit();
        } catch (\Exception $e) {
            $orderModel->transRollback();
            log_message('error', 'Error during order processing: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error during order processing. Please try again.');
        }
        return view('process_order', ['orderDetails' => $orderDetails]);
    }

    public function history()
    {
        $orderModel = new OrderModel();
        $data['orderDetails'] = $orderModel->getAllOrders();

        return view('history', $data);
    }

    public function profile()
    {
        $session = \Config\Services::session();
        $id = $session->get('id');

        $authModel = new AuthModel();
        $customer = $authModel->where('id', $id)->first();

        return view('customer_profile', ['customer' => $customer]);
    }

    public function editProfile($customerEmail)
    {
        $customerModel = new AuthModel();
        $customer = $customerModel->find($customerEmail);

        if ($customer) {
            return view('edit_profile', ['customer' => $customer]);
        } else {
            return redirect()->to('/customer_profile')->with('error', 'Customer not found');
        }
    }

    public function updateProfile($customerId)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'phone_number' => $this->request->getPost('phone_number'),
            'email' => $this->request->getPost('email'),
        ];

        $customerModel = new AuthModel();
        $customerModel->update($customerId, $data);

        return redirect()->to('/customer_profile')->with('success', 'Customer updated successfully');
    }
}
