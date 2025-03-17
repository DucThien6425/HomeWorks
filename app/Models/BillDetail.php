<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_detail'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính

    protected $fillable = [
        'id_bill',
        'id_product',
        'quantity',
        'unit_price',
        'created_at',
        'updated_at',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'id_bill');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
