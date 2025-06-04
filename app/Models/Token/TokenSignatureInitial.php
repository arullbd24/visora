<?php

namespace App\Models\Token;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenSignatureInitial extends Model
{
    use HasFactory;
    protected $table = 'token_signature_initial';
    protected $primaryKey = 'id_token_signature_initial';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $guarded = ['id_token_signature_initial'];
    protected $guard = 'web';
    protected $fillable = [
        'id_token_signature_initial',
        'id_document',
        'id_user',
        'token',
        'type_sign',
        'is_used',
        'expired_at',
    ];
    
    protected function casts(): array
    {
        return [
            'id_token_signature_initial' => 'string',
            'id_document' => 'string',
            'id_user' => 'string',
        ];
    }
}
