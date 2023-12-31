<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'package';


    protected $fillable = [
        'name',
        'description',
        'memo',
        'price',
        'weight',
    ];

    public function users()
    {
        $this->hasMany(User::class);
    }
}
