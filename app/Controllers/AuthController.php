<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function storeRegister()
    {
        $rules = [
            'full_name'     => 'required|min_length[3]|max_length[100]',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/]',
            'password_conf' => 'matches[password]',
            'user_type'     => 'required|in_list[customer,runner]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        
        $userModel->save([
            'full_name'     => $this->request->getPost('full_name'),
            'email'         => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'user_type'     => $this->request->getPost('user_type'),
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Set session variables upon successful authentication
            session()->set([
                'user_id'   => $user['user_id'],
                'full_name' => $user['full_name'],
                'email'     => $user['email'],
                'user_type' => $user['user_type'],
                'isLoggedIn'=> true,
            ]);

            // Redirect based on user role to satisfy project requirements
            if ($user['user_type'] === 'admin') return redirect()->to('/admin/dashboard');
            if ($user['user_type'] === 'runner') return redirect()->to('/runner/dashboard');
            return redirect()->to('/customer/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email or password combination.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}