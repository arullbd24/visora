<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSigned extends Model
{
    use HasFactory;
    protected $table = 'document_signed';
    protected $primaryKey = 'id_document_signed';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_signed', 'id_document', 'signed_by', 'signed_data', 'signed_at', 'status', 'status_at', 'reason_rejected'
    ];
}
