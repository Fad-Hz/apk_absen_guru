<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $auth_model;
    public function __construct()
    {
        $this->auth_model = new AuthModel();
    }
    public function index()
    {
        return view('login', ['title' => 'Login',]);
    }
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->auth_model->getByUsername($username);

        $data = [
            'id' => $user['id'],
            'id_guru' => $user['id_guru'],
            'username' => $user['username'],
            'nama_guru' => $user['nama_guru'],
            'role' => $user['role'],
            'logged_in' => true
        ];

        if($user && $password === $user['password']) {
            session()->set($data);
        }

        switch ($user['role']) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'guru':
                return redirect()->to('/home');
        }

        return redirect()->to('/')->with('error','err');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
