<?php

namespace App\Models\Signature;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureDisk extends Model
{
    use HasFactory;
    protected $table = 'signature_disk';
    protected $primaryKey = 'id_signature_disk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_signature_disk', 'id_signature', 'disk', 'path', 'file_name',
    ];

    public function signature_disk() {
        return $this->belongsTo(\App\Models\Signature\Signature::class, 'id_signature', 'id_signature');
    }
}
