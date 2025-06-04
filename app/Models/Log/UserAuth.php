<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    use HasFactory;
    protected $table = 'log_user_auth';

    protected $fillable = [
        'id_user', 'action', 'ip_address', 'user_agent'
    ];
}
