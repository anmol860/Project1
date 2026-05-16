<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function media(){
        return $this->hasMany(Media::class);
    }
}
