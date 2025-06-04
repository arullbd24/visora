<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDiskKey extends Model
{
    use HasFactory;
    protected $table = 'file_disk_key';
    protected $primaryKey = 'id_file_disk_key';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $guarded = ['id_file_disk_key'];
    protected $guard = 'web';
    protected $fillable = [
        'id_file_disk_key',
        'key_file',
        'entity_type',
        'id_entity',
        'id_user',
    ];
    
    protected function casts(): array
    {
        return [
            'id_file_disk_key' => 'string',
            'id_entity' => 'string',
            'id_user' => 'string',
        ];
    }
}
