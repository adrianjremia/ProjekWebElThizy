<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('admin');
    }

    public function customerView()
    {
        $customerModel = new AuthModel();

        $customers = $customerModel->where('level', 1)->findAll();

        $data['customers'] = $customers;

        return view('customer_view', $data);
    }

    public function editCustomer($customerId)
    {
        $customerModel = new AuthModel();
        $customer = $customerModel->find($customerId);

        if ($customer) {
            return view('edit_customer', ['customer' => $customer]);
        } else {
            return redirect()->to('/admin/customer_view')->with('error', 'Customer not found');
        }
    }

    public function updateCustomer()
    {
        $customerId = $this->request->getPost('id');

        $data = [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'phone_number' => $this->request->getPost('phone_number'),
            'email' => $this->request->getPost('email'),
        ];

        $customerModel = new AuthModel();
        $customerModel->where('id', $customerId)->set($data)->update();

        return redirect()->to('/admin/customer_view')->with('success', 'Customer updated successfully');
    }

    public function deleteCustomer($customerId)
    {
        $customerModel = new AuthModel();
        $result = $customerModel->delete($customerId);

        if ($result) {
            return redirect()->to('/admin/customer_view')->with('success', 'Customer deleted successfully');
        } else {
            return redirect()->to('/admin/customer_view')->with('error', 'Failed to delete customer');
        }
    }
}
