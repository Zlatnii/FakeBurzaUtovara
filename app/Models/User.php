<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Package;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = true;
    protected $table = 'users';
    
    protected $dates =['last_login'];

    protected $fillable = [
        'name',
        'surname',
        'oib',
        'email',
        'password',
        'role_id',
        'package_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $date = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'last_login',
        'sent',
        'collected_from_the_sender',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function packages()
    {
        return $this->belongsTo(Package::class);
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
