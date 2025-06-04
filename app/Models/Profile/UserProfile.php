<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;


class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';
    protected $primaryKey = 'id_user_profile';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_user_profile',
        'id_user',
        'profile_name',
        'company',
        'employment',
        'status',
        'locked',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
