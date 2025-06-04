<?php

namespace App\Models\Initial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class initial extends Model
{
    use HasFactory;

    protected $table = 'initial';
    protected $primaryKey = 'id_initial';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_initial', 'id_user', 'title_initial', 'file_name_initial', 'unique_key', 'default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function initial_disk() {
        return $this->belongsTo(\App\Models\Initial\initialDisk::class, 'id_initial', 'id_initial');
    }
}
