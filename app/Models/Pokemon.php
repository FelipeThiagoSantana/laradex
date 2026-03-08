<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
      'name',
      'height',
      'weight',
      'sprite',
      'types',
    ];
    //
    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
