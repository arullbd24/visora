<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDisk extends Model
{
    use HasFactory;
    protected $table = 'document_disk';
    protected $primaryKey = 'id_document_disk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_disk',
        'id_document', 
        'disk', 
        'path', 
        'file_name', 
        'client_name', 
        'extension', 
        'version'
    ];
    
    public function document() {
        return $this->belongsTo(\App\Models\Documents\Document::class, 'id_document');
    }
}
