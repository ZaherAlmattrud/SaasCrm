<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\BusinessScope;



#[ScopedBy([BusinessScope::class])]
class Invitation extends Model
{
    //

    protected $guarded = ['id'];
}
