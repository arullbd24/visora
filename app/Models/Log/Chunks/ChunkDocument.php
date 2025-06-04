<?php

namespace App\Models\Log\Chunks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChunkDocument extends Model
{
    use HasFactory;
    protected $table = 'chunk_document';

    public $incrementing = false; // Karena menggunakan UUID
    public $timestamps = false;
    protected $fillable = [
        'id_chunk_document', 'file_client_name', 'file_hash_name', 'file_type', 'chunk_data', 'status', 'error_reason', 'id_chunk'
    ];
    
    protected function casts(): array
    {
        return [
            'id_chunk_document' => 'string',
            'id_chunk' => 'string',
        ];
    }
}
