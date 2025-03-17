<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'type_products'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public $timestamps = true; // Sử dụng created_at và updated_at
}

