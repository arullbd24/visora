<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    protected $table = 'log_user_activity';

    public $incrementing = false; // Karena menggunakan UUID
    public $timestamps = false;
    protected $fillable = [
        'id', 'id_user', 'activity_type','action', 'ip_address', 'user_agent', 'created_at',
    ];
    
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'id_user' => 'string',
            // 'activity_type' => 'object',
            // 'action' => 'object',
            // 'action' => 'array',
        ];
    }
}
