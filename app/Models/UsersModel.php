<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'image', 'password', 'vkey', 'is_active', 'created_date'];

    public function verifyEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function verifyVkey($vkey)
    {
        return $this->where(['vkey' => $vkey])->first();
    }

    public function expired($email)
    {
        return $this->db->table('users')->delete(['email' => $email]);
    }

    public function setVkey($email)
    {
        return $this->db->table('users')->update(['is_active' => 1], ['email' => $email]);
    }

    public function forgot($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function getForget($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function updateForget($data)
    {
        return $this->db->table('users')->update($data);
    }
}
