<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable = [
        'name',
        'business_id'
    ];

    // Define the relationship to permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
