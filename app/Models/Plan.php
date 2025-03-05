<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $guarded = ['id'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
