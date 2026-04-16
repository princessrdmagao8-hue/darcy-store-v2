<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    private function checkAuth()
    {
        // MANUAL SECURITY CHECK
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('msg', 'Please log in to access User Management.');
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();
        
        return view('users/index', $data);
    }

    public function create()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');
        
        helper(['form']);
        return view('users/create');
    }

    public function store()
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        helper(['form']);
        $rules =[
            'name'     => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[50]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $userModel->save([
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);
            return redirect()->to('/users')->with('success', 'User added successfully!');
        } else {
            $data['validation'] = $this->validator;
            return view('users/create', $data);
        }
    }

    public function edit($id = null)
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        
        return view('users/edit', $data);
    }

    public function update($id = null)
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        helper(['form']);
        $rules = [
            'name'  => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data =[
                'name'  => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
            ];

            // Only update password if they typed a new one
            if(!empty($this->request->getVar('password'))) {
                $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            }

            $userModel->update($id, $data);
            return redirect()->to('/users')->with('success', 'User updated successfully!');
        } else {
            $userModel = new UserModel();
            $data['user'] = $userModel->find($id);
            $data['validation'] = $this->validator;
            return view('users/edit', $data);
        }
    }

    public function delete($id = null)
    {
        if (!$this->checkAuth()) return redirect()->to('/login');

        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully!');
    }
}