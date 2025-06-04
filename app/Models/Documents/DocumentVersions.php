<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentVersions extends Model
{
    use HasFactory;
    // Schema::create('document_versions', function (Blueprint $table) {
    //     $table->uuid('id_document_versions')->primary();
    //     $table->uuid('id_document');
    //     $table->uuid('id_file_disk');
    //     $table->bigInteger('version')->default(1);
    //     $table->json('changes')->nullable();
    //     $table->timestamps();
    // });
    protected $table = 'document_versions';
    protected $primaryKey = 'id_document_versions';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_document_versions', 
        'id_document',
        // 'id_file_disk', 
        'id_file_disk_entity', 
        'version', 
        'changes', 
    ];
    public function document() {
        return $this->belongsTo(\App\Models\Documents\Document::class, 'id_document', 'id_document');
    }
    
    // public function fileDisk() {
    //     return $this->belongsTo(\App\Models\Files\FileDisk::class, 'id_file_disk', 'id_file_disk');
    // }
    
    public function fileDiskEntity() {
        return $this->belongsTo(\App\Models\Files\FileDiskEntity::class, 'id_file_disk_entity', 'id_file_disk_entity');
    }
}
