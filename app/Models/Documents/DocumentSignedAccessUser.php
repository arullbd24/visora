<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSignedAccessUser extends Model
{
    use HasFactory;
    protected $table = 'document_signed_access_user';
    protected $primaryKey = 'id_document_signed_access_user';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_signed_access_user', 'id_document', 'user_access', 'access_role'
    ];
}
