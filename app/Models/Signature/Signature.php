<?php

namespace App\Models\Signature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Signature extends Model
{
    use HasFactory;

    protected $table = 'signature';
    protected $primaryKey = 'id_signature';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_signature', 'id_user', 'title_signature', 'unique_key', 'default',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function signature_disk() {
        return $this->belongsTo(\App\Models\Signature\SignatureDisk::class, 'id_signature', 'id_signature');
    }
}
