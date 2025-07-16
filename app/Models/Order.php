<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pemesan',
        'email',
        'whatsapp',
        'service_name',
        'tanggal_acara',
        'catatan',
        'status',
        'harga_final'
    ];



    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
