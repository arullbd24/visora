<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;
    protected $table = 'log_user';

    protected $fillable = [
        'id', 'id_user', 'action', 'method', 'ip_address', 'user_agent'
    ];

    public $incrementing = false; // Karena menggunakan UUID
}
