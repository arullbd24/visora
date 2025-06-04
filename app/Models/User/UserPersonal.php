<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPersonal extends Model
{
    use HasFactory;
    protected $table = 'user_personal'; // Nama tabel

    protected $primaryKey = 'id_user'; // Primary key
    protected $guard = 'web';
    protected $hidden = [
        'id_user',
    ];

    protected $fillable = [
        'id_user',
        'fullname',
        'phone_number',
        'confirm_no_hp',
    ];
    protected function casts(): array
    {
        return [
            'id_user' => 'string',
        ];
    }

    // Relasi terbalik ke DbUser
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
