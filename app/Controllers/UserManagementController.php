<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\GuruModel;
use CodeIgniter\Controller;

class UserManagementController extends Controller
{
    protected $authModel;
    protected $guruModel;
    protected $session;

    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->guruModel = new GuruModel();
        $this->session = session();
    }

    public function index()
    {
        $users = $this->authModel->getAllUsers();
        return view('admin/data_user/index', ['users' => $users]);
    }

    public function create()
    {
        $gurus = $this->guruModel->findAll();
        return view('admin/data_user/add', ['gurus' => $gurus]);
    }

    public function store()
    {
        $this->authModel->insert([
            'id_guru'  => $this->request->getPost('id_guru'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), // Password disimpan tanpa hash
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/admin/datauser')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user  = $this->authModel->find($id);
        $gurus = $this->guruModel->findAll();
        return view('admin/data_user/edit', ['user' => $user, 'gurus' => $gurus ]);
    }

    public function update($id)
    {
        $this->authModel->update($id, [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), // Password tetap disimpan tanpa hash
        ]);

        return redirect()->to('/admin/datauser')->with('success', 'User berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->authModel->delete($id);
        return redirect()->to('/admin/datauser')->with('success', 'User berhasil dihapus.');
    }
}
