<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileDiskEntity extends Model
{
    // if (!Schema::hasTable('file_disk_entity')) {
    //     Schema::create('file_disk_entity', function (Blueprint $table) {
    //         $table->uuid('id_file_disk_entity')->primary();
    //         $table->uuid('id_file_disk');
    //         $table->string('entity_type'); // Jenis entitas (misalnya: 'document', 'user', 'project', dsb)
    //         $table->uuid('id_entity'); // ID dari entitas yang terkait (misalnya, ID dokumen, ID user)
    //         $table->timestamps();
            
    //         $table->index('entity_type');
    //         $table->index('id_entity');
    //         $table->index('id_file_disk');
    //     });
        
    //     Schema::table('file_disk_entity', function (Blueprint $table) {
    //         $table->foreign('id_file_disk')->references('id_file_disk')->on('file_disk')->onDelete('cascade');
    //     });
    // }
    use HasFactory;
    protected $table = 'file_disk_entity';
    protected $primaryKey = 'id_file_disk_entity';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $guarded = ['id_file_disk_entity'];
    protected $guard = 'web';
    protected $fillable = [
        'id_file_disk_entity',
        'id_file_disk',
        'id_user',
        'entity_type',
        'id_entity',
        'file_client_name',
    ];
    
    protected function casts(): array
    {
        return [
            'id_file_disk_entity' => 'string',
            'id_file_disk' => 'string',
            'id_entity' => 'string',
            'id_user' => 'string',
        ];
    }
    
    public function user() {
        return $this->BelongsTo(\App\Models\User\User::class, 'id_user', 'id_user');
    }
}
