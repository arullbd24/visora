<?php

namespace App\Models\User;

use App\Models\Documents\Document;
use App\Models\Initial\initial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Signature\Signature;
use App\Models\User\UserPersonal;
use App\Models\Profile\UserProfile;
use App\Models\Files\FileDiskEntity;
use Illuminate\Support\Str;
// use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'user';

    protected $primaryKey = 'id_user';
    protected $keyType = 'uuid';
    public $incrementing = false;
    protected $guarded = ['user_id'];
    protected $guard = 'web';
    protected $hidden = [
        'password',
    ];
    
    // protected static function boot() {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $model->id = (string) Str::uuid();
    //     });
    // }

    protected $fillable = [
        'id_user',
        'email',
        'username',
        'password',
        'confirm_account',
    ];
    protected function casts(): array
    {
        return [
            'id_user' => 'string',
            // 'password' => 'hashed',
        ];
    }

    // Relasi satu ke satu dengan DbPersonalUser
    public function userPersonal()
    {
        return $this->hasOne(UserPersonal::class, 'id_user', 'id_user');
        // return $this->belongsTo(UserPersonal::class, 'id_user', 'id_user');
    }
    
    public function fileDisks()
    {
        return $this->hasMany(FileDiskEntity::class, 'id_user', 'id_user');
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class, 'id_user', 'id_user');
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class, 'id_user', 'id_user');
    }

    public function initials()
    {
        return $this->hasMany(initial::class, 'id_user', 'id_user');
    }

    public function userProfile()
    {
        return $this->hasMany(UserProfile::class, 'id_user', 'id_user');
    }
    
    // public function getFirstName()
    // {
    //     $personalUserData = $this->personalUser()->first();

    //     if ($personalUserData && isset($personalUserData->fullname)) {
    //         $fullName = $personalUserData->fullname;
    //         $firstName = explode(' ', trim($fullName))[0];

    //         return $firstName;
    //     }
        
    //     return null;
    // }
    public function firstname() {
        $personalUserData = $this->userPersonal()->first();
        return explode(' ', trim($personalUserData->fullname))[0];
    }
}
