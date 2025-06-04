<?php

namespace App\Models\Log\Chunks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chunk extends Model
{
    use HasFactory;
    protected $table = 'chunk';

    public $incrementing = false; // Karena menggunakan UUID
    public $timestamps = false;
    protected $fillable = [
        'id_chunk', 'chunk_table', 'chunk_id_table', 'ip_address', 'user_agent', 'id_user',
    ];
    
    protected function casts(): array
    {
        return [
            'id_chunk' => 'string',
            'chunk_id_table' => 'string',
            'id_user' => 'string',
        ];
    }
}
