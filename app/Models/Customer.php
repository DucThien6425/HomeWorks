<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính

    protected $fillable = [
        'name',
        'gender',
        'email',
        'address',
        'phone_number',
        'note',
        'created_at',
        'updated_at',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class, 'id_customer');
    }
}
