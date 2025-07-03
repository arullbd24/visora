<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        // tambahkan field lain jika ada
    ];
    public function tags()
    {
        return $this->hasMany(ServiceTag::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
