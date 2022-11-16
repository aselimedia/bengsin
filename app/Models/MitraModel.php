<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    protected $allowedFields = ['slug', 'nama', 'email', 'password', 'nama_toko', 'alamat', 'kota', 'daerah', 'no_hp', 'jenis', 'gambar'];

    public function getBensin($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function detailBensin($slug = false)
    {
        return $this->db->table('mitra')
        ->join('bensin', 'mitra.id_mitra = bensin.id_mitra')
        ->where(['mitra.slug' => $slug])
            ->get()->getResultArray();
    }

    public function getTambal($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function detailTambal($slug = false)
    {
        return $this->db->table('mitra')
            ->join('tambal', 'mitra.id_mitra = tambal.id_mitra')
            ->where(['mitra.slug' => $slug])
            ->get()->getResultArray();
    }

    public function jenisUsaha($jenis)
    {
        return $this->db->table('mitra')->where(['jenis' => $jenis])->get()->getResultArray();
    }

    public function filterDaerah($daerah, $jenis)
    {
        return $this->db->table('mitra')->where(['daerah' => $daerah, 'jenis' => $jenis])->get()->getResultArray();
    }
}
