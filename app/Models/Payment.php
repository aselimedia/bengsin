<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['order_id', 'gross_amount', 'payment_type', 'transaction_time', 'bank', 'va_number', 'pdf_url', 'status_code'];
}
