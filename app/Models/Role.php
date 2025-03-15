<?php

namespace App\Models;

use App\Models\Scopes\BusinessScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;


#[ScopedBy([BusinessScope::class])]
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
