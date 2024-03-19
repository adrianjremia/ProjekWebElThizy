<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function showLogin()
    {
        return view('login');
    }

    public function index()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[32]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AuthModel();
                $email = $this->request->getVar('email');
                $pass = $this->request->getVar('password');

                $user = $model->where('email', $this->request->getPost('email'))->first();
                $this->setUserSession($user);

                if (!empty($this->request->getVar('save_id'))) {
                    setcookie("loginId", $email, time() + (10 * 365 * 24 * 60 * 60));
                    setcookie("loginPass", $pass, time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    setcookie("loginId", "");
                    setcookie("loginPass", "");
                }

                if ($user['level'] == 1) {
                    return redirect()->to('home');
                } elseif ($user['level'] == 2) {
                    return redirect()->to('admin');
                }
            }
        }
        return view('login', $data);
    }

    public function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            'level' => $user['level'],
        ];
        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required',
                'address' => 'required',
                'phone_number' => 'required|min_length[8]|max_length[15]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[auth.email]',
                'password' => 'required|min_length[8]|max_length[50]',
                'password_confirm' => 'matches[password]',
                'level' => 'required|in_list[1,2]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AuthModel();
                $data = [
                    'name' => $this->request->getVar('name'),
                    'address' => $this->request->getVar('address'),
                    'phone_number' => $this->request->getVar('phone_number'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'level' => $this->request->getVar('level'),
                ];
                $model->save($data);
                session()->setFlashdata('success', 'Register Success');
                return redirect()->to('/login');
            }
        }
        return view('register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}