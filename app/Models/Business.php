<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //

    protected $fillable = [
        'name',
        'industry',
        'plan_id',
        'expire_at'
    ];

    protected function casts(): array
    {
        return [
            'expire_at' => 'datetime:Y-m-d',
        ];
    }

      // Define the relationship to users
      public function users()
      {
          return $this->belongsToMany(User::class);
      }
    
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
