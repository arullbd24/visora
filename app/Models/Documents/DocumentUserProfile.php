<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUserProfile extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'document_user_profile';
    protected $primaryKey = 'id_document_user_profile';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_user_profile', 'id_document', 'id_user_profile'
    ];
}
