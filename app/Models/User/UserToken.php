<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    use HasFactory;
    protected $table = 'user_token'; // Nama tabel

    protected $primaryKey = 'id_user_token'; // Primary key
    protected $guard = 'web';
    protected $hidden = [
        'id_user_token',
        'id_user',
        'token',
    ];

    protected $fillable = [
        'id_user_token',
        'id_user',
        'token',
        'type_token',
        'expired_at',
    ];
}
