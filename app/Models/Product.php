<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính

    protected $fillable = [
        'name',
        'id_type',
        'description',
        'unit_price',
        'promotion_price',
        'image',
        'unit',
        'new',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true; // Nếu bảng có created_at và updated_at

    // Định nghĩa mối quan hệ (ví dụ: Một sản phẩm thuộc về một loại)
    // public function type()
    // {
    //     return $this->belongsTo(ProductType::class, 'id_type');
    // }
}
