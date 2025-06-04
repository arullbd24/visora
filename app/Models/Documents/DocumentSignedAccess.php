<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSignedAccess extends Model
{
    use HasFactory;
    protected $table = 'document_signed_access';
    protected $primaryKey = 'id_document_signed_access';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_signed_access', 'id_document', 'is_shared', 'access_role'
    ];
}
