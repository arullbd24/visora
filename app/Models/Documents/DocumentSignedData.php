<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSignedData extends Model
{
    use HasFactory;
    protected $table = 'document_signed_data';
    protected $primaryKey = 'id_document_signed_data';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_signed_data', 'id_document_signed', 'signer_ip', 'signer_user_agent', 'location'
    ];
}
