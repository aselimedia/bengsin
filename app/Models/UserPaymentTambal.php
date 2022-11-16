<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPaymentTambal extends Model
{
    protected $table = 'tambalorder';
    protected $primaryKey = 'id_tambalorder';
    protected $createdField = 'tgl';
    protected $allowedFields = ['id_mitra', 'id', 'jenis', 'tambalban', 'tgl', 'order_id'];

    public function historySelect($id)
    {
        return $this
            ->join('payment', 'tambalorder.order_id = payment.order_id')
            ->join('users', 'tambalorder.id = users.id')
            ->join('mitra', 'tambalorder.id_mitra = mitra.id_mitra')
            ->where(['users.id' => $id])
            ->orderBy('payment.transaction_time', 'DESC')
            ->get()->getResultArray();
    }

    public function getDetailHistory($order_id)
    {
        return $this
            ->join('payment', 'tambalorder.order_id = payment.order_id')
            ->join('mitra', 'tambalorder.id_mitra = mitra.id_mitra')
            ->where(['payment.order_id' => $order_id])
            ->get()->getResultArray();
    }

    public function getIdHistory($order_id = false)
    {
        if ($order_id == false) {
            return $this->findAll();
        }
        return $this->where(['order_id' => $order_id])->first();
    }

    public function historySelectMitra($id)
    {
        return $this
            ->join('payment', 'tambalorder.order_id = payment.order_id')
            ->join('users', 'tambalorder.id = users.id')
            ->join('mitra', 'tambalorder.id_mitra = mitra.id_mitra')
            ->where(['mitra.id_mitra' => $id])
            ->orderBy('payment.transaction_time', 'DESC')
            ->get()->getResultArray();
    }

    public function getDetailHistoryMitra($order_id)
    {
        return $this
            ->join('payment', 'tambalorder.order_id = payment.order_id')
            ->join('mitra', 'tambalorder.id_mitra = mitra.id_mitra')
            ->where(['payment.order_id' => $order_id])
            ->get()->getResultArray();
    }

    public function getIdHistoryMitra($order_id = false)
    {
        if ($order_id == false) {
            return $this->findAll();
        }
        return $this->where(['order_id' => $order_id])->first();
    }
}
