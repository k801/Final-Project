<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


function reciepes()
{

    return $this->hasMany(Reciepe::class);
}

    protected $fillable=['name','description'];
}
