<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_guru','username','password','role'];

    public function getByUsername($username)
    {
        return $this->select('user.*,guru.nama_guru as nama_guru')
                    ->join('guru','guru.id = user.id_guru', 'left')
                    ->where('username',$username)
                    ->first();
    }

    public function getAllUsers()
    {
        return $this->select('user.*,guru.nama_guru as nama_guru')
                    ->join('guru','guru.id = user.id_guru', 'left')
                    ->findAll();
    }

    public function getUsersWithGuru()
    {
        return $this->with('guru')->findAll();
    }

}
