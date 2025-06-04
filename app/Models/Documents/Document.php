<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $primaryKey = 'id_document';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document', 
        'id_user', 
        // 'title_document', 
        'signature_type', 
        'document_status', 
        'status_at'
    ];
    
    public function user() {
        return $this->belongsTo(\App\Models\User\User::class, 'id_user', 'id_user');
    }
    
    public function documentVersions() {
        return $this->hasMany(\App\Models\Documents\DocumentVersions::class, 'id_document')->orderBy('version', 'desc');
        // return $this->belongsTo(\App\Models\Documents\DocumentDisk::class, 'id_document', 'id_document')->orderBy('updated_at', 'desc');
    }
    
    // public function documentDisks() {
    //     return $this->hasMany(\App\Models\Documents\DocumentDisk::class, 'id_document')->orderBy('version', 'desc');
    //     // return $this->belongsTo(\App\Models\Documents\DocumentDisk::class, 'id_document', 'id_document')->orderBy('updated_at', 'desc');
    // }
}
