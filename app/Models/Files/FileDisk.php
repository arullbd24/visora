<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDisk extends Model
{
    use HasFactory;
    protected $table = 'file_disk';
    protected $primaryKey = 'id_file_disk';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $guarded = ['id_file_disk'];
    protected $guard = 'web';
    protected $fillable = [
        'id_file_disk',
        // 'key_file',
        'disk',
        'path',
        'file_name',
        'client_name',
        'extension',
        'mime_type',
    ];
    
    protected function casts(): array
    {
        return [
            'id_file_disk' => 'string',
        ];
    }
}
