<?php

namespace App\Models\Initial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class initialDisk extends Model
{
    use HasFactory;
    protected $table = 'initial_disk';
    protected $primaryKey = 'id_initial_disk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_initial_disk', 'id_initial', 'disk', 'path', 'file_name',
    ];

    public function initial_disk() {
        return $this->belongsTo(\App\Models\Initial\initial::class, 'id_initial', 'id_initial');
    }
}
