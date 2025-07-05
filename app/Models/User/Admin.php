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

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';

    protected $primaryKey = 'id';
    protected $guarded = ['id'];
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
        'email',
        'name',
        'password',
        'remember_token',
    ];
}
