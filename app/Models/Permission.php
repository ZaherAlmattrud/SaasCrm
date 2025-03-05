<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    
    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }
}
