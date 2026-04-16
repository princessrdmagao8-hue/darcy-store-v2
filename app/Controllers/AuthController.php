<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $session = session();
        
        // UPGRADE: If the user is already logged in, send them straight to the dashboard
        if ($session->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        helper(['form']);
        return view('auth/login');
    }

    public function register()
    {
        helper(['form']);
        return view('auth/register');
    }

    public function store()
    {
        helper(['form']);
        $rules =[
            'name'            => 'required|min_length[3]|max_length[50]',
            'email'           => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'        => 'required|min_length[6]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data =[
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            
            $session = session();
            $session->setFlashdata('success', 'Account created successfully. Please login.');
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id'         => $data['id'],
                    'name'       => $data['name'],
                    'email'      => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Incorrect Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('/login');
        }
    }

    public function dashboard()
    {
        $session = session();

        // MANUAL SECURITY CHECK
        // If they are NOT logged in, redirect them back to the login page with a message
        if (!$session->get('isLoggedIn')) {
            $session->setFlashdata('msg', 'Please log in to access the Darcy Store dashboard.');
            return redirect()->to('/login');
        }

        // If they are logged in, show the admin dashboard
        return view('auth/dashboard');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}